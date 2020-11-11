@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.user.index')}}">Danh sách</a>
        </div>
        <span><b> <a class="text-dark" href="{{route('admin.user.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Thêm mới Usẻ</a> </b></span>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mt-0">Thêm mới User</h4>
            <form class="form-horizontal" form role="form" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                 <div class="col">
                    <div class="form-group row">
                        <select class="custom-select mb-2" name="role_id">
                            <option selected="" value="0">Lựa chọn quyền</option>
                            <option value="1">Quản trị viên</option>
                            <option value="2">Cộng tác viên</option>
                        </select>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label"  for="simpleinput">Tên</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{old('name')}}" id="simpleinput" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label"  for="simpleinput">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{old('email')}}" id="simpleinput" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="simpleinput">Password</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="simpleinput" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-fileinput">Ảnh</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="example-fileinput" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Vị trí</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="position">
                        </div>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1">
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
