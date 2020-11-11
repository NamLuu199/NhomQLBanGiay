@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.category.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Chi tiết danh mục</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-1">Category</h4>

                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Tên danh mục:</b></td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Danh mục cha:</b></td>
                                                        <td>{{ !empty($data->parent->name) ? $data->parent->name : '(trống)' }}</td>
                                                    </tr>
                                                      <tr>
                                                         <td><b>Vị trí:</b></td>
                                                         <td>{{ $data->position }}</td>
                                                      </tr>
                                                     <tr>
                                                         <td><b>Trạng thái</b></td>
                                                         <td>{{ $data->is_active  ? 'Hiển Thị' : 'Ẩn'}}</td>
                                                     </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
