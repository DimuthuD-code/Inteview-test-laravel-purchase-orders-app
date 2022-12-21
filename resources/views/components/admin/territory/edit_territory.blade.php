@extends('dashboard')
@section('content')

<h2 class="mt-3">Territory Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/territory">Territory Management</a></li>
        <li class="breadcrumb-item active">Edit Territory</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Edit Territory</div>
            <div class="card-body">
                <form action="{{ route('territory.edit_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for=""><b>Zone</b></label>
                        <select name="zone" id="zone" class="form-control dynamic" data-dependent="region">
                            <option value="{{ $data->zone }}">{{ $data->zone }}</option>
                            @foreach($zone_list as $zone)
                                <option value="{{ $zone->zone_long_desc}}">{{ $zone->zone_long_desc}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('zone'))
                        <span class="text-danger">{{ $errors->first('zone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Region</b></label>
                        <select name="region" id="region" class="form-control">
                            <option value="{{ $data->region }}">{{ $data->region }}</option>
                        </select>
                        @if($errors->has('region'))
                        <span class="text-danger">{{ $errors->first('region') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Territory Name</b></label>
                        <input type="text" name="territory_name" id="territory_name" class="form-control" value="{{ $data->territory_name }}" />
                        @if($errors->has('territory_name'))
                        <span class="text-danger">{{ $errors->first('territory_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" name="hidden_id" value="{{ $data->id }}">
                        <input type="submit" class="btn btn-success" value="EDIT">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection