<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard')
    </title>

    {{-- Dashboard CSS --}}
    @include('dashboard.includes.dashboard-css')

</head>

<body>

    {{-- Sidebar --}}
    @include('dashboard.partials.sidebar')


    {{-- Main Content Area --}}
    <div class="main-wrapper">

        {{-- Navbar --}}
        @include('dashboard.partials.navbar')


        {{-- Page Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('dashboard.partials.footer')

    </div>


    {{-- Dashboard JavaScript --}}
    @include('dashboard.includes.dashboard-js')

</body>

</html>