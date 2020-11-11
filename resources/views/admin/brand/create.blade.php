@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.brand.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.brand.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Thêm mới nhãn hiệu </a> </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            <form role="form" action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Nhập tên">
                        @error('name')
                        <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh</label><br>
                        <input type="file" id="image" name="image">
                        @error('image')
                        <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control" id="website" value="{{old('website')}}" name="website" placeholder="Url">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vị trí</label>
                        <input type="number" class="form-control" id="position" name="position" >
                        @error('position')
                        <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-switch mb-2">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active" checked="">
                            <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Tạo</button>
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
    @endsection
