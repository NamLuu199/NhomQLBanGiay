@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới nhà cung cấp <a href="{{route('admin.vendor.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.vendor.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Tên Nhà Cung Cấp</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" >
                    </div>
                    <div class="form-group">
                        <label for="email">Nhập Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện Thoại</label>
                        <input type="number" class="form-control" id="phone" name="phone" >
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label><br>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" >
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ</label><br>
                       <textarea name="address" id="address" cols="50" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí</label>
                        <input type="number" class="form-control" id="position" name="position" >
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox form-check">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
                            <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                        </div>
                    </div>
                <button class="btn btn-primary" type="submit">Tạo</button>
            </form>

        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_javascript')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
