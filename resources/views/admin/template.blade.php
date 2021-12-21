<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ url("/unila.png") }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env("APP_NAME") }}</title>

    <!-- Primary Meta Tags -->
    <title>{{ env("APP_NAME" ) }}</title>
    <meta name="title" content="{{ env("APP_NAME" ) }}">
    <meta name="description" content="Website About Curriculum at Computer Science, University of Lampung">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url("/") }}">
    <meta property="og:title" content="{{ env("APP_NAME" ) }}">
    <meta property="og:description" content="Website About Curriculum at Computer Science, University of Lampung">
    <meta property="og:image" content="{{ url("/unila.png") }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url("/") }}">
    <meta property="twitter:title" content="{{ env("APP_NAME" ) }}">
    <meta property="twitter:description" content="Website About Curriculum at Computer Science, University of Lampung">
    <meta property="twitter:image" content="{{ url("/unila.png") }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    @yield("header")
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ url('/unila.png') }}" alt="unila Logo" class="brand-image img-circle elevation-3"
                     style="opacity: 0.8"/>
                <span class="brand-text font-weight-light">{{ env("APP_NAME") }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}"
                               class="nav-link {{ request()->routeIs('department.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-fw fa-building"></i>
                                <p>Department</p>
                            </a>
                        </li>

                        <li>
                            <hr style="border-top: 1px solid grey"/>
                        </li>
                        @if(Route::has("logout"))
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                                    <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        @endif
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
                        <form action="{{ url("/logout") }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="removeAllCookie()">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                @yield("page_name")
                            </h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <footer class="main-footer text-center">
            <strong>Copyright &copy;{{ now()->year }} {{ env("APP_NAME") }}.</strong>
        </footer>
        <!-- /.footer -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7660a2f8ef.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>


    @yield("script")

</div>
</body>
</html>