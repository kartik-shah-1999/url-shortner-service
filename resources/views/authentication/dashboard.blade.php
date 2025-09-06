@section('title','Dashboard')

<x-header />
    <div class="container mt-3" style="display: flex; justify-content: space-between;">
        <h3>Welcome to dashboard, {{auth()->user()->name}}</h3>
        <button class="btn btn-sm btn-secondary logout">Logout</button>
    </div>
    <div class="container mt-3">
        <div class="row" style="display: flex; justify-content: end;">
            @if ((int)auth()->user()->role != 1)
                <button class="btn btn-primary mr-3" onclick="window.location.href = '{{ route('addCompanyForm') }}'">Add Company</button>
            @endif
            {{-- <button class="btn btn-primary">Invite Users</button> --}}
        </div>
    </div>

    <div class="company-info mt-3">
        <table class="table table-bordered">
            <thead class="text-center bg-light">
                <th>Si. No</th>
                <th>Company Name</th>
                @if ((int)auth()->user()->role === 1)
                    <th>Created By</th>
                @endif
                <th>No. of users</th>
                <th>URLs</th>
                <th>Short URLs</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($companies as $key => $company)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$company->name}}</td>
                        @if((int)auth()->user()->role === 1)
                            <td>{{$company->owner_id}}</td>
                        @endif
                        <td>12</td>
                        <td>sadasdsa</td>
                        <td>hgfhgfhfg</td>
                        <td>
                            <button class="btn btn-info invite-users" onclick="window.location.href='/inviteUsers/{{$company->id}}'">Invite users</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{ $companies }} --}}
<x-footer />