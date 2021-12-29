@extends("user.layouts.main")

@section('content')
    <section class="jurusan py-5">
        <div class="container">
            <h1 class="text-center mb-5">List Courses</h1>
            @foreach ($data as $department)
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10">
                        <h5 class="text-primary">{{ $department->name_en }}</h5>
                        @foreach ($department->curriculums as $curriculum)
                            <div class="mb-3">
                                <li id="{{ $curriculum->id }}">Curriculum {{ $curriculum->year }}</li>
                                @foreach ($curriculum->courses as $course)
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $course->code }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#{{ $course->code }}"
                                                    aria-expanded="false" aria-controls="{{ $course->code }}">
                                                    {{ $loop->iteration }}. {{ $course->code }} - {{ $course->title_en }}
                                                </button>
                                            </h2>
                                            <div id="{{ $course->code }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $course->code }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>Detail Course</strong><br>
                                                    Semester: {{ $course->semester }}<br>
                                                    Theory Credit: {{ $course->theory_credit }}<br>
                                                    Non Credit: {{ $course->non_theory_credit }}<br>
                                                    <p>{{ $course->desc_en }}</p>
                                                    <strong>Topics</strong><br>
                                                    <ol class="list-group list-group-numbered">
                                                        @foreach ($course->clos as $clo)
                                                            @foreach ($clo->topics as $topic)
                                                                <li class="list-group-item">{{ $topic->title_en }}</li>
                                                            @endforeach
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
