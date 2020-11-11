@extends('shop.layouts.main')
@section('content')
    <!-- blog main wrapper start -->
    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-item-wrapper">
                        <!-- blog item wrapper end -->
                        <div class="row mbn-30">
                            @foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item d-block mb-30">
                                        <div class="blog-thumb w-100">
                                            <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">
                                                <img src="{{asset($blog->image)}}" alt="{{$blog->title}}"
                                                     height="200px">
                                            </a>
                                        </div>
                                        <div class="blog-content w-100 pl-0 mt-20">
                                            <h6 class="blog-title">
                                                <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">{{$blog->title}}</a>
                                            </h6>
                                            <div class="blog-meta">
                                                <span><i class="fa fa-calendar"></i>{{$blog->created_at}}</span>
                                            </div>
                                            <p class="blog-desc">{!! strip_tags(Str::limit($blog->description,100)) !!}</p>
                                            <a class="btn read-more" href="{{route('shop.blog',
                                			['slug'=>$blog->slug,'id'=>$blog->id])}}">Đọc tiếp</a>
                                        </div>
                                    </div>
                                    <!-- blog post item end -->
                                </div>
                            @endforeach

                        </div>
                        <!-- blog item wrapper end -->

                        <!-- start pagination area -->

                        @if($blogs->hasPages())
                            <div class="paginatoin-area shadow-bg text-center">
                                {{$blogs->render('vendor.pagination.pagination-page')}}
                            </div>
                    @endif
                    <!-- end pagination area -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog main wrapper end -->
@endsection
