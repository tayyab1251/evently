@extends('layouts.dashboard')

@section('title', 'Create Event')

@push('styles')
<style>
    .dropzone-box {
        position: relative;
        min-height: 220px;
        cursor: pointer;
        overflow: hidden;
    }

    .dropzone-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 220px;
        text-align: center;
    }

    .image-preview {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        background: #fff;
    }

    .preview-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .remove-image-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 50%;
        background: rgba(220, 53, 69, 0.9);
        color: white;
        cursor: pointer;
        z-index: 2;
    }
</style>
@endpush

@section('content')

<!-- START: Create Event -->

<div class="card p-4 border-light shadow-sm">

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            <!-- Event Basic Information -->
            <div class="col-12 col-lg-6">

                <div class="card border-light shadow-none p-4 h-100">

                    <h5 class="card-title mb-4">Event Information</h5>

                    <!-- Event Name -->
                    <div class="mb-3">

                        <label for="name" class="form-label-custom">
                            Name
                        </label>

                        <input type="text" class="form-control-custom" name="name" id="name" value="{{ old('name') }}"
                            placeholder="Enter event name">

                        @error('name')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Event Category -->
                    <div class="mb-3">

                        <label for="category" class="form-label-custom">
                            Event Category
                        </label>

                        <select class="form-select-custom" name="category_id" id="category">
                            <option selected disabled>
                                Choose Event Category...
                            </option>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : ''
                                }}
                                >
                                {{ $category->name }}
                            </option>
                            @endforeach

                            {{-- <option value="111">Test</option> --}}

                        </select>

                        @error('category_id')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Description -->
                    <div class="mb-3">

                        <label for="description" class="form-label-custom">
                            Description
                        </label>

                        <textarea class="form-control-custom" name="description" id="description" rows="6"
                            placeholder="Write a brief description of the event...">{{ old('description') }}</textarea>

                        @error('description')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Location Name -->
                    <div class="mb-3">

                        <label for="location_name" class="form-label-custom">
                            Location Name
                        </label>

                        <input type="text" class="form-control-custom" name="location_name" id="location_name"
                            value="{{ old('location_name') }}" placeholder="e.g. Lahore Expo Centre">

                        @error('location_name')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Address -->
                    <div class="mb-3">

                        <label for="address" class="form-label-custom">
                            Address
                        </label>

                        <textarea class="form-control-custom" name="address" id="address" rows="3"
                            placeholder="Enter complete event address">{{ old('address') }}</textarea>

                        @error('address')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- City -->
                    {{-- <div class="mb-0">

                        <label for="city" class="form-label-custom">
                            City
                        </label>

                        <input type="text" class="form-control-custom" name="city_id" id="city"
                            value="{{ old('city_id') }}" placeholder="Enter city">

                        @error('city_id')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div> --}}
                    <div class="mb-3">

                        <label for="city_id" class="form-label-custom">
                            City
                        </label>

                        <select class="form-select-custom" name="city_id" id="city_id">
                            <option selected disabled>
                                Choose Event City...
                            </option>

                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id')==$city->id ? 'selected' : '' }}
                                >
                                {{ $city->name }}
                            </option>
                            @endforeach

                            {{-- <option value="111">Test</option> --}}

                        </select>

                        @error('city_id')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Primary Image --}}
                    <div class="mb-0">

                        <label for="primary_image" class="form-label-custom">
                            Primary Image
                        </label>

                        <div class="dropzone-box" id="primaryDropzone">

                            <input type="file" id="primary_image" name="primary_image" class="d-none"
                                accept="image/png,image/jpeg">

                            <div class="dropzone-content">

                                <div class="dropzone-icon-box">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>

                                <h6 class="fw-bold text-main mb-1">
                                    Drop image here or click to upload
                                </h6>

                                <p class="text-muted-green small mb-0">
                                    PNG, JPG up to 2MB
                                </p>

                            </div>

                            {{-- Image Preview --}}
                            <div class="image-preview d-none">

                                <img src="" alt="Primary Image Preview" class="preview-image">

                                <button type="button" class="remove-image-btn">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Event Details -->
            <div class="col-12 col-lg-6">

                <div class="card border-light shadow-none p-4 h-100">

                    <h5 class="card-title mb-4">Event Details</h5>

                    {{--
                    <!-- Latitude -->
                    <div class="mb-3">

                        <label for="latitude" class="form-label-custom">
                            Latitude
                        </label>

                        <input type="number" class="form-control-custom" name="latitude" id="latitude"
                            value="{{ old('latitude') }}" step="any" placeholder="e.g. 31.5204">

                        @error('latitude')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Longitude -->
                    <div class="mb-3">

                        <label for="longitude" class="form-label-custom">
                            Longitude
                        </label>

                        <input type="number" class="form-control-custom" name="longitude" id="longitude"
                            value="{{ old('longitude') }}" step="any" placeholder="e.g. 74.3587">

                        @error('longitude')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div> --}}

                    <!-- Google Maps URL -->
                    <div class="mb-3">

                        <label for="map_url" class="form-label-custom">
                            Google Maps URL
                        </label>

                        <input type="url" class="form-control-custom" name="map_url" id="map_url"
                            value="{{ old('map_url') }}" placeholder="Paste Google Maps link">

                        @error('map_url')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Event Type -->
                    <div class="mb-3">

                        <label for="type" class="form-label-custom">
                            Type
                        </label>

                        <select class="form-select-custom" name="type" id="type">
                            <option selected disabled>
                                Choose Event Type...
                            </option>

                            <option value="free" {{ old('type')=='free' ? 'selected' : '' }}>
                                Free
                            </option>

                            <option value="paid" {{ old('type')=='paid' ? 'selected' : '' }}>
                                Paid
                            </option>

                        </select>

                        @error('type')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Price -->
                    <div class="mb-3">

                        <label for="price" class="form-label-custom">
                            Price
                        </label>

                        <div class="input-group-custom">

                            <input type="number" class="form-control-custom" name="price" id="price"
                                value="{{ old('price') }}" min="0" step="0.01" placeholder="Enter price">

                        </div>

                        @error('price')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Event Start -->
                    <div class="mb-3">

                        <label for="start_at" class="form-label-custom">
                            Event Start
                        </label>

                        <div class="input-group-custom">

                            <input type="datetime-local" class="form-control-custom" name="start_at" id="start_at"
                                value="{{ old('start_at') }}">

                        </div>

                        @error('start_at')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Event Ends -->
                    <div class="mb-3">

                        <label for="end_at" class="form-label-custom">
                            Event Ends
                        </label>

                        <div class="input-group-custom">

                            <input type="datetime-local" class="form-control-custom" name="end_at" id="end_at"
                                value="{{ old('end_at') }}">

                        </div>

                        @error('end_at')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Max Attendees -->
                    <div class="mb-3">

                        <label for="max_attendees" class="form-label-custom">
                            Max Attendees
                        </label>

                        <div class="input-group-custom">

                            <input type="number" class="form-control-custom" name="max_attendees" id="max_attendees"
                                value="{{ old('max_attendees') }}" min="1" placeholder="Enter maximum attendees">

                        </div>

                        @error('max_attendees')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label for="is_featured" class="form-label-custom">
                            Is Featured &nbsp;
                            <small class="title- text-primary">
                                (Set as featured on homesite)
                            </small>
                        </label>

                        <div class="input-group-custom">

                            <select class="form-select-custom" name="is_featured" id="is_featured">

                                <option value="" selected disabled>
                                    Choose Feature ...
                                </option>

                                <option value="1" {{ old('is_featured')=='1' ? 'selected' : '' }}>
                                    Yes
                                </option>

                                <option value="0" {{ old('is_featured')=='0' ? 'selected' : 'selected' }}>
                                    No
                                </option>

                            </select>

                            @error('is_featured')
                            <div class="form-feedback-custom invalid-custom">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Cover Photo --}}
                    <div class="mb-0">

                        <label for="cover_image" class="form-label-custom">
                            Cover Photo
                        </label>

                        <div class="dropzone-box" id="coverDropzone">

                            <input type="file" id="cover_image" name="cover_image" class="d-none"
                                accept="image/png,image/jpeg">

                            <div class="dropzone-content">

                                <div class="dropzone-icon-box">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>

                                <h6 class="fw-bold text-main mb-1">
                                    Drop image here or click to upload
                                </h6>

                                <p class="text-muted-green small mb-0">
                                    PNG, JPG up to 2MB
                                </p>

                            </div>

                            {{-- Image Preview --}}
                            <div class="image-preview d-none">

                                <img src="" alt="Cover Photo Preview" class="preview-image">

                                <button type="button" class="remove-image-btn">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


        <!-- Form Actions -->
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="{{ route('admin.events.index') }}" class="btn btn-light-cancel">
                Cancel
            </a>

            <button type="submit" class="btn btn-forest-primary">
                Create Event
            </button>

        </div>

    </form>

