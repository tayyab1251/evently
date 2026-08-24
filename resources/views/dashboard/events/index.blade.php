@extends('layouts.dashboard')

@section('title', 'Events')

@section('content')

<div class="page-header">
  <div>
    <h1 class="page-title">Events</h1>
  </div>
  <a href="{{ route('admin.events.create') }}" class="btn-quick-action mb-3" >
    <i class="bi bi-plus-lg"></i>
    <span>Create</span>
  </a>
</div>

<div class="row g-4">

  <!-- Responsive Table Wrapper -->
  <div class="table-responsive">
    <table class="table-custom">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Product Info</th>
          <th>Category</th>
          <th>Amount</th>
          <th>Order Date</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Row 1 -->
        <tr>
          <td class="table-order-id">#ORD-9982</td>
          <td>
            <div class="table-user-cell">
              <img src="{{Vite::asset('resources/assets/images/user_1.jpg')}}" alt="Eleanor Pena"
                class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
              <div>
                <div class="table-user-name">Eleanor Pena</div>
                <div class="table-user-sub">eleanor.pena@example.com</div>
              </div>
            </div>
          </td>
          <td class="table-product-name">Oversized Hoodie</td>
          <td>Apparel</td>
          <td class="table-amount">$89.90</td>
          <td>Feb 14, 2026</td>
          <td><span class="badge-table success">Paid</span></td>
          <td>
            <div class="d-flex justify-content-center gap-1">
              <a href="#" class="table-btn-action" title="View details"><i class="bi bi-eye"></i></a>
              <a href="#" class="table-btn-action" title="Edit row"><i class="bi bi-pencil"></i></a>
              <a href="#" class="table-btn-action delete" title="Delete row"><i class="bi bi-trash"></i></a>
            </div>
          </td>
        </tr>
        <!-- Row 2 -->
        <tr>
          <td class="table-order-id">#ORD-9981</td>
          <td>
            <div class="table-user-cell">
              <img src="{{Vite::asset('resources/assets/images/user_2.jpg')}}" alt="Wade Warren"
                class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
              <div>
                <div class="table-user-name">Wade Warren</div>
                <div class="table-user-sub">wade.warren@example.com</div>
              </div>
            </div>
          </td>
          <td class="table-product-name">Gaming Console</td>
          <td>Electronics</td>
          <td class="table-amount">$499.00</td>
          <td>Feb 13, 2026</td>
          <td><span class="badge-table pending">Processing</span></td>
          <td>
            <div class="d-flex justify-content-center gap-1">
              <a href="#" class="table-btn-action" title="View details"><i class="bi bi-eye"></i></a>
              <a href="#" class="table-btn-action" title="Edit row"><i class="bi bi-pencil"></i></a>
              <a href="#" class="table-btn-action delete" title="Delete row"><i class="bi bi-trash"></i></a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection