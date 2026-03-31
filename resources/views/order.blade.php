<x-booklayout>
    <x-slot name="title">
        Đặt hàng
    </x-slot>

    <div class="container-fluid py-4" style="font-family:sans-serif;">
        <div class="d-flex justify-content-between align-items-center mb-4 p-4" style="background:#fff7ef; border:1px solid #f2ddc9; border-radius:16px;">
            <div>
                <h3 class="mb-1" style="color:#34261a;">Trang đặt hàng</h3>
                <p class="mb-0 text-muted">Kiểm tra lại giỏ hàng và chọn hình thức thanh toán trước khi xác nhận.</p>
            </div>
            <a href="{{ url('sach') }}" class="btn btn-outline-secondary btn-sm">Tiếp tục mua sách</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($data->isEmpty())
            <div class="alert alert-warning mb-0 p-4" style="border-radius:14px;">
                Giỏ hàng đang trống. Hãy quay lại trang sách để chọn thêm sản phẩm.
            </div>
        @else
            @php
                $total = 0;
                $totalQuantity = 0;
            @endphp

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card border-0 shadow-sm" style="border-radius:16px;">
                        <div class="card-body p-0">
                            <div class="p-4 border-bottom">
                                <h4 class="mb-1">Sản phẩm trong giỏ</h4>
                                <small class="text-muted">Bạn có thể xóa sản phẩm trước khi xác nhận đơn.</small>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0">Sách</th>
                                            <th class="border-0 text-center">Số lượng</th>
                                            <th class="border-0 text-right">Đơn giá</th>
                                            <th class="border-0 text-right">Thành tiền</th>
                                            <th class="border-0 text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            @php
                                                $qty = $quantity[$row->id] ?? 0;
                                                $subtotal = $qty * $row->gia_ban;
                                                $total += $subtotal;
                                                $totalQuantity += $qty;
                                            @endphp
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <img
                                                            src="{{ asset('hinh/image/'.$row->file_anh_bia) }}"
                                                            alt="{{ $row->tieu_de }}"
                                                            style="width:68px; height:auto; border-radius:10px; margin-right:12px;"
                                                        >
                                                        <div>
                                                            <div class="font-weight-bold">{{ $row->tieu_de }}</div>
                                                            <small class="text-muted">Mã sách: #{{ $row->id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">{{ $qty }}</td>
                                                <td class="text-right align-middle">{{ number_format($row->gia_ban, 0, ',', '.') }}đ</td>
                                                <td class="text-right align-middle font-weight-bold">{{ number_format($subtotal, 0, ',', '.') }}đ</td>
                                                <td class="text-center align-middle">
                                                    <form method="POST" action="{{ route('cartdelete') }}" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                        <div class="card-body p-4">
                            <h4 class="mb-3">Tóm tắt đơn hàng</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Đầu sách</span>
                                <strong>{{ count($quantity) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tổng số lượng</span>
                                <strong>{{ $totalQuantity }}</strong>
                            </div>
                            <div class="d-flex justify-content-between pt-3 mt-3" style="border-top:1px dashed #ddd;">
                                <span class="font-weight-bold">Tổng thanh toán</span>
                                <strong style="font-size:20px; color:#d35400;">{{ number_format($total, 0, ',', '.') }}đ</strong>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm" style="border-radius:16px;">
                        <div class="card-body p-4">
                            <h4 class="mb-3">Xác nhận đặt hàng</h4>

                            @guest
                                <div class="alert alert-info mb-3">
                                    Bạn cần đăng nhập trước khi đặt hàng.
                                </div>
                            @endguest

                            <form method="POST" action="{{ route('ordercreate') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="hinh_thuc_thanh_toan" class="font-weight-bold">Hình thức thanh toán</label>
                                    <select
                                        class="form-control @error('hinh_thuc_thanh_toan') is-invalid @enderror"
                                        id="hinh_thuc_thanh_toan"
                                        name="hinh_thuc_thanh_toan"
                                        @guest disabled @endguest
                                    >
                                        <option value="">-- Chọn hình thức thanh toán --</option>
                                        <option value="1" @selected(old('hinh_thuc_thanh_toan') == 1)>Thanh toán khi nhận hàng</option>
                                        <option value="2" @selected(old('hinh_thuc_thanh_toan') == 2)>Chuyển khoản</option>
                                    </select>
                                    @error('hinh_thuc_thanh_toan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success btn-block" @guest disabled @endguest>
                                    Xác nhận đặt hàng
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-booklayout>
