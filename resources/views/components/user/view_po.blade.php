@extends('dashboard')
@section('content')

<h2>Purchase Order Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/po">Purchase Orders Managemenet</a></li>
        <li class="breadcrumb-item active">View Purchase Order</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">View Purchase Order</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for=""><b>Zone</b></label>
                            <select name="zone" id="zone" class="form-control dynamic" data-dependent="region">
                                <option value="{{ $data->zone }}">{{ $data->zone }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for=""><b>Region</b></label>
                            <select name="region" id="region" class="form-control dynamic" data-dependent="territory_name">
                                <option value="{{ $data->region }}">{{ $data->region }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for=""><b>Territory</b></label>
                            <select name="territory" id="territory_name" class="form-control">
                                <option value="{{ $data->territory }}">{{ $data->territory }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for=""><b>Distributor</b></label>
                            <select name="distributor" id="distributor" class="form-control">
                                <option value="{{ $data->distributor }}">{{ $data->distributor }}</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="product_table">
                            <thead>
                                <tr>
                                    <th>SKU CODE</th>
                                    <th>SKU NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>ENTER QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $skucodes = explode(", ", $data->sku_code);
                                $skunames = explode(", ", $data->sku_name);
                                $unitprices = explode(", ", $data->unit_price);
                                $quantities = explode(", ", $data->quantity);
                                $totalprices = explode(", ", $data->total_price);

                                echo($skucodes[0]);
                                @endphp

                                @for($i = 0; $i < count($skucodes); $i++)
                                <tr>
                                    <td>{{ $skucodes[$i] }}</td>
                                    <td>{{ $skunames[$i] }}</td>
                                    <td>{{ $unitprices[$i] }}</td>
                                    <td>{{ $quantities[$i] }}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection