@extends('layouts.admin')

@section('title', 'Danh sách đơn hàng')

@section('content')
  <h1>Danh sách đơn hàng</h1>
  <table class="table">
    <thead>
      <td>#</td>
      <td>Tên người mua</td>
      <td>Địa chỉ</td>
      <td>Số điện thoại</td>
      <td>Tổng giá trị đơn hàng</td>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->price_total }} đồng</td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection