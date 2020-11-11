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
                    <input type="text" class="search-field-2 col-9 h-100" name="tim-kiem">
                    <button type="submit" class="btn btn-sqr col-2">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </section>
@endsection
