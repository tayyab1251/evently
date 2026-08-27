<!-- START: Top Navbar Component -->
<header class="navbar-custom">

  <!-- Left Side -->
  <div class="navbar-left">

    <!-- Desktop sidebar toggle -->
    <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
      id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
      <i class="bi bi-chevron-bar-left"></i>
    </button>

    <!-- Mobile sidebar toggle -->
    <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">
      <i class="bi bi-list"></i>
    </button>

    <!-- Quick Actions Dropdown -->
    {{--
    <div class="dropdown ms-2">
      <button class="btn-quick-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        id="quick-actions-dropdown">
        <i class="bi bi-plus-lg"></i>
        <span>Create</span>
      </button>

      <ul class="dropdown-menu dropdown-menu-quick-action" aria-labelledby="quick-actions-dropdown">
        <li class="dropdown-header">Quick Action Shortcuts</li>

        <li>
          <a class="dropdown-item" href="#">
            <i class="bi bi-file-earmark-plus"></i>
            New Invoice
          </a>
        </li>

        <li>
          <a class="dropdown-item" href="#">
            <i class="bi bi-person-plus"></i>
            New User
          </a>
        </li>

        <li>
          <a class="dropdown-item" href="#">
            <i class="bi bi-box-seam"></i>
            New Product
          </a>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item" href="#">
            <i class="bi bi-gear"></i>
            System Settings
          </a>
        </li>
      </ul>
    </div>
    --}}
  </div>


  <!-- Right Actions -->
  <div class="navbar-actions">

    <!-- Fullscreen Toggle -->
    <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen">
      <i class="bi bi-arrows-fullscreen"></i>
    </button>
    <!-- Profile Dropdown -->
    <div class="dropdown ms-2">
      <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        id="profile-dropdown">
        <img src="{{ Vite::asset('resources/assets/images/avatar.png') }}" alt="Profile Image"
          class="navbar-profile-img">

        <span class="navbar-profile-name d-none d-md-inline">
          {{auth()->user()->name}}
        </span>

        <i class="bi bi-chevron-down navbar-profile-caret"></i>
      </button>


      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
        <li class="dropdown-header">
          Welcome !
        </li>

        <li>
          <a class="dropdown-item" href="#">
            <i class="bi bi-person"></i>
            My Account
          </a>
        </li>

        <li>
          <a class="dropdown-item" href="#"><i class="bi bi-gear"></i>
            Settings
          </a>
        </li>

        <li>
          <a class="dropdown-item" href="#"><i class="bi bi-lock"></i>
            Lock Screen
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
              <i class="bi bi-box-arrow-right"></i>
              Logout
            </button>
          </form>
        </li>
      </ul>

    </div>

  </div>

</header>
<!-- END: Top Navbar Component -->