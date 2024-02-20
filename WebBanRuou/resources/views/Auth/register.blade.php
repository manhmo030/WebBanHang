<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    button {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: calc(100% - 22px);
    }

    button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        form {
            width: 90%;
        }
    }
</style>

<body>

    <form method="post" action="{{ URL::to('/admin/register') }}">
        @csrf
        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <label for="tendangnhap">Tên đăng nhập:</label>
        <input type="text" id="tendangnhap" name="tendangnhap"><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password"><br>
        <label for="hoten">Họ tên:</label>
        <input type="text" name="hoten"><br>
        <button type="submit">Đăng ký</button>
        <p class="text-center mb-0">Have an Account? <a href="{{ URL::to('/admin/') }}">Sign In</a></p>
    </form>

</body>

</html>
