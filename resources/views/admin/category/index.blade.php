@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.category.create')}}">Thêm mới</a>
        </div>
        <h4 class="mb-1 mt-0">Danh sách danh mục</h4>
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
                                <th>STT</th>
                                <th style="background: #fad785;">Cấp 1</th>
                                <th style="background:#FFE3A1">Cấp 2</th>
                                <th>Trạng Thái</th>
                                <th>Vị trí</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $key => $item)
                            <tr class="item-{{$item->id}}">
                                <td>{{++$key}}</td>
                                <td colspan="2" style="    background: #fad785;">{{$item->name}}</td>
                                <td>{{$item->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                <td>{{$item->position}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="mr-1 btn btn-success" href="{{route('admin.category.show', ['id'=> $item->id ])}}">Xem</a>
                                        <a class="btn mr-1 btn-primary" href="{{route('admin.category.edit', ['id'=> $item->id ])}}">Sửa</a>
                                        <form method="POST" action="{{ route('admin.category.destroy', ['item' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @if(count($item->subcategory))
                            @foreach($item->subcategory as $subcategory)
                            <tr class="item-{{$subcategory->id}}">
                                <td>{{++$key}}</td>
                                <td></td>
                                <td style="background:#FFE3A1">
                                   {{$subcategory->name}}</td>
                                   <td>{{$subcategory->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                   <td>{{$subcategory->position}}</td>
                                   <td>
                                    <div class="d-flex">
                                        <a class="mr-1 btn btn-success" href="{{route('admin.category.show', ['id'=> $subcategory->id ])}}">Xem</a>
                                        <a class="btn mr-1 btn-primary" href="{{route('admin.category.edit', ['id'=> $subcategory->id ])}}">Sửa</a>
                                        <form method="POST" action="{{ route('admin.category.destroy', ['item' => $subcategory->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
