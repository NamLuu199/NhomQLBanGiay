@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.product.index')}}">Danh sách</a>
            </div>
            <span><b><a class="text-dark" href="{{route('admin.product.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Thêm mới sản phẩm</a></b></span>

        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            <form role="form" action="{{route('admin.product.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Nhập tên ">
                    @error('name')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <label for="name">Hình Sản Phẩm</label>
                <div class="form-group mb-3">
                      <input type="file" name="image" class="form-control">
                </div>
                @error('image')
                <label class="text-danger">{{ $message }}</label>
                @enderror
                <label for="name">Hình Ảnh Phụ</label>
                <div class="form-group mb-3">
                    <div class="input-group control-group increment" >
                      <input type="file" name="filename[]" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-success ml-2" type="button"><i class="glyphicon glyphicon-plus"></i>Thêm</button>
                    </div>
                </div>
                @error('filename')
                <label class="text-danger">{{ $message }}</label>
                @enderror
                <div class="clone d-none">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn">
                      <button class="btn btn-danger ml-2" type="button"><i class="glyphicon glyphicon-remove"></i> Xóa</button>
                  </div>
                </div>

          </div>
      </div>
      <div class="form-group mb-3">
        <label for="stock">Số lượng</label>
        <input type="number" class="form-control" id="stock" value="{{old('stock')}}" name="stock" placeholder="Nhập số lượng ">
        @error('stock')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="price">Giá Gốc (vnđ)</label>
        <input type="number" class="form-control" id="price" value="{{old('price')}}" name="price" placeholder="Nhập giá gốc    ">
        @error('price')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="sale">Giá Khuyến Mãi(vnđ)</label>
        <input type="number" class="form-control" id="sale" value="{{old('sale')}}" name="sale" placeholder="Nhập giá khuyến mãi ">
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục Sản Phẩm</label>
        <select class="form-control" name="category_id">
            <option value="0">-- chọn --</option>
            @foreach($categories as $category)
            <option  value="{{ $category -> id }}">{{ $category -> name }}</option>
            @if(count($category->subcategory))
            @foreach($category->subcategory as $subcategory)
             <option  value="{{ $subcategory->id }}">--{{ $subcategory->name }}</option>
            @endforeach
            @endif
            @endforeach
        </select>
        @error('category_id')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label>Thương Hiệu</label>
        <select class="form-control" name="brand_id">
            <option value="0">-- chọn --</option>
            @foreach($brands as $brand)
            <option value="{{ $brand -> id }}">{{ $brand -> name }}</option>
            @endforeach
        </select>
        @error('brand_id')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label>Nhà Cung Cấp</label>
        <select class="form-control" name="vendor_id">
            <option value="0">-- chọn --</option>
            @foreach($vendors as $vendor)
            <option value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
            @endforeach
        </select>
        @error('vendor_id')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="sku">Mã Hàng(SKU)</label>
        <input type="text" class="form-control" id="sku" name="sku" placeholder="Nhập mã hàng ">
    </div>
    <div class="form-group mb-3">
        <label for="position">Vị Trí</label>
        <input type="text" value="{{++$position}}" class="form-control" id="position" name="position" placeholder="Nhập vị trí ">
        @error('position')
        <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox form-check">
            <input  type="checkbox" class="custom-control-input" id="Check" value="1" name="is_hot">
            <label class="custom-control-label ml-3" for="Check"> Sản phẩm Hot</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <div class="custom-control custom-switch mb-2 pl-5">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="is_active" checked="">
            <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
        </div>
    </div>
    <div class="form-group">
        <label for="url">Liên kết (url) tùy chỉnh</label>
        <input type="text" class="form-control" id="url" value="{{old('url')}}" name="url" placeholder="">
    </div>
    <div class="form-group">
        <label for="summary">Tóm tắt</label>
        <textarea value="" id="editor2" name="summary" value="{{old('summary')}}" class="form-control" rows="10" ></textarea>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea value="" id="editor1" name="description" value="{{old('description')}}" class="form-control" rows="10" ></textarea>
    </div>
    <div class="form-group">
        <label for="meta_title">Meta Title</label>
        <input type="text" class="form-control" id="meta_title" value="{{old('meta_title')}}" name="meta_title" >
    </div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea name="meta_description" value="{{old('meta_description')}}" class="form-control" rows="3" ></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Tạo</button>
</form>
</div>

</div>
</section>
@endsection
@section('my_javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });
        $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });
    });
    $(document).ready(function() {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1',{
                filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('backend/assets/js/pages/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('backend/assets/js/pages/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('backend/assets/js/pages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('backend/assets/js/pages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('backend/assets/js/pages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
                extraPlugins: 'image2'
            });
            _ckeditor.config.height = 200; // thiết lập chiều cao
        });
    </script>
    @endsection

