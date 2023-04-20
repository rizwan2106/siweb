<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Alat | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Peminjaman Alat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                        <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                        <a href="/equipments" @if(request()->route()->uri == 'equipments' || request()->route()->uri == 'equipment-add' || request()->route()->uri == 'equipment-deleted' || request()->route()->uri == 'equipment-edit/{slug}' || request()->route()->uri == 'equipment-delete/{slug}') class="active" @endif>Equipments</a>
                        <a href="/categories" @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delete/{slug}') class="active" @endif>Categories</a>
                        <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri == 'registered-users' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-ban/{slug}' || request()->route()->uri == 'user-banned') class="active" @endif>Users</a>
                        <a href="/loan-logs" @if(request()->route()->uri == 'loan-log') class="active" @endif>Loan Log</a>
                        <a href="/" @if(request()->route()->uri == '/') class="active" @endif>Equipment List</a>
                        <a href="/equipment-loan" @if(request()->route()->uri == 'equipment-loan') class="active" @endif>Equipment Loan</a>
                        <a href="/logout">Logout</a>
                        @else
                        <a href="/profile" @if(request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                        <a href="/" @if(request()->route()->uri == '/') class="active" @endif>Equipment List</a>
                        <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
