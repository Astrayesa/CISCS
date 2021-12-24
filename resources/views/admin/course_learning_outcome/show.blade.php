@extends("admin.layouts.main")

@section('page_name')
    {{ $clo->title_en }} Course Learning Outcome
@endsection

@section('content')
    <!-- /.card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Topics</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('admin.curriculum.course.clo.create', [$curriculum->id, $course->id]) }}"
                            class="btn btn-primary">Add Topic</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            {{-- <table class="table table-hover text-wrap w-100">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table> --}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
