@extends("admin.layouts.main")

@section("page_title")
    Graduate Profile
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
