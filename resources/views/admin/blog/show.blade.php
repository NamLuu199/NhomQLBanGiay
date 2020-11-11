@extends('admin.layouts.main')
@section('content')
<style>
    .st {
        height: 300px;
        overflow-y: scroll;
    }
</style>
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.blog.index')}}">Danh sách</a>
            </div>
            <span><b><a class="text-dark" href="{{route('admin.blog.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Chi tiết blog</a></b></span>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="col-lg-12 card-body ">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <td><b>Tiêu đề:</b></td>
                                    <td>{{ $data->title }}</td>
                                </tr>
                                <tr>
                                    <td><b>Hình ảnh:</b></td>
                                    <td><img src="{{ asset($data->image) }}" width="250"></td>
                                </tr>
                                <tr>
                                    <td><b>Website:</b></td>
                                    <td>{{ $data->url }}</td>
                                </tr>
                                <tr>
                                    <td><b>Người đăng:</b></td>
                                    <td>{{ $data->username['name'] }}</td>
                                </tr>
                                <tr>
                                    <td><b>Vị trí:</b></td>
                                    <td>{{ $data->position }}</td>
                                </tr>
                                <tr>
                                    <td><b>Trạng thái</b></td>
                                    <td>{{ ($data->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
                                </tr>
                                <tr>
                                    <td><b>Chi tiết</b></td>
                                    <td>{!! $data->description !!}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <div class="col-lg-6 card">
            <h4><Small>Comment :</Small></h4>
            <div class="total-reviews st">
                @foreach($data->comments as $comment)
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
        <!-- /.row -->
    </section>
    @endsection