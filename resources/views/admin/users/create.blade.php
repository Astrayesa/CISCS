@extends("admin.layouts.main")

@section('page_name')
    Users Account
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Return
            </a>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add User Form</h3>
                </div>
                <form action="{{ route('admin.user.store') }}" id="quickForm" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Fullname" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                id="username" placeholder="Username" value="{{ old('username') }}" required>
                            <div class="invalid-feedback">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password..." required>
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm Password..." required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
