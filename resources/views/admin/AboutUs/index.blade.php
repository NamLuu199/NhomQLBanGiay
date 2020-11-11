@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.AboutUs.create')}}">Thêm mới</a>
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
                                <th>Text-Icon</th>
                                <th>Vị trí</th>
                                <th>Nội Dung</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ $item->title }}</td>
                                <td>
                                    {{$item->icon}}
                                </td>
                                <td>{{ $item->position }}</td>
                                <td>{!! $item->description !!}</td>

                                <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td class="text-center">

                                    <a class="btn btn-primary" href="{{route('admin.AboutUs.edit', ['id'=> $item->id ])}}">Sửa</a>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'AboutUs')">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin">
                        {{ $data->links() }} {{-- nút bấm phân trang --}}
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.row -->
@endsection
