@extends('layouts.account_layout')

@section('title', 'Thông tin tài khoản')

@section('content')
    <div class="card-custom">
        <form method="post" action="{{route('saveinfo')}}" enctype="multipart/form-data"
            style="width:50%; margin:0 auto">
            <div style='text-align:center;font-weight:bold;color:#15c; margin-bottom: 20px; text-transform: uppercase;'>Cập nhật thông tin cá nhân</div>
            
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <input type='text' class='form-control' name='name' value="{{$user->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type='text' class='form-control' name='email' value="{{$user->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Số điện thoại</label>
                <div class="col-sm-9">
                    <input type='text' class='form-control' name='phone' value="{{$user->phone}}">
                </div>
            </div>

            <input type='hidden' value='{{$user->id}}' name='id'>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                <div class="col-sm-9">
                    @if($user->photo)
                        <img src="{{asset('storage/profile/'.$user->photo) }}" width="80px" class="mb-2 img-thumbnail shadow-sm"/>
                    @endif
                    <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
                </div>
            </div>

            {{ csrf_field() }}
            <div style='text-align:center; margin-top: 30px;'>
                <button type="submit" class="btn btn-primary px-5">Lưu thông tin</button>
            </div>
        </form>
    </div>
@endsection
