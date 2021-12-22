@extends("admin.layouts.main")

@section("page_name")
    Curriculum
@endsection

@section("header")
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section("content")
    <div class="col-md-2 mb-3">
        <a href="{{ route("admin.curriculum.index") }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Return
        </a>
    </div>
    <div class="card card-primary">
        @if($errors->any())
            {!!  implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
        @endif
        <div class="card-header">
            <h3 class="card-title">{{ $curriculum ? "Edit" : "Add" }} Curriculum Data</h3>
        </div>
        {{--            TODO: isi old data kalo salah input--}}
        <form action="{{ $curriculum ? route("admin.curriculum.update", $curriculum->id) : route("admin.curriculum.store") }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if($curriculum)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="curriculum_year">Curriculum Year</label>
                            <input type="text" class="form-control" id="curriculum_year"
                                   placeholder="Enter Curriculum Year" name="year" required
                                   value="{{ $curriculum ? $curriculum->year : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="curriculum_name_en">Curriculum Name (en)</label>
                            <input type="text" class="form-control" id="curriculum_name_en"
                                   placeholder="Enter Curriculum Name (en)" name="name_en" required
                                   value="{{ $curriculum ? $curriculum->name_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="curriculum_name_id">Curriculum Name (id)</label>
                            <input type="text" class="form-control" id="curriculum_name_id"
                                   placeholder="Enter Curriculum Name (id)" name="name_id" required
                                   value="{{ $curriculum ? $curriculum->name_id : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="curriculum_department_id">Department</label>
                            <select class="custom-select" id="curriculum_department_id" name="department_id">
                                @foreach($department as $dep)
                                    <option value="{{ $dep->id }}"
                                            @if($curriculum != null  &&  $curriculum->department_id == $dep->id) selected @endif>
                                        {{ $dep->name_en }}
                                    </option>
                                @endforeach
                            </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
            $("#curriculum_year").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            })
        })
    </script>
@endsection