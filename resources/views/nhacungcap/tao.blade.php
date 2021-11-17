@extends('layouts.admin')

@section('title', 'Tạo nhà cung cấp')

@section('content')
  <h1>Tạo nhà cung cấp</h1>

  <form action="/admin/nhacungcap/tao" method="POST">
    @csrf
    <div class="form-group">
      <label>Tên</label>
      <input type="text" class="form-control" placeholder="Nhập tên" name="name" required>
    </div>
    <div class="form-group">
      <label>Địa chỉ</label>
      <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" required>
    </div>
    <div class="form-group">
      <label>Số điện thoại</label>
      <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" placeholder="Nhập email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
  </form>
@endsection