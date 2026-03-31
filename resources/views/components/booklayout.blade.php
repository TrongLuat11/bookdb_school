<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- JS files for Bootstrap dropdown to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <style>
        .navbar {
            background-color: #ff5850;
            font-weight: bold;
        }
        .nav-item a {
            color: #fff!important;
            padding: 0.5rem 1rem;
        }
        .list-book {
            display: grid;
            grid-template-columns: repeat(4, 24%);
            gap: 1.33%;
            margin-top: 15px;
        }
        .book {
            margin: 10px;
            text-align: center;
        }
        .auth-block {
            display: flex;
            align-items: center;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body style="background-color: #fff;">
    <header style="text-align:center">
        <img src="{{ asset('hinh/banner_sach.jpg') }}" width="1000px">
    </header>
 
    <main style="width:1000px; margin:2px auto;">
        <nav class="navbar navbar-expand-lg p-2 d-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/2')}}">Truyện ngắn - tản văn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
                </li>
            </ul>
            
            <div class="auth-block">
                @auth
                    <div class="dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('account')}}">Quản lý</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" onclick="event.preventDefault();
                                          this.closest('form').submit();" style="cursor: pointer;">Đăng xuất</a>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}">
                        <button class='btn btn-sm btn-primary'>Đăng nhập</button>
                    </a>&nbsp;
                    <a href="{{ route('register') }}">
                        <button class='btn btn-sm btn-success'>Đăng ký</button>
                    </a>
                @endauth 
            </div>
        </nav>

        <div class="row">
            <div class="col-12">
                {{$slot}}
            </div>
        </div>
    </main>
</body>
</html>
