
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
     <form role="form" action="{{url('admin/searchOrder')}}" method="get"  enctype="multipart/form-data">   
        <div id="datatable-buttons_filter" class="dataTables_filter" sytle="position:relative">
            <div class="row">
                <div class="col-5">
                    <div style="position: absolute;top: 5px;left: 16px;">
                        <button type="submit" class="search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </div>
                    <input type="search" id="search" class="form-control form-control-sm" name="keyword" placeholder="Tìm kiếm theo mã đơn hàng" aria-controls="datatable-buttons" style= "height:39px;padding-left: 35px;">
                </div>
                <div class="col-3">
                    <select class="custom-select mb-2" name="status">
                        <option selected value= "0" > Trạng thái </option>
                        @foreach ($orderStatus as $orderStatu)
                        <option value="{{$orderStatu->id}}" >{{$orderStatu->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary" style="width: 100%" type="submit">Tìm</button>
                </div>
            </div>
        </div>  
        </form>
    </div>
</div>
        <div class="row">
            <div class="col-lg-12">
                   <div class="card">
                       <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                            <tbody>
                            <tr>
                                <th>STT</th>
                                <th>Họ Tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Ngày</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Trạng Thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key  => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{++$key }}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        @if ($item->order_status_id === 1)
                                            <span class="badge badge-info badge-pill">Mới</span>
                                        @elseif ($item->order_status_id === 2)
                                            <span class="badge badge-warning badge-pill">Đang xử lý</span>
                                        @elseif ($item->order_status_id === 3)
                                            <span class="badge badge-success badge-pill">Hoàn Thành</span>
                                        @else
                                            <span class="badge badge-danger badge-pill">Hủy</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{route('admin.order.edit', ['id'=> $item->id ])}}">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">
                            {{ $data->links() }}
                        </ul>
                    </div>
                       </div>
                   </div>
                </div>
                <!-- /.box -->
        </div>
        <!-- /.row -->

@endsection
