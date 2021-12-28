@extends("admin.layouts.main")

@section("page_title")
    Graduate Profile
@endsection

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section("content")
    <div class="col-md-2 mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Return
        </a>
    </div>
    <div class="card card-primary">
        @if($errors->any())
            {!!  implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
        @endif
        <div class="card-header">
            <h3 class="card-title">{{ $graduateProfile ? "Edit" : "Add" }} Graduate Profile Data</h3>
        </div>
        {{--            TODO: isi old data kalo salah input--}}
        <form action="{{ $graduateProfile ? route("admin.curriculum.gp.update", [$curriculum->id, $graduateProfile->id]) : route("admin.curriculum.gp.store", $curriculum->id) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if($graduateProfile)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="graduate_profile_code">Graduate Profile Code</label>
                            <input type="text" class="form-control" id="graduate_profile_code"
                                   placeholder="Enter Graduate Profile Code" name="code" required
                                   value="{{ $graduateProfile ? $graduateProfile->code : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="graduate_profile_title_en">Graduate Profile Title (en)</label>
                            <input type="text" class="form-control" id="graduate_profile_title_en"
                                   placeholder="Enter Graduate Profile Title (en)" name="title_en" required
                                   value="{{ $graduateProfile ? $graduateProfile->title_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="graduate_profile_title_id">Graduate Profile Title (id)</label>
                            <input type="text" class="form-control" id="graduate_profile_title_id"
                                   placeholder="Enter Graduate Profile Title (id)" name="title_id" required
                                   value="{{ $graduateProfile ? $graduateProfile->title_id : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="graduate_profile_aspect">Graduate Profile Aspect</label>
                            <input type="text" class="form-control" id="graduate_profile_aspect"
                                   placeholder="Enter Graduate Profile Aspect" name="aspect" required
                                   value="{{ $graduateProfile ? $graduateProfile->aspect : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label>GP Course</label>
                            <div class="select2-blue">
                                <select class="select2 form-control" multiple="multiple"
                                        data-placeholder="Select courses"
                                        data-dropdown-css-class="select2-blue" name="course_id[]">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                                @if ($graduateProfile != null)
                                                @foreach ($graduateProfile->courses as $gp_course)
                                                @if ($gp_course->id == $course->id)
                                                selected
                                                @endif
                                                @endforeach
                                                @endif>
                                            {{ $course->title_en }}
                                        </option>
                                    @endforeach
                                </select>
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


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
