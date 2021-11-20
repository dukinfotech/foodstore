@extends('layouts.admin')

@section('title', 'Danh sách quảng cáo')

@section('content')
  <h1>Danh sách quảng cáo</h1>
  <table class="table">
    <thead>
      <td>#</td>
      <td>Vị trí</td>
      <td>Ảnh</td>
    </thead>
    <tbody>
      @foreach ($ads as $index => $qc)
      <tr>
        <td>{{ $index + 1}}</td>
        <td>{{ $qc->name }}</td>
        <td><img src="/{{ $qc->image }}" alt="" height="50"></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <form action="/admin/quangcao" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
            <label>Quảng cáo đầu trang chủ</label>
            <input type="hidden" class="form-control" value="top-ads" name="name">
        </div>
        <div class="form-group">
            <label>Ảnh <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" required id="selectImage" accept="image/png, image/gif, image/jpeg">
        </div>
        <div>
            <img id="image" height="100" class="d-none">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
  </form>
@endsection