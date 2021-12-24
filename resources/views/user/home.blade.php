@extends("user.layouts.main")

@section('content')
    <section class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('banner.png') }}" class="d-block w-100"
                        style="max-height: 500px; object-fit: cover" alt="banner1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('banner.png') }}" class="d-block w-100"
                        style="max-height: 500px; object-fit: cover" alt="banner2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('banner.png') }}" class="d-block w-100"
                        style="max-height: 500px; object-fit: cover" alt="banner3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="department py-5">
        <div class="container">
            <h3 class="text-center mb-4"><strong>Departments</strong></h3>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 mb-3">
                    <a href="/calon/presiden" class="text-decoration-none">
                        <div class="card text-center shadow d-flex rounded-3 bg-dark" style="height: 7rem">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <h5 class="card-title text-white">Computer Science</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 mb-3">
                    <a href="/calon/gubernur" class="text-decoration-none">
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