</div>
<!-- END: Create Event -->

@endsection
@push('scripts')
<script>
    function setupImageDropzone(dropzoneId, inputId) {

        const dropzone = document.getElementById(dropzoneId);
        const input = document.getElementById(inputId);

        const content = dropzone.querySelector(".dropzone-content");
        const preview = dropzone.querySelector(".image-preview");
        const previewImage = dropzone.querySelector(".preview-image");
        const removeButton = dropzone.querySelector(".remove-image-btn");

        let imageUrl = null;


        function handleFile(file) {

            if (!file) {
                return;
            }


            // Validate type
            if (!["image/jpeg", "image/png"].includes(file.type)) {

                alert("Only JPG and PNG images are allowed.");

                input.value = "";

                return;
            }


            // Validate size
            if (file.size > 2 * 1024 * 1024) {

                alert("Image size must be less than 2MB.");

                input.value = "";

                return;
            }


            // Remove old object URL
            if (imageUrl) {
                URL.revokeObjectURL(imageUrl);
            }


            // Create preview URL
            imageUrl = URL.createObjectURL(file);

            previewImage.src = imageUrl;


            // Hide upload content
            content.classList.add("d-none");

            // Show preview
            preview.classList.remove("d-none");
        }


        // Click -> file picker
        dropzone.addEventListener("click", function () {

            input.click();

        });


        // File selected
        input.addEventListener("change", function () {

            handleFile(this.files[0]);

        });


        // Drag events
        ["dragenter", "dragover"].forEach(function (eventName) {

            dropzone.addEventListener(eventName, function (e) {

                e.preventDefault();
                e.stopPropagation();

                dropzone.classList.add("drag-over");

            });

        });


        ["dragleave", "drop"].forEach(function (eventName) {

            dropzone.addEventListener(eventName, function (e) {

                e.preventDefault();
                e.stopPropagation();

                dropzone.classList.remove("drag-over");

            });

        });


        // Drop
        dropzone.addEventListener("drop", function (e) {

            const files = e.dataTransfer.files;

            if (files.length > 0) {

                handleFile(files[0]);

                /*
                 * Important:
                 * Browser security prevents us from directly assigning
                 * DataTransfer files to input in some cases.
                 * For normal upload flow, use DataTransfer if needed.
                 */

                const dataTransfer = new DataTransfer();

                dataTransfer.items.add(files[0]);

                input.files = dataTransfer.files;
            }

        });


        // Remove image
        removeButton.addEventListener("click", function (e) {

            e.stopPropagation();

            input.value = "";

            previewImage.src = "";

            preview.classList.add("d-none");

            content.classList.remove("d-none");


            if (imageUrl) {

                URL.revokeObjectURL(imageUrl);

                imageUrl = null;
            }

        });

    }


    // Primary Image
    setupImageDropzone(
        "primaryDropzone",
        "primary_image"
    );


    // Cover Photo
    setupImageDropzone(
        "coverDropzone",
        "cover_image"
    );

</script>
@endpush