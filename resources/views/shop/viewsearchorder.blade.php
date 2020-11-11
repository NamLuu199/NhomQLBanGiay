@extends('shop.layouts.main')
@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 model-header">
                    <h4>Tra Cứu Đơn Hàng </h4>
                </div>
                <b>Mời quý khách nhập mã vận đơn để tra cứu (VD: DH-9-30062020)</b>
                <form action="{{ route('shop.viewsearchorder') }}" method="GET" class="search-box-2 w-100">
                    <input type="text" class="search-field-2 col-9 h-100" name="tim-kiem"
                           value="{{isset($keyword) ? $keyword : ''}}">
                    <button type="submit" class="btn btn-sqr col-2">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="container mt-4">
            <table class="table table-bordered">

                @if($searchorder)
                    <thead>
                    <tr>
                        <th scope="col" colspan="2">Thông tin đơn hàng {{ $searchorder -> code }} </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Người nhận:</td>
                        <td>
                            <p>Họ và tên: {{ $searchorder ->fullname }}</p>
                            <p>Số điện thoại: ******{{ substr($searchorder ->phone,6) }}</p>
                            <p>Địa chỉ: ***{{ substr($searchorder ->address,6) }} </p>
                        </td>
                    </tr>
                    <tr>
                        <td>Thông tin giá</td>
                        <td>
                            <p>Tổng tiền: {{$totalOrder }} VNĐ</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái đơn hàng:</td>
                        <td>
                            @if($searchorder ->order_status_id == 1)
                                <p>Đã tiếp nhận đơn</p>
                            @elseif($searchorder ->order_status_id == 2)
                                <p>Đang gửi đi</p>
                            @elseif($searchorder ->order_status_id == 3)
                                <p>Hoàn thành</p>
                            @else
                                <p>Hủy</p>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                @else
                    <p>Không tìm thấy đơn hàng</p>
                @endif

            </table>
        </div>
    </section>
@endsection
