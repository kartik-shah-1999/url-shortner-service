@section('title','Invite users')

<x-header />
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="card">
                <div class="card-header text-center">
                    <h3>Invite Users</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                            {{ session('success')}}
                    </div>
                    @endif
                    <form method="post" action="{{ route('addCompany') }}">
                        @csrf
                        <label for="">Select user to invite</label>
                        <div class="input-wrapper mb-3">
                        <select name="users" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('name')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <input type="submit" value="Send Invite" class="btn btn-primary mt-3">
                        <input type="button" value="Dashboard" class="btn btn-secondary ml-1 mt-3" onclick="window.location.href = '{{ route('dashboard') }}'">
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<x-footer />