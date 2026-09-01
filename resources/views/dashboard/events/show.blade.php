@extends('layouts.dashboard')

@section('title', $event->name)

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Event Status Presentation
    |--------------------------------------------------------------------------
    */

    $statusBadgeClass = match ($event->status) {
        'Upcoming' => 'badge-soft-primary',
        'Ongoing' => 'badge-soft-success',
        'Completed' => 'badge-soft-forest',
        default => 'badge-soft-danger',
    };

    $statusDotClass = match ($event->status) {
        'Upcoming', 'Ongoing' => 'active',
        'Completed' => 'away',
        default => 'busy',
    };

    /*
    |--------------------------------------------------------------------------
    | Image Helpers
    |--------------------------------------------------------------------------
    */

    $primaryImage = $event->primary_image 
        ? asset('storage/' . $event->primary_image) 
        : asset('images/default_image.png');

    $coverImage = $event->cover_image 
        ? asset('storage/' . $event->cover_image) 
        : asset('images/default_cover_image.png');
@endphp


{{-- =========================================================
    PAGE HEADER
========================================================= --}}

<div class="page-header">

    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <h1 class="page-title mb-0">Event Details</h1>
        </div>

        <p class="text-muted small mb-0">
            View complete information about this event
        </p>
    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('admin.events.index') }}" class="btn btn-light-cancel">
            <i class="bi bi-list me-1"></i>
            All Events
        </a>

        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-lime-primary">
            <i class="bi bi-pencil-fill me-1"></i>
            Edit Event
        </a>

    </div>

</div>


{{-- =========================================================
    COVER IMAGE BANNER
========================================================= --}}

@if($event->cover_image)
    <div class="mb-3 rounded-3 overflow-hidden">
        <img 
            src="{{ $coverImage }}" 
            alt="Cover image for {{ $event->name }}"
            class="w-100 object-fit-cover"        >
        </div>
        <div>
            <h2 class="text-black fw-bold mb-3 fs-3">{{ $event->name }}</h2>
        </div>
@endif


{{-- =========================================================
    TITLE + STATUS ROW
========================================================= --}}

<div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">

    <div class="d-flex flex-wrap align-items-center gap-2">

        @if(!$event->cover_image)
            <h2 class="fw-bold mb-0 fs-4">{{ $event->name }}</h2>
        @endif

        <span class="badge {{ $statusBadgeClass }} rounded-2 px-2 py-1">
            @if(in_array($event->status, ['Upcoming', 'Ongoing']))
                <span class="status-indicator-dot {{ $statusDotClass }} me-1"></span>
            @endif
            {{ $event->status }}
        </span>

        <span class="badge badge-soft-forest rounded-2 px-2 py-1">
            {{ $event->category->name ?? 'N/A' }}
        </span>

        <span class="badge badge-outline-forest rounded-2 px-2 py-1">
            {{ ucfirst($event->type) }}
        </span>

    </div>

    <div class="text-muted small font-monospace">
        Event #{{ $event->id }}
    </div>

</div>


{{-- =========================================================
    KPI SUMMARY STRIP
========================================================= --}}

