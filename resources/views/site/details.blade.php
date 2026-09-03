@extends('layouts.site')

@section('content')
<!-- ============================= EVENT HEADER ============================= -->
<section class="pt-3 pb-5">
    <div class="container-xl-custom">
        <div class="row g-5">
            <div class="col-lg-7">
                <img src="{{ $event->primary_image
                                ? asset('storage/' . $event->primary_image)
                                : asset('images/default_image.png') }}" class="rounded-brand-xl w-100 mb-4"
                    style="object-fit:cover;">

                <span class="badge-pill-brand accent mb-3">{{$event->category->name}}</span>
                <h1 class="display-md mb-3">{{$event->name}}</h1>
                <span><i class="bi bi-geo-alt me-2 text-primary-c"></i>{{$event->city->name}}</span>


                <!-- Event description -->
                <div class="hairline-top pt-4">
                    <h2 class="title-lg mb-3">About this event</h2>
                    <p class="text-body-c">{{$event->description}}</p>
                </div>

                <!-- Event information block -->
                <div class="hairline-top pt-4 mt-4">
                    <h2 class="title-lg mb-3">Event information</h2>
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <div class="caption text-muted-c mb-1">Starting Date & Time</div>
                            <div class="text-ink fw-medium">{{$event->start_at}}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="caption text-muted-c mb-1">End Date & Time</div>
                            <div class="text-ink fw-medium">{{$event->end_at}}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="caption text-muted-c mb-1">Venue</div>
                            <div class="text-ink fw-medium">{{$event->location_name}}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="caption text-muted-c mb-1">Address</div>
                            <div class="text-ink fw-medium">{{$event->address}}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="caption text-muted-c mb-1">Category</div>
                            <div class="text-ink fw-medium">{{$event->category->name}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===================== BOOKING CARD ===================== -->
            <div class="col-lg-5">
                <div class="card-brand p-4 p-lg-4" style="position:sticky; top:88px;">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <div class="caption text-muted-c mb-1">From</div>
                            <div class="number-display fs-3 text-ink">${{$event->price}}</div>
                        </div>
                        <span class="status-badge status-published"><span class="dot"></span>{{$event->status}}</span>
                    </div>

                    <div class="d-flex align-items-center gap-2 text-up mb-4">
                        <i class="bi bi-people"></i>
                        <span class="fw-semibold">{{$event->remaining_attendees}} seats available to book</span>
                    </div>

                     <div class="d-flex align-items-center gap-2 text-up mb-4 ">
                        <i class="bi bi-people text-danger"></i>
                        <span class="fw-semibold text-danger">{{$event->max_attendees}} Max Attendees </span>
                    </div>

                    @if ($event->remaining_attendees > 0)
                    <form action="{{route('checkout')}}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                    <button type="submit" class="btn btn-brand btn-brand-primary btn-brand-lg w-100 mb-3"data-primary-cta>
                        <i class="bi bi-ticket-perforated me-2"></i>Book Now
                    </button>
                    </form>

                    @else

                        <p class="text-center status-badge status-published text-white bg-danger d-block">All the seats have been booked</p>
                        
                    @endif
                    <p class="caption text-muted-c text-center mb-0"><i class="bi bi-shield-check me-1"></i>Secure
                        checkout · Instant confirmation</p>
                </div>

                <div class="product-ui-card-dark mt-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="icon-plate on-dark"><i class="bi bi-question-circle"></i></span>
                        <div>
                            <div class="title-sm" style="color:#fff;">Need help?</div>
                            <div class="caption text-on-dark-soft">We usually reply within an hour.</div>
                        </div>
                    </div>
                    <a href="index.html#contact" class="btn btn-brand btn-brand-secondary-dark w-100">Contact
                        Support</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= RELATED EVENTS ============================= -->
@if (count($randomEvents)>0)

<section class="section section-soft">
    <div class="container-xl-custom">
        <h2 class="display-sm mb-5">You may also like</h2>
        <div class="row g-4">
            @foreach ($randomEvents as $randomEvent)

            <div class="col-12 col-md-6 col-lg-4">
                <article class="card-brand h-100">
                    <img src="{{$randomEvent->primary_image 
                                ? asset('storage/'. $randomEvent->primary_image)
                                : asset('images/default_image.png')
                    }}" class="event-card-img" alt="Attendees networking at a startup summit">
                    <div class="event-card-body">
                        <span
                            class="caption-strong text-primary-c text-uppercase">{{$randomEvent->category->name}}</span>
                        <h3 class="title-md mt-2 mb-3">{{$randomEvent->name}}</h3>
                        <div class="d-flex justify-content-between align-items-center hairline-top pt-3">
                            <span
                                class="number-display text-ink {{($randomEvent->price) > 0 ? '' : 'text-white bg-primary rounded p-1'}}">$
                                {{($randomEvent->price) > 0 ? $randomEvent->price : 'Free'}} </span>
                            <a href="{{route('details', $randomEvent->id)}}"
                                class="btn btn-brand btn-brand-secondary-light"
                                style="height:38px;padding:8px 16px;font-size:14px;">View Event</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

</main>

<!-- ============================= STICKY MOBILE CTA ============================= -->
<div class="sticky-cta">
    <div class="d-flex justify-content-between align-items-center gap-3">
        <div>
            <div class="caption text-muted-c">From</div>
            <div class="number-display text-ink">$25.00</div>
        </div>
        <a href="checkout.html" class="btn btn-brand btn-brand-primary flex-grow-1">Book Now</a>
    </div>
</div>

@endsection

