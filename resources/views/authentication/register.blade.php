@section('title','Registeration')

<x-header />
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="card">
                <div class="card-header text-center">
                    <h3>Create Account</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('registerUser') }}">
                        @csrf
                        <label for="">Name</label>
                        <div class="input-wrapper mb-3">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <label for="">Email</label>
                        <div class="input-wrapper mb-3">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <label for="">Create Password</label>
                        <div class="input-wrapper mb-3">
                        <input type="password" name="password1" class="form-control" value="{{ old('password1') }}" autocomplete="off">
                        @error('password1')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <label for="">Re-enter Password</label>
                        <div class="input-wrapper mb-3">
                        <input type="password" name="password2" class="form-control" value="{{ old('password2') }}">
                        @error('password2')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <label for="">Select role</label>
                        <div class="input-wrapper">
                        <select name="role" class="form-control">
                            <option value="2">Admin</option>
                            <option value="3" selected>Member</option>
                        </select>
                        </div>
                        <input type="submit" value="Register" class="btn btn-primary mt-3">
                    </form>
                </div>
                </div>
                <p>Already have an account? <a href="{{ route('login') }}" target="_blank">Login</a></p>
            </div>
        </div>
    </div>
<x-footer />