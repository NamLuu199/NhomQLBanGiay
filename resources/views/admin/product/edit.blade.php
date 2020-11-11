@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.product.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.product.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Sửa thông tin sản phẩm</a> </b></span>
        </div>
</section>

<section class="content">
        <div class="card">
            <div class="card-body">

                <form role="form" action="{{route('admin.product.update', ['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" value="{{ $product->name }}">
                        @error('name')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-3">
                                @if ($product->image)
                                <img src="{{asset($product->image)}}" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    @foreach($multi as $image)
                                    <div class="col-3 item-{{$image->id}}">
                                        <div class="test" style="position: relative;">
                                            <img src="{{asset($image->filename)}}" class="img-fluid">
                                            <a href="javascript:void(0)"
                                            onclick="delete_image({{$image->id}},'imageUpload')"
                                            style="position: absolute;
                                            right: 8px;top: 3px;">X</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <label for="exampleInputFile">Thay đổi ảnh chính</label>
                    <div class="form-group mb-3">
                        <input type="file" name="new_image" class="form-control">
                    </div>
                    @error('new_image')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                    <label for="exampleInputFile">Thêm ảnh phụ</label>
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
                        <input value="{{ $product->stock }}" type="number" class="form-control" id="stock" name="stock" placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Gốc(vnđ)</label>
                        <input value="{{ $product->price }}" type="number" class="form-control" id="price" name="price" placeholder="Giá Gốc">
                        @error('price')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="sale">Giá Khuyến Mãi(vnđ)</label>
                        <input value="{{ $product->sale }}" type="number" class="form-control" id="sale" name="sale" placeholder="Giá KM">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục Sản Phẩm</label>
                        <select class="form-control" name="category_id">
                            <option value="0">-- chọn --</option>
                            @foreach($categories as $category)
                            <option {{ ($product->category_id == $category->id ? 'selected':'') }} value="{{ $category -> id }}">{{ $category -> name }}</option>
                             @if(count($category->subcategory))
                             @foreach($category->subcategory as $subcategory)
                              <option {{ ($product->category_id == $subcategory->id ? 'selected':'') }} value="{{ $subcategory -> id }}">--{{ $subcategory -> name }}</option>
                             @endforeach
                             @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương Hiệu</label>
                        <select class="form-control" name="brand_id">
                            <option value="0">-- chọn --</option>
                            @foreach($brands as $brand)
                            <option {{ ($product->brand_id == $brand->id ? 'selected':'') }} value="{{ $brand -> id }}">{{ $brand -> name }}</option>
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
                            <option {{ ($product->vendor_id == $vendor->id ? 'selected':'') }} value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
                            @endforeach
                        </select>
                        @error('vendor_id')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="sku">Mã hàng (SKU)</label>
                        <input value="{{ $product->sku }}" type="text" class="form-control w-50" id="sku" name="sku" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí</label>
                        <input value="{{ $product->position }}" type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                    </div>
                    @error('new_image')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <div class="custom-control custom-switch mb-2 pl-5">
                                <input {{ ($product->is_active) ? 'checked':'' }} type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="is_active">
                                <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox form-check">
                            <input {{ ($product->is_hot) ? 'checked':'' }}  type="checkbox" class="custom-control-input" id="Check" value="1" name="is_hot">
                            <label class="custom-control-label" for="Check">Sản phẩm Hot</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url">Liên kết (url) tùy chỉnh</label>
                        <input value="{{ $product->url }}" type="text" class="form-control" id="url" name="url" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="summary">Tóm tắt</label>
                        <textarea value="" id="editor2" name="summary" class="form-control" rows="10" >{{ $product->summary }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea value="" id="editor1" name="description" class="form-control" rows="10" >{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input value="{{ $product->meta_title }}" type="text" class="form-control" id="meta_title" name="meta_title" >
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" >{{ $product->meta_description }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Lưu</button>

                </form>

            </div>
        </div>
        <!-- /.row -->
    </section>
    @endsection
    @section('my_javascript')
    <script type="text/javascript">
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
    </script>
    @endsection
