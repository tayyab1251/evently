@extends('layouts.dashboard')

@section('title', 'Create Event')

@section('content')

<!-- START: Create Event -->
<div class="card p-4 border-light shadow-sm">

    <form action="{{ route('admin.events.store') }}" method="POST">
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

                        <input type="text" class="form-control-custom" name="name" id="name"
                            placeholder="Enter event name">
                    </div>

                    <!-- Event Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label-custom">
                            Event Category
                        </label>

                        <select class="form-select-custom" name="category" id="category">
                            <option selected disabled>
                                Choose Event Category...
                            </option>
                            <option value="education">Education</option>
                            <option value="sports">Sports</option>
                            <option value="tech">Tech</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label-custom">
                            Description
                        </label>

                        <textarea class="form-control-custom" name="description" id="description" rows="6"
                            placeholder="Write a brief description of the event..."></textarea>
                    </div>

                </div>
            </div>


            <!-- Event Details -->
            <div class="col-12 col-lg-6">
                <div class="card border-light shadow-none p-4 h-100">

                    <h5 class="card-title mb-4">Event Details</h5>

                    <!-- Location -->
                    <div class="mb-3">
                        <label for="location" class="form-label-custom">
                            Location
                        </label>

                        <select class="form-select-custom" name="location" id="location">
                            <option selected disabled>
                                Choose Location...
                            </option>
                            <option value="lahore">Lahore</option>
                            <option value="sahiwal">Sahiwal</option>
                            <option value="chichawatni">Chichawatni</option>
                        </select>
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
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label-custom">
                            Price
                        </label>

                        <div class="input-group-custom">
                            <input type="number" class="form-control-custom" name="price" id="price" min="0" step="0.01"
                                placeholder="Enter price">
                        </div>
                    </div>

                    <!-- Event Start -->
                    <div class="mb-3">
                        <label for="start_at" class="form-label-custom">
                            Event Start
                        </label>

                        <div class="input-group-custom">
                            <input type="datetime-local" class="form-control-custom" name="start_at" id="start_at">
                        </div>
                    </div>

                    <!-- Event Ends -->
                    <div class="mb-3">
                        <label for="end_at" class="form-label-custom">
                            Event Ends
                        </label>

                        <div class="input-group-custom">
                            <input type="datetime-local" class="form-control-custom" name="end_at" id="end_at">
                        </div>
                    </div>

                    <!-- Max Attendees -->
                    <div class="mb-0">
                        <label for="max_attendees" class="form-label-custom">
                            Max Attendees
                        </label>

                        <div class="input-group-custom">
                            <input type="number" class="form-control-custom" name="max_attendees" id="max_attendees"
                                min="1" placeholder="Enter maximum attendees">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Form Actions -->
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="{{ route('admin.events.index') }}" class="btn btn-light">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Create Event
            </button>

        </div>

    </form>

</div>
<!-- END: Create Event -->

@endsection