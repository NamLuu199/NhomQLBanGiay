@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.banner.index')}}">Danh sách</a>
                                </div>
                                <span><b> <a class="text-dark" href="{{route('admin.product.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi Tiết Banner</a></b></span>

                            </div>
</div>
                <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Tên banner</b></td>
                                                        <td>{{ $data->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Hình ảnh:</b></td>
                                                        <td><img src="{{ asset($data->image) }}" width="250"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Url:</b></td>
                                                        <td>{{ $data->url ? $data->url : 'trống' }}</td>
                                                    </tr>
                                                      <tr>
                                                         <td><b>Vị trí:</b></td>
                                                         <td>{{ $data->position }}</td>
                                                      </tr>
                                                     <tr>
                                                         <td><b>Trạng thái</b></td>
                                                         <td>{{ $data->is_active  ? 'Hiển Thị' : 'Ẩn' }}</td>
                                                     </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
