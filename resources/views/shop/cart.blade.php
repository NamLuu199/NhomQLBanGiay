@extends('shop.layouts.main')
@section('content')
        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                @include('shop.components.view-list-cart')
            </div>
        </div>
        <!-- cart main wrapper end -->
@endsection


