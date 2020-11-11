@extends('shop.layouts.main')

@section('content')
<div class="blog-main-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2">
                <aside class="blog-sidebar-wrapper">
                   <!-- single sidebar end -->
                   <div class="blog-sidebar">
                    <h5 class="title">Tin tức mới</h5>
                    <div class="recent-post">
                        @foreach($newblogs as $blog)
                        <div class="recent-post-item">
                            <figure class="product-thumb">
                                <a href="{{route('shop.blog',
                                        ['slug'=>$blog->slug,'id'=>$blog->id])}}">
                                    <img src="{{asset($blog->image)}}" alt="{{$blog->title}}">
                                </a>
                            </figure>
                            <div class="recent-post-description">
                                <div class="product-name">
                                    <h6><a href="{{route('shop.blog',
                                        ['slug'=>$blog->slug,'id'=>$blog->id])}}">{{$blog->title}}</a></h6>
                                        <p>{{$blog->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- single sidebar end -->
                </aside>
            </div>
            <div class="col-lg-9 order-1">
                <div class="blog-item-wrapper">
                    <!-- blog post item start -->
                    <div class="blog-post-item blog-details-post d-block">
                        <div class="blog-thumb w-100">
                            <img src="{{asset($blogs->image)}}" alt="blog thumb">
                        </div>
                        <div class="blog-content w-100 mt-20 pl-0">

                            <h3 class="blog-title">{{ $blogs->title }}</h3>
                            <div class="blog-meta">
                                <p>{{$blogs->updated_at}} | <a href="#">{{$blogs->url}}</a></p>
                            </div>

                            <div class="entry-summary">
                                <p>{!! $blogs->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- blog post item end -->

                    <!-- comment area start -->
                    <div class="comment-section section-padding">
                        <div class="blog-bg">
                            <div class="total-reviews">
                                <div class="review-box">
                                    @if(count($blogs->comments) == 0)
                                    <p>Chưa có bình luận nào</p>
                                    @else
                                    @foreach($blogs->comments as $comment)
                                        <div class="comment-id-{{$comment->id}} py-3" style="border-top: 1px solid #e5e5e5"
                                            >

                                            <div class="post-author d-flex align-items-center">
                                                <div class="avatar mr-1">
                                                    <Strong>{{ substr($comment->name,0,1)}}</Strong>
                                                </div>
                                            <Strong> {{$comment->name}} </Strong>
                                            </div>
                                        <p>Bình luận: {{ $comment->comment }}</p>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <form action="{{route('comments.create',[$blogs->id])}}" method="POST" class="review-form">
                            @csrf
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="name" class="col-form-label"><span class="text-danger">*</span>
                                        Họ & Tên</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="email" class="col-form-label"><span class="text-danger">*</span>
                                             Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="comment" class="col-form-label"><span class="text-danger">*</span>
                                            Bình luận</label>
                                        <textarea class="form-control" name="comment" required></textarea>

                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="btn btn-sqr" type="submit">Gửi</button>
                                </div>
                            </form> <!-- end of review-form -->

                        </div>
                    </div>
                    <!-- comment area end -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

