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
                                        “Everybody in this country should learn to program a computer, because it teaches you how to think.”
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="{{ asset("hero.png") }}" alt="hero" id="gambar" />
                        </div>
                    </div>
                </div>

                <!-- Mobile  -->
                <div class="d-sm-block d-md-none">
                    <div class="row mt-2 text-center">
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="{{ asset("hero.png") }}" alt="hero" id="gambar" />
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex h-100">
                                <div class="">
                                    <h2>
                                        <strong>Welcome to,</strong><br />
                                        Computer Science!
                                    </h2>
                                    <p>
                                        “Everybody in this country should learn to program a computer, because it teaches you how to think.”
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
@endsection
