    <!-- ============================= HEADER ============================= -->
    <header class="top-nav on-dark sticky-top">
        <nav class="navbar navbar-expand-lg on-dark py-0" style="height:64px;">
            <div class="container-xl-custom d-flex align-items-center justify-content-between w-100">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                    <span class="icon-plate on-dark" style="width:32px;height:32px;font-size:15px;">{{config('app.name')}}</span>
                </a>
                <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileNav" aria-controls="mobileNav" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-3 text-white"></i>
                </button>
                <div class="d-none d-lg-flex align-items-center gap-1">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="events.html">Events</a>
                    <a class="nav-link" href="events.html">Categories</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#contact">Contact</a>
                </div>
                <div class="d-none d-lg-flex align-items-center gap-3">
                    <a href="events.html" class="text-on-dark-soft fs-5" aria-label="Search"><i
                            class="bi bi-search"></i></a>
                    <a href="{{route('user.login')}}" class="btn btn-brand btn-brand-outline-dark">Log In</a>
                    <a href="{{route('user.register')}}" class="btn btn-brand btn-brand-primary">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile offcanvas nav -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNav">
        <div class="offcanvas-header">
            <span class="navbar-brand">{{ config('app.name') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column">
            <a class="nav-link-c py-2" href="index.html">Home</a>
            <a class="nav-link-c py-2" href="events.html">Events</a>
            <a class="nav-link-c py-2" href="events.html">Categories</a>
            <a class="nav-link-c py-2" href="#about">About</a>
            <a class="nav-link-c py-2" href="#contact">Contact</a>
            <hr>
            <a href="#" class="btn btn-brand btn-brand-secondary-light mb-2">Sign In</a>
            <a href="#" class="btn btn-brand btn-brand-primary">Sign Up</a>
        </div>
    </div>
