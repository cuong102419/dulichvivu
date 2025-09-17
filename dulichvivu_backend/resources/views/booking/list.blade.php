@extends('layout.master')

@section('title')
    Quản lý Booking
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý booking</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Stt</th>
                                                <th>Mã</th>
                                                <th>Khách hàng</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày đặt</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($bookings as $index => $booking)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $booking->code }}</td>
                                                    <td>{{ $booking->customerInformation->fullname }}</td>
                                                    <td>{{ $booking->customerInformation->email }}</td>
                                                    <td>{{ $booking->customerInformation->phone_number }}</td>
                                                    <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ number_format($booking->total_price, 0, '.', '.') }} đ</td>
                                                    <td><span class="badge badge-{{ $status[$booking->status]['class'] }}">{{ $status[$booking->status]['value'] }}</span></td>
                                                    <td class="text-center">
                                                        <img src="{{ $paymentMethod[$booking->payment_method]['url'] }}" alt="" width="{{ $paymentMethod[$booking->payment_method]['width'] }}">
                                                    </td>
                                                    <td><span class="badge badge-{{ $paymentStatus[$booking->payment_status]['class'] }}">{{ $paymentStatus[$booking->payment_status]['value'] }}</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('booking.detail', $booking->code) }}" class="btn btn-primary btn-sm">Chi tiết</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
