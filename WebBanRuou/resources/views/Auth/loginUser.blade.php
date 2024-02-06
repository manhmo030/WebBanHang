<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login Form</title>
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

        .login-container {
            text-align: center;
        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 auto;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            background-color: #4267B2;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #314c7e;
        }

        .login-form p {
            margin-top: 15px;
            color: #555;
        }

        .login-form a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            margin-right: 10px;
            padding: 10px;
            background-color: #4267B2;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .social-links a.google {
            background-color: #DB4437;
        }

        .login-container {
            text-align: center;
            margin-top: 20px;
        }

        .social-login-button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .google-login-button {
            background-color: #DB4437;
            /* Màu nền Google Blue */
            color: #fff;
        }

        .facebook-login-button {
            background-color: #4267B2;
            /* Màu nền Facebook Blue */
            color: #fff;
        }

        .social-login-button:hover {
            filter: brightness(80%);
            /* Tăng độ sáng khi hover */
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form class="login-form" action="{{ URL::to('/user/login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <p>Don't have an Account?
                <a href="{{ URL::to('/user/register') }}">Sign Up</a>
            </p>
            <a href="{{ URL::to('/user/forgot-password') }}">Forgot Password</a>
        </form>
        <div class="login-container">
            <a href="{{ URL::to('/user/login/google') }}" class="social-login-button google-login-button">
                <i class="fab fa-google-plus-g"></i>
                Login with Google</a>
            <a href="{{ URL::to('/user/login/facebook') }}" class="social-login-button facebook-login-button">
                <i class="fa-brands fa-facebook"></i>
                Login with  Facebook</a>
        </div>

    </div>
</body>

</html>
