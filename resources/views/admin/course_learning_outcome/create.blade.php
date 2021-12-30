@extends("admin.layouts.main")

@section('page_title')
    Course
@endsection

@section('content')
    <div class="col-md-2 mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Return
        </a>
    </div>
    <div class="card card-primary">
        @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
        @endif
        <div class="card-header">
            <h3 class="card-title">{{ $clo ? 'Edit' : 'Add' }} Course Learning Outcomes Data</h3>
        </div>
        {{-- TODO: isi old data kalo salah input --}}
        <form
            action="{{ $clo ? route('admin.curriculum.course.clo.update', [$curriculum->id, $course->id, $clo->id]) : route('admin.curriculum.course.clo.store', [$curriculum->id, $course->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if ($clo)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title_en">Course Learning Outcome Title (en)</label>
                            <input type="text" class="form-control" id="title_en" placeholder="Enter Title (en)"
                                name="title_en" required value="{{ $clo ? $clo->title_en : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="title_id">Course Learning Outcome Title (id)</label>
                            <input type="text" class="form-control" id="title_id" placeholder="Enter Title (id)"
                                name="title_id" required value="{{ $clo ? $clo->title_id : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="desc_en">Course Learning Outcome Description (en)</label>
                            <input type="text" class="form-control" id="desc_en"
                                placeholder="Enter Course Learning Outcome Description (en)" name="desc_en" required
                                value="{{ $clo ? $clo->desc_en : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="desc_id">Course Learning Outcome Description (id)</label>
                            <input type="text" class="form-control" id="desc_id"
                                placeholder="Enter Course Learning Outcome Description (id)" name="desc_id" required
                                value="{{ $clo ? $clo->desc_id : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="percent_to_graduate_LO">Course Learning Outcome percentage</label>
                            <input type="number" min="0" max="100" step="1" class="form-control"
                                id="percent_to_graduate_LO" placeholder="Enter Course Learning Outcome percentage"
                                name="percent_to_graduate_LO" required
                                value="{{ $clo ? $clo->percent_to_graduate_LO : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="LO_id">Learning Outcomes</label>
                            <select class="custom-select" id="LO_id" name="LO_id">
                                @foreach ($curriculum->learningOutcomes as $lo)
                                    <option value="{{ $lo->id }}" @if ($clo != null && $clo->LO_id == $lo->id) selected @endif>
                                        {{ $lo->title_en }}
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
