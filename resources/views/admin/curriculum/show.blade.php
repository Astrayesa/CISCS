@extends("admin.layouts.main")

@section("page_name")
    Curriculum {{ $curriculum->name_en }} at {{ $curriculum->department->name_en }} Department
@endsection

@section("content")
    <!-- /.card -->
    <div class="card">
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
        <div class="card-body table-responsive p-0">
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
    <div class="card">
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
        <div class="card-body table-responsive p-0">
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
    <div class="card">
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
        <div class="card-body table-responsive p-0">
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