@extends('dashboard')
@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if( session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="card border-dark">
                    <h3 class="card-header text-center bg-dark text-light">Login</h3>
                    <div class="card-body">
                        <form action="{{ route('login.custom') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <span class="material-symbols-outlined p-2 text-dark"  style="position: absolute;">mail</span>
                                <input type="text" name="email" class="form-control ps-5" placeholder="Email">
                                @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <span class="material-symbols-outlined p-2 text-dark"  style="position: absolute;">lock</span>
                                <input type="password" name="password" id="password" class="form-control ps-5" placeholder="Password">
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="showpassword" />
                                <label class="form-check-label" for="showpassword"> Show Password </label>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).on('click', '#showpassword', function() {
        var password = document.getElementById('password');
        if (password.type == 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    });
</script>
@endsection
