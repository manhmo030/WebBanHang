<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - fundaofwebit.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <h1>Chi Tiet Don Hang</h1>

    <br />
    <br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ten san pham</th>
                <th>So luong</th>
                <th>Gia Tien</th>
                <th>Tong Tien</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>@php
                        echo $i;
                        $i++;
                    @endphp</td>
                    <td>{{ $item['tensp'] }}</td>
                    <td>{{ $item['soluong'] }}</td>
                    <td>{{ $item['dongiaban'] }}</td>
                    <td>{{ $item['tongtien'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
