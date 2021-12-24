@extends("admin.layouts.main")

@section('page_name')
    {{ $course->title_en }} Course
@endsection

@section('content')
    <!-- /.card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Course Learning Outcomes</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.course.clo.create', [$curriculum->id, $course->id]) }}"
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
                        <th style="width: 20%">Percentage to Graduate</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clos as $lo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lo->title_en }}</td>
                            <td>{{ $lo->desc_en }}</td>
                            <td>{{ $lo->percent_to_graduate_LO }}%</td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <a href="{{ route('admin.curriculum.course.clo.show', [$curriculum->id, $course->id, $lo->id]) }}"
                                            class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.curriculum.course.clo.edit', [$curriculum->id, $course->id, $lo->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <button type="button" onclick="deleteData({{ $lo->id }})" class="btn btn-danger">Delete</button>
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

@section('script')
    <script>
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
                    $(`<form action="{{ route('admin.curriculum.course.clo.index', [$curriculum->id, $course->id]) }}/${id}" method="post"> @csrf @method("delete") </form>`)
                        .appendTo('body').submit();
                }
            });
        }
    </script>
@endsection
