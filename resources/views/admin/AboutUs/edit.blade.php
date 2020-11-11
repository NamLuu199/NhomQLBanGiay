@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.AboutUs.index')}}">Sửa AboutUs</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.AboutUs.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Sửa AboutUs</a></b></span>

        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            <form role="form" action="{{route('admin.AboutUs.update', ['id'=>$aboutus->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Tiêu Đề</label>
                    <input value="{{$aboutus->title}}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                </div>
                <div class="form-group mb-3">
                    <label for="icon">Thay đổi text icon </label>
                    <br>
                    <input value="{{ $aboutus->icon }}" type="text" class="form-control" id="icon" name="icon" placeholder="URL">
                </div>
                <div class="form-group row">

                    <div class="col-lg-12">
                        <a class="btn btn-danger" href="{{route('admin.listicon')}}"> Danh sách text icon</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                    <input value="{{ $aboutus->position }}" type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea id="editor1" name="description" class="form-control" rows="15" placeholder="Enter ...">{!! $aboutus->description !!}</textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox form-check">
                        <input  type="checkbox" class="custom-control-input" id="customSwitch1" {{ ($aboutus->is_active) ? 'checked':'' }}  value="1"  name="is_active">
                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Lưu</button>
            </form>

        </div>
    </div>
    <!-- /.row -->
</section>
@endsection