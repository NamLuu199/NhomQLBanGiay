@extends('admin.layouts.main')
@section('content')
<section class="content-header">
  <div class="row page-title">
    <div class="col-md-12">
      <div aria-label="breadcrumb" class="float-right mt-1">
        <a class="btn btn-primary" href="{{route('admin.vendor.index')}}">Danh sách</a>
      </div>
      <span><b> <a class="text-dark" href="{{route('admin.vendor.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi tiết nhà cung cấp</a> </b></span>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table m-0">
              <tbody>
                <tr>
                  <td><b>Tên thương hiệu:</b></td>
                  <td>{{ $data->name }}</td>
                </tr>
                <tr>
                  <td><b>email:</b></td>
                  <td>{{ $data->email }}</td>
                </tr>
                <tr>
                  <td><b>Số điện thoại:</b></td>
                  <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                  <td><b>Hình ảnh:</b></td>
                  <td><img src="{{ asset($data->image) }}" width="250"></td>
                </tr>
                <tr>
                  <td><b>Website:</b></td>
                  <td>{{ $data->website }}</td>
                </tr>
                <tr>
                  <td><b>Địa chỉ:</b></td>
                  <td>{{ $data->address }}</td>
                </tr>
                <tr>
                  <td><b>Vị trí:</b></td>
                  <td>{{ $data->position }}</td>
                </tr>
                <tr>
                  <td><b>Trạng thái</b></td>
                  <td>{{ ($data->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div>
</section>
@endsection
