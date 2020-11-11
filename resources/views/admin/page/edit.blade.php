@extends('admin.layouts.main')
@section('content')

<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.page.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.page.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Sửa</a> </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form role="form" action="{{route('admin.page.update', ['id' => $page->id ])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu Đề</label>
                        <input value="{{$page->title}}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên">
                        @error('title')
                        <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Url(Liên kết tùy chỉnh)</label>
                        <input value="{{$page->slug}}" type="text" class="form-control" id="slug" name="slug" placeholder="Nhập liên kết tùy chỉnh">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea   id="editor1" name="description" class="form-control" rows="10" >{{$page->description}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-switch mb-2">
                            <input  type="checkbox" class="custom-control-input" id="customSwitch1" {{ ($page->is_active) ? 'checked':'' }}  value="1"  name="is_active">
                            <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                        </div>
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
