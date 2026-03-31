@extends('layouts.account_layout')

@section('title', 'Thêm sách mới')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 style="font-weight: bold; color: #333;">THÊM SÁCH MỚI</h4>
        <a href="{{ route('sach.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card-custom">
        <form action="{{ route('sach.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label for="tieu_de" style="font-weight: 600;">Tiêu đề</label>
                        <input type="text" class="form-control" name="tieu_de" id="tieu_de" required placeholder="Nhập tiêu đề sách">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gia_ban" style="font-weight: 600;">Giá bán</label>
                                <input type="number" class="form-control" name="gia_ban" id="gia_ban" required placeholder="Ví dụ: 150000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="the_loai" style="font-weight: 600;">Thể loại</label>
                                <select class="form-control" name="the_loai" id="the_loai">
                                    <option value="">Chọn thể loại</option>
                                    @foreach($theloai as $tl)
                                        <option value="{{ $tl->id }}">{{ $tl->ten_the_loai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tac_gia" style="font-weight: 600;">Tác giả</label>
                                <input type="text" class="form-control" name="tac_gia" id="tac_gia" placeholder="Tên tác giả">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nha_xuat_ban" style="font-weight: 600;">Nhà xuất bản</label>
                                <input type="text" class="form-control" name="nha_xuat_ban" id="nha_xuat_ban" placeholder="Tên NXB">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="mo_ta" style="font-weight: 600;">Mô tả chi tiết</label>
                        <textarea class="form-control" name="mo_ta" id="mo_ta" rows="5" placeholder="Nhập mô tả về nội dung sách..."></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label style="font-weight: 600;">Ảnh bìa sách</label>
                        <div id="imagePreview" style="width: 100%; height: 300px; display: flex; justify-content: center; align-items: center; background: #f8f9fa; border: 2px dashed #dee2e6; margin-bottom: 10px;">
                            <span style="color: #6c757d;">Chưa có ảnh</span>
                        </div>
                        <input type="file" class="form-control-file" name="photo" id="photoInput" accept="image/*" onchange="previewImage(this)">
                    </div>

                    <div class="form-group mb-3 mt-4">
                        <label for="nha_cung_cap" style="font-weight: 600;">Nhà cung cấp</label>
                        <input type="text" class="form-control" name="nha_cung_cap" id="nha_cung_cap" placeholder="Ví dụ: Fahasa, Nhà sách ABC">
                    </div>

                    <div class="form-group mb-3">
                        <label for="hinh_thuc_bia" style="font-weight: 600;">Hình thức bìa</label>
                        <select class="form-control" name="hinh_thuc_bia" id="hinh_thuc_bia">
                            <option value="Bìa mềm">Bìa mềm</option>
                            <option value="Bìa cứng">Bìa cứng</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-right mt-4 p-3" style="background: #f8f9fa; border-radius: 4px;">
                <button type="submit" class="btn btn-primary px-5 btn-lg">
                    <i class="fas fa-save mr-2"></i>LƯU SÁCH
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('imagePreview');
                    preview.innerHTML = '<img src="' + e.target.result + '" style="max-width: 100%; max-height: 100%; object-fit: contain;">';
                    preview.style.border = "none";
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
