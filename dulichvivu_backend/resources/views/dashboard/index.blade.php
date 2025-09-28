@extends('layout.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row justify-content-between w-100" style="display: inline-block;">
            <div class=" top_tiles" style="margin: 10px 0;">
                <div class="col-md-3 col-sm-3  tile">
                    <span>Tổng số tour đang hoạt động</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                        <canvas width="200" height="60"
                            style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Tổng số lượt booking</span>
                    <h2>$ 231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                        <canvas width="200" height="60"
                            style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Số người dùng đăng ký</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                        <canvas width="200" height="60"
                            style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>
                    </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Tổng doanh thu</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                        <canvas width="200" height="60"
                            style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                </div>
            </div>
        </div>
        <br />

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h2>Điểm đến</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">
                            <tr>
                                <th style="width:37%;">
                                    <p>Tổng hợp tour theo khu vực</p>
                                </th>
                                <th>
                                    <div class="col-lg-7 col-md-7 col-sm-7 ">
                                        <p class="">Khu vực</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 ">
                                        <p class="">Giá trị</p>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <canvas class="canvasDoughnut" height="140" width="140"
                                        style="margin: 15px 10px 10px 0"></canvas>
                                </td>
                                <td>
                                    <table class="tile_info">
                                        @foreach ($destinations as $index => $d)
                                            <tr>
                                                <td>
                                                    {{-- Chọn màu theo thứ tự hoặc theo tên --}}
                                                    @php
                                                        $colors = ['aero', 'purple', 'green', 'blue'];
                                                        $color = $colors[$index % count($colors)];
                                                    @endphp
                                                    <p><i class="fa fa-square {{ $color }}"></i> {{ $d->area }}
                                                    </p>
                                                </td>
                                                <td>{{ $d->percentage }}%</td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Phương thức thanh toán</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="echart_donut" style="height:350px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tour được đặt nhiều nhất</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Số chỗ đã đặt</th>
                                    <th>Số chỗ còn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topTours as $tour)
                                    <tr>
                                        <th scope="row">{{ $tour->id }}</th>
                                        <td>{{ $tour->title }}</td>
                                        <td>{{ $tour->departures_sum_booked }}</td>
                                        <td>{{ $tour->departures_sum_capacity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Đơn đặt mới</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Tour</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newBookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->customerInformation->fullname }}</td>
                                        <td>{{ $booking->tour->title }}</td>
                                        <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $booking->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function init_chart_doughnut() {
            var chartData = @json($destinations)

            var labels = chartData.map(item => item.area)
            var data = chartData.map(item => item.total)

            if (
                "undefined" != typeof Chart &&
                (console.log("init_chart_doughnut"), $(".canvasDoughnut").length)
            ) {
                var a = {
                    type: "doughnut",
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: [
                                "#BDC3C7",
                                "#9B59B6",
                                "#26B99A",
                                "#3498DB",
                            ],
                            hoverBackgroundColor: [
                                "#CFD4D8",
                                "#B370CF",
                                "#36CAAB",
                                "#49A9EA",
                            ],
                        }, ],
                    },
                    options: {
                        legend: !1,
                        responsive: !1
                    },
                };
                $(".canvasDoughnut").each(function() {
                    var e = $(this);
                    new Chart(e, a);
                });
            }
        }

        function init_echarts() {
            var chartData = @json($paymentMethods);

            var labels = chartData.map(item => item.payment_method)
            var data = chartData.map(item => item.total)

            if ("undefined" != typeof echarts) {
                console.log("init_echarts");
                var e = {
                    color: [
                        "#26B99A",
                        "#3498DB",
                        "#9B59B6",
                    ],
                    title: {
                        itemGap: 8,
                        textStyle: {
                            fontWeight: "normal",
                            color: "#408829"
                        },
                    },
                    dataRange: {
                        color: ["#1f610a", "#97b58d"]
                    },
                    toolbox: {
                        color: ["#408829", "#408829", "#408829", "#408829"]
                    },
                    tooltip: {
                        backgroundColor: "rgba(0,0,0,0.5)",
                        axisPointer: {
                            type: "line",
                            lineStyle: {
                                color: "#408829",
                                type: "dashed"
                            },
                            crossStyle: {
                                color: "#408829"
                            },
                            shadowStyle: {
                                color: "rgba(200,200,200,0.3)"
                            },
                        },
                    },
                    dataZoom: {
                        dataBackgroundColor: "#eee",
                        fillerColor: "rgba(64,136,41,0.2)",
                        handleColor: "#408829",
                    },
                    grid: {
                        borderWidth: 0
                    },
                    categoryAxis: {
                        axisLine: {
                            lineStyle: {
                                color: "#408829"
                            }
                        },
                        splitLine: {
                            lineStyle: {
                                color: ["#eee"]
                            }
                        },
                    },
                    valueAxis: {
                        axisLine: {
                            lineStyle: {
                                color: "#408829"
                            }
                        },
                        splitArea: {
                            show: !0,
                            areaStyle: {
                                color: [
                                    "rgba(250,250,250,0.1)",
                                    "rgba(200,200,200,0.1)",
                                ],
                            },
                        },
                        splitLine: {
                            lineStyle: {
                                color: ["#eee"]
                            }
                        },
                    },
                    timeline: {
                        lineStyle: {
                            color: "#408829"
                        },
                        controlStyle: {
                            normal: {
                                color: "#408829"
                            },
                            emphasis: {
                                color: "#408829"
                            },
                        },
                    },
                    k: {
                        itemStyle: {
                            normal: {
                                color: "#68a54a",
                                color0: "#a9cba2",
                                lineStyle: {
                                    width: 1,
                                    color: "#408829",
                                    color0: "#86b379",
                                },
                            },
                        },
                    },
                    map: {
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    color: "#ddd"
                                },
                                label: {
                                    textStyle: {
                                        color: "#c12e34"
                                    }
                                },
                            },
                            emphasis: {
                                areaStyle: {
                                    color: "#99d2dd"
                                },
                                label: {
                                    textStyle: {
                                        color: "#c12e34"
                                    }
                                },
                            },
                        },
                    },
                    force: {
                        itemStyle: {
                            normal: {
                                linkStyle: {
                                    strokeColor: "#408829"
                                }
                            },
                        },
                    },
                    chord: {
                        padding: 4,
                        itemStyle: {
                            normal: {
                                lineStyle: {
                                    width: 1,
                                    color: "rgba(128, 128, 128, 0.5)",
                                },
                                chordStyle: {
                                    lineStyle: {
                                        width: 1,
                                        color: "rgba(128, 128, 128, 0.5)",
                                    },
                                },
                            },
                            emphasis: {
                                lineStyle: {
                                    width: 1,
                                    color: "rgba(128, 128, 128, 0.5)",
                                },
                                chordStyle: {
                                    lineStyle: {
                                        width: 1,
                                        color: "rgba(128, 128, 128, 0.5)",
                                    },
                                },
                            },
                        },
                    },
                    gauge: {
                        startAngle: 225,
                        endAngle: -45,
                        axisLine: {
                            show: !0,
                            lineStyle: {
                                color: [
                                    [0.2, "#86b379"],
                                    [0.8, "#68a54a"],
                                    [1, "#408829"],
                                ],
                                width: 8,
                            },
                        },
                        axisTick: {
                            splitNumber: 10,
                            length: 12,
                            lineStyle: {
                                color: "auto"
                            },
                        },
                        axisLabel: {
                            textStyle: {
                                color: "auto"
                            }
                        },
                        splitLine: {
                            length: 18,
                            lineStyle: {
                                color: "auto"
                            }
                        },
                        pointer: {
                            length: "90%",
                            color: "auto"
                        },
                        title: {
                            textStyle: {
                                color: "#333"
                            }
                        },
                        detail: {
                            textStyle: {
                                color: "auto"
                            }
                        },
                    },
                    textStyle: {
                        fontFamily: "Arial, Verdana, sans-serif"
                    },
                };
                if ($("#echart_donut").length)
                    echarts.init(document.getElementById("echart_donut"), e).setOption({
                        tooltip: {
                            trigger: "item",
                            formatter: "{a} <br/>{b} : {c} ({d}%)",
                        },
                        calculable: !0,
                        legend: {
                            x: "center",
                            y: "bottom",
                            data: labels,
                        },
                        toolbox: {
                            show: !0,
                            feature: {
                                magicType: {
                                    show: !0,
                                    type: ["pie", "funnel"],
                                    option: {
                                        funnel: {
                                            x: "25%",
                                            width: "50%",
                                            funnelAlign: "center",
                                            max: 1548,
                                        },
                                    },
                                },
                                restore: {
                                    show: !0,
                                    title: "Restore"
                                },
                                saveAsImage: {
                                    show: !0,
                                    title: "Save Image"
                                },
                            },
                        },
                        series: [{
                            name: "Phương thức thanh toán",
                            type: "pie",
                            radius: ["35%", "55%"],
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: !0
                                    },
                                    labelLine: {
                                        show: !0
                                    },
                                },
                                emphasis: {
                                    label: {
                                        show: !0,
                                        position: "center",
                                        textStyle: {
                                            fontSize: "14",
                                            fontWeight: "normal",
                                        },
                                    },
                                },
                            },
                            data: chartData.map(item => ({
                                value: item.total,
                                name: item.payment_method
                            })),
                        }, ],
                    });
            }
        }
    </script>
@endsection
