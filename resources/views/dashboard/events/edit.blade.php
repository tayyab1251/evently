@extends('layouts.dashboard')

@section('title', 'Edit Event')

@section('content')

<!-- START: Edit Event -->

<div class="card p-4 border-light shadow-sm">

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">

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

                    <div class="mb-0">

                        <label for="city" class="form-label-custom">
                            City
                        </label>

                        <input type="text" class="form-control-custom" name="city" id="city"
                            value="{{ old('city', $event->city) }}" placeholder="Enter city">

                        @error('city')
                        <div class="form-feedback-custom invalid-custom">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>


            <!-- Event Details -->

            <div class="col-12 col-lg-6">

                <div class="card border-light shadow-none p-4 h-100">

                    <h5 class="card-title mb-4">Event Details</h5>

                    <!-- Latitude -->

                    <div class="mb-3">

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

                    </div>

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

                    <div class="mb-0">

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