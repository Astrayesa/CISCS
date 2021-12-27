@extends("admin.layouts.main")

@section("header")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section("page_name")
    Curriculum
@endsection

@section("content")
    <a href="{{ route('admin.curriculum.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus" aria-hidden="true"></i> Add Curriculum
    </a>
    <table id="data_table" class="table text-wrap width-100 ">
        <thead>
        <tr>
            <th>No</th>
            <th>Year</th>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->year }}</td>
                <td>{{ $d->name_en }}</td>
                <td>{{ $d->department->name_en }}</td>
                <td>
                    {{--<button class="btn btn-sm btn-success mr-1" data-toggle="modal"
                            data-target="#modal_detail" onclick="setCurriculum({{ $d->id }})">
                        <i class="fas fa-eye"></i> Show
                    </button>--}}
                    <a href="{{ route('admin.curriculum.show', $d->id) }}" class="btn btn-sm btn-success mr-1">
                        <i class="fas fa-eye"></i> Show
                    </a>
                    <a href="{{ route('admin.curriculum.edit', $d->id) }}" class="btn btn-sm btn-warning mr-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-danger btn-hapus"
                            onclick="deleteData({{ $d->id }})" id="hapusdata">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="modal_detail" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                Year
                            </td>
                            <td id="curriculum_year">Year</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Curriculum Name (en)
                            </td>
                            <td id="curriculum_name_en">Curriculum Name (en)</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Curriculum Name (id)
                            </td>
                            <td id="curriculum_name_id">Curriculum Name (id)</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department
                            </td>
                            <td id="curriculum_department">Department</td>
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

        $("#data_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "filter": true,
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