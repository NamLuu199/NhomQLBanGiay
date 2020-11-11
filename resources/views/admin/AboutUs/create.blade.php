@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.AboutUs.index')}}">Danh sách</a>
        </div>
        <span><b><a class="text-dark" href="{{route('admin.AboutUs.index')}}">Danh sách</a> / <a class="text-dark"
            href="javascript:void(0)"> Thêm mới </a> </b></span>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Thêm mới </h4>
                    <form class="form-horizontal" form role="form" action="{{route('admin.AboutUs.store')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="simpleinput">Tên tiêu đề</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="simpleinput" name="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="example-fileinput">Text Icon( Nhập text class thẻ i )</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="simpleinput" name="icon">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-lg-12">
                                    <a class="btn btn-danger" href="{{route('admin.listicon')}}"> Danh sách text icon</a>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-lg-12 col-form-label">Mô tả</label>
                                <div class="col-lg-12">
                                    <textarea id="editor1" name="description" class="form-control" rows="10"
                                    placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Vị trí</label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control" name="position">
                                </div>
                            </div>
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="is_active"
                                value="1">
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
    $(document).ready(function () {
        // setup textarea sử dụng plugin CKeditor
        var _ckeditor = CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('backend / assets / js / pages / ckfinder / ckfinder.html ? type = Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('backend / assets / js / pages / ckfinder / ckfinder.html ? type = Flash') }}',
            filebrowserUploadUrl: '{{ asset('backend / assets / js / pages / ckfinder / core / connector / php / connector.php ? command = QuickUpload & type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('backend / assets / js / pages / ckfinder / core / connector / php / connector.php ? command = QuickUpload & type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('backend / assets / js / pages / ckfinder / core / connector / php / connector.php ? command = QuickUpload & type=Flash') }}',
            extraPlugins: 'image2'
        });
    _ckeditor.config.height = 200; // thiết lập chiều cao
});
</script>
@endsection