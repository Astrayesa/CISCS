@extends("user.layouts.main")

@section('content')
    <section class="jurusan py-5">
        <div class="container">
            <h1 class="text-center mb-5">List Curriculums</h1>
            @foreach ($departments as $department)
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <h5>{{ $department->name_en }}</h5>
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Year</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department->Curriculums as $curriculum)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $curriculum->year }}</td>
                                        <td>{{ $curriculum->name_en }}</td>
                                        <td><button class="badge bg-success"><i class="fas fa-eye"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
