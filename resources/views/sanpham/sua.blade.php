@extends('layouts.admin')

@section('title', 'Sửa sản phẩm')

@section('content')
  <h1>Sửa sản phẩm</h1>

  <form action="/admin/sanpham/{{ $product->id }}/sua" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Tên <span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Nhập tên" name="name" required value="{{ $product->name }}">
    </div>
    <div class="form-group">
      <label>Nhà cung cấp <span class="text-danger">*</span></label>
      <select name="supplier_id" class="form-control">
        @foreach ($suppliers as $s)
          <option value="{{ $s->id }}" {{ $product->supplier_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Số lượng <span class="text-danger">*</span></label>
      <input type="number" min="0" class="form-control" placeholder="Nhập số lượng" name="quantity" required value="{{ $product->quantity }}">
    </div>
    <div class="form-group">
      <label>Đơn vị <span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Nhập đơn vị" name="unit" required value="{{ $product->unit }}">
    </div>
    <div class="form-group">
      <label>Ảnh</label>
      <input type="file" class="form-control" name="image" id="selectImage" accept="image/png, image/gif, image/jpeg">
    </div>
    <div>
        <img id="image" height="100" src="/{{ $product->image }}">
    </div>
    <div class="form-group">
      <label>Giá <span class="text-danger">*</span></label>
      <input type="number" min="100" class="form-control" placeholder="Nhập giá" name="price" required value="{{ $product->price }}">
    </div>
    <div class="form-group">
      <label>Mô tả <span class="text-danger">*</span></label>
      <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Nhập mô tả" required>{{ $product->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
@endsection

<script>
</script>