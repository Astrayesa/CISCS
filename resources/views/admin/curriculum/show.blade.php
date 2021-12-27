@extends("admin.layouts.main")

@section("header")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section("page_name")
    Curriculum {{ $curriculum->name_en }} at {{ $curriculum->department->name_en }} Department
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{ route("admin.curriculum.show", $curriculum->id) }}">Curriculum</a></li>
@endsection

@section("content")
    <!-- /.card -->
    <div class="card mb-4 mt-3">
        <div class="card-header">
            <h3 class="card-title">Curriculum Courses</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.course.create', $curriculum->id) }}"
                           class="btn btn-primary">Add Course</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-hover text-wrap w-100">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Semester</th>
                    <th>Credit</th>
                    <th style="width: 15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->title_en }}</td>
                        <td>{{ $course->semester }}</td>
                        <td>{{ $course->theory_credit + $course->non_theory_credit }} </td>
                        <td>
                            <form action="{{ route('admin.curriculum.course.destroy', [$curriculum->id, $course->id]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <a href="{{ route('admin.curriculum.course.show', [$curriculum->id, $course->id]) }}"
                                           class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.curriculum.course.edit', [$curriculum->id, $course->id]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Curriculum Learning Outcomes</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.lo.create', $curriculum->id) }}"
                           class="btn btn-primary">Add Learning Outcome</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-hover text-wrap w-100">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($learningOutcomes as $lo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lo->title_en }}</td>
                        <td>{{ $lo->desc_en }}</td>
                        <td>
                            <form action="{{ route('admin.curriculum.lo.destroy', [$curriculum->id, $lo->id]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <a href="{{ route('admin.curriculum.lo.show', [$curriculum->id, $lo->id]) }}"
                                           class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.curriculum.lo.edit', [$curriculum->id, $lo->id]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Curriculum Graduate Profiles</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.gp.create', $curriculum->id) }}"
                           class="btn btn-primary">Add Graduate Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-hover text-wrap w-100">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Aspect</th>
                    <th style="width: 15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($graduateProfiles as $gp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gp->title_en }}</td>
                        <td>{{ $gp->aspect }}</td>
                        <td>
                            <form action="{{ route('admin.curriculum.gp.destroy', [$curriculum->id, $gp->id]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="input-group input-group-sm justify-content-end">
                                    <div class="input-group-append">
                                        <a href="{{ route('admin.curriculum.gp.show', [$curriculum->id, $gp->id]) }}"
                                           class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.curriculum.gp.edit', [$curriculum->id, $gp->id]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section("script")
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function setCurriculum(curriculum_id) {
            fetch("{{ route('admin.curriculum.index') }}/" + curriculum_id)
                .then(response => response.json())
                .then(({
                           year,
                           name_en,
                           name_id,
                           department
                       }) => {
                    $('#curriculum_year').text(year);
                    $('#curriculum_name_en').text(name_en);
                    $('#curriculum_name_id').text(name_id);
                    $('#curriculum_department').text(department.name_en);
                })
        }

        $("table").DataTable({
            "responsive": true, "lengthChange": false, "filter": true
        });

        function deleteData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('<form action="{{ route('admin.curriculum.index') }}/' + id +
                        '" method="post"> @csrf @method("delete") </form>').appendTo('body').submit();
                }
            });
        }
    </script>
@endsection