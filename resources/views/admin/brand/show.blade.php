@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.brand.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.brand.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi tiết nhãn hiệu</a> </b></span>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
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
                                    <td><b>Hình ảnh:</b></td>
                                    <td>
                                        @if ($data->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                        <img src="{{asset($data->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Website:</b></td>
                                    <td>{{ $data->website }}</td>
                                </tr>
                                <tr>
                                    <td><b>Vị trí:</b></td>
                                    <td>{{ $data->position }}</td>
                                </tr>
                                <tr>
                                    <td><b>Trạng thái</b></td>
                                    <td>{{ ($data->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
                                </tr>


                            </tbody></table>
                        </div>
                    </div>
                    <!-- /.box -->


                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        @endsection
