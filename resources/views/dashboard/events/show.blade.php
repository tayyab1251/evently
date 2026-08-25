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
@endphp


{{-- =========================================================
    PAGE HEADER
========================================================= --}}

<div class="page-header">

    <div>
        <div class="d-flex align-items-center gap-2 mb-1">

            <h1 class="page-title mb-0">
                Event Details
            </h1>

        </div>

        <p class="text-muted small mb-0">
            View complete information about this event
        </p>
    </div>


    {{-- Actions --}}
    <div class="d-flex gap-2">

        <a
            href="{{ route('admin.events.index') }}"
            class="btn btn-light-cancel"
        >
            <i class="bi bi-list me-1"></i>
            All Events
        </a>

        <a
            href="#"
            class="btn btn-lime-primary"
        >
            <i class="bi bi-pencil-fill me-1"></i>
            Edit Event
        </a>

    </div>

</div>



<div class="row g-4">


    {{-- =========================================================
        LEFT COLUMN
    ========================================================== --}}

    <div class="col-12 col-xl-8">


        {{-- =====================================================
            EVENT HEADER
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-body p-4">

                <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">

                    <div>

                        {{-- Event Name + Status --}}
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">

                            <h2 class="fw-bold mb-0">
                                {{ $event->name }}
                            </h2>

                            <span class="badge {{ $statusBadgeClass }} rounded-pill px-3 py-1">

                                @if(in_array($event->status, ['Upcoming', 'Ongoing']))
                                    <span class="status-indicator-dot {{ $statusDotClass }} me-1"></span>
                                @endif

                                {{ $event->status }}

                            </span>

                        </div>


                        {{-- Category + Type --}}
                        <div class="d-flex flex-wrap gap-2">

                            <span class="badge badge-soft-forest">
                                {{ $event->category->name ?? 'N/A' }}
                            </span>

                            <span class="badge badge-outline-forest rounded-pill px-3 py-1">
                                {{ ucfirst($event->type) }}
                            </span>

                        </div>

                    </div>


                    {{-- Event ID --}}
                    <div class="text-muted small">

                        <span class="fw-semibold">
                            Event ID:
                        </span>

                        #{{ $event->id }}

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
            DESCRIPTION
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-file-text me-2"></i>

                    Description

                </h5>

            </div>


            <div class="card-body p-4">

                @if($event->description)

                    <p
                        class="text-muted mb-0"
                        style="line-height: 1.8;"
                    >
                        {{ $event->description }}
                    </p>

                @else

                    <p class="text-muted fst-italic mb-0">

                        No description has been added for this event.

                    </p>

                @endif

            </div>

        </div>



        {{-- =====================================================
            EVENT INFORMATION
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-info-circle me-2"></i>

                    Event Information

                </h5>

            </div>


            <div class="card-body p-4">

                <div class="row g-4">


                    {{-- Category --}}
                    <div class="col-12 col-md-6">

                        <div class="d-flex align-items-start">

                            <div class="me-3">

                                <i class="bi bi-tag fs-4 text-primary"></i>

                            </div>

                            <div>

                                <div class="text-muted small mb-1">
                                    Category
                                </div>

                                <div>
                                    <span class="badge badge-soft-forest">
                                        {{ $event->category->name ?? 'N/A' }}
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Type --}}
                    <div class="col-12 col-md-6">

                        <div class="d-flex align-items-start">

                            <div class="me-3">

                                <i class="bi bi-ticket-perforated fs-4 text-primary"></i>

                            </div>

                            <div>

                                <div class="text-muted small mb-1">
                                    Event Type
                                </div>

                                <div>
                                    <span class="badge badge-outline-forest rounded-pill px-3 py-1">
                                        {{ ucfirst($event->type) }}
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Maximum Attendees --}}
                    <div class="col-12 col-md-6">

                        <div class="d-flex align-items-start">

                            <div class="me-3">

                                <i class="bi bi-people fs-4 text-primary"></i>

                            </div>

                            <div>

                                <div class="text-muted small mb-1">
                                    Maximum Attendees
                                </div>

                                <div class="fw-semibold">
                                    {{ number_format($event->max_attendees) }}
                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Status --}}
                    <div class="col-12 col-md-6">

                        <div class="d-flex align-items-start">

                            <div class="me-3">

                                <i class="bi bi-activity fs-4 text-primary"></i>

                            </div>

                            <div>

                                <div class="text-muted small mb-1">
                                    Current Status
                                </div>

                                <div>

                                    <span class="badge {{ $statusBadgeClass }} rounded-pill px-3 py-1">

                                        @if(in_array($event->status, ['Upcoming', 'Ongoing']))
                                            <span class="status-indicator-dot {{ $statusDotClass }} me-1"></span>
                                        @endif

                                        {{ $event->status }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>



        {{-- =====================================================
            SCHEDULE
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-calendar-event me-2"></i>

                    Schedule

                </h5>

            </div>


            <div class="card-body p-4">

                <div class="row g-4">


                    {{-- Event Starts --}}
                    <div class="col-12 col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="d-flex align-items-center mb-3">

                                <i class="bi bi-calendar-check fs-4 text-success me-2"></i>

                                <span class="fw-semibold">
                                    Event Starts
                                </span>

                            </div>

                            <div class="fw-bold fs-5">
                                {{ $event->start_at }}
                            </div>

                            <div class="text-muted small mt-1">
                                Start date and time
                            </div>

                        </div>

                    </div>



                    {{-- Event Ends --}}
                    <div class="col-12 col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="d-flex align-items-center mb-3">

                                <i class="bi bi-calendar-x fs-4 text-danger me-2"></i>

                                <span class="fw-semibold">
                                    Event Ends
                                </span>

                            </div>

                            <div class="fw-bold fs-5">
                                {{ $event->end_at }}
                            </div>

                            <div class="text-muted small mt-1">
                                End date and time
                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>



        {{-- =====================================================
            LOCATION
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-geo-alt me-2"></i>

                    Location

                </h5>

            </div>


            <div class="card-body p-4">


                {{-- Main Location --}}
                <div class="mb-4">

                    <div class="d-flex align-items-start">

                        <div class="me-3">

                            <i class="bi bi-building fs-4 text-primary"></i>

                        </div>

                        <div>

                            <h5 class="fw-semibold mb-1">

                                {{ $event->location_name ?? 'Location not specified' }}

                            </h5>

                            @if($event->address)

                                <p class="text-muted mb-2">
                                    {{ $event->address }}
                                </p>

                            @endif

                            @if($event->city)

                                <span class="badge badge-soft-forest">

                                    <i class="bi bi-geo-alt me-1"></i>

                                    {{ $event->city }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- Coordinates --}}
                @if($event->latitude || $event->longitude)

                    <div class="border rounded p-3 mb-4">

                        <div class="d-flex align-items-center mb-3">

                            <i class="bi bi-crosshair me-2"></i>

                            <span class="fw-semibold">
                                Coordinates
                            </span>

                        </div>

                        <div class="row g-3">

                            <div class="col-12 col-md-6">

                                <div class="text-muted small mb-1">
                                    Latitude
                                </div>

                                <div class="fw-semibold">
                                    {{ $event->latitude ?? 'N/A' }}
                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <div class="text-muted small mb-1">
                                    Longitude
                                </div>

                                <div class="fw-semibold">
                                    {{ $event->longitude ?? 'N/A' }}
                                </div>

                            </div>

                        </div>

                    </div>

                @endif



                {{-- Map --}}
                @if($event->map_url)

                    <a
                        href="{{ $event->map_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-outline-forest"
                    >
                        <i class="bi bi-map me-1"></i>
                        Open in Google Maps
                    </a>

                @else

                    <span class="text-muted small">
                        No map location available.
                    </span>

                @endif

            </div>

        </div>

    </div>



    {{-- =========================================================
        RIGHT COLUMN
    ========================================================== --}}

    <div class="col-12 col-xl-4">


        {{-- =====================================================
            PRICING
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-currency-exchange me-2"></i>

                    Pricing

                </h5>

            </div>


            <div class="card-body p-4 text-center">

                @if($event->price > 0)

                    <div class="fw-bold fs-2 text-main">

                        PKR {{ number_format($event->price) }}

                    </div>

                    <div class="text-muted small">
                        Per attendee
                    </div>

                    <div class="mt-3">

                        <span class="badge badge-soft-lime rounded-pill px-3 py-1">

                            <i class="bi bi-ticket-perforated me-1"></i>

                            Paid Event

                        </span>

                    </div>

                @else

                    <div class="fw-bold fs-2 text-success">
                        Free
                    </div>

                    <div class="text-muted small">
                        No payment required
                    </div>

                    <div class="mt-3">

                        <span class="badge badge-soft-success rounded-pill px-3 py-1">

                            <i class="bi bi-check-circle me-1"></i>

                            Free Event

                        </span>

                    </div>

                @endif

            </div>

        </div>



        {{-- =====================================================
            CAPACITY
        ====================================================== --}}

        <div class="card border-light shadow-sm mb-4">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-people me-2"></i>

                    Capacity

                </h5>

            </div>


            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div>

                        <div class="text-muted small">
                            Maximum attendees
                        </div>

                        <div class="fw-bold fs-4 text-main">
                            {{ number_format($event->max_attendees) }}
                        </div>

                    </div>


                    <span class="badge badge-soft-primary">

                        <i class="bi bi-people me-1"></i>

                        Capacity

                    </span>

                </div>


                {{-- Booking progress will be connected here later --}}
                <div class="border-top pt-3">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-bar-chart-line text-muted"></i>

                        <span class="text-muted small">
                            Booking statistics will appear here.
                        </span>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
            RECORD INFORMATION
        ====================================================== --}}

        <div class="card border-light shadow-sm">

            <div class="card-header bg-transparent border-bottom">

                <h5 class="mb-0 fw-semibold">

                    <i class="bi bi-database me-2"></i>

                    Record Information

                </h5>

            </div>


            <div class="card-body p-4">


                {{-- Event ID --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <span class="text-muted small">
                        Event ID
                    </span>

                    <span class="badge badge-soft-forest">
                        #{{ $event->id }}
                    </span>

                </div>


                {{-- Created --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <span class="text-muted small">
                        Created
                    </span>

                    <span class="fw-semibold small text-end">
                        {{ $event->created_at->format('d M Y, h:i A') }}
                    </span>

                </div>


                {{-- Last Updated --}}
                <div class="d-flex justify-content-between align-items-center">

                    <span class="text-muted small">
                        Last Updated
                    </span>

                    <span class="fw-semibold small text-end">
                        {{ $event->updated_at->format('d M Y, h:i A') }}
                    </span>

                </div>


            </div>

        </div>


    </div>

</div>

@endsection
