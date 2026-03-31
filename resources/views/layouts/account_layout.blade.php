<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Quản lý tài khoản')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #4a5568;
            min-height: 100vh;
            padding: 30px 0;
        }
        .sidebar a {
            display: block;
            color: #cbd5e0;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 14px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            color: #fff;
            background-color: #2d3748;
        }
        .main-content {
            padding: 20px 40px;
        }
        .header-title {
            font-weight: bold;
            border-bottom: 2px solid #333;
            padding-bottom: 8px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .card-custom {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .btn-add {
            background-color: #1a73e8;
            color: white;
            border-radius: 4px;
            padding: 8px 16px;
            text-decoration: none;
        }
        .btn-add:hover {
            background-color: #1557b0;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-2 sidebar">
                <a href="{{ route('account') }}" class="{{ request()->routeIs('account') ? 'active' : '' }}">Thông tin tài khoản</a>
                <a href="{{ route('sach.index') }}" class="{{ request()->routeIs('sach.*') ? 'active' : '' }}">Quản lý sách</a>
            </div>

            {{-- Main content --}}
            <div class="col-10 main-content">
                <h5 class="header-title"><a href="{{ url('/') }}" style="color:#333; text-decoration:none;">Trang chủ</a></h5>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
