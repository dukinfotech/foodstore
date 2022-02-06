@extends('layouts.homepage')

@section('title', 'home')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="font-weight: 700;">TUBEP.TEST</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href=""><span class="sr-only">(current)</span><i class="fas fa-home">HOME</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" ><i class="fas fa-info">NEWS</i></a>
      </li>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-cart-plus">CART{{ count($giohang) }}</i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2" style="width: 400px;">
          @foreach($giohang as $g)
          <li class="mt-2">
            <img src="{{ $g->image }}" alt="" height="30" width="30">{{ $g->name }} x{{ $g->soluong }} 
            <a href="/sanpham/{{ $g->id }}/giamsoluong" class="btn btn-warning d-inline">-</a>
            <a href="/sanpham/{{ $g->id }}/xoagiohang" class="btn btn-danger d-inline">Delete</a>
            @endforeach
            @if(count($giohang) > 0) 
              <a href="/dathang" class="btn btn-primary">Buy</a>
            @endif
          </li>
        </ul>
      </div>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="GET" action="/">
      <input class="form-control mr-sm-2" placeholder="Nhập tên sản phẩm" name="q">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="text-center mt-3">
  @php
    $dacotopads = false;
  @endphp
  @foreach ($ads as $qc)
    @if ($qc->name == 'top-ads')
      @php
        $dacotopads = true;
      @endphp
      <img src="/{{ $qc->image }}" alt="Quảng cáo">
    @endif
  @endforeach
  @if (! $dacotopads)
    <img src="{{ asset('img/ads-placeholder.jpg') }}" alt="Quảng cáo">
  @endif
</div>
<section class="container">
    @if($search)
      <h5>Kết quả tìm kiếm: {{ count($products) }}</h5>
    @endif
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mt-5">
            <div class="card">
                <img class="card-img-top" height="200" src="{{ $product->image }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-bold">{{ $product->name }}</h4>
                    <div class="card-text text-danger">Giá: {{ $product->price }} VNĐ</div>
                    <div class="card-text">Loại hàng: {{ $product->unit }}</div>
                    <div class="card-text">Mô tả: {{ $product->description }}</div>
                    <a href="/sanpham/{{ $product->id }}/themvaogiohang" class="btn btn-primary">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection