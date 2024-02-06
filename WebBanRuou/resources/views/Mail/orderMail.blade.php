<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Nhận và Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            /* Để căn giữa và giữa trái và phải */
            align-items: center;
            height: 100vh;
        }

        /* Form Người Nhận */
        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin-right: 20px;
            /* Thêm lề bên phải */
        }

        /* Form Đơn Hàng */
        .order-info {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* CSS để hiển thị thông tin đơn hàng */
        .order-item {
            display: flex;
            margin-bottom: 10px;
        }

        .order-item img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Hồng Kong Entertainment</h1>
    <div class="order-info">
        <p>Đơn hàng of you - {{ $name }}</p>

        <p>19036408100017 - TeckCombank không bank làm chó</p>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartDetail['cartItems'] as $item)
                    <tr>

                        <td>{{ $item->soluong }}x {{ $item->tensp }}</td>
                        <td>{{ $item->tongcong }}</td>
                    </tr>
                @endforeach
            </tbody>
            <h2>Tổng cộng: {{ $cartDetail['allTotal'] }}</h2>
        </table>

        <!-- Thêm các mục đơn hàng khác nếu cần -->
    </div>

</body>

</html>
