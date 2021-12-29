@extends("user.layouts.main")

@section('content')
    <section class="jurusan py-5">
        <div class="container">
            <h1 class="text-center mb-5">List Graduate Profiles</h1>
            @foreach ($data as $department)
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10">
                        <h5 class="text-primary">{{ $department->name_en }}</h5>
                        @foreach ($department->curriculums as $curriculum)
                            <div class="mb-3">
                                <li id="{{ $curriculum->id }}">Curriculum {{ $curriculum->year }}</li>
                                @foreach ($curriculum->graduateProfiles as $gp)
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $gp->code }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#{{ $gp->code }}"
                                                    aria-expanded="false" aria-controls="{{ $gp->code }}">
                                                    {{ $loop->iteration }}. {{ $gp->code }} - {{ $gp->title_en }}
                                                </button>
                                            </h2>
                                            <div id="{{ $gp->code }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $gp->code }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>Aspect</strong><br>
                                                    <p>{{ $gp->aspect }}</p>
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
