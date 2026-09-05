<div class="card p-4 shadow-sm border-0 mb-4">
  {{-- @dd($userBookings) --}}

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1">My Bookings</h5>
            <p class="text-muted mb-0">
                View and manage your booked events.
            </p>
        </div>

        <span class="badge badge-outline-forest rounded-pill px-3 py-2">
            {{ $userBookings->count() }}
            {{ $userBookings->count() === 1 ? 'Booking' : 'Bookings' }}
        </span>
    </div>

    <div class="table-responsive">

        <table id="basic-datatable" class="table table-hover align-middle w-100">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Event</th>
                    <th>Booking Reference</th>
                    <th>Event Date</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Booking Status</th>
                    <th>Booked On</th>
                </tr>
            </thead>

            @if($userBookings->count() > 0)

                <tbody>

                    @foreach($userBookings as $booking)

                        @php
                            $event = $booking->event;
                        @endphp

                        <tr>

                            {{-- # --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- Event --}}
                            <td>
                                <div class="d-flex align-items-center gap-3">

                                    <img
                                        src="{{ $event->primary_image
                                            ? asset('storage/' . $event->primary_image)
                                            : asset('images/default_image.png') }}"
                                        alt="{{ $event->name }}"
                                        class="rounded-2 object-fit-cover flex-shrink-0"
                                        width="50"
                                        height="50"
                                    >

                                    <div>

                                        <div class="fw-semibold">
                                            {{ $event->name }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $event->category->name }}
                                        </small>

                                    </div>

                                </div>
                            </td>


                            {{-- Booking Reference --}}
                            <td>
                                <span class="fw-semibold">
                                    {{ $booking->booking_reference }}
                                </span>
                            </td>


                            {{-- Event Date --}}
                            <td>
                                <div>
                                    <div class="fw-semibold">
                                        {{ $event->start_at }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $event->start_at }}

                                        @if($event->end_at)
                                            - {{ $event->end_at }}
                                        @endif
                                    </small>
                                </div>
                            </td>


                            {{-- Amount --}}
                            <td>

                                @if($booking->amount > 0)

                                    <span class="fw-semibold">
                                        ${{$booking->event->price}}
                                    </span>

                                @else

                                    <span class="badge badge-outline-forest rounded-pill px-3 py-1">
                                        Free
                                    </span>

                                @endif

                            </td>


                            {{-- Payment Status --}}
                            <td>

                                @switch($booking->payment_status)

                                    @case('paid')

                                        <span class="badge badge-soft-success rounded-pill px-3 py-1">
                                            Paid
                                        </span>

                                        @break

                                    @case('pending')

                                        <span class="badge badge-soft-warning rounded-pill px-3 py-1">
                                            Pending
                                        </span>

                                        @break

                                    @case('not_required')

                                        <span class="badge badge-soft-success rounded-pill px-3 py-1">
                                            Not Required
                                        </span>

                                        @break

                                    @case('failed')

                                        <span class="badge badge-soft-danger rounded-pill px-3 py-1">
                                            Failed
                                        </span>

                                        @break

                                    @default

                                        <span class="badge badge-soft-warning rounded-pill px-3 py-1">
                                            {{ ucfirst(str_replace('_', ' ', $booking->payment_status)) }}
                                        </span>

                                @endswitch

                            </td>


                            {{-- Booking Status --}}
                            <td>

                                @switch($booking->status)

                                    @case('confirmed')

                                        <span class="badge badge-soft-success rounded-pill px-3 py-1">
                                            Confirmed
                                        </span>

                                        @break

                                    @case('pending')

                                        <span class="badge badge-soft-warning rounded-pill px-3 py-1">
                                            Pending
                                        </span>

                                        @break

                                    @case('cancelled')

                                        <span class="badge badge-soft-danger rounded-pill px-3 py-1">
                                            Cancelled
                                        </span>

                                        @break

                                    @default

                                        <span class="badge badge-soft-warning rounded-pill px-3 py-1">
                                            {{ ucfirst($booking->status) }}
                                        </span>

                                @endswitch

                            </td>


                            {{-- Booked On --}}
                            <td>
                                <div>
                                    {{ $booking->created_at->format('d M Y') }}

                                    <small class="d-block text-muted">
                                        {{ $booking->created_at->format('h:i A') }}
                                    </small>
                                </div>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            @else

                <tbody>

                    <tr>
                        <td colspan="8" class="text-center py-5">

                            <div class="mb-3">
                                <i class="ri-calendar-event-line fs-1 text-muted"></i>
                            </div>

                            <h6 class="mb-1">
                                No bookings yet
                            </h6>

                            <p class="text-muted mb-0">
                                You haven't booked any events yet.
                            </p>

                        </td>
                    </tr>

                </tbody>

            @endif

        </table>

    </div>

</div>
