@extends('layouts.admin')

@section('title', 'Danh sách nhà cung cấp')

@section('content')
  <h1>Danh sách nhà cung cấp</h1>
  <a href="/admin/nhacungcap/tao" class="btn btn-success">Tạo</a>
  <table class="table">
    <thead>
      <td>#</td>
      <td>Tên</td>
      <td>Địa chỉ</td>
      <td>Số điện thoại</td>
      <td>Email</td>
    </thead>
    <tbody>
      @foreach ($suppliers as $s)
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->address }}</td>
        <td>{{ $s->phone }}</td>
        <td>{{ $s->email }}</td>
        <td>
          <a href="/admin/nhacungcap/{{ $s->id }}/sua" class="btn btn-primary">Sửa</a>
          <form action="/admin/nhacungcap/{{ $s->id }}" method="post" class="d-inline">
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