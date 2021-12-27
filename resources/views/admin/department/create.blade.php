@extends("admin.layouts.main")

@section("page_name")
    Department
@endsection

@section("content")
    <div class="col-md-2 mb-3">
        <a href="{{ route("admin.department.index") }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Return
        </a>
    </div>
    <div class="card card-primary">
        @if($errors->any())
            {!!  implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
        @endif
        <div class="card-header">
            <h3 class="card-title">{{ $department ? "Edit" : "Add" }} Department Data</h3>
        </div>
        {{--            TODO: isi old data kalo salah input--}}
        <form action="{{ $department ? route("admin.department.update", $department->id) : route("admin.department.store") }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if($department)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="department_code">Department Code</label>
                            <input type="text" class="form-control" id="department_code"
                                   placeholder="Enter Department Code" name="code" required
                                   value="{{ $department ? $department->code : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="department_name_en">Department Name (en)</label>
                            <input type="text" class="form-control" id="department_name_en"
                                   placeholder="Enter Department Name (en)" name="name_en" required
                                   value="{{ $department ? $department->name_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="department_name_id">Department Name (id)</label>
                            <input type="text" class="form-control" id="department_name_id"
                                   placeholder="Enter Department Name (id)" name="name_id" required
                                   value="{{ $department ? $department->name_id : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="department_established">Department Establishment Number</label>
                            <input type="text" class="form-control" id="department_established"
                                   placeholder="Enter Department Establishment Number" name="establishment_cert_num"
                                   required
                                   value="{{ $department ? $department->establishment_cert_num : "" }}"/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="department_accreditation">Department Accreditation Number</label>
                            <input type="text" class="form-control" id="department_accreditation"
                                   placeholder="Enter Department Accreditation Number" name="accreditation_cert_num"
                                   required
                                   value="{{ $department ? $department->accreditation_cert_num : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="department_ranking">Department Ranking</label>
                            <select class="custom-select" id="department_ranking" name="accreditation_ranking">
                                @if($department != null)
                                    <option value="-" @if($department->accreditation_ranking == "-") selected @endif>
                                        Not Accredited
                                    </option>
                                    <option value="A" @if($department->accreditation_ranking == "A") selected @endif>
                                        A
                                    </option>
                                    <option value="B" @if($department->accreditation_ranking == "B") selected @endif>
                                        B
                                    </option>
                                    <option value="C" @if($department->accreditation_ranking == "C") selected @endif>
                                        C
                                    </option>
                                    <option value="D" @if($department->accreditation_ranking == "D") selected @endif>
                                        D
                                    </option>
                                @else
                                    <option value="-">Not Available</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                @endif
                            </select>
                        </div>
                        {{--                        Accreditation File--}}
                        <div class="form-group">
                            <label for="accreditation-file-upload">Accreditation File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept="application/pdf" class="custom-file-input"
                                           id="accreditation-file-upload"
                                           name="accreditation_file" @if($department == null) required @endif/>
                                    <label class="custom-file-label" for="accreditation-file-upload">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        })
    </script>
@endsection