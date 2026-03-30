<x-booklayout>
    <x-slot name="title">
        Sách
    </x-slot>

    <div class="container-fluid py-4" style="background: #fff; border-radius: 8px; font-family: sans-serif;">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4 text-dark font-weight-normal">{{ $sach->tieu_de }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="product-image">
                <img src="{{ asset('hinh/image/'.$sach->file_anh_bia) }}" class="img-fluid" alt="{{ $sach->tieu_de }}">
            </div>
        </div>

        <div class="col-md-8">
            <div class="book-info">
                <p><span class="info-label">Nhà cung cấp:</span> <span class="info-value text-success font-weight-bold">Hải Đăng</span></p>
                <p><span class="info-label">Nhà xuất bản:</span> <span class="info-value font-weight-bold">NXB Văn Học</span></p>
                <p><span class="info-label">Tác giả:</span> <span class="info-value text-success font-weight-bold">{{ $sach->tac_gia ?? 'Chưa rõ' }}</span></p>
                <p><span class="info-label">Hình thức bìa:</span> <span class="info-value">Bìa Mềm</span></p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h6 class="font-weight-bold mb-3">Mô tả:</h6>
            <div class="description-text text-justify" style="line-height: 1.8; color: #333; font-size: 14px;">
                <p><strong>{{ $sach->tieu_de }}</strong> {{ $sach->mo_ta }}</p>
            </div>
        </div>
    </div>
    </div>

    <style>
        .product-image img { border: 1px solid #f0f0f0; max-height: 400px; width: auto; display: block; }
        .book-info p { margin-bottom: 12px; font-size: 14px; display: flex; }
        .info-label { color: #666; width: 150px; display: inline-block; }
        .info-value { color: #333; }
        .text-success { color: #008848 !important; }
        .text-justify { text-align: justify; }
    </style>
</x-booklayout>

