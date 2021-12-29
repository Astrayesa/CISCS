@extends("user.layouts.main")

@section('content')
    <section class="banner py-5">
        <div class="container">
            <div class="hero">
                <!-- Desktop -->
                <div class="d-md-block d-none">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="d-flex h-100">
                                <div class="justify-content-center align-self-center">
                                    <h2>
                                        <strong>Welcome to,</strong><br />
                                        Computer Science!
                                    </h2>
                                    <p>
                                        “Everybody in this country should learn to program a computer, because it teaches
                                        you how to think.”
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="{{ asset('hero.png') }}" alt="hero" id="gambar" />
                        </div>
                    </div>
                </div>

                <!-- Mobile  -->
                <div class="d-sm-block d-md-none">
                    <div class="row mt-2 text-center">
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="{{ asset('hero.png') }}" alt="hero" id="gambar" />
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex h-100">
                                <div class="">
                                    <h2>
                                        <strong>Welcome to,</strong><br />
                                        Computer Science!
                                    </h2>
                                    <p>
                                        “Everybody in this country should learn to program a computer, because it teaches
                                        you how to think.”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="department py-5">
        <div class="container">
            <h3 class="text-center mb-4"><strong>Departments</strong></h3>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow d-flex rounded-3 bg-dark" style="height: 7rem">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <h5 class="card-title text-white">Computer Science</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow d-flex rounded-3 bg-dark" style="height: 7rem">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <h5 class="card-title text-white">Informatics Management</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="visi-misi py-5 mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <h3 class="mb-4"><strong>Vision</strong></h3>
                        <p>
                            Becoming a Computer Science Study Program that excels in Education and Research in the Field of
                            Computers and Informatics, and Achieves National and International Levels in 2025.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-center mb-4"><strong>Mission</strong></h3>
                        <ol>
                            <li>Carry out education in the field of computer science that is relevant to the needs and
                                potentials that exist in Lampung Province, national and international levels.</li>
                            <li>Develop and advance research in the field of computers and informatics, and utilize the
                                results for the surrounding environment and the benefit of mankind.</li>
                            <li>Increase the use of computer and information technology for the community.</li>
                            <li>Develop mutually beneficial partnerships with external parties in the context of developing
                                the tridharma of higher education</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
