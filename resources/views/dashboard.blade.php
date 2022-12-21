<!DOCTYPE html>
<html>
<head>
    <title>Purchase Orders Management System in Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
</head>
<body>

    @guest
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <h1 class="mt-4 mb-5 text-center">Purchase Orders Management System</h1>

    @yield('content')

    @else

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <button class="navbar-toggler position-absolute d-md-none d-left collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand col-md-3 ms-5 px-3" href="#">Purchase Orders Management System</a>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Welcome, {{ Auth::user()->email }}</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}" aria-current="page" href="/dashboard">Dashboard</a>
                        </li>
                        @if(Auth::user()->type == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'zone' ? 'active' : '' }}" aria-current="page" href="/zone">Zone</a>
                        </li>               
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'region' ? 'active' : '' }}" aria-current="page" href="/region">Region</a>
                        </li>               
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'territory' ? 'active' : '' }}" aria-current="page" href="/territory">Territory</a>
                        </li>               
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'users' ? 'active' : '' }}" aria-current="page" href="/users">Users</a>
                        </li>               
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'product' ? 'active' : '' }}" aria-current="page" href="/product">Product</a>
                        </li>               
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'po' && Request::segment(2) == '' ? 'active' : '' }}" aria-current="page" href="/po">PO</a>
                        </li>               
                        @if(Auth::user()->type == 'User')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'po' && Request::segment(2) == 'add' ? 'active' : '' }}" aria-current="page" href="/po/add">Add PO</a>
                        </li> 
                        @endif              
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>

                    </ul>

                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">!-->

                @yield('content')

                <!--</div>!-->
            </main>
        </div>
    </div>    

    @endguest

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>