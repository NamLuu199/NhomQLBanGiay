
@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.product.create')}}">Thêm mới</a>
        </div>
        <h4 class="mb-1 mt-0">Danh sách</h4>
    </div>
    <div class="col-md-12">
        <form role="form" action="{{url('admin/searchProduct')}}" method="get"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-5">
                    <div style="position: absolute;top: 5px;left: 16px;">
                        <button type="submit" class="search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </div>
                    <input type="search" id="search" class="form-control form-control-sm" name="keyword" placeholder="Tìm kiếm tên" value ="{{$keyword}}" aria-controls="datatable-buttons" style= "height:39px;padding-left: 35px;">
                </div>
                <div class="col-2">
                    <select class="custom-select mb-2" name="brand_id">
                        <option value= "0" > Hãng </option>
                        @foreach ($brandsFilter as $brandFilter)
                        <option value="{{$brandFilter->id}}"
                            {{$brandFilter->id == $brand_id ? 'selected' : ''}}
                            >{{$brandFilter->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <select class="custom-select mb-2" name="vendor_id">
                        <option value= "0" > Nhà cung cấp </option>
                        @foreach ($vendorsFilter as $vendorFilter)
                            <option value="{{$vendorFilter->id}}"
                                {{$vendorFilter->id == $vendor_id ? 'selected' : ''}}
                            >{{$vendorFilter->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary" style="width: 100%" type="submit">Tìm</button>
                </div>
            </div>
        </form>
    </div>
</div>
        <div class="row">
            @if($data->total() == 0)
            <div class="col-lg-12">
                <p>Không tìm thấy</p>
            </div>
            @else
            <div class="col-lg-12">
                   <div class="card">
                       <div class="card-body">
                        <div class="table-responsive" id = "data">
                            <table class="table m-0">
                                <thead>
                                    <th>STT</th>
                                    <th style="width: 225px;">Tên Sản Phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Sản phẩm Hot</th>
                                    <th>Vị trí</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                 </thead>
                            <tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->

                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{++$key }}</td>
                                    <td>{{ substr($item->name,0) }}</td>
                                    <td>
                                        @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        {{-- <img src="{{asset($item->image)}}" width="50" height="50"> --}}
                                        @endif
                                    </td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{route('admin.product.show', ['id'=> $item->id ])}}">Xem</a>
                                        <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $item->id ])}}">Sửa</a>
                                        <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'product')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="box-footer clearfix">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    <!-- /.box-body -->

                       </div>
                   </div>
                </div>
                <!-- /.box -->
            @endif
        </div>
        <!-- /.row -->
@endsection
