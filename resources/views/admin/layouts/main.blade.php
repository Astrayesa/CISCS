<!doctype html>
<html lang="en">

<head>
    @include("admin.layouts.header")
    @yield("header")
</head>

<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <div class="wrapper">
            @include("admin.layouts.navbar")
            @include("admin.layouts.sidebar")

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
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    @yield("breadcrumb")
                                </ol>
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
                        @include("admin.layouts.feedback")
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- footer -->
            <footer class="main-footer text-center">
                <strong>Copyright &copy;{{ now()->year }} {{ env('APP_NAME') }}.</strong>
            </footer>
            <!-- /.footer -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/7660a2f8ef.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield("script")
    </div>
</body>

</html>
