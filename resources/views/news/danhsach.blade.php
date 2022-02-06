@extends('layouts.admin')

@section('title', 'Danh sách bài đăng')

@section('content')

<h1>Danh sách bài đăng</h1>
  <a href="/admin/news/tao" class="btn btn-success">Tạo</a>
  <table class="table">
    <thead>
      <td>#</td>
      <td>Tên bài viết</td>
      <td>Ảnh</td>
      <td>Bài viết</td>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $post>id }}</td>
        <td>{{ $post>title }}</td>
        <td><img src="/{{ $post>image }}" alt="" height="50"></td>
        <td>
          <a href="/admin/news/{{ $post>id }}/sua" class="btn btn-primary">Sửa</a>
          <form action="/admin/news/{{ $post>id }}" method="post" class="d-inline">
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