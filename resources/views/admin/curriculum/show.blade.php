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
            <table class="table table-hover text-wrap w-100 data-table">
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
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <a href="{{ route('admin.curriculum.course.show', [$curriculum->id, $course->id]) }}"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ route('admin.curriculum.course.edit', [$curriculum->id, $course->id]) }}"
                                       class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteData({{ $course->id }}, 'course')">
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('admin.curriculum.course.destroy', [$curriculum->id, $course->id]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

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
            <table class="table table-hover text-wrap w-100 data-table">
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
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#LO_modal" onclick="setLO({{ $lo->id }})">
                                        Show
                                    </button>
                                    {{--<a href="{{ route('admin.curriculum.lo.show', [$curriculum->id, $lo->id]) }}"
                                       class="btn btn-success">Show</a>--}}
                                    <a href="{{ route('admin.curriculum.lo.edit', [$curriculum->id, $lo->id]) }}"
                                       class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger"
                                            onclick="deleteData({{ $lo->id }}, 'learning_outcome')">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="LO_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Curriculum Detail
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr>
                                    <td class="font-weight-bold">
                                        Title (en)
                                    </td>
                                    <td id="title_en">LO title (en)</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        Title (id)
                                    </td>
                                    <td id="title_id">LO title (id)</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        Description (en)
                                    </td>
                                    <td id="desc_en">LO Description (en)</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        Description (id)
                                    </td>
                                    <td id="desc_id">LO Description (id)</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
            <table class="table table-hover text-wrap w-100 data-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Aspect</th>
                    <th>Courses</th>
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
                            @foreach ($gp->courses as $e_clo)
                                <span class="badge badge-secondary">{{ $e_clo->title_en }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <a href="{{ route('admin.curriculum.gp.show', [$curriculum->id, $gp->id]) }}"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ route('admin.curriculum.gp.edit', [$curriculum->id, $gp->id]) }}"
                                       class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger"
                                            onclick="deleteData({{ $gp->id }}, 'graduate_profile')">
                                        Delete
                                    </button>
                                </div>
                            </div>
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
        function setLO(curriculum_id) {
            fetch("{{ route('admin.curriculum.lo.index', $curriculum->id) }}/" + curriculum_id)
                .then(response => response.json())
                .then(({desc_en, desc_id, title_en, title_id}) => {
                    $('#title_en').text(title_en);
                    $('#title_id').text(title_id);
                    $('#desc_en').text(desc_en);
                    $('#desc_id').text(desc_id);
                })
        }

        $(".data-table").DataTable({
            "responsive": true, "lengthChange": false, "filter": true
        });

        function deleteData(id, type) {
            var link;
            if (type === 'course') {
                link = '{{ route("admin.curriculum.course.index", $curriculum->id) }}';
            } else if (type === 'learning_outcome') {
                link = '{{ route("admin.curriculum.lo.index", $curriculum->id) }}';
            } else if (type === 'graduate_profile') {
                link = '{{ route("admin.curriculum.gp.index", $curriculum->id) }}';
            }
            link += '/' + id;
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
                    $('<form action="' + link + '"' +
                        '" method="post"> @csrf @method("delete") </form>').appendTo('body').submit();
                }
            });
        }
    </script>
@endsection