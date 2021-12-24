@extends("admin.layouts.main")

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section('page_name')
    Users Account
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus" aria-hidden="true"></i> Add User
            </a>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->username }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                        class="btn btn-sm btn-warning mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" onclick="deleteData({{ $user->id }})"
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
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
                    $(`<form action="{{ route('admin.user.index') }}/${id}" method="post"> @csrf @method("delete") </form>`).appendTo('body').submit();
                }
            });
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
