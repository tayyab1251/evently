@extends('layouts.dashboard')

@section('title', 'Dashboard')

@push('styles')

@vite([
  'resources/assets/libs/datatables/css/dataTables.bootstrap5.min.css',
  'resources/assets/libs/datatables/css/buttons.bootstrap5.min.css',
  'resources/assets/libs/datatables/css/select.bootstrap5.min.css',
])
@endpush

@section('content')

@if (auth()->user()->isAdmin())

<!-- START: Dashboard Header Banner -->
<div class="page-header">
  <div>
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">An easy way to manage sales with care and precision.</p>
  </div>
</div>
<!-- END: Dashboard Header Banner -->

<!-- START: DataTables with Buttons Card Container -->
    
<div class="card p-4 shadow-sm border-0 mb-4">
  <div class="table-responsive">
    <table id="basic-datatable" class="table table-hover align-middle w-100">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Event Name</th>
          <th>Category</th>
          <th>Location</th>
          <th>Type</th>
          <th>Start</th>
          <th>Status</th>
        </tr>
      </thead>
      @if(count($latestEvents) > 0)
      <tbody>
        @foreach($latestEvents as $event)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>
          <img src="{{ $event->primary_image
                                        ? asset('storage/' . $event->primary_image)
                                        : asset('images/default_image.png') }}" alt="{{ $event->name }}"
            class="rounded-2 object-fit-cover flex-shrink-0" width="50" height="50">
            </td>
          <td>{{$event->name}}</td>
          <td>{{$event->category->name}}</td>
          <td>{{$event->location_name}}</td>
          <td><span class="badge badge-outline-forest rounded-pill px-3 py-1">{{$event->type}}</span></td>
          <td>{{$event->start_at}}</td>
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
        </tr>
        @endforeach
      </tbody>
      @endif
    </table>
  </div>
</div>
@else
@include('dashboard.user-bookings')
@endif
<!-- END: DataTables with Buttons Card Container -->
@push('scripts')

@vite([
  'resources/assets/libs/datatables/js/jquery.dataTables.min.js',
  'resources/assets/libs/datatables/js/dataTables.bootstrap5.min.js',
  'resources/assets/libs/jszip/jszip.min.js',
  'resources/assets/libs/pdfmake/pdfmake.min.js',
  'resources/assets/libs/pdfmake/vfs_fonts.js',
  'resources/assets/libs/datatables/js/dataTables.buttons.min.js',
  'resources/assets/libs/datatables/js/buttons.bootstrap5.min.js',
  'resources/assets/libs/datatables/js/buttons.html5.min.js',
  'resources/assets/libs/datatables/js/buttons.print.min.js',
  'resources/assets/libs/datatables/js/buttons.colVis.min.js',
  'resources/assets/libs/datatables/js/dataTables.select.min.js',
  'resources/assets/libs/lucide/lucide.min.js',
  'resources/assets/js/datatables-init.js',
])

@endpush
@endsection