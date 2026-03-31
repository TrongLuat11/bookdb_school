<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <!-- CSS -->
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
    
    <!-- JS files for Bootstrap dropdown to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <style>
        .navbar {
            background-color: #ff5850;
            font-weight: bold;
        }
        .menu-wrap {
        display:flex;
        align-items:center;
        justify-content:center;
        width:100%;
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy tất cả các thẻ link của thanh menu
            const categoryLinks = document.querySelectorAll('.nav-item .nav-link');
            // Lấy id của vùng hiển thị sách
            const bookContainer = document.getElementById('book-content');

            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Nếu không có vùng hiển thị danh sách sách (#book-content),
                    // (Ví dụ bạn đang ở trang Chi tiết sách), 
                    // thì bỏ qua AJAX và để trình duyệt chuyển sang trang Thể loại bình thường.
                    if (!bookContainer) return;

                    // Ngăn chặn trình duyệt mở đường dẫn và tải lại trang mặc định
                    e.preventDefault(); 
                    
                    const url = this.getAttribute('href');

                    // Thay đổi màu sắc của menu được chọn (Active)
                    categoryLinks.forEach(l => l.parentElement.classList.remove('active'));
                    this.parentElement.classList.add('active');

                    // Gửi AJAX bằng hàm fetch của JavaScript
                    fetch(url, {
                        headers: {
                            // Laravel dựa vào header này để biết đây là một Request AJAX thông qua vòng lặp `$request->ajax()` ở Controller
                            'X-Requested-With': 'XMLHttpRequest' 
                        }
                    })
                    .then(response => response.text()) // Nhận kết quả từ server dạng text (HTML)
                    .then(html => {
                        // Cập nhật lại HTML bên trong vùng hiển thị sách bằng dữ liệu Server trả về
                        if (bookContainer) {
                            bookContainer.innerHTML = html; 
                        }
                    })
                    .catch(error => {
                        console.error('Đã xảy ra lỗi khi tải danh sách sách:', error);
                    });
                });
            });
        });
    </script>

</body>
</html>
