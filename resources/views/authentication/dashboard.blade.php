@section('title','Dashboard')

<x-header />
    <div class="container mt-3" style="display: flex; justify-content: space-between;">
        <h3>Welcome to dashboard, {{auth()->user()->name}}</h3>
        <button class="btn btn-sm btn-secondary logout">Logout</button>
    </div>
<x-footer />