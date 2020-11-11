@extends('admin.layout.main')
@section('content')
    <div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.vendor.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Sửa</h4>
                            </div>
    </div>
	<div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0">Sửa Vendor</h4>
                                        <form class="form-horizontal" form role="form" action="{{route('admin.vendor.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                           <div class="row">
                                               <div class="col">
                                                   <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Tên</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="name" value="{{$data->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Email</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="email" value="{{$data->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">SĐT</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" class="form-control" id="simpleinput" name="phone" value="{{$data->phone}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="example-fileinput">Ảnh</label>
                                                        <div class="col-lg-10">
                                                            <input type="file" class="form-control" id="example-fileinput" name="new_image">
                                                            <img src="{{asset($data->image)}}" alt="{{$data->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Website</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="website" value="{{$data->website}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Địa chỉ</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="address" value="{{$data->address}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Vị trí</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" class="form-control" name="position" value="{{$data->position}}">
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-switch mb-2">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1" {{$data->is_active ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                                                    </div>
                                                     <button type="submit" class="btn btn-primary">Sửa</button>
                                               </div>

                                           </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
            </div>
@endsection