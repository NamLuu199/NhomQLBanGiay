@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.user.create')}}">Thêm mới</a>
                                </div>
                                <h4 class="mb-1 mt-0">Danh sách</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Tên</th>
                                                        <th>Avatar</th>
                                                        <th>Email</th>
                                                        <th>Quyền</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Vị trí</th>
                                                        <th class="text-center">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@foreach($data as $key => $item)
                                                    <tr class="item-{{$item->id}}">
                                                        <td>{{$item->name}}</td>
                                                        <td>
                                                            @if ($item->avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                                                <img src="{{asset($item->avatar)}}" width="50" height="50">
                                                            @endif
                                                        </td>
                                                        <td>{{$item->email}}</td>
                                                        @if($item->role_id == 1)
                                                        <td>Quản trị viên</td>
                                                        @elseif($item->role_id == 2)
                                                        <td>Cộng tác viên</td>
                                                        @else
                                                        <td>Chưa phân quyền</td>
                                                        @endif
                                                        <td>{{$item->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                                        <td>{{$item->position}}</td>
                                                        <td>
                                                            
                                                            <a class="btn btn-primary" href="{{route('admin.user.edit', ['id'=> $item->id ])}}">Sửa</a>
                                                            <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'user')">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
