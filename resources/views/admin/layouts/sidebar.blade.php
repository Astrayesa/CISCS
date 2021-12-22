<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ url('/unila.png') }}" alt="unila Logo" class="brand-image img-circle elevation-3"
            style="opacity: 0.8" />
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.department.index') }}"
                        class="nav-link {{ request()->routeIs('admin.department.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-fw fa-building"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.curriculum.index') }}"
                       class="nav-link {{ request()->routeIs('admin.curriculum.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-fw fa-book"></i>
                        <p>Curriculum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}"
                        class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>Users Account</p>
                    </a>
                </li>

                <li>
                    <hr style="border-top: 1px solid grey" />
                </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ready to Leave?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current
                session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <form action="{{ route("admin.logout") }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
