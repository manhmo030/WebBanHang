<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
</head>
<body>

@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="post" action="{{ URL::to('/admin/register') }}">
    @csrf
    <label for="tendangnhap">Tên đăng nhập:</label>
    <input type="text" id="tendangnhap" name="tendangnhap" required><br>
    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required><br>
    <label for="hoten">Họ tên:</label>
    <input type="text" name="hoten" required><br>
    <button type="submit">Đăng ký</button>

</form>

</body>
</html>
