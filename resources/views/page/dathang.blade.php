@extends('layouts.homepage')

@section('title', 'home')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">FOODSTORE</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href=""><span class="sr-only">(current)</span><i class="fas fa-home">home</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black;"><i class="fas fa-info">Thông Tin</i></a>
      </li>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-cart-plus">Giỏ hàng {{ count($giohang) }}</i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2" style="width: 250px;">
          @foreach($giohang as $g)
          <li class="mt-2">
            <img src="{{ $g->image }}" alt="" height="30" width="30">{{ $g->name }} x{{ $g->soluong }} 
            <a href="/sanpham/{{ $g->id }}/xoagiohang" class="btn btn-danger d-inline">xóa</a>
            <a href="/sanpham/{{ $g->id }}/giamsoluong" class="btn btn-warning d-inline">-</a>
          </li>
          @endforeach
          @if(count($giohang) > 0)
          <li>
            <a href="/dathang" class="btn btn-primary mt-2">Đặt hàng</a>
          </li>
          @endif
        </ul>
      </div>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<section class="container mt-5" >
    <table class="table">
        <thead>
            <td>#</td>
            <td>Tên sẩn phẩm</td>
            <td>Nhà cung cấp</td>
            <td>Số lượng</td>
            <td>Đơn giá</td>
            <td>Thành tiền</td>
        </thead>
        <tbody>
          @php
            $price_total = 0;
          @endphp
            @foreach ($giohang as $index => $sanpham)
              @php
                $price_total += $sanpham->thanhtien;
              @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sanpham->name }}</td>
                    <td>{{ $sanpham->supplier->name }}</td>
                    <td>{{ $sanpham->soluong }}</td>
                    <td>{{ $sanpham->price }}</td>
                    <td>{{ $sanpham->thanhtien }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Thành tiền: <span class="text-danger">{{ $price_total }} đồng</span></h3>
    
    <form style="margin-top:100px" method="POST" action="/muahang">
        @csrf
        <input type="hidden" name="price_total" value="{{ $price_total }}">
        <div class="form-group">
            <label>Tên người mua</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" required>
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" required>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
        </div>
        <button type="submit" class="btn btn-primary">Mua hàng</button>
    </form>
</section>
@endsection