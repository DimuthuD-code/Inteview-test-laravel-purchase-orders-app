@extends('dashboard')
@section('content')

<h2>Purchase Order Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/po">Purchase Orders Managemenet</a></li>
        <li class="breadcrumb-item active">Add New Purchase Order</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
        <div class="card">
            <div class="card-header">Add New Purchase Order</div>
            <div class="card-body">
                <form action="{{ route('po.add_validation') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Zone</b></label>
                                <select name="zone" id="zone" class="form-control dynamic" data-dependent="region">
                                    <option value="">Select Zone</option>
                                    @foreach($zone_list as $zone)
                                        <option value="{{ $zone->zone_long_desc}}">{{ $zone->zone_long_desc}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('zone'))
                                <span class="text-danger">{{ $errors->first('zone') }}</span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Region</b></label>
                                <select name="region" id="region" class="form-control dynamic" data-dependent="territory_name">
                                    <option value="">Select Region</option>
                                </select>
                                @if($errors->has('region'))
                                <span class="text-danger">{{ $errors->first('region') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Territory</b></label>
                                <select name="territory" id="territory_name" class="form-control">
                                    <option value="">Select Territory</option>
                                </select>
                                @if($errors->has('territory'))
                                <span class="text-danger">{{ $errors->first('territory') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Distributor</b></label>
                                <select name="distributor" id="distributor" class="form-control">
                                    <option value="">Select Distributor</option>
                                </select>
                                @if($errors->has('distributor'))
                                <span class="text-danger">{{ $errors->first('distributor') }}</span>
                                @endif
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
                                        <th>AVB QTY</th>
                                        <th>ENTER QTY</th>
                                        <th>TOTAL PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <td>{{ $row->sku_code }} <input type="hidden" name="sku_code[]" value="{{ $row->sku_code }}"></td>
                                        <td>{{ $row->sku_name }} <input type="hidden" name="sku_name[]" value="{{ $row->sku_name }}"></td>
                                        <td>{{ $row->distributor_price }} <input type="hidden" name="unit_price[]" class="iprice" value="{{ $row->distributor_price }}"></td>
                                        <td>{{ $row->volume }} </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="qty" class="text-center iqty" onchange="subTotal()" min="0" max="{{ $row->volume }}" >
                                        </td>
                                        <td>
                                            <span class="itot"></span>
                                            <input type="hidden" name="total_price[]" id="total_price" class="text-center itotal">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="ADD PO">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    var iprice  = document.getElementsByClassName('iprice');
    var iqty    = document.getElementsByClassName('iqty');
    var itotal  = document.getElementsByClassName('itotal');
    var itot    = document.getElementsByClassName('itot');


    function subTotal()
    {
        for(i=0; i<iprice.length; i++)
        {
            itot[i].innerText = (iprice[i].value)*(iqty[i].value);
            itotal[i].setAttribute("value", (iprice[i].value)*(iqty[i].value));
        }
    }

    subTotal();

</script>
<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select  = $(this).attr("id");
                var value   = $(this).val();
                var dependent   = $(this).data('dependent');
                var _token  = $('input[name="_token"]').val();
                console.log(select);
                console.log(value);
                console.log(dependent);
                $.ajax({
                    url: "{{ route('po.getterritory') }}",
                    method:"get",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                });

            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#territory_name').change(function(){
            if($(this).val() != '')
            {
                var value   = $(this).val();
                var _token  = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('po.getdistributor') }}",
                    method:"get",
                    data:{value:value, _token:_token},
                    success:function(result)
                    {
                        $('#distributor').html(result);
                    }
                });

            }
        });
    });
</script>
@endsection
