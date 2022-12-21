@extends('dashboard')
@section('content')

<h2>Purchase Orders Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Purchase Orders Managemenet</li>
    </ol>
</nav>
<div class="mt-4 mb-4">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-5">Purchase Orders Managemenet</div>
                <div class="col col-md-7">
                    <form action="{{ route('po.invoiceGenarate') }}" method="get">
                        <input type="hidden" name="po_ids[]" id="po_ids">
                        <input type="submit" class="btn btn-primary btn-sm float-end mx-1" id="bulk_invoice" value="Convert to Invoice">

                    </form>
                    <a href="{{ route('po.export_purchase_order') }}" class="btn btn-info btn-sm float-end">Export to Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="po_table">
                    <thead>
                        <tr>
                            <th>REGION</th>
                            <th>TERRITORY</th>
                            <th>DISTRIBUTOR</th>
                            <th>PO NUMBER</th>
                            <th><input type="checkbox" id="select_all" class="form-check-input" /></th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>TOTAL AMOUNT</th>
                            <th>VIEW PO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->region }}</td>
                            <td>{{ $row->territory }}</td>
                            <td>{{ $row->distributor }}</td>
                            <td>TEP00{{ $row->id }}</td>
                            <td><input type="checkbox" onclick="selectPo()" name="po_checkbox[]" class="form-check-input po_checkbox" value="{{ $row->id }}" /></td>
                            @php
                            $datetime = explode(" ", $row->created_at);
                            $total_price = explode(", ",$row->total_price);
                            @endphp
                            <td>{{ $datetime[0] }}</td>
                            <td>{{ $datetime[1] }}</td>
                            <td>{{ array_sum($total_price) }}</td>
                            <td><a href="/po/view/{{ $row->id }}" class="btn btn-secondary btn-sm">VIEW</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>            
        </div>
    </div>
</div>

<script>
    var checkBoxes = document.getElementsByClassName('po_checkbox');
    var selectAll = document.getElementById('select_all');

    $(document).on('click', '#select_all', function(){
        if(selectAll.checked)
        {
            for(var i = 0; i < checkBoxes.length; i++)
            {
                checkBoxes[i].checked = true;
            }
            selectPo();
        }
        else
        {
            for(var i = 0; i < checkBoxes.length; i++)
            {
                checkBoxes[i].checked = false;
            }
            selectPo();
        }
    });

    function selectPo()
    {
        var id = [];
        $('.po_checkbox:checked').each(function(){
            id.push($(this).val());
        });
        $('#po_ids').val(id);
    }
    
</script>
@endsection
