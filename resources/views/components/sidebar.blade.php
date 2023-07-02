<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden"></span>
    </div>
</div>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Control panal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- <a class="d-inline">{{ auth()->user()->name }}</a> --}}
                <a class="d-inline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"title="Log Out">
                    <i class="fas fa-sign-out-alt pl-2"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link @if (strpos(url()->full(), 'dashboard')) active @endif">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            General Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link @if (strpos(url()->full(), 'admin')) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Admins</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link @if (strpos(url()->full(), 'Project')) active @endif">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('client.index') }}" class="nav-link @if (strpos(url()->full(), 'client')) active @endif">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service.index') }}" class="nav-link @if (strpos(url()->full(), 'service')) active @endif">
                        <i class="nav-icon fab fa-servicestack"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('team.index') }}" class="nav-link @if (strpos(url()->full(), 'team')) active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>team</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ask.index') }}" class="nav-link @if (strpos(url()->full(), 'ask')) active @endif">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Ask</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
