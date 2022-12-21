@extends('dashboard')
@section('content')

<h2 class="mt-3">Zone Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/zone">Zone Management</a></li>
        <li class="breadcrumb-item active">Add New Zone</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add New Zone</div>
            <div class="card-body">
                <form action="{{ route('zone.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for=""><b>Zone Long Description</b></label>
                        <input type="text" name="zone_long_desc" id="zone_long_desc" class="form-control" placeholder="Ex. ZONE 1" />
                        @if($errors->has('zone_long_desc'))
                        <span class="text-danger">{{ $errors->first('zone_long_desc') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Short Description</b></label>
                        <input type="text" name="short_desc" id="short_desc" class="form-control" placeholder="Ex. ZO1" />
                        @if($errors->has('short_desc'))
                        <span class="text-danger">{{ $errors->first('short_desc') }}</span>
                        @endif
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