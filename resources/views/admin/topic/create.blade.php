@extends("admin.layouts.main")

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
            <h3 class="card-title">{{ $topic ? 'Edit' : 'Add' }} Topics Data</h3>
        </div>
        {{-- TODO: isi old data kalo salah input --}}
        <form
            action="{{ $topic ? route('admin.curriculum.course.topic.update', [$curriculum->id, $course->id, $topic->id]) : route('admin.curriculum.course.topic.store', [$curriculum->id, $course->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if ($topic)
                @method("PATCH")
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title_en">Topic Title (en)</label>
                            <input type="text" class="form-control" id="title_en" placeholder="Enter Title (en)"
                                name="title_en" required value="{{ $topic ? $topic->title_en : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="title_id">Topic Title (id)</label>
                            <input type="text" class="form-control" id="title_id" placeholder="Enter Title (id)"
                                name="title_id" required value="{{ $topic ? $topic->title_id : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="indicator">Indicator</label>
                            <input type="text" class="form-control" id="indicator"
                                placeholder="Enter Indicator" name="indicator" required
                                value="{{ $topic ? $topic->indicator : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="start_week">Start Week</label>
                            <input type="number" class="form-control" id="start_week"
                                placeholder="Enter Start Week" name="start_week" required
                                value="{{ $topic ? $topic->start_week : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="end_week">End Week</label>
                            <input type="number" class="form-control" id="end_week"
                                placeholder="Enter End Week" name="end_week" required
                                value="{{ $topic ? $topic->end_week : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="learning_method">Learning Method</label>
                            <input type="text" class="form-control" id="learning_method"
                                placeholder="Enter Learning Method" name="learning_method" required
                                value="{{ $topic ? $topic->learning_method : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="percent_to_LO">Percent to Learning Outcome</label>
                            <input type="number" min="0" max="100" step="0.001" class="form-control"
                                id="percent_to_LO" placeholder="Enter percentage"
                                name="percent_to_LO" required
                                value="{{ $topic ? $topic->percent_to_LO : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="CLO_id">Course Learning Outcomes</label>
                            <select class="custom-select" id="CLO_id" name="CLO_id">
                                @foreach ($clos as $clo)
                                    <option value="{{ $clo->id }}" @if ($topic != null && $topic->CLO_id == $clo->id) selected @endif>
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
