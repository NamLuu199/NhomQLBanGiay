@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Chi Tiết Banner <a href="{{route('admin.banner.index')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách Banner</a>
    </h1>
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
                                    <td><img src="{{ asset($data->image) }}" width="250"></td>
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
                                    <td>{{ ($data->is_active == 1) ? 'Hiện thị' : 'Ẩn'  }}</td>
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
