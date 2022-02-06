@extends('layouts.admin')

@section('title', 'Tạo bài viết')

@section('content')
  <h1>Tạo bài viết</h1>

  <form action="/admin/news/tao" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Tên bài viết</label>
      <input type="text" class="form-control" placeholder="Nhập tên bài viết" name="title" required>
    </div>
    <div class="form-group">
      <label>Ảnh <span class="text-danger">*</span></label>
      <input type="file" class="form-control" name="image" required id="selectImage" accept="image/png, image/gif, image/jpeg">
    </div>
    <div>
        <img id="image" height="100" class="d-none">
    </div>
    <div class="form-group">
      <label>Bài Đăng</label>
      <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Nhập mô tả" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
  </form>
@endsection