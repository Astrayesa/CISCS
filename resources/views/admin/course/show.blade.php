@extends("admin.layouts.main")

@section("page_name")
    {{ $course->title_en }} Course
@endsection

@section("content")
    <!-- /.card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Course Learning Outcomes</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.lo.create', $curriculum->id) }}"
                           class="btn btn-primary">Add Course Learning Outcome</a>
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
                @foreach($clos as $lo)
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
@endsection