@extends('dashboard')
@section('content')

<h2>User Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users">Users Managemenet</a></li>
        <li class="breadcrumb-item active">Add New User</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add New User</div>
            <div class="card-body">
                <form action="{{ route('users.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for=""><b>Name</b></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>NIC</b></label>
                        <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC Number" />
                        @if($errors->has('nic'))
                        <span class="text-danger">{{ $errors->first('nic') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Address</b></label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" />
                        @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Mobile</b></label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" />
                        @if($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Email</b></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" />
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Gender</b></label>
                        <input type="radio" name="gender" class="form-check-input mx-2" value="male">Male
                        <input type="radio" name="gender" class="form-check-input mx-2" value="female">Female
                        @if($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Territory</b></label>
                        <select name="territory" id="territory" class="form-control dynamic" data-dependent="region">
                            <option value="">Select territory</option>
                            @foreach($territory_list as $territory)
                                <option value="{{ $territory->territory_name}}">{{ $territory->territory_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('territory'))
                        <span class="text-danger">{{ $errors->first('territory') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Username</b></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                        @if($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Password</b></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password" />
                        @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
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