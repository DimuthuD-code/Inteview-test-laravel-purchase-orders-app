@extends('dashboard')
@section('content')

<h2>Invoice Generate</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/po">PO</a></li>
        <li class="breadcrumb-item active">Invoice Generate</li>
    </ol>
</nav>
<div class="mt-4 mb-4">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">Invoice</div>
                <div class="col col-md-6">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Zone: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="{{ $data[0]->zone }}" disabled>
                </div>
            </div>           
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Region: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="{{ $data[0]->region }}" disabled>
                </div>
            </div>           
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Territory: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="{{ $data[0]->territory }}" disabled>
                </div>
            </div>           
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Distributor: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="{{ $data[0]->distributor }}" disabled>
                </div>
            </div>
            <div class="row mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>PO Number</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $grandtotal =  0; @endphp
                                @foreach($data as $row)
                                <tr>
                                    @php 
                                    $amounts = explode(", ", $row->total_price)
                                    @endphp
                                    <td>TEP00{{ $row->id }}</td>
                                    <td>Rs.{{ array_sum($amounts) }} <input type="hidden" class="amounts" value="{{ array_sum($amounts) }}"></td>
                                    @php  $grandtotal += array_sum($amounts); @endphp
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-end"><h5>Total Amount: <span class="text-success">Rs.{{ $grandtotal }}</span></h5></div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>


@endsection
