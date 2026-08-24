@extends('layouts.dashboard')

@section('title', 'Page title')

@section('content')
{{-- Page header banner --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Events</h1>
    </div>
    <button class="btn-quick-action mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        id="quick-actions-dropdown">
        <i class="bi bi-plus-lg"></i>
        <span>Create</span>
    </button>
</div>

<!-- START: Blank Page Content Area -->
<div class="card p-4 border-light shadow-sm text-center">
    <div>
        <div class="mb-4 text-lime empty-state-icon">
            <i class="bi bi-file-earmark-fill"></i>
        </div>
        <h3 class="mb-2">Your Content Starts Here</h3>
        <p class="text-muted-green mb-4">Use this blank page starter template to build custom dashboard views,
            tables,
            forms, or any modules required for your Spark Admin system.</p>
    </div>
</div>
<!-- END: Blank Page Content Area -->

@endsection