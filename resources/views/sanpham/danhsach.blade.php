@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
  <h1>Danh sách sản phẩm</h1>
  <a href="/admin/sanpham/tao" class="btn btn-success">Tạo</a>
  <table class="table">
    <thead>
      <td>#</td>
      <td>Tên</td>
      <td>Nhà cung cấp</td>
      <td>Số lượng</td>
      <td>Loại Hàng</td>
      <td>Ảnh</td>
      <td>Đơn giá</td>
    </thead>
    <tbody>
      @foreach ($products as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td> 
        <td>{{ $p->supplier->name }}</td>
        <td>{{ $p->quantity }}</td>
        <td>{{ $p->unit }}</td>
        <td><img src="/{{ $p->image }}" alt="" height="50"></td>
        <td>{{ $p->price }}</td>
        <td>
          <a href="/admin/sanpham/{{ $p->id }}/sua" class="btn btn-primary">Sửa</a>
          <form action="/admin/sanpham/{{ $p->id }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xóa</button>  
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection