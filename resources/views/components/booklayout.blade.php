<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
    .site-header {
        padding: 12px 0 4px;
    }
        .header-inner {
        width:1000px;
        margin:0 auto;
        position:relative;
        }
        .header-banner {
        width:1000px;
        display:block;
        }
    .navbar {
        background-color: #ff5850;
        font-weight:bold;
        }
        .menu-wrap {
        display:flex;
        align-items:center;
        justify-content:center;
        width:100%;
        }
        .nav-item a {
        color: #fff!important;
        }
        .navbar-nav {
        margin:0 auto;
        }
        .list-book{
        display:grid;
        grid-template-columns:repeat(4,24%);
        }
        .book {
        position:relative;
        margin:10px;
        text-align:center;
        padding-bottom:35px;
        }
        .btn-add-product
        {
        position:absolute;
        bottom:0;
        width:100%;
        }
        .cart-shortcut {
        position:absolute;
        top:18px;
        right:18px;
        min-width:170px;
        display:flex;
        align-items:center;
        gap:12px;
        padding:12px 14px;
        color:#2f2a1f;
        background:rgba(255, 255, 255, 0.95);
        border-radius:18px;
        box-shadow:0 10px 24px rgba(0, 0, 0, 0.14);
        text-decoration:none !important;
        }
        .cart-shortcut:hover {
        color:#2f2a1f;
        transform:translateY(-1px);
        transition:all .2s ease;
        }
        .cart-icon-wrap {
        width:42px;
        height:42px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        background:#ff6b57;
        border-radius:14px;
        }
        .cart-copy {
        line-height:1.1;
        }
        .cart-copy small {
        display:block;
        color:#8a7f6d;
        font-size:12px;
        }
        .cart-copy strong {
        display:block;
        font-size:15px;
        }
        .cart-badge {
        min-width:24px;
        height:24px;
        padding:0 6px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        background:#23b85c;
        border-radius:999px;
        font-size:12px;
        font-weight:bold;
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <img src="{{ asset('hinh/banner_sach.jpg') }}" class="header-banner">
            <a href="{{ route('order') }}" class="cart-shortcut">
                <span class="cart-icon-wrap">
                    <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                </span>
                <span class="cart-copy">
                    <small>Giỏ hàng của bạn</small>
                    <strong>Xem đơn hàng</strong>
                </span>
                <span class="cart-badge" id="cart-number-product">
                    @if (session('cart'))
                        {{ count(session('cart')) }}
                    @else
                        0
                    @endif
                </span>
            </a>
        </div>
    </header>
 
    <main style="width:1000px; margin:2px auto;">
        <div class="row">
            <div class="col-3 pr-0">
                <x-menu>
                    <x-slot name="item">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('sach/theloai/2')}}">Truyện ngắn - Tản văn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
                        </li>
                    </x-slot>
                </x-menu>
                <img src="{{ asset('hinh/sidebar_1.jpg') }}" width="100%" class="mt-1">
                <img src="{{ asset('hinh/sidebar_2.jpg') }}" width="100%" class="mt-1">
            </div>

            <div class="col-9">
                {{$slot}}
            </div>
        </div>
    </main>

</body>
</html>
