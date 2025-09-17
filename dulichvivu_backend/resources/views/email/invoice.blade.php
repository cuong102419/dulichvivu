<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }

        h2 {
            margin-bottom: 5px;
        }

        .header p {
            display: block;
            font-style: italic;
        }

        .section {
            margin: 20px 0;
        }

        .info p {
            margin: 3px 0;
        }

        /* Bảng chính có border */
        table.invoice {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table.invoice,
        .invoice th,
        .invoice td {
            border: 1px solid #ccc;
        }

        .invoice th,
        .invoice td {
            padding: 10px;
            text-align: left;
        }

        .invoice th {
            background: #f3f3f3;
        }

        .payment {
            margin-top: 20px;
            font-size: 16px;
        }

        .paypal {
            color: red;
            font-weight: bold;
        }

        .summary {
            margin-top: 20px;
            border-top: 2px solid #ccc;
            padding-top: 15px;
        }

        .summary h4 {
            margin-bottom: 10px;
        }

        /* Bảng tổng kết KHÔNG có border */
        table.summary-table {
            width: 100%;
        }

        .summary-table td {
            padding: 6px 0;
        }

        .summary-table td:last-child {
            text-align: right;
        }

        .highlight {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div>
        <p>Chào bạn,</p>
        <p>Cảm ơn bạn đã đặt tour tại Dulichvivu. Dưới đây là hóa đơn chi tiết</p>
        <p>Chúc bạn một chuyến đi vui vẻ!</p>
    </div>

    <div class="header">
        <h2>Hóa đơn chi tiết</h2>
        <p>Ngày: {{ $booking->created_at->format('d-m-Y') }}</p>
    </div>

    <h3>{{ $tour->title }}</h3>

    <div class="section info">
        <p><b>Từ</b></p>
        <p>{{ $customer->fullname }}</p>
        <p>{{ $customer->address }}</p>
        <p>Số điện thoại: {{ $customer->phone_number }}</p>
        <p>Email: <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></p>
    </div>

    <div class="section info">
        <p><b>Đến</b></p>
        <p>Công ty Dulichvivu</p>
        <p>470 Trần Đại Nghĩa</p>
        <p>Ngũ Hành Sơn, Đà Nẵng</p>
        <p>Phone: 1 (804) 123-9876</p>
        <p>Email: <a href="mailto:minhdien.dev@gmail.com">dulichvivu@gmail.com</a></p>
    </div>

    <div class="section">
        <p><b>Mã hóa đơn:</b> {{ $booking->code }}</p>
        <p><b>Mã giao dịch:</b> {{ $transaction->trans_id ?? '' }}</p>
        <p><b>Ngày thanh toán:</b> {{ $transaction ? $transaction->created_at->format('d-m-Y H:i:s') : '' }}</p>
    </div>

    <table class="invoice">
        <thead>
            <tr>
                <th>Loại</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Điểm đến</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Người lớn</td>
                <td>{{ $booking->number_adults }}</td>
                <td>{{ number_format($booking->price_adult, 0, '.',  '.') }} đ</td>
                <td>{{ $tour->destination }}</td>
                <td>{{ number_format($booking->number_adults * $booking->price_adult, 0, '.',  '.') }} đ</td>
            </tr>
            <tr>
                <td>Trẻ em</td>
                <td>{{ $booking->number_children }}</td>
                <td>{{ number_format($booking->price_child, 0, '.',  '.') }} đ</td>
                <td>{{ $tour->destination }}</td>
                <td>{{ number_format($booking->number_children * $booking->price_child, 0, '.',  '.') }} đ</td>
            </tr>
        </tbody>
    </table>

    <div class="payment">
        <p><b>Phương thức thanh toán:</b> <span class="paypal">Thanh toán tại {{ $booking->payment_method == 'paypal' ? 'Paypal' : ($booking->payment_method == 'momo' ? 'Momo' : 'văn phòng') }}</span></p>
    </div>

    <div class="summary">
        <table class="summary-table">
            <tr>
                <td>Tổng tiền:</td>
                <td>{{ number_format($booking->total_price, 0, '.',  '.') }} đ</td>
            </tr>
            <tr>
                <td>Tax (0%):</td>
                <td>0 đ</td>
            </tr>
            <tr>
                <td class="highlight">Tổng tiền:</td>
                <td class="highlight">{{ number_format($booking->total_price, 0, '.',  '.') }} đ</td>
            </tr>
        </table>
    </div>
</body>

</html>
