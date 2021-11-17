<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height:100vh;transform:translateY(-100px);">
        <form id="loginForm" action="/dangnhap" method="POST">
            @csrf
            <h3>Đăng nhập</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email" required value="admin@foodstore.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" required value="12345678">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <a href="/">Trang chủ</a>
            </div>
        </form>
    </div>
</body>
</html>