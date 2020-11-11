@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.category.index')}}">Danh sách</a>
        </div>
        <h4 class="mb-1 mt-0">Thêm mới</h4>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Thêm mới Category</h4>
                <form class="form-horizontal" form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                     <div class="col">
                        <div class="form-group row">

                            <select class="custom-select mb-2" name="parent_id">
                                <option selected="" >Danh mục cha</option>
                                @foreach ($data as $item)
                                @if(empty($item->parent_id))
                                <option value="{{$item->id}}">{{  $item->name }}</option>
                                @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="simpleinput">Tên</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" value="{{old('name')}}" id="simpleinput" name="name">
                            </div>
                            @error('name')
                            <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Vị trí</label>
                            <div class="col-lg-10">
                                <input type="number" value="{{++$position}}" class="form-control" name="position">
                            </div>
                            @error('position')
                            <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="custom-control custom-switch mb-2">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1">
                            <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>

        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div><!-- end col -->
</div>
@endsection

