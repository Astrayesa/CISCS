<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 shadow border-bottom border-info border-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('unila.png') }}" alt="logo" width="30" class="d-inline-block align-top">
            <span class="ms-2"> <strong>{{ env('APP_NAME') }}</strong></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('jurusan') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Departmens
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        @foreach ($departments as $department)
                            <li><a class="dropdown-item" href="{{ route("jurusan", $department->id) }}">{{ $department->name_en }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kurikulums') ? 'active' : '' }}" href="{{ route("kurikulums") }}">Curriculums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('matkul') ? 'active' : '' }}" href="{{ route("matkul") }}">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gp') ? 'active' : '' }}" href="{{ route("gp") }}">Graduate Profiles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
