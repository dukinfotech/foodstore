@extends('layouts.admin')

@section('title', 'Tạo sản phẩm')

@section('content')
  <h1>Tạo sản phẩm</h1>

  <form action="/admin/sanpham/tao" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Tên <span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Nhập tên" name="name" required>
    </div>
    <div class="form-group">
      <label>Nhà cung cấp <span class="text-danger">*</span></label>
      <select name="supplier_id" class="form-control">
        @foreach ($suppliers as $s)
          <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Số lượng <span class="text-danger">*</span></label>
      <input type="number" min="0" class="form-control" placeholder="Nhập số lượng" name="quantity" required>
    </div>
    <div class="form-group">
      <label>Loại hàng <span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Nhập đơn vị" name="unit" required>
    </div>
    <div class="form-group">
      <label>Ảnh <span class="text-danger">*</span></label>
      <input type="file" class="form-control" name="image" required id="selectImage" accept="image/png, image/gif, image/jpeg">
    </div>
    <div>
        <img id="image" height="100" >
    </div>
    <div class="form-group">
      <label>Giá <span class="text-danger">*</span></label>
      <input type="number" min="100" class="form-control" placeholder="Nhập giá" name="price" required>
    </div>
    <div class="form-group">
      <label>Mô tả <span class="text-danger">*</span></label>
      <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Nhập mô tả" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
  </form>
@endsection

<script>
</script>