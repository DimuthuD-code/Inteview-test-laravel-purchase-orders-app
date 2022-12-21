@extends('dashboard')
@section('content')

<h2>User Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Users Managemenet</li>
    </ol>
</nav>
<div class="mt-4 mb-4">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">Users Managemenet</div>
                <div class="col col-md-6">
                    <a href="{{ route('users.add') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>E-Mail</th>
                            <th>Gender</th>
                            <th>Territory</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>            
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var table = $('#users_table').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{ route('users.fetch_all') }}",
            columns:[
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'nic',
                    name: 'nic'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'territory',
                    name: 'territory'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable:false
                },
            ]
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).data('id');

            if(confirm('Are you sure want to remove it?'))
            {
                window.location.href = "/users/delete/"+id;
            }
            
        });
    });
</script>
@endsection