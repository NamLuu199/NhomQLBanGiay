@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.user.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.user.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Sửa thông tin user</a> </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            <form role="form" action="{{route('admin.user.update', ['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label>Chọn Quyền</label>
                        <select class="form-control" name="role_id">
                            <option value="1" {{ ($user->role_id == 1) ? 'selected' : '' }}>Manager</option>
                            <option value="2" {{ ($user->role_id == 2) ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ Tên</label>
                        <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập họ & tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{ $user->email }}" type="text" class="form-control" id="email" name="email" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" > Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile" > Thay đổi ảnh đại diện</label> <br>
                        <input type="file" id="new_avatar" name="new_avatar">
                        <br>
                        <img src="{{ asset($user->avatar) }}" width="250">
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox form-check">
                                <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active"  {{ ($user->is_active == 1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="invalidCheck">Kích hoạt </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.row -->
    </section>
    @endsection
