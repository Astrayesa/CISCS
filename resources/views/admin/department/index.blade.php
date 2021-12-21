@extends("admin.template")

@section("header")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section("page_name")
    Department
@endsection

@section("content")
    <a href="{{ route('department.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus" aria-hidden="true"></i> Add Department
    </a>
    <table id="data_table" class="table width-100">
        <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Accreditation</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->code }}</td>
                <td>{{ $d->name_en }}</td>
                <td>{{ $d->accreditation_ranking }}</td>
                <td>
                    <button class="btn btn-sm btn-success mr-1" data-toggle="modal"
                            data-target="#modal_detail" onclick="setDepartment({{ $d->id }})">
                        <i class="fas fa-eye"></i> Show
                    </button>
                    <a href="{{ route('department.edit', $d->id) }}" class="btn btn-sm btn-warning mr-1">
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
                        Department Detail
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="font-weight-bold">
                                Code
                            </td>
                            <td id="department_code">Code</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Name (en)
                            </td>
                            <td id="department_name_en">Department Name (en)</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Name (id)
                            </td>
                            <td id="department_name_id">Department Name (id)</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Establishment ID
                            </td>
                            <td id="department_establishment_id">Department Establishment ID</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Accreditation ID
                            </td>
                            <td id="department_accreditation_id">Department Accreditation ID</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Accreditation Ranking
                            </td>
                            <td id="department_accreditation_ranking">Department Accreditation Ranking</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">
                                Department Accreditation File
                            </td>
                            <td><a id="department_accreditation_file" href="#" target="_blank">Click Here</a></td>

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
        function setDepartment(department_id) {
            fetch("{{ route('department.index') }}/" + department_id)
                .then(response => response.json())
                .then(({
                           accreditation_cert_num,
                           accreditation_file,
                           accreditation_ranking,
                           code,
                           establishment_cert_num,
                           name_en,
                           name_id
                       }) => {
                    $('#department_code').text(code);
                    $('#department_name_en').text(name_en);
                    $('#department_name_id').text(name_id);
                    $('#department_establishment_id').text(establishment_cert_num);
                    $('#department_accreditation_id').text(accreditation_cert_num);
                    $('#department_accreditation_ranking').text(accreditation_ranking);
                    $('#department_accreditation_file').attr("href", "{{ url("/") }}" + accreditation_file);
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
                    $('<form action="{{ route('department.index') }}/' + id +
                        '" method="post"> @csrf @method("delete") </form>').appendTo('body').submit();
                }
            });
        }
    </script>
@endsection