<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .navbar {
        background-color: #ff5850;
        font-weight:bold;
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
        margin:10px;
        text-align:center;
        }
    </style>
</head>

<body>
    <header style="text-align:center">
        <img src="{{ asset('hinh/banner_sach.jpg') }}" width="1000px">
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
