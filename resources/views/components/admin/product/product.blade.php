@extends('dashboard')
@section('content')

<h2>Product Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Products Managemenet</li>
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
                <div class="col col-md-6">Products Managemenet</div>
                <div class="col col-md-6">
                    <a href="{{ route('product.add') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="product_table">
                    <thead>
                        <tr>
                            <th>SKU ID</th>
                            <th>SKU Code</th>
                            <th>SKU Name</th>
                            <th>MRP</th>
                            <th>Distributor Price</th>
                            <th>Weight/Volume</th>
                            <th>UNIT</th>
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
        var table = $('#product_table').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{ route('product.fetch_all') }}",
            columns:[
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'sku_code',
                    name: 'sku_code'
                },
                {
                    data: 'sku_name',
                    name: 'sku_name'
                },
                {
                    data: 'mrp',
                    name: 'mrp'
                },
                {
                    data: 'distributor_price',
                    name: 'distributor_price'
                },
                {
                    data: 'volume',
                    name: 'volume'
                },
                {
                    data: 'unit',
                    name: 'unit'
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
                window.location.href = "/product/delete/"+id;
            }
            
        });
    });
</script>
@endsection