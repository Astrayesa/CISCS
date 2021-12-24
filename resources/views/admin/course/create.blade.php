@extends("admin.layouts.main")

@section("page_title")
    Course
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
            <h3 class="card-title">{{ $course ? "Edit" : "Add" }} Course Data</h3>
        </div>
        {{--            TODO: isi old data kalo salah input--}}
        <form action="{{ $course ? route("admin.curriculum.course.update", [$curriculum->id, $course->id]) : route("admin.curriculum.course.store", $curriculum->id) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if($course)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="course_code">Course Code</label>
                            <input type="text" class="form-control" id="course_code"
                                   placeholder="Enter Course Code" name="code" required
                                   value="{{ $course ? $course->code : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_title_en">Course Title (en)</label>
                            <input type="text" class="form-control" id="course_title_en"
                                   placeholder="Enter Course Title (en)" name="title_en" required
                                   value="{{ $course ? $course->title_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_title_id">Course Title (id)</label>
                            <input type="text" class="form-control" id="course_title_id"
                                   placeholder="Enter Course Title (id)" name="title_id" required
                                   value="{{ $course ? $course->title_id : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="course_desc_en">Course Description (en)</label>
                            <input type="text" class="form-control" id="course_desc_en"
                                   placeholder="Enter Course Description (en)" name="desc_en" required
                                   value="{{ $course ? $course->desc_en : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_desc_id">Course Description (id)</label>
                            <input type="text" class="form-control" id="course_desc_id"
                                   placeholder="Enter Course Description (id)" name="desc_id" required
                                   value="{{ $course ? $course->desc_id : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="course_semester">Course Semester</label>
                            <input type="number" min="1" max="8" class="form-control" id="course_semester"
                                   placeholder="Enter Course Semester" name="semester" required
                                   value="{{ $course ? $course->semester : "" }}"/>
                        </div>

                        <div class="form-group">
                            <label for="course_theory_credit">Course Theory Credit</label>
                            <input type="number" min="0" max="4" class="form-control" id="course_theory_credit"
                                   placeholder="Enter Course Theory Credit" name="theory_credit" required
                                   value="{{ $course ? $course->theory_credit : "" }}"/>
                        </div>
                        <div class="form-group">
                            <label for="course_non_theory_credit">Course Non-theory Credit</label>
                            <input type="number" min="0" max="4" class="form-control" id="course_non_theory_credit"
                                   placeholder="Enter Course Non-theory Credit" name="non_theory_credit" required
                                   value="{{ $course ? $course->non_theory_credit : "" }}"/>
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
