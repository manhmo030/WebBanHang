<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Address</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .delivery-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;

        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            cursor: pointer;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <div class="delivery-form">
        <form action="{{ URL::to('/user/add-delivery-address') }}" method="POST">
            @csrf
            <h2>Add Delivery Address</h2>

            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="hoten" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="sdt" placeholder="Enter your phone number" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <select id="province" name="province" onchange="getDistricts()">
                    <option></option>
                    @foreach ($tinhthanhpho as $item)
                        <option value="{{ $item->matp }}">{{ $item->tentinhthanhpho }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="district">District:</label>
                <select id="district" name="district" onchange="getWards()" required>
                    {{-- ajax --}}
                </select>
            </div>

            <div class="form-group">
                <label for="ward">Ward:</label>
                <select id="ward" name="ward" required>
                    {{-- ajax --}}
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="{{ asset('assetClient/js/ajax/delivery-address.js') }}"></script>
</body>

</html>
