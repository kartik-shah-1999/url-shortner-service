@section('title','Login')

<x-header />
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    @if(session('loginError'))
                    <div class="alert alert-danger">
                            {{ session('loginError')}}
                    </div>
                    @endif
                    <form method="post" action="{{ route('loginUser') }}">
                        @csrf
                        <label for="">Email</label>
                        <div class="input-wrapper mb-3">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <label for="">Password</label>
                        <div class="input-wrapper mb-3">
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" autocomplete="off">
                        @error('password')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary mt-3">
                    </form>
                </div>
                </div>
                <p>Don't have an account? <a href="{{ route('registration') }}" target="_blank">Register</a></p>
            </div>
        </div>
    </div>
<x-footer />