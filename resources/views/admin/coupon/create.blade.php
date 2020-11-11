@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.coupon.index')}}">Danh sách</a>
            </div>
            <span><b> <a class="text-dark" href="{{route('admin.coupon.index')}}">Danh sách</a> / <a class="text-dark" href="javascript:void(0)"> Thêm mới mã giảm giá </a> </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            <form role="form" action="{{route('admin.coupon.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên mã</label>
                        <input type="text" class="form-control" id="code" value="{{old('code')}}" name="code" placeholder="Nhập tên">
                        @error('code')
                        <label class="col-lg-12 col-form-label text-danger">Mã giảm giá không được trống</label>
                        @enderror
                    </div>
                    <label for="value">Giảm theo tiền</label>
                    <input type="radio" name="type" id="value" value="1">
                    <label class="ml-2" for="%">Giảm theo %</label>
                    <input class="ml-2" type="radio" name="type" id="%" value="2">
                    @error('type')
                        <label class="col-lg-12 col-form-label text-danger">Chưa lựa chọn kiểu</label>
                    @enderror
                    <input type="number" class="form-control mb-1" style="display: none" id="value2" name="value" placeholder="Nhập giá giảm">

                    <input type="number" class="form-control mb-1" style="display: none" id="percent" name="percent" placeholder="Nhập %">
                    @error('percent')
                    <label class="col-lg-12 col-form-label text-danger">Tối đa 100%</label>
                    @enderror
                    <div class="form-group mb-3">
                        <div class="custom-control custom-switch mb-2">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active" checked="">
                            <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Tạo</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </section>
    @endsection
@section('my_javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='type']:checked").val();
            console.log(radioValue);
            if (radioValue == '1')
            {
                $('#value2').show();
                $('#percent').hide();
                $("input[name='percent']").val('');
            }else
            {
                $('#value2').hide();
                $('#percent').show();
                $("input[name='value']").val('');
            }
        });
    });
</script>
@endsection
