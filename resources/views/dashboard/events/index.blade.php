@extends('layouts.dashboard')

@section('title', 'Events')

@section('content')

<div class="page-header">
    <div>
        <h1 class="page-title">Events</h1>
        <p class="text-muted small mb-0">
            Manage all events added by admin
        </p>
    </div>

    <a href="{{ route('admin.events.create') }}" class="btn btn-forest-primary mb-3">
        <i class="bi bi-plus-lg me-1"></i>
        Create Event
    </a>
</div>

<div class="row g-4">
    <div class="col-12">

        <div class="card border-light rounded" style="padding: 1rem">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table-custom mb-0">

                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Category</th>
                                <th>Schedule</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Type / Price</th>
                                <th>Capacity</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($events as $event)

                            <tr>

                                {{-- Event --}}
                                <td>
                                    <div class="fw-semibold text-main">
                                        <span class="text-muted small mt-1">
                                            #{{$loop->iteration }}
                                            {{-- #{{ $event->id }} --}}
                                        </span> &nbsp; {{ $event->name }}
                                    </div>


                                </td>


                                {{-- Category --}}
                                <td>
                                    <span class="badge badge-soft-forest">
                                        {{ $event->category->name ?? 'N/A' }}
                                    </span>
                                </td>


                                {{-- Schedule --}}
                                <td>
                                    <div class="small fw-semibold">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $event->start_at }}
                                    </div>

                                    <div class="text-muted small mt-1">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $event->start_at }}
                                    </div>
                                </td>


                                {{-- Location --}}
                                <td>
                                    <div class="small fw-semibold">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ $event->location_name }}
                                    </div>

                                    <div class="text-muted small mt-1">
                                        {{ $event->city }}
                                    </div>
                                </td>


                                {{-- Status --}}
                                <td>

                                    @switch($event->status)

                                    @case('Upcoming')
                                    <span class="badge badge-soft-primary rounded-pill px-3 py-1">
                                        <span class="status-indicator-dot active me-1"></span>
                                        Upcoming
                                    </span>
                                    @break

                                    @case('Ongoing')
                                    <span class="badge badge-soft-success rounded-pill px-3 py-1">
                                        <span class="status-indicator-dot active me-1"></span>
                                        Ongoing
                                    </span>
                                    @break

                                    @case('Completed')
                                    <span class="badge badge-soft-forest rounded-pill px-3 py-1">
                                        Completed
                                    </span>
                                    @break

                                    @default
                                    <span class="badge badge-soft-warning rounded-pill px-3 py-1">
                                        {{ $event->status }}
                                    </span>

                                    @endswitch

                                </td>


                                {{-- Type / Price --}}
                                <td>

                                    <span class="badge badge-outline-forest rounded-pill px-3 py-1">
                                        {{ ucfirst($event->type) }}
                                    </span>

                                    <div class="mt-2">

                                        @if($event->price > 0)

                                        <span class="badge badge-soft-lime">
                                            PKR {{ $event->price }}
                                        </span>

                                        @else

                                        <span class="badge badge-soft-success">
                                            Free
                                        </span>

                                        @endif

                                    </div>

                                </td>


                                {{-- Capacity --}}
                                <td>
                                    <span class="badge badge-soft-primary">
                                        <i class="bi bi-people me-1"></i>
                                        {{ number_format($event->max_attendees) }}
                                    </span>
                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- View --}}
                                        <a href="{{ route('admin.events.show', $event->id) }}"
                                            class="btn btn-icon btn-soft-forest" title="View details">
                                            <i class="bi bi-eye"></i>
                                        </a>


                                        {{-- Edit --}}
                                        <a href="#" class="btn btn-icon btn-lime-primary" title="Edit event">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>


                                        {{-- Delete --}}
                                        <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}"
                                            class="delete-event-form">
                                            @csrf
                                            @method('DELETE')
                                            <button id="deleteButton" class="btn btn-icon btn-soft-danger"
                                                title="Delete event">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">

                                    <div class="mb-2">
                                        <i class="bi bi-calendar-x fs-2 text-muted"></i>
                                    </div>

                                    <div class="fw-semibold text-main">
                                        No events found
                                    </div>

                                    <div class="text-muted small mb-3">
                                        Start by creating your first event.
                                    </div>

                                    <a href="{{ route('admin.events.create') }}" class="btn btn-forest-primary btn-sm">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        Create Event
                                    </a>

                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.delete-event-form').forEach(function (form) {

        form.addEventListener('submit', function (e) {

            e.preventDefault();

            Swal.fire({
                title: 'Delete event?',
                text: 'This action cannot be undone.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then(function (result) {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });
</script>
@endpush

@endsection