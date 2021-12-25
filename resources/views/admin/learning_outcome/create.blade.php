@extends("admin.layouts.main")

@section("page_title")
    Learning Outcome
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
            <h3 class="card-title">{{ $learningOutcome ? "Edit" : "Add" }} Learning Outcome Data</h3>
        </div>
        {{--            TODO: isi old data kalo salah input--}}
        <form action="{{ $learningOutcome ? route("admin.curriculum.lo.update", [$curriculum->id, $learningOutcome->id]) : route("admin.curriculum.lo.store", $curriculum->id) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if($learningOutcome)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="course_title_en">Learning Outcome Title (en)</label>
                            <input type="text" class="form-control" id="course_title_en"
                                   placeholder="Enter Learning Outcome Title (en)" name="title_en" required
                                   value="{{ $learningOutcome ? $learningOutcome->title_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_title_id">Learning Outcome Title (id)</label>
                            <input type="text" class="form-control" id="course_title_id"
                                   placeholder="Enter Learning Outcome Title (id)" name="title_id" required
                                   value="{{ $learningOutcome ? $learningOutcome->title_id : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="course_desc_en">Learning Outcome Description (en)</label>
                            <input type="text" class="form-control" id="course_desc_en"
                                   placeholder="Enter Learning Outcome Description (en)" name="desc_en" required
                                   value="{{ $learningOutcome ? $learningOutcome->desc_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_desc_id">Learning Outcome Description (id)</label>
                            <input type="text" class="form-control" id="course_desc_id"
                                   placeholder="Enter Learning Outcome Description (id)" name="desc_id" required
                                   value="{{ $learningOutcome ? $learningOutcome->desc_id : "" }}"/>
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
