<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f6f9fc; margin: 0; padding: 0; color: #333; }
        .email-wrapper { width: 100%; padding: 40px 0; background-color: #f6f9fc; display: flex; justify-content: center; }
        .email-content { max-width: 650px; width: 100%; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.06); overflow: hidden; margin: 0 auto; border: 1px solid #edf2f7; }
        .email-header { background: linear-gradient(135deg, #ff5850 0%, #ff8375 100%); color: #ffffff; padding: 35px 20px; text-align: center; }
        .email-header h1 { margin: 0; font-size: 26px; font-weight: 700; letter-spacing: 0.5px; }
        .email-header p { margin: 10px 0 0 0; font-size: 15px; opacity: 0.9; }
        .email-body { padding: 40px 35px; }
        .greeting { font-size: 18px; margin-bottom: 25px; font-weight: 600; color: #2d3748; }
        .order-table { width: 100%; border-collapse: collapse; margin-top: 25px; border-radius: 8px; overflow: hidden; }
        .order-table th { background-color: #f8fafc; color: #4a5568; font-weight: 600; text-align: left; padding: 14px 15px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0; }
        .order-table td { padding: 15px; border-bottom: 1px solid #edf2f7; vertical-align: middle; color: #4a5568; }
        .item-name { font-weight: 600; color: #2d3748; font-size: 15px; }
        .text-right { text-align: right !important; }
        .text-center { text-align: center !important; }
        .total-row td { font-size: 18px; font-weight: bold; color: #ff5850; padding: 20px 15px; border-top: 2px solid #e2e8f0; background-color: #fefcfc; }
        .email-footer { background-color: #f8fafc; padding: 25px 35px; text-align: center; font-size: 14px; color: #718096; border-top: 1px solid #edf2f7; }
        .contact-box { background-color: #ebf8ff; border-left: 4px solid #3182ce; padding: 15px 20px; margin-top: 30px; border-radius: 4px; color: #2b6cb0; font-size: 15px; line-height: 1.5; }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <table class="email-content" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="email-header">
                    <h1>🎉 Xác nhận Đặt hàng!</h1>
                    <p>Cảm ơn bạn đã lựa chọn mua sắm cùng chúng tôi</p>
                </td>
            </tr>
            <tr>
                <td class="email-body">
                    <p class="greeting">Xin chào Quý khách,</p>
                    <p style="line-height: 1.6; color: #4a5568;">Đơn hàng của bạn đã được hệ thống <strong>BookDB</strong> ghi nhận thành công và đang được chuẩn bị. Dưới đây là thông tin chi tiết về các cuốn sách tuyệt vời mà bạn đã chọn:</p>

                    <table class="order-table" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-right">Đơn giá</th>
                                <th class="text-right">Thành tiền</th>
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
                                    <td class="item-name">{{ $item->tieu_de }}</td>
                                    <td class="text-center">x{{ $item->so_luong }}</td>
                                    <td class="text-right" style="color: #718096;">{{ number_format($item->don_gia, 0, ',', '.') }}đ</td>
                                    <td class="text-right" style="font-weight: 600; color: #2d3748;">{{ number_format($thanh_tien, 0, ',', '.') }}đ</td>
                                </tr>
                            @endforeach
                            <tr class="total-row">
                                <td colspan="3" class="text-right" style="color: #4a5568;">TỔNG THANH TOÁN:</td>
                                <td class="text-right">{{ number_format($tongTien, 0, ',', '.') }} đ</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="contact-box">
                        <strong>Lưu ý:</strong> Chúng tôi sẽ sớm liên hệ với bạn trong thời gian hành chính thông qua số điện thoại để chốt lại thời gian giao nhận sách nhé!
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
