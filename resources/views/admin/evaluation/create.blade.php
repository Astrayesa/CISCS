@extends("admin.layouts.main")

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('page_name')
    Topics
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
            <h3 class="card-title">{{ $evaluation ? 'Edit' : 'Add' }} Evaluations Data</h3>
        </div>
        {{-- TODO: isi old data kalo salah input --}}
        <form
            action="{{ $evaluation ? route('admin.curriculum.course.evaluation.update', [$curriculum->id, $course->id, $evaluation->id]) : route('admin.curriculum.course.evaluation.store', [$curriculum->id, $course->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if ($evaluation)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="accreditation-file-upload">Evaluation File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept="application/pdf" class="custom-file-input" id="file"
                                        name="file" />
                                    <label class="custom-file-label" for="file">Choose File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type">Evaluation Type</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter Type" name="type"
                                required value="{{ $evaluation ? $evaluation->type : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="percent_to_graduate_CLO">Percent to Graduate Course Learning Outcome</label>
                            <input type="number" min="0" max="100" step="0.001" class="form-control"
                                id="percent_to_graduate_CLO" placeholder="Enter percentage" name="percent_to_graduate_CLO"
                                required value="{{ $evaluation ? $evaluation->percent_to_graduate_CLO : '' }}" />
                        </div>
                        <div class="form-group">
                            <label>Course Learning Outcome</label>
                            <div class="select2-blue">
                                <select class="select2 form-control" multiple="multiple" data-placeholder="Select CLO"
                                    data-dropdown-css-class="select2-blue" name="CLO_id[]">
                                    @foreach ($clos as $clo)
                                        <option value="{{ $clo->id }}" @if ($evaluation != null && $evaluation->CLO_id == $clo->id) selected @endif>
                                            {{ $clo->title_en }}
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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
