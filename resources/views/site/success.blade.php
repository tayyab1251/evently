@extends('layouts.site')

@section('content')

<section class="section">
    <div class="container-xl-custom" style="max-width:640px;">

    {{-- Success --}}
    <div class="text-center mb-5">
        <div class="mb-3 fs-1 text-success">
            <i class="bi bi-check-circle-fill"></i>
        </div>

        <h1 class="display-sm mb-2">Booking Confirmed!</h1>

        <p class="text-body-c mb-0">
            Your booking has been successfully completed.
        </p>
    </div>


    {{-- Invoice --}}
    <div id="booking-invoice" class="card-brand p-4 p-lg-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div class="caption text-muted-c mb-1">
                    Booking Reference
                </div>

                <div class="number-display fs-5">
                    #{{ $booking->booking_reference }}
                </div>
            </div>

            <span class="status-badge status-published">
                <span class="dot"></span>
                Confirmed
            </span>
        </div>


        {{-- Event --}}
        <div class="d-flex gap-3 mb-4">

            <img
                src="{{ asset('storage/' . $event->primary_image) }}"
                width="88"
                height="70"
                class="rounded-brand-xl"
                style="object-fit:cover;"
                alt="{{ $event->name }}"
            >

            <div>
                <div class="title-sm mb-1">
                    {{ $event->name }}
                </div>

                <div class="caption text-muted-c">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $event->start_at }}
                </div>

                <div class="caption text-muted-c">
                    <i class="bi bi-geo-alt me-1"></i>
                    {{ $event->city->name }}
                </div>
            </div>

        </div>


        {{-- Booking Details --}}
        <div class="row g-3 hairline-top pt-4">

            <div class="col-6">
                <div class="caption text-muted-c mb-1">
                    Ticket
                </div>

                <div class="text-ink fw-medium">
                    General Admission
                </div>
            </div>

            <div class="col-6">
                <div class="caption text-muted-c mb-1">
                    Amount
                </div>

                <div class="number-display">
                    {{ $event->type === 'free'
                        ? 'Free'
                        : '$' . number_format($booking->event->price, 2)
                    }}
                </div>
            </div>

        </div>

    </div>


    {{-- Actions --}}
    <div class="d-flex gap-3 mt-4">

        <button
            type="button"
            onclick="window.print()"
            class="btn btn-brand btn-brand-primary flex-fill"
        >
            <i class="bi bi-printer me-2"></i>
            Print Invoice
        </button>

        <a
            href="{{ route('home') }}"
            class="btn btn-brand btn-brand-secondary-light flex-fill"
        >
            Back to Events
        </a>

    </div>

</div>

</section>

@push('scripts')

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #booking-invoice,
        #booking-invoice * {
            visibility: visible;
        }

        #booking-invoice {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>

@endpush

@endsection
