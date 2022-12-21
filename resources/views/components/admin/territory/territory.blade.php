@extends('dashboard')
@section('content')

<h2 class="mt-3">Territory Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Territory Managemenet</li>
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
                <div class="col col-md-6">Territory Managemenet</div>
                <div class="col col-md-6">
                    <a href="{{ route('territory.add') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="territory_table">
                    <thead>
                        <tr>
                            <th>Territory Code</th>
                            <th>Zone</th>
                            <th>Region</th>
                            <th>Territory Name</th>
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
        var table = $('#territory_table').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{ route('territory.fetchall') }}",
            columns:[
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'zone',
                    name: 'zone'
                },
                {
                    data: 'region',
                    name: 'region'
                },
                {
                    data: 'territory_name',
                    name: 'territory_name'
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
                window.location.href = "/territory/delete/"+id;
            }
            
        });
    });
</script>

@endsection