<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Address</title>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #495057;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-top: 5px;
        }

        button,
        .delete-link {
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .delete-link {
            background-color: #dc3545;
            margin-left: 10px;
            float: right;
        }

        button:hover,
        .delete-link:hover {
            background-color: #218838;
        }
    </style>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <div class="delivery-form">
        <form action="{{ URL::to('/user/update-delivery-address') }}" method="POST">
            @csrf
            <h2>Update Delivery Address</h2>
            <input type="hidden" name="mattnh" value="{{ $ttnh->mattnh }}">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="hoten" value="{{ $ttnh->hoten }}"
                    placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="sdt" value="{{ $ttnh->sdt }}"
                    placeholder="Enter your phone number" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $ttnh->email }}"
                    placeholder="Enter your email address" required>
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <select id="province" name="province" onchange="getDistricts()">
                    @foreach ($tinhthanhpho as $item)
                        <option value="{{ $item->matp }}" {{ $ttnh->matp == $item->matp ? 'selected' : '' }}>
                            {{ $item->tentinhthanhpho }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="district">District:</label>
                <input type="hidden" id="maqh" value="{{ $ttnh->maqh }}">
                <select id="district" name="district" onchange="getWards()" required>

                </select>
            </div>

            <div class="form-group">
                <label for="ward">Ward:</label>
                <input type="hidden" id="xaid" value="{{ $ttnh->xaid }}">
                <select id="ward" name="xaid" required>

                </select>
            </div>
            <div class="form-group">
                <label for="email">Đặt làm mặc định:</label>
                <input type="checkbox" id="trangthai" name="trangthai" value="{{ $ttnh->trangthai }}"
                    {{ $ttnh->trangthai == 'default' ? 'checked' : '' }}>
            </div>

            <button type="submit">Submit</button>
            <a href="{{ URL::to('/user/delete-delivery-address/' . $ttnh->mattnh) }}" class="delete-link" id="delete-delivery-address">Delete</a>
        </form>

    </div>
    <script src="{{ asset('assetClient/js/ajax/delivery-address.js') }}"></script>
</body>

</html>
