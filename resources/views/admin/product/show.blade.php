@extends('admin.layouts.main')
@section('content')
<style>
    .st{
        height: 300px;
        overflow-y: scroll;
    }
</style>
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.product.index')}}">Danh sách</a>
        </div>
        <span><b><a class="text-dark" href="{{route('admin.product.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi tiết Sản Phẩm</a></b></span>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="col-lg-12 card-body ">
                <div class="table-responsive">
                    <table class="table m-0">
                        <tbody>
                            <tr>
                                <td><b>Tên sản phẩm:</b></td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td>
                                    @if ($product->image)
                                    <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($product->image)}}" width="50" height="50">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Sơ lược:</b></td>
                                <td>{!! $product->summary !!}</td>
                            </tr>
                            <tr>
                                <td><b>Mô tả:</b></td>
                                <td>{!! $product->description !!}</td>
                            </tr>
                            <tr>
                                <td><b>Giá gốc:</b></td>
                                <td>{{ number_format($product->price) }}</td>
                            </tr>
                            <tr>
                                <td><b>Giá khuyến mãi:</b></td>
                                <td>{{ number_format($product->sale) }}</td>
                            </tr>
                            <tr>
                                <td><b>Vị trí:</b></td>
                                <td>{{ $product->position }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>@if($product->is_active ==0)Ẩn @else Hiển thị @endif</td>
                            </tr>
                            <tr>
                                <td><b>Sản phẩm hot:</b></td>
                                <td>@if( $product->is_hot ==0)Không hot @else Sản phẩm hot @endif</td>
                            </tr>
                            <tr>
                                <td><b>Lượng views:</b></td>
                                <td>{{ $product->views }}</td>
                            </tr>
                            <tr>
                                <td><b>Danh mục sản phẩm:</b></td>
                                <td>{{ $category_name->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <div class="col-lg-6 card">
        <h4><Small>Comment :</Small></h4>
        <div class="total-reviews st">
            @foreach($product->comments as $comment)
            <div class="review-box " style="border-top: 1px solid #525659">

                <div class="post-author d-flex align-items-center my-1">
                    <Strong>{{ $comment->name}} </Strong>
                </div>
                <Span>
                    <b>{{$comment->email}}</b>
                </Span>
                <p>Bình luận: {{ $comment->comment }}</p>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection