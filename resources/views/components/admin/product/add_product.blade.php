@extends('dashboard')
@section('content')

<h2>Product Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/product">Products Management</a></li>
        <li class="breadcrumb-item active">Add New Product</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add New Product</div>
            <div class="card-body">
                <form action="{{ route('product.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for=""><b>SKU Code</b></label>
                        <input type="text" name="sku_code" id="sku_code" class="form-control" placeholder="SKU Code" />
                        @if($errors->has('sku_code'))
                        <span class="text-danger">{{ $errors->first('sku_code') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>SKU Name</b></label>
                        <input type="text" name="sku_name" id="sku_name" class="form-control" placeholder="SKU Name" />
                        @if($errors->has('sku_name'))
                        <span class="text-danger">{{ $errors->first('sku_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>MRP</b></label>
                        <input type="text" name="mrp" id="mrp" class="form-control" placeholder="MRP" />
                        @if($errors->has('mrp'))
                        <span class="text-danger">{{ $errors->first('mrp') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Distributor Price</b></label>
                        <input type="text" name="distributor_price" id="distributor_price" class="form-control" placeholder="Distributor Price" />
                        @if($errors->has('distributor_price'))
                        <span class="text-danger">{{ $errors->first('distributor_price') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Weight/Volume</b></label>
                        <div class="row">
                            <div class="col-md-9 p-0">
                                <input type="text" name="volume" id="volume" class="form-control" placeholder="Weight or Volume" />  
                                @if($errors->has('volume'))
                                <span class="text-danger">{{ $errors->first('volume') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 p-0">
                                <select name="unit" id="unit" class="form-control">
                                    <option value="">></option>
                                    <option value="g">g</option>
                                    <option value="kg">kg</option>
                                    <option value="pcs">pcs</option>
                                    <option value="l">l</option>
                                </select>
                                @if($errors->has('unit'))
                                <span class="text-danger">{{ $errors->first('unit') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="ADD">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection