<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking — Discover Events Worth Experiencing</title>
    <meta name="description"
        content="Find conferences, workshops, concerts, meetups and experiences happening around you.">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    @Vite([
    'resources/assets/libs/bootstrap/css/bootstrap.min.css',
    'resources/assets/libs/bootstrap-icons/bootstrap-icons.css',
    'resources/assets/css/site.css',
    // 'resources/assets/libs/jquery/jquery.min.js',
    ])

    @yield('styles')

</head>

<body class="has-sticky-cta">
    <a href="#main" class="skip-link">Skip to content</a>

    @include('site.includes.header')


    <main id="main">

        @yield('content')

    </main>
    @include('site.includes.footer')
    @vite('resources/assets/libs/jquery/jquery.min.js')

    @stack('scripts')
</body>

</html>