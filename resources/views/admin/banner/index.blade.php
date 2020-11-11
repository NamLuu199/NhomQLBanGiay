@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.banner.create')}}">Thêm mới</a>
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
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Target</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($item->image)}}" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{ ($item->target == 1) ? '_blank' : '_self' }}</td>
                                <td>{{ ($item->type == 1) ? 'slide' : 'background' }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="{{route('admin.banner.show', ['id'=> $item->id ])}}">Xem</a>
                                    <a class="btn btn-primary" href="{{route('admin.banner.edit', ['id'=> $item->id ])}}">Sửa</a>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'banner')">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin">
                        {{ $data->links() }}
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.row -->
@endsection
