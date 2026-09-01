@extends('layouts.site')

@section('content')

{{-- @dd($featuredEvents) --}}

<!-- ============================= HERO (dark) ============================= -->
<section class="hero-dark">
    <div class="container-xl-custom py-5">
        <div class="row align-items-center gy-5" style="min-height: 520px;">
            <div class="col-lg-6">
                <span class="badge-pill-brand on-dark mb-4">Trusted by 40,000+ attendees</span>
                <h1 class="display-mega mb-4" style="color:#fff;">Discover events worth experiencing</h1>
                <p class="fs-5 text-on-dark-soft mb-4" style="max-width:480px;">Find conferences, workshops,
                    concerts, meetups and experiences happening around you.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-brand btn-brand-primary btn-brand-lg">Explore
                        Events</a>
                    <a href="#" class="btn btn-brand btn-brand-outline-dark btn-brand-lg">Browse
                        Categories</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mockup-stack" style="max-width:420px;margin-left:auto;">
                    <div class="mockup-card-back"></div>
                    <div class="mockup-card-front">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <div class="caption-strong text-primary-c text-uppercase mb-1">Technology</div>
                                <div class="title-md" style="color:#fff;">Laravel Developer Conference</div>
                            </div>
                            <span class="asset-icon-circular" style="background:rgba(255,255,255,.08);"><i
                                    class="bi bi-code-slash text-white"></i></span>
                        </div>
                        <div class="d-flex align-items-center gap-2 text-on-dark-soft mb-2">
                            <i class="bi bi-calendar3"></i><span>15 Sep 2026 · 10:00 AM</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 text-on-dark-soft mb-4">
                            <i class="bi bi-geo-alt"></i><span>Karachi, Pakistan</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center hairline-top pt-3"
                            style="border-color:rgba(255,255,255,.12) !important;">
                            <div>
                                <div class="caption text-on-dark-soft">From</div>
                                <div class="number-display" style="color:#fff;">$25.00</div>
                            </div>
                            <span class="btn btn-brand btn-brand-primary"
                                style="height:38px;padding:8px 18px;font-size:14px;">View Event</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= SEARCH ============================= -->
{{-- <section class="section-soft py-4 hairline-bottom">
    <div class="container-xl-custom">
        <form class="row g-2 g-lg-3 align-items-center" action="events.html" method="get">
            <div class="col-12 col-lg-4">
                <div class="search-pill-wrap">
                    <i class="bi bi-search"></i>
                    <input type="text" class="search-pill" name="q" placeholder="Search events...">
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <select class="form-select-brand" name="category" aria-label="Category">
                    <option selected>Category</option>
                    <option>Technology</option>
                    <option>Business</option>
                    <option>Music</option>
                    <option>Sports</option>
                    <option>Education</option>
                    <option>Workshops</option>
                </select>
            </div>
            <div class="col-6 col-lg-2">
                <input type="date" class="form-control-brand" name="date" aria-label="Date">
            </div>
            <div class="col-6 col-lg-2">
                <select class="form-select-brand" name="location" aria-label="Location">
                    <option selected>Location</option>
                    <option>Karachi</option>
                    <option>Lahore</option>
                    <option>Islamabad</option>
                </select>
            </div>
            <div class="col-6 col-lg-2 d-grid">
                <button type="submit" class="btn btn-brand btn-brand-primary">Search Events</button>
            </div>
        </form>
    </div>
</section> --}}

<!-- ============================= FEATURED EVENTS ============================= -->
<section class="section">
    <div class="container-xl-custom">
        <div class="d-flex justify-content-between align-items-end mb-5 flex-wrap gap-3">
            <div>
                <span class="badge-pill-brand accent mb-3">Featured</span>
                <h2 class="display-sm">Featured events</h2>
            </div>
            <a href="events.html" class="btn-brand-text fw-semibold">View all events <i
                    class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4">

            @if (count($featuredEvents) > 0)

            @foreach ($featuredEvents as $event)
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card-brand h-100">
                    <img src="{{asset('storage/' . ($event->primary_image ?? 'images/default_image.png'))}}"
                        class="event-card-img" alt="Speaker presenting at a developer conference">
                    <div class="event-card-body">
                        <span class="caption-strong text-primary-c text-uppercase">{{$event->category->name}}</span>
                        <h3 class="title-md mt-2 mb-3">{{$event->name}}</h3>
                        <div class="d-flex flex-column gap-1 caption text-muted-c mb-3">
                            <span><i class="bi bi-calendar3 me-1"></i>{{$event->start_at}}</span>
                            <span><i class="bi bi-geo-alt me-1"></i>{{$event->city->name}}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center hairline-top pt-3">
                            <div>
                                <div class="caption text-muted-c">From</div>
                                <div class="number-display text-ink">
                                    <div class="number-display text-ink">
                                        @if($event->price != 0)
                                        $ {{ $event->price }}
                                        @else
                                        <span class="badge badge-soft-success text-white bg-primary">Free</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('details', $event->id)}}" class="btn btn-brand btn-brand-secondary-light"
                                style="height:38px;padding:8px 16px;font-size:14px;">View Event</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach

            @endif


        </div>
    </div>
