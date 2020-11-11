
@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h4>
            Thông tin cấu hình website
        </h4>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.setting.update', ['id' => $setting->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Doanh Nghiệp</label>
                                <input value="{{ $setting->company }}" type="text" class="form-control" id="company"
                                       name="company" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Header</label><br>
                                <input type="file" id="new_image" name="new_image"><br>
                                @if ($setting->image)
                                    <img src="{{asset($setting->image)}}" width="200">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Footer</label><br>
                                <input type="file" id="new_image_footer" name="new_image_footer"><br>
                                @if ($setting->image2)
                                    <img src="{{asset($setting->image2)}}" width="200">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ 1</label>
                                <input value="{{ $setting->address }}" type="text" class="form-control" id="address"
                                       name="address" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ 2</label>
                                <input value="{{ $setting->address2 }}" type="text" class="form-control" id="address2"
                                       name="address2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SĐT</label>
                                <input value="{{ $setting->phone }}" type="text" class="form-control" id="phone"
                                       name="phone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hotline</label>
                                <input value="{{ $setting->hotline }}" type="text" class="form-control" id="hotline"
                                       name="hotline" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">MST</label>
                                <input value="{{ $setting->tax }}" type="text" class="form-control" id="tax"
                                       name="tax" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input value="{{ $setting->facebook }}" type="text" class="form-control" id="facebook"
                                       name="facebook" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input value="{{ $setting->email }}" type="text" class="form-control" id="email"
                                       name="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link bài viết giới thiệu</label>
                                <input value="{{ $setting->introduce }}" type="text" class="form-control" id="introduce"
                                       name="introduce" placeholder="">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection