@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <div class="row page-title">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class="float-right mt-1">
                <a class="btn btn-primary" href="{{route('admin.contact.index')}}">Danh sách</a>
            </div>
            <span><b>
                <a class="text-dark" href="{{route('admin.contact.index')}}">Danh sách</a> / <a class="text-dark"
                href="javascript:void(0)"> Chi tiết liên hệ</a>
            </b></span>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box box-primary">
                        <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><label for="">Tên khách hàng :</label></td>
                                            <td>{{ $contact->name }}</td>
                                            <td><label>Email:</label></td>
                                            <td>{{ $contact->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>Trạng thái phản hồi</label></td>
                                            <td style="color: red">
                                                <select class="form-control " name="contact_status_id" style="max-width: 150px;display: inline-block;">
                                                    <option value="0">-- chọn --</option>
                                                    @foreach($contact_status as $status)
                                                    <option {{ ($contact->contact_status_id == $status->id ? 'selected':'') }} value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Chi tiết :</label> </td>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    {{$contact->content }}
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="box-header with-border">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box -->


        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection
