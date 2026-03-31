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

            <div class="mt-3">
                <strong class="d-block mb-2">Giá bán: {{ number_format($sach->gia_ban, 0, ',', '.') }}đ</strong>
                <label for="product-number" class="mb-1">Số lượng mua:</label>
                <div class="d-flex align-items-center">
                    <input type="number" id="product-number" class="form-control form-control-sm mr-2" min="1" value="1" style="max-width:100px;">
                    <button class="btn btn-success btn-sm mb-0" id="add-to-cart">Thêm vào giỏ hàng</button>
                </div>
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

    <script>
        $(document).ready(function () {
            $("#add-to-cart").click(function () {
                const id = "{{ $sach->id }}";
                const num = $("#product-number").val();

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('cartadd') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "num": num
                    },
                    success: function (data) {
                        $("#cart-number-product").html(data);
                    }
                });
            });
        });
    </script>
</x-booklayout>