</section>

<!-- ============================= UPCOMING EVENTS ============================= -->
<section class="section section-soft">
    <div class="container-xl-custom">
        <h2 class="display-sm mb-2">Upcoming events</h2>
        <p class="text-body-c mb-5" style="max-width:520px;">Seats are filling up — these events are happening
            soon.</p>

        @if(count($upcomingEvents) > 0)
        <div class="row g-3">
            @foreach ($upcomingEvents as $UpcomingEvent)

            <div class="col-12">
                <div class="card-brand p-3 p-md-4 d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-4">
                    <img src="{{ 'storage/' . $UpcomingEvent->primary_image ?? $UpcomingEvent->primary_image }}"
                        class="rounded-brand-xl" style="width:100px;height:76px;object-fit:cover;"
                        alt="Digital marketing workshop">
                    <div class="flex-grow-1">
                        <span
                            class="caption-strong text-primary-c text-uppercase">{{$UpcomingEvent->category->name}}</span>
                        <h3 class="title-sm mt-1 mb-0">{{$UpcomingEvent->name}}</h3>
                        <span class="caption text-muted-c"><i
                                class="bi bi-geo-alt me-1"></i>{{$UpcomingEvent->city->name}}</span>
                    </div>
                    <div class="text-md-center">
                        <div class="number-display text-ink">{{$UpcomingEvent->start_at}}</div>
                        <span class="caption text-down">Total seats: {{$UpcomingEvent->max_attendees}}</span>
                    </div>
                    <div class="text-md-end">
                        <div class="number-display text-ink mb-2">
                            @if($UpcomingEvent->price != 0)
                            $ {{ $UpcomingEvent->price }}
                            @else
                            <span class="badge badge-soft-success text-white bg-primary">Free</span>
                            @endif
                        </div>
                        <a href="{{route('details', $UpcomingEvent->id)}}" class="btn btn-brand btn-brand-primary"
                            style="height:38px;padding:8px 16px;font-size:14px;">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach

            @endif

            {{-- <div class="col-12">
                <div class="card-brand p-3 p-md-4 d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-4">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=200&h=150&fit=crop"
                        class="rounded-brand-xl" style="width:100px;height:76px;object-fit:cover;"
                        alt="Business networking meetup">
                    <div class="flex-grow-1">
                        <span class="caption-strong text-primary-c text-uppercase">Business</span>
                        <h3 class="title-sm mt-1 mb-0">Business Networking Meetup</h3>
                        <span class="caption text-muted-c"><i class="bi bi-geo-alt me-1"></i>Karachi</span>
                    </div>
                    <div class="text-md-center">
                        <div class="number-display text-ink">09 Sep</div>
                        <span class="caption text-up">120 seats available</span>
                    </div>
                    <div class="text-md-end">
                        <div class="number-display text-ink mb-2">$10.00</div>
                        <a href="event-details.html" class="btn btn-brand btn-brand-primary"
                            style="height:38px;padding:8px 16px;font-size:14px;">Book Now</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<!-- ============================= CATEGORIES ============================= -->
<section class="section" id="categories">
    <div class="container-xl-custom">
        <h2 class="display-sm mb-5">Browse by category</h2>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-cpu"></i></span>
                    <div class="title-sm">Technology</div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-briefcase"></i></span>
                    <div class="title-sm">Business</div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-music-note-beamed"></i></span>
                    <div class="title-sm">Music</div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-trophy"></i></span>
                    <div class="title-sm">Sports</div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-mortarboard"></i></span>
                    <div class="title-sm">Education</div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-tile">
                    <span class="icon-plate"><i class="bi bi-tools"></i></span>
                    <div class="title-sm">Workshops</div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================= WHY CHOOSE US ============================= -->
<section class="section section-soft" id="about">
    <div class="container-xl-custom">
        <h2 class="display-sm mb-5">Why choose us</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <span class="icon-plate mb-3"><i class="bi bi-compass"></i></span>
                    <h3 class="title-md mb-2">Easy discovery</h3>
                    <p class="text-body-c mb-0">Find events based on category, date, and location.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <span class="icon-plate mb-3"><i class="bi bi-ticket-perforated"></i></span>
                    <h3 class="title-md mb-2">Simple booking</h3>
                    <p class="text-body-c mb-0">Book your ticket through a straightforward checkout process.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <span class="icon-plate mb-3"><i class="bi bi-shield-check"></i></span>
                    <h3 class="title-md mb-2">Trusted information</h3>
                    <p class="text-body-c mb-0">Get clear event information before making a booking.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <span class="icon-plate mb-3"><i class="bi bi-check-circle"></i></span>
                    <h3 class="title-md mb-2">Instant confirmation</h3>
                    <p class="text-body-c mb-0">Receive clear confirmation right after successful checkout.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= HOW IT WORKS ============================= -->
<section class="section">
    <div class="container-xl-custom">
        <h2 class="display-sm mb-5">How it works</h2>
        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <div class="step-num mb-2">01</div>
                <h3 class="title-md mb-2">Discover</h3>
                <p class="text-body-c mb-0">Find an event you want to attend.</p>
            </div>
            <div class="col-6 col-lg-3">
                <div class="step-num mb-2">02</div>
                <h3 class="title-md mb-2">Choose</h3>
                <p class="text-body-c mb-0">Open the event and review the details.</p>
            </div>
            <div class="col-6 col-lg-3">
                <div class="step-num mb-2">03</div>
                <h3 class="title-md mb-2">Book</h3>
                <p class="text-body-c mb-0">Complete the checkout process.</p>
            </div>
            <div class="col-6 col-lg-3">
                <div class="step-num mb-2">04</div>
                <h3 class="title-md mb-2">Enjoy</h3>
                <p class="text-body-c mb-0">Receive confirmation and attend the event.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================= TRENDING ============================= -->
<section class="section section-soft">
    <div class="container-xl-custom">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-graph-up-arrow text-primary-c"></i>
            <span class="caption-strong text-primary-c text-uppercase">Trending now</span>
        </div>
        <h2 class="display-sm mb-5">Popular with attendees</h2>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <article class="card-brand h-100">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&h=450&fit=crop"
                        class="event-card-img" alt="Conference audience">
                    <div class="event-card-body">
                        <span class="caption-strong text-primary-c text-uppercase">Most booked</span>
                        <h3 class="title-md mt-2 mb-3">Laravel Developer Conference</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="number-display text-ink">$25.00</span>
                            <a href="#" class="btn-brand-text fw-semibold">View <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-4">
                <article class="card-brand h-100">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&h=450&fit=crop"
                        class="event-card-img" alt="Startup summit stage">
                    <div class="event-card-body">
                        <span class="caption-strong text-primary-c text-uppercase">Recently added</span>
                        <h3 class="title-md mt-2 mb-3">Tech Startup Summit</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="number-display text-ink">$40.00</span>
                            <a href="#" class="btn-brand-text fw-semibold">View <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-4">
                <article class="card-brand h-100">
                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=600&h=450&fit=crop"
                        class="event-card-img" alt="Music festival crowd">
                    <div class="event-card-body">
                        <span class="caption-strong text-primary-c text-uppercase">Upcoming soon</span>
                        <h3 class="title-md mt-2 mb-3">Karachi Music Festival</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="number-display text-ink">$60.00</span>
                            <a href="#" class="btn-brand-text fw-semibold">View <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================= PROMO CTA ============================= -->
<section class="cta-band-dark">
    <div class="container-xl-custom">
        <h2 class="display-md mb-4" style="color:#fff;">Ready for your next experience?</h2>
        <a href="#" class="btn btn-brand btn-brand-primary btn-brand-lg">Explore Upcoming Events</a>
    </div>
</section>
@endsection