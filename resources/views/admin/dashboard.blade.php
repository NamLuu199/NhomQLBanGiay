@extends('admin.layouts.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <a class="btn btn-primary" href="/">Trang Chủ</a>
                </div>
            </div>
            <!-- content -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span
                                        class="text-muted text-uppercase font-size-12 font-weight-bold">Đơn Hàng</span>
                                    <h2 class="mb-0">{{ $numOrder }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span style="font-size: 44px"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span
                                        class="text-muted text-uppercase font-size-12 font-weight-bold">Sản Phẩm</span>
                                    <h2 class="mb-0">{{ $numProduct }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span style="font-size: 44px"><i class="uil uil-database-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">User</span>
                                    <h2 class="mb-0">{{ $numUser }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span style="font-size: 44px"><i class="uil uil-user-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span
                                        class="text-muted text-uppercase font-size-12 font-weight-bold">Bài Viết</span>
                                    <h2 class="mb-0">{{ $numBlog }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span style="font-size: 44px"><i class="uil uil-file-edit-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-3">
                    <span class="text-muted text-uppercase font-size-20 font-weight-bold mb-3">Top sản phẩm bán nhiều nhất</span>
                    <table>
                        <colgroup>
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 75%;">
                            <col span="1"  style="width: 10%;">
                        </colgroup>
                        <tr class="text-center">
                            <th span="2">Hình ảnh</th>
                            <th>Tên SP</th>
                            <th>SL bán</th>
                        </tr>
                        @foreach($topSellers as $topSeller)
                            <tr>
                                <td class="text-center"> <img src="{{$topSeller->image}}" width="50" height="50"></td>
                                <td class="p-2">{{$topSeller->name}}</td>
                                <td class="text-center">{{$topSeller->quanty}}</td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('my_javascript')

    <script>
        var ctx = document.getElementById('myChart');
        const cfg = {
            type: 'line',
            data: {
                labels:  {!! $dates !!},
                datasets: [{
                    axis: 'y',
                    label: 'Doanh thu theo từng ngày trong tháng / Đơn vị VNĐ',
                    data: {!! $allPrice !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        distribution: 'series'
                    }]
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        ticks: {
                            crossAlign: 'far',
                            // Return an empty string to draw the tick line but hide the tick label
                            // Return `null` or `undefined` to hide the tick line entirely

                        }
                    },
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 500000,

                            // Return an empty string to draw the tick line but hide the tick label
                            // Return `null` or `undefined` to hide the tick line entirely

                            callback: function(value) {
                                return (new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND',
                                })).format(value);
                            }

                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return (new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                            })).format(tooltipItem.value);
                        }
                    }
                }
            }
        };
        var myChart = new Chart(ctx, cfg);
    </script>
@endsection
