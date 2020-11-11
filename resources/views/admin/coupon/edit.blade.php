@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.brand.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.brand.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Sửa thông tin nhãn hiệu</a> </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="card"><div class="card-body">

        <form role="form" action="{{route('admin.coupon.update', ['id'=>$coupon->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên mã</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập tên" value="{{$coupon->code}}">
                        @error('code')
                        <label class="col-lg-12 col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <label for="value">Giảm theo tiền</label>
                    <input type="radio" name="type" id="value" value="1"
                     {{$coupon->type == 1 ? 'checked' : ''}}>
                    <label for="%">Giảm theo %</label>
                    <input type="radio" name="type" id="%" value="2"
                    {{$coupon->type == 2 ? 'checked' : ''}}>
                    @error('type')
                    <label class="col-lg-12 col-form-label text-danger">Chưa lựa chọn kiểu</label>
                    @enderror
                    <input type="number" class="form-control mb-1" name="value"
                    @if(empty($coupon->value))
                    style="display: none"
                    @endif
                    id="value2" value="{{$coupon->value}}" placeholder="Nhập giá giảm">

                    <input type="number" class="form-control mb-1" name="percent"
                    @if(empty($coupon->percent))
                    style="display: none"
                    @endif
                    id="percent" value="{{$coupon->percent}}"  placeholder="Nhập %">
                    @error('percent')
                    <label class="col-lg-12 col-form-label text-danger">Tối đa 100%</label>
                    @enderror
                    <div class="form-group mb-3">
                        <div class="custom-control custom-switch mb-2">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active" checked="">
                            <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                        </div>
                    </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div></div>
    <!-- /.row -->
</section>
@endsection
@section('my_javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='type']:checked").val();
            if (radioValue == '1')
            {
                $('#value2').show();
                $('#percent').hide();
            }else
            {
                $('#value2').hide();
                $('#percent').show();
            }
        });
    });
</script>
@endsection
