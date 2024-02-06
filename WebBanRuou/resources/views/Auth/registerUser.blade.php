<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%
        }

        label {
            display: block;
            margin-bottom: 8px;
            margin-top: 16px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;

            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select,
        input[type="radio"] {
            margin-right: 8px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 16px;
            margin-bottom: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Style for error messages */
        p.error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Style for Google reCaptcha container */
        .g-recaptcha {
            margin-bottom: 15px;
        }

        /* Style for invalid feedback */

    </style>
</head>

<body>
    <form action="{{ URL::to('/user/register') }}" method="post">
        @csrf

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="email">
        @if ($errors->has('email'))
            <p class="error-message">{{ $errors->first('email') }}</p>
        @endif

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password">
        @if ($errors->has('password'))
            <p class="error-message">{{ $errors->first('password') }}</p>
        @endif

        <label for="fullname">Tên khách hàng:</label>
        <input type="text" id="fullname" name="name">
        @if ($errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }}</p>
        @endif

        <input type="submit" value="Đăng ký">

        <!-- Google reCaptcha -->
        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
        @if ($errors->has('g-recaptcha-response'))
            <p class="error-message">{{ $errors->first('g-recaptcha-response') }}</p>
        @endif
        <!-- End Google reCaptcha -->
    </form>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
