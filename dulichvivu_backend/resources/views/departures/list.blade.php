@extends('layout.master')

@section('title')
    Ngày khởi hành - {{ $tour->title }}
@endsection

@section('content')
    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>Ngày khởi hành</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <p>Danh sách ngày khởi hành của tour mã <strong>{{ $tour->code }}</strong>.</p>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tại đây bạn có thể chỉnh sửa và quản lý tất cả tour hiện có.
                                    </p>

                                    <div class="d-flex justify-content-end"><a
                                            href="{{ route('departure.create', $tour->slug) }}"
                                            class="btn btn-primary btn-sm">Thêm lịch</a></div>

                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Số thứ tự</th>
                                                <th>Ngày khởi hành</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Giờ xuất phát</th>
                                                <th>Giá người lớn</th>
                                                <th>Giá trẻ em</th>
                                                <th>Số lượng</th>
                                                <th>Số lượt đặt</th>
                                                <th>Trạng thái</th>
                                                <th>Sửa</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($departures as $index => $departure)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td> {{ $departure->start_date->format('d-m-Y') }}</td>
                                                    <td> {{ $departure->end_date->format('d-m-Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $departure->departure_time)->format('H:i') ?? '' }}
                                                    </td>
                                                    <td>{{ number_format($departure->price_adult, 0, '.', '.') }}đ</td>
                                                    <td>{{ number_format($departure->price_child, 0, '.', '.') }}đ</td>
                                                    <td>{{ $departure->capacity }}</td>
                                                    <td>{{ $departure->booked }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $status[$departure->status]['class'] }}">{{ $status[$departure->status]['value'] }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @if ($departure->status != 'closed')
                                                                <a href="{{ route('departure.edit', [$tour->slug, $departure->id]) }}"
                                                                    class="btn text-primary"><i
                                                                        class="fa fa-pencil-square-o"></i></a>
                                                            @endif

                                                            @if ($departure->booked == 0)
                                                                <form
                                                                    action="{{ route('departure.status', [$tour->id, $departure->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    @if ($departure->status == 'open')
                                                                        <button
                                                                            onclick="return confirm('Bạn có muốn hủy lịch trình này không?')"
                                                                            name="action" value="cancel"
                                                                            class="btn text-danger"><i
                                                                                class="fa fa-times"></i></button>
                                                                    @else
                                                                        <button
                                                                            onclick="return confirm('Bạn có muốn mở lịch trình này không, khi mở bạn chỉ có thể cập nhật tăng số lượng?')"
                                                                            name="action" value="open"
                                                                            class="btn text-success"><i
                                                                                class="fa fa-check"></i></button>
                                                                    @endif
                                                                </form>
                                                                <form action="{{ route('departure.destroy', [$tour->id, $departure->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        onclick="return confirm('Bạn có muốn xóa lịch trình này không?')"
                                                                        class="btn text-danger">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
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
