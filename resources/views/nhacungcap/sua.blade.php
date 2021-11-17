@extends('layouts.admin')

@section('title', 'Sửa nhà cung cấp')

@section('content')
  <h1>Sửa nhà cung cấp</h1>

  <form action="/admin/nhacungcap/{{ $supplier->id }}/sua" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Tên</label>
      <input type="text" class="form-control" placeholder="Nhập tên" name="name" required value="{{ $supplier->name }}">
    </div>
    <div class="form-group">
      <label>Địa chỉ</label>
      <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" required value="{{ $supplier->address }}">
    </div>
    <div class="form-group">
      <label>Số điện thoại</label>
      <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" required value="{{ $supplier->phone }}">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" placeholder="Nhập email" name="email" required value="{{ $supplier->email }}">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
@endsection