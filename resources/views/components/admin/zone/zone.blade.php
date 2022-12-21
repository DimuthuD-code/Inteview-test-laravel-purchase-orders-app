@extends('dashboard')
@section('content')

<h2 class="mt-3">Zones Managemenet</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Zones Managemenet</li>
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
                <div class="col col-md-6">Zones Managemenet</div>
                <div class="col col-md-6">
                    <a href="{{ route('zone.add') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="zone_table">
                    <thead>
                        <tr>
                            <th>Zone Code</th>
                            <th>Zone Long Description</th>
                            <th>Short Description</th>
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
        var table = $('#zone_table').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{ route('zone.fetchall') }}",
            columns:[
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'zone_long_desc',
                    name: 'zone_long_desc'
                },
                {
                    data: 'short_desc',
                    name: 'short_desc'
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
                window.location.href = "/zone/delete/"+id;
            }
            
        });
    });
</script>

@endsection