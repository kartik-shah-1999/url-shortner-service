@section('title','Add Company')

<x-header />
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="card">
                <div class="card-header text-center">
                    <h3>Add Company</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                            {{ session('success')}}
                    </div>
                    @endif
                    <form method="post" action="{{ route('addCompany') }}">
                        @csrf
                        <label for="">Company Name</label>
                        <div class="input-wrapper mb-3">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" autocomplete="off">
                        @error('name')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <input type="submit" value="Add" class="btn btn-primary mt-3">
                        <input type="button" value="Dashboard" class="btn btn-secondary ml-1 mt-3" onclick="window.location.href = '{{ route('dashboard') }}'">
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<x-footer />