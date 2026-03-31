<!DOCTYPE html>
<html>
<head>
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
        .main-content h5 {
            font-weight: bold;
            border-bottom: 2px solid #333;
            padding-bottom: 8px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-2 sidebar">
                <a href="{{ route('account') }}" class="active">Thông tin tài khoản</a>
                <a href="{{ url('/sach') }}">Quản lý sách</a>
            </div>

            {{-- Main content --}}
            <div class="col-10 main-content">
                <h5><a href="{{ url('/sach') }}" style="color:#333; text-decoration:none;">Trang chủ</a></h5>

                @if(session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="post" action="{{route('saveinfo')}}" enctype="multipart/form-data"
                    style="width:30%; margin:0 auto">
                    <div style='text-align:center;font-weight:bold;color:#15c;'>CẬP NHẬT THÔNG TIN CÁ NHÂN</div>
                    <label>Tên</label>
                    <input type='text' class='form-control form-control-sm' name='name' value="{{$user->name}}">
                    <label>Email</label>
                    <input type='text' class='form-control form-control-sm' name='email' value="{{$user->email}}">
                    <label>Số điện thoại</label>
                    <input type='text' class='form-control form-control-sm' name='phone' value="{{$user->phone}}">
                    <input type='hidden' value='{{$user->id}}' name='id'>
                    <label>Ảnh đại diện</label><br>
                    @if($user->photo)
                        <img src="{{asset('storage/profile/'.$user->photo) }}" width="50px" class="mb-1"/>
                    @endif
                    <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
                    {{ csrf_field() }}
                    <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
