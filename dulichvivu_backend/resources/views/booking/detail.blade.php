@extends('layout.master')

@section('title')
    Chi tiết hóa đơn
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Chi tiết hóa đơn</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="text-{{ $status[$booking->status]['class'] }} text-uppercase">
                            {{ $status[$booking->status]['value'] }}</h4>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3>{{ $booking->tour->title }}</h3>
                                <h2>Ngày: {{ $booking->start_date->format('d-m-Y') }}</h2>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span>Từ:</span>
                                    <div class="ml-2">
                                        <strong class="d-block">{{ $booking->customerInformation->fullname }}</strong>
                                        <span class="d-block">{{ $booking->customerInformation->address }}</span>
                                        <span class="d-block">Số điện thoại:
                                            {{ $booking->customerInformation->phone_number }}</span>
                                        <span class="d-block">Email: {{ $booking->customerInformation->email }}</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <span>Đến:</span>
                                    <div class="ml-2">
                                        <strong class="d-block">Công ty Dulichvivu</strong>
                                        <span class="d-block">470 Trần Đại Nghĩa, Ngũ Hành Sơn, Đà Nẵng</span>
                                        <span class="d-block">Số điện thoại: 0986927182</span>
                                        <span class="d-block">Email: dulichvivu@gmail.com</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block"><strong>Mã hóa đơn: </strong>{{ $booking->code }}</span>
                                    @if ($booking->payment_method != 'office')
                                        <span class="d-block"><strong>Mã giao dịch:
                                            </strong>{{ $transaction->trans_id }}</span>
                                        <span class="d-block"><strong>Ngày thanh toán:
                                            </strong>{{ $transaction->created_at->format('d-m-Y') }}</span>
                                        @if ($booking->admin_id)
                                            <span class="d-block"><strong>Nhân viên xử lý:
                                                </strong>{{ $booking->admin->name }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Người lớn</td>
                                            <td>{{ $booking->number_adults }}</td>
                                            <td>{{ number_format($booking->price_adult, 0, '.', '.') }} đ</td>
                                            <td>{{ number_format($booking->number_adults * $booking->price_adult, 0, '.', '.') }}
                                                đ</td>
                                        </tr>
                                        <tr>
                                            <td>Trẻ em</td>
                                            <td>{{ $booking->number_children }}</td>
                                            <td>{{ number_format($booking->price_child, 0, '.', '.') }} đ</td>
                                            <td>{{ number_format($booking->number_children * $booking->price_child, 0, '.', '.') }}
                                                đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-6">
                                    <h2>Phương thức thanh toán:</h2>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $paymentMethod[$booking->payment_method]['url'] }}" alt=""
                                            width="{{ $paymentMethod[$booking->payment_method]['width'] }}">
                                        @if ($booking->payment_method == 'office')
                                            <h4 class="ml-3">Thanh toán tại văn phòng</h4>
                                        @endif
                                    </div>
                                    @if ($booking->payment_status == 'refunded')
                                        <h4 class="mt-3 text-primary">Đã hoàn tiền</h4>
                                    @endif
                                    @if ($booking->payment_status == 'paid' && $booking->start_date instanceof \Carbon\Carbon > now())
                                        <div class="mt-3">
                                            <form action="{{ route('booking.refund', $booking->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-info btn-sm" onclick="return confirm('Bạn có chắc chắn muốn hoàn tiền?')">Hoàn tiền</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <table class="table">
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td>{{ number_format($booking->total_price, 0, '.', '.') }} đ</td>
                                        </tr>
                                        <tr>
                                            <th>Thuế (0%)</th>
                                            <td>0 đ</td>
                                        </tr>
                                        <tr>
                                            <th>Thành tiền</th>
                                            <td>{{ number_format($booking->total_price, 0, '.', '.') }} đ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($booking->status == 'pending')
                                        <button class="btn btn-primary" name="action" value="confirm" onclick="return confirm('Bạn có chắc chắn muốn xác nhận?')">Xác nhận</button>
                                    @endif

                                    @if ($booking->status != 'canceled' && $booking->start_date instanceof \Carbon\Carbon > now())
                                        <button class="btn btn-danger" name="action" value="cancel" onclick="return confirm('Bạn có chắc chắn muốn hủy?')">Hủy</button>
                                    @endif
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
