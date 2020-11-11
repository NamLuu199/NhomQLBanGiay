@extends('admin.layouts.main')
@section('content')
@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.user.index')}}">Danh sách</a>
        </div>
        <span><b> <a class="text-dark" href="{{route('admin.user.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi tiết user</a> </b></span>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table m-0">
                        <tbody>
                            <tr>
                                <td><b>Tên danh mục:</b></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td>
                                    @if ($user->avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($user->avatar)}}" width="50" height="50">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Danh mục cha:</b></td>
                                <td>{{ $user->parent['name'] ? $user->parent['name'] : '(trống)' }}</td>
                            </tr>
                            <tr>
                               <td><b>Vị trí:</b></td>
                               <td>{{ $user->position }}</td>
                           </tr>
                           <tr>
                               <td><b>Trạng thái</b></td>
                               <td>{{ $user->is_active ? 'Hiện' : 'Ẩn' }}</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>

   </div>
</div>
@endsection
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
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td>
                                    @if ($user->avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($user->avatar)}}" width="50" height="50">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Danh mục cha:</b></td>
                                <td>{{ $user->parent['name'] ? $user->parent['name'] : '(trống)' }}</td>
                            </tr>
                            <tr>
                               <td><b>Vị trí:</b></td>
                               <td>{{ $user->position }}</td>
                           </tr>
                           <tr>
                               <td><b>Trạng thái</b></td>
                               <td>{{ $user->is_active ? 'Hiện' : 'Ẩn' }}</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>

   </div>
</div>
@endsection
