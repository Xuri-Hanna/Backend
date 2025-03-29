<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn của bạn</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DejaVu+Sans&display=swap');

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hóa Đơn Mua Hàng</h1>
        <p>Chào <strong>{{ $invoice->customer_name }}</strong>,</p>
        <p>Cảm ơn bạn đã mua hàng! Hóa đơn của bạn được đính kèm trong email này.</p>
        <p>Mọi thắc mắc xin liên hệ bộ phận hỗ trợ.</p>
        <div class="footer">
            <p>Trân trọng,</p>
            <p>Đội ngũ hỗ trợ</p>
        </div>
    </div>
</body>
</html>
