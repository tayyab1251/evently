@extends('layouts.dashboard')

@section('title', 'Edit Event')

@section('content')

<!-- START: Edit Event -->

<div class="card p-4 border-light shadow-sm">

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

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

                        <input type="text" class="form-control-custom" name="name" id="name"
                            value="{{ old('name', $event->name) }}" placeholder="Enter event name">

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

                            <option disabled>
                                Choose Event Category...
                            </option>

                            @foreach ($categories as $category)

                            <option value="{{ $category->id }}" {{ old('category_id', $event->category_id) ==
                                $category->id ? 'selected' : '' }}
                                >
                                {{ $category->name }}
                            </option>

                            @endforeach

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
                            placeholder="Write a brief description of the event...">{{ old('description', $event->description) }}</textarea>

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
                            value="{{ old('location_name', $event->location_name) }}"
                            placeholder="e.g. Lahore Expo Centre">

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
                            placeholder="Enter complete event address">{{ old('address', $event->address) }}</textarea>

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
                            value="{{ old('city_id', $event->city) }}" placeholder="Enter city">

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

                            <option disabled>
                                Choose Event City...
                            </option>

                            @foreach ($cities as $city)

                            <option value="{{ $city->id }}" {{ old('city_id', $event->city_id) ==
                                $city->id ? 'selected' : '' }}
                                >
                                {{ $city->name }}
                            </option>

                            @endforeach

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

                                <img src="{{ $event->primary_image
                                        ? asset('storage/' . $event->primary_image)
                                        : asset('images/default_image.png') }}" alt="{{ $event->name }}"
                                    alt="Primary Image Preview" class="preview-image">

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

                    <!-- Latitude -->

                    {{-- <div class="mb-3">

                        <label for="latitude" class="form-label-custom">
                            Latitude
                        </label>

                        <input type="number" class="form-control-custom" name="latitude" id="latitude"
                            value="{{ old('latitude', $event->latitude) }}" step="any" placeholder="e.g. 31.5204">

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
                            value="{{ old('longitude', $event->longitude) }}" step="any" placeholder="e.g. 74.3587">

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
                            value="{{ old('map_url', $event->map_url) }}" placeholder="Paste Google Maps link">

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

                            <option disabled>
                                Choose Event Type...
                            </option>

                            <option value="free" {{ old('type', $event->type) == 'free' ? 'selected' : '' }}
                                >
                                Free
                            </option>

                            <option value="paid" {{ old('type', $event->type) == 'paid' ? 'selected' : '' }}
                                >
                                Paid
                            </option>

                            {{-- <option value="concert" {{ old('type', $event->type) == 'concert' ? 'selected' : '' }}
                                >
                                Concert
                            </option> --}}

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
                                value="{{ old('price', $event->price) }}" min="0" step="0.01" placeholder="Enter price">

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
                                value="{{ old('end_at', \Carbon\Carbon::parse($event->getRawOriginal('start_at'))->format('Y-m-d\TH:i')) }}">


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
                                value="{{ old('end_at', \Carbon\Carbon::parse($event->getRawOriginal('end_at'))->format('Y-m-d\TH:i')) }}">

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
                                value="{{ old('max_attendees', $event->max_attendees) }}" min="1"
                                placeholder="Enter maximum attendees">

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

                                <option value="" disabled>
                                    Choose Feature ...
                                </option>

                                <option value="1" {{ old('is_featured', $event->is_featured) == 1 ? 'selected' : '' }}>
                                    Yes
                                </option>

                                <option value="0" {{ old('is_featured', $event->is_featured) == 0 ? 'selected' : '' }}>
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

                                <img src="{{ $event->cover_image
                                        ? asset('storage/' . $event->cover_image)
                                        : asset('images/default_image.png') }}" alt="Cover Photo Preview"
                                    class="preview-image">

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
                Update Event
            </button>

        </div>

    </form>

</div>

<!-- END: Edit Event -->

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


        /*
        |--------------------------------------------------------------------------
        | Existing Image
        |--------------------------------------------------------------------------
        */

        if (previewImage.src && previewImage.src.trim() !== "") {

            content.classList.add("d-none");
            preview.classList.remove("d-none");

        }


        /*
        |--------------------------------------------------------------------------
        | Handle New File
        |--------------------------------------------------------------------------
        */

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


            // Remove previous object URL
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


        /*
        |--------------------------------------------------------------------------
        | Click → File Picker
        |--------------------------------------------------------------------------
        */

        dropzone.addEventListener("click", function () {

            input.click();

        });


        /*
        |--------------------------------------------------------------------------
        | File Selected
        |--------------------------------------------------------------------------
        */

        input.addEventListener("change", function () {

            handleFile(this.files[0]);

        });


        /*
        |--------------------------------------------------------------------------
        | Drag Enter / Over
        |--------------------------------------------------------------------------
        */

        ["dragenter", "dragover"].forEach(function (eventName) {

            dropzone.addEventListener(eventName, function (e) {

                e.preventDefault();
                e.stopPropagation();

                dropzone.classList.add("drag-over");

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Drag Leave / Drop
        |--------------------------------------------------------------------------
        */

        ["dragleave", "drop"].forEach(function (eventName) {

            dropzone.addEventListener(eventName, function (e) {

                e.preventDefault();
                e.stopPropagation();

                dropzone.classList.remove("drag-over");

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Drop
        |--------------------------------------------------------------------------
        */

        dropzone.addEventListener("drop", function (e) {

            const files = e.dataTransfer.files;

            if (files.length > 0) {

                handleFile(files[0]);

                const dataTransfer = new DataTransfer();

                dataTransfer.items.add(files[0]);

                input.files = dataTransfer.files;

            }

        });


        /*
        |--------------------------------------------------------------------------
        | Remove Image
        |--------------------------------------------------------------------------
        */

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


    /*
    |--------------------------------------------------------------------------
    | Primary Image
    |--------------------------------------------------------------------------
    */

    setupImageDropzone(
        "primaryDropzone",
        "primary_image"
    );


    /*
    |--------------------------------------------------------------------------
    | Cover Image
    |--------------------------------------------------------------------------
    */

    setupImageDropzone(
        "coverDropzone",
        "cover_image"
    );

</script>
@endpush