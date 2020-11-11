@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.banner.index')}}">Danh sách</a>
        </div>
        <span><b><a class="text-dark" href="{{route('admin.banner.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Thêm mới Banner</a> </b></span>

    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Thêm mới Banner</h4>
                <form class="form-horizontal" form role="form" action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       <div class="col">
                           <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="simpleinput">Tên</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="simpleinput" value="{{old('title')}}"  name="title">
                            </div>
                            @error('title')
                            <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="example-fileinput">Ảnh</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" id="example-fileinput" name="image">
                            </div>
                            @error('image')
                            <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="example-fileinput">Url</label>
                            <div class="col-lg-10">
                             <input type="text" class="form-control" value="{{old('url')}}"  id="simpleinput" name="url">
                         </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-fileinput">Target</label>
                        <select class="custom-select mb-2" name="Target">
                            <option selected="" value="0">_self</option>
                            <option value="1">_blank</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-fileinput">Loại</label>
                        <select class="form-control" name="type">
                            <option value="1">Slide</option>
                            <option value="2">Banner Static</option>
                        </select>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-12 col-form-label">Mô tả</label>
                        <div class="col-lg-12">
                            <textarea id="editor1" value="{{old('description')}}"  name="description" class="form-control" rows="10" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Vị trí</label>
                        <div class="col-lg-10">
                            <input type="number" value="{{++$position}}" class="form-control" name="position">
                        </div>
                        @error('position')
                            <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1" checked="">
                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>

    </div> <!-- end card-body -->
</div> <!-- end card-->
</div><!-- end col -->
</div>
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
