<!-- ==========================================
START: Sidebar Component (V1 routes + V2 accordion structure)
========================================== -->
<div class="sidebar-wrapper" id="sidebar">

    <!-- Brand Logo / Identity -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <i class="bi bi-asterisk"></i>
        <span>{{ config('app.name') }}</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">

        {{-- =====================================================
        Group: MENU (your real, working routes)
        ====================================================== --}}
        <div class="sidebar-menu-section">
            {{-- <div class="sidebar-menu-title"></div> --}}
            <ul class="sidebar-menu-list">

                {{-- Dashboard --}}
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        id="menu-dashboard">
                        <i class="bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="sidebar-menu-section">
            <div class="sidebar-menu-title">Events</div>
            <ul class="sidebar-menu-list">

                {{-- Events Accordion --}}
                <li class="sidebar-menu-item">
                    <a href="#menu-events"
                        class="sidebar-menu-link {{ request()->routeIs('admin.events.*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs('admin.events.*') ? 'true' : 'false' }}"
                        aria-controls="menu-events" id="menu-events-header">
                        <i class="bi-table"></i>
                        <span>Events</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.events.*') ? 'show' : '' }}" id="menu-events">
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('admin.events.index') }}"
                                    class="sidebar-submenu-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                                    All Events
                                </a>
                            </li>
                            <li><a href="{{ route('admin.events.create') }}"
                                    class="sidebar-submenu-link {{ request()->routeIs('admin.events.create') ? 'active' : '' }}">Add
                                    Event</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

        {{-- <div class="sidebar-menu-section">
            <div class="sidebar-menu-title">Pages</div>
            <ul class="sidebar-menu-list">

                <li class="sidebar-menu-item">
                    <a href="#menu-apps" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-apps" id="menu-apps-header">
                        <i class="bi-grid"></i>
                        <span>Apps</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-apps">
                        <ul class="sidebar-submenu">
                            <li><a href="apps-calendar.html" class="sidebar-submenu-link">Calendar</a></li>
                            <li><a href="apps-chat.html" class="sidebar-submenu-link">Chat</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-contacts" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-contacts" id="menu-contacts-header">
                        <i class="bi-people"></i>
                        <span>Contacts</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-contacts">
                        <ul class="sidebar-submenu">
                            <li><a href="page-user-grid.html" class="sidebar-submenu-link">User Grid</a></li>
                            <li><a href="page-user-list.html" class="sidebar-submenu-link">User List</a></li>
                            <li><a href="page-profile.html" class="sidebar-submenu-link">Profile</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-email" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-email" id="menu-email-header">
                        <i class="bi-envelope"></i>
                        <span>Email</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-email">
                        <ul class="sidebar-submenu">
                            <li><a href="page-email-inbox.html" class="sidebar-submenu-link">Inbox</a></li>
                            <li><a href="page-email-read.html" class="sidebar-submenu-link">Read Email</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-invoices" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-invoices" id="menu-invoices-header">
                        <i class="bi-receipt"></i>
                        <span>Invoices</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-invoices">
                        <ul class="sidebar-submenu">
                            <li><a href="page-invoice-list.html" class="sidebar-submenu-link">Invoice List</a></li>
                            <li><a href="page-invoice-detail.html" class="sidebar-submenu-link">Invoice Detail</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-auth" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-auth" id="menu-auth-header">
                        <i class="bi-shield-check"></i>
                        <span>Authentication</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-auth">
                        <ul class="sidebar-submenu">
                            <li><a href="auth-login.html" class="sidebar-submenu-link">Login</a></li>
                            <li><a href="auth-register.html" class="sidebar-submenu-link">Register</a></li>
                            <li><a href="auth-recover-password.html" class="sidebar-submenu-link">Recover Password</a>
                            </li>
                            <li><a href="auth-lock-screen.html" class="sidebar-submenu-link">Lock Screen</a></li>
                            <li><a href="auth-logout.html" class="sidebar-submenu-link">Logout</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-error" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-error" id="menu-error-header">
                        <i class="bi-exclamation-triangle"></i>
                        <span>Error</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-error">
                        <ul class="sidebar-submenu">
                            <li><a href="error-404.html" class="sidebar-submenu-link">Error 404</a></li>
                            <li><a href="error-500.html" class="sidebar-submenu-link">Error 500</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

        <div class="sidebar-menu-section">
            <div class="sidebar-menu-title">Components</div>
            <ul class="sidebar-menu-list">

                <li class="sidebar-menu-item">
                    <a href="#menu-ui" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-ui" id="menu-ui-header">
                        <i class="bi-layers"></i>
                        <span>UI Elements</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-ui">
                        <ul class="sidebar-submenu">
                            <li><a href="ui-alerts.html" class="sidebar-submenu-link">Alerts</a></li>
                            <li><a href="ui-buttons.html" class="sidebar-submenu-link">Buttons</a></li>
                            <li><a href="ui-cards.html" class="sidebar-submenu-link">Cards</a></li>
                            <li><a href="ui-generals.html" class="sidebar-submenu-link">General UI</a></li>
                            <li><a href="ui-modals.html" class="sidebar-submenu-link">Modals</a></li>
                            <li><a href="ui-progress.html" class="sidebar-submenu-link">Progress</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-forms" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-forms" id="menu-forms-header">
                        <i class="bi-pencil-square"></i>
                        <span>Forms &amp; Input</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-forms">
                        <ul class="sidebar-submenu">
                            <li><a href="form-general.html" class="sidebar-submenu-link">General Elements</a></li>
                            <li><a href="form-advanced.html" class="sidebar-submenu-link">Advanced Elements</a></li>
                            <li><a href="form-validation.html" class="sidebar-submenu-link">Validation</a></li>
                            <li><a href="form-file-uploads.html" class="sidebar-submenu-link">File Uploads</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-icons" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-icons" id="menu-icons-header">
                        <i class="bi-emoji-smile"></i>
                        <span>Icons</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-icons">
                        <ul class="sidebar-submenu">
                            <li><a href="icon-bootstrap.html" class="sidebar-submenu-link">Bootstrap</a></li>
                            <li><a href="icon-lucide.html" class="sidebar-submenu-link">Lucide</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-charts" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-charts" id="menu-charts-header">
                        <i class="bi-bar-chart"></i>
                        <span>Charts</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-charts">
                        <ul class="sidebar-submenu">
                            <li><a href="chart-apexcharts.html" class="sidebar-submenu-link">Apexcharts</a></li>
                            <li><a href="chart-chartjs.html" class="sidebar-submenu-link">Chartjs</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#menu-maps" class="sidebar-menu-link collapsed" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="menu-maps" id="menu-maps-header">
                        <i class="bi-geo-alt"></i>
                        <span>Maps</span>
                        <i class="bi bi-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="collapse" id="menu-maps">
                        <ul class="sidebar-submenu">
                            <li><a href="maps-google.html" class="sidebar-submenu-link">Google</a></li>
                            <li><a href="maps-vector.html" class="sidebar-submenu-link">Vector</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div> --}}

    </div>

    <!-- Sidebar Profile Card (Dynamic Footer) -->
    <div class="sidebar-profile">
        <img src="{{ Vite::asset('resources/assets/images/avatar.png') }}" alt="Administrator"
            class="sidebar-profile-img"
            onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
        <div class="sidebar-profile-info">
            <div class="sidebar-profile-name">Administrator</div>
            <div class="sidebar-profile-email">admin@email.com</div>
        </div>
    </div>

</div>
<!-- ==========================================
END: Sidebar Component
========================================== -->