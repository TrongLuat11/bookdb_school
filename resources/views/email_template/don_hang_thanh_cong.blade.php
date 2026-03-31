<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
        }
        h2 {
            color: #2d6a4f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #2d6a4f;
            color: white;
            padding: 8px 12px;
            text-align: left;
        }
        td {
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) td {
            background-color: #f4f4f4;
        }
        .total {
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h2>🎉 Đặt hàng thành công!</h2>
    <p>Xin chào,</p>
    <p>Cảm ơn bạn đã đặt hàng tại hệ thống của chúng tôi. Dưới đây là chi tiết đơn hàng của bạn:</p>

    <table>
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $tongTien = 0; @endphp
            @foreach($data as $item)
                @php
                    $thanh_tien = $item->so_luong * $item->don_gia;
                    $tongTien += $thanh_tien;
                @endphp
                <tr>
                    <td>{{ $item->ten_sach }}</td>
                    <td>{{ $item->so_luong }}</td>
                    <td>{{ number_format($item->don_gia, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($thanh_tien, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Tổng tiền: {{ number_format($tongTien, 0, ',', '.') }} đ</p>

    <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>

    <div class="footer">
        <p>Trân trọng!<br>Đội ngũ BookDB</p>
    </div>
</body>
</html>