<div class="row g-2 mb-3">

    <div class="col-6 col-md-3">
        <div class="card border-light">
            <div class="card-body p-2 px-3 d-flex align-items-center gap-2">
                <i class="bi bi-cash-coin fs-5 text-muted"></i>
                <div>
                    <div class="text-muted small lh-1">Price</div>
                    <div class="fw-bold {{ $event->price > 0 ? 'text-main' : 'text-success' }}">
                        @if($event->price > 0)
                            PKR {{ number_format($event->price) }}
                        @else
                            Free
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-light">
            <div class="card-body p-2 px-3 d-flex align-items-center gap-2">
                <i class="bi bi-people-fill fs-5 text-muted"></i>
                <div>
                    <div class="text-muted small lh-1">Max Attendees</div>
                    <div class="fw-bold text-main">
                        {{ number_format($event->max_attendees) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-light">
            <div class="card-body p-2 px-3 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check fs-5 text-muted"></i>
                <div>
                    <div class="text-muted small lh-1">Starts</div>
                    <div class="fw-semibold">
                        {{ $event->start_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-light">
            <div class="card-body p-2 px-3 d-flex align-items-center gap-1">
                <i class="bi bi-calendar-x fs-5 text-muted"></i>
                <div>
                    <div class="text-muted small lh-1">Ends</div>
                    <div class="fw-semibold">
                        {{ $event->end_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row g-3">


    {{-- =========================================================
        LEFT COLUMN
    ========================================================== --}}

    <div class="col-12 col-xl-8">


        {{-- =====================================================
            PRIMARY IMAGE + DESCRIPTION SIDE BY SIDE
        ====================================================== --}}

        <div class="card border-light mb-3">

            <div class="card-header bg-transparent border-bottom py-2">
                <h6 class="mb-0 fw-semibold text-uppercase small text-muted">
                    <i class="bi bi-file-text me-1"></i>
                    Description
                </h6>
            </div>

            <div class="card-body p-3">

                <div class="row g-3">
                    
                    {{-- Primary Image --}}
                    @if($event->primary_image)
                        {{-- <div class="col-12 col-md-4">
                            <img 
                                src="{{ $primaryImage }}" 
                                alt="{{ $event->name }}"
                                class="img-fluid rounded-2 w-100"
                                style="object-fit: cover; max-height: 200px;"
                            >
                        </div> --}}
                        <div class="col-12 col-md-8">
                            @if($event->description)
                                <p class="mb-0 small" style="line-height: 1.6;">
                                    {{ $event->description }}
                                </p>
                            @else
                                <p class="text-muted fst-italic mb-0 small">
                                    No description has been added for this event.
                                </p>
                            @endif
                        </div>
                    @else
                        <div class="col-12">
                            @if($event->description)
                                <p class="mb-0 small" style="line-height: 1.6;">
                                    {{ $event->description }}
                                </p>
                            @else
                                <p class="text-muted fst-italic mb-0 small">
                                    No description has been added for this event.
                                </p>
                            @endif
                        </div>
                    @endif

                </div>

            </div>

        </div>



        {{-- =====================================================
            EVENT DETAILS (Info + Schedule + Location merged)
        ====================================================== --}}

        <div class="card border-light mb-3">

            <div class="card-header bg-transparent border-bottom py-2">
                <h6 class="mb-0 fw-semibold text-uppercase small text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Event Details
                </h6>
            </div>

            <div class="card-body p-0">

                <table class="table table-sm mb-0">
                    <tbody>

                        {{-- General --}}
                        <tr>
                            <th class="text-muted fw-normal ps-3" style="width: 220px;">
                                <i class="bi bi-tag me-1"></i> Category
                            </th>
                            <td>{{ $event->category->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-ticket-perforated me-1"></i> Event Type
                            </th>
                            <td>{{ ucfirst($event->type) }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-activity me-1"></i> Current Status
                            </th>
                            <td>
                                <span class="badge {{ $statusBadgeClass }} rounded-2 px-2 py-1">
                                    @if(in_array($event->status, ['Upcoming', 'Ongoing']))
                                        <span class="status-indicator-dot {{ $statusDotClass }} me-1"></span>
                                    @endif
                                    {{ $event->status }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-people me-1"></i> Maximum Attendees
                            </th>
                            <td>{{ number_format($event->max_attendees) }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-cash-coin me-1"></i> Price
                            </th>
                            <td>
                                @if($event->price > 0)
                                    PKR {{ number_format($event->price) }}
                                @else
                                    Free
                                @endif
                            </td>
                        </tr>

                        {{-- Schedule --}}
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-calendar-check me-1"></i> Event Starts
                            </th>
                            <td>{{ $event->start_at }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-calendar-x me-1"></i> Event Ends
                            </th>
                            <td>{{ $event->end_at }}</td>
                        </tr>

                        {{-- Location --}}
                        <tr>
                            <th class="text-muted fw-normal ps-3">
                                <i class="bi bi-building me-1"></i> Venue
                            </th>
                            <td>{{ $event->location_name ?? 'Location not specified' }}</td>
                        </tr>

                        @if($event->address)
                            <tr>
                                <th class="text-muted fw-normal ps-3">
                                    <i class="bi bi-signpost me-1"></i> Address
                                </th>
                                <td>{{ $event->address }}</td>
                            </tr>
                        @endif

                        @if($event->city->name)
                            <tr>
                                <th class="text-muted fw-normal ps-3">
                                    <i class="bi bi-geo-alt me-1"></i> City
                                </th>
                                <td>{{ $event->city->name }}</td>
                            </tr>
                        @endif

                        @if($event->latitude || $event->longitude)
                            <tr>
                                <th class="text-muted fw-normal ps-3">
                                    <i class="bi bi-crosshair me-1"></i> Latitude
                                </th>
                                <td class="font-monospace small">{{ $event->latitude ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-normal ps-3">
                                    <i class="bi bi-crosshair me-1"></i> Longitude
                                </th>
                                <td class="font-monospace small">{{ $event->longitude ?? 'N/A' }}</td>
                            </tr>
                        @endif

                        @if($event->map_url)
                            <tr>
                                <th class="text-muted fw-normal ps-3">
                                    <i class="bi bi-map me-1"></i> Map
                                </th>
                                <td>
                                    <a
                                        href="{{ $event->map_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class=" badge badge-soft-primary "
                                    >
                                        Open in Google Maps
                                    </a>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>

        </div>

    </div>



    {{-- =========================================================
        RIGHT COLUMN
    ========================================================== --}}

    <div class="col-12 col-xl-4">


        {{-- =====================================================
            EVENT IMAGE PREVIEW
        ====================================================== --}}

        @if($event->primary_image)
            <div class="card border-light mb-3">

                <div class="card-header bg-transparent border-bottom py-2">
                    <h6 class="mb-0 fw-semibold text-uppercase small text-muted">
                        <i class="bi bi-image me-1"></i>
                        Primary Image
                    </h6>
                </div>

                <div class="card-body p-3">
                    <img 
                        src="{{ $primaryImage }}" 
                        alt="Primary image for {{ $event->name }}"
                        class="img-fluid rounded-2 w-100"
                        style="object-fit: cover;"
                    >
                </div>

            </div>
        @endif


        {{-- =====================================================
            CAPACITY
        ====================================================== --}}

        <div class="card border-light mb-3">

            <div class="card-header bg-transparent border-bottom py-2">
                <h6 class="mb-0 fw-semibold text-uppercase small text-muted">
                    <i class="bi bi-people me-1"></i>
                    Capacity
                </h6>
            </div>

            <div class="card-body p-3">

                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-muted small">Maximum attendees</span>
                    <span class="fw-bold text-main">
                        {{ number_format($event->max_attendees) }}
                    </span>
                </div>

            </div>

        </div>



        {{-- =====================================================
            RECORD INFORMATION
        ====================================================== --}}

        <div class="card border-light">

            <div class="card-header bg-transparent border-bottom py-2">
                <h6 class="mb-0 fw-semibold text-uppercase small text-muted">
                    <i class="bi bi-database me-1"></i>
                    Record Information
                </h6>
            </div>

            <div class="card-body p-0">

                <table class="table table-sm mb-0">
                    <tbody>
                        <tr>
                            <th class="text-muted fw-normal ps-3">Event ID</th>
                            <td class="text-end font-monospace pe-3">#{{ $event->id }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">Created</th>
                            <td class="text-end small pe-3">
                                {{ $event->created_at->format('d M Y, h:i A') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal ps-3">Last Updated</th>
                            <td class="text-end small pe-3">
                                {{ $event->updated_at->format('d M Y, h:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>


    </div>

</div>

@endsection