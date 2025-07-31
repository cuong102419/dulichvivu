@extends('layout.master')

@section('title')
    Quản lý tour
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Quản lý tour</h3>
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
                                        <p class="text-muted font-13 m-b-30">
                                            Tại đây bạn có thể chỉnh sửa và quản lý tất cả tour hiện có.
                                        </p>
                                        <table id="datatable-buttons" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Số thứ tự</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Thời lượng</th>
                                                    <th>Vùng</th>
                                                    <th>Nơi khởi hành</th>
                                                    <th>Điểm đến</th>
                                                    <th>Tổng số lượng</th>
                                                    <th>Tổng người đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($tours as $index => $tour)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            {{ $tour->title }}
                                                        </td>
                                                        <td>{{ $tour->duration }}</td>
                                                        <td>{{ $area[$tour->area] }}</td>
                                                        <td>{{ $departures_location[$tour->departure_location] }}</td>
                                                        <td>{{ $tour->destination }}</td>
                                                        <td>{{ $tour->departures()->sum('capacity') }}</td>
                                                        <td>{{ $tour->departures()->sum('booked') }}</td>
                                                        <td><span
                                                                class="badge badge-{{ $status[$tour->status]['class'] }}">{{ $status[$tour->status]['value'] }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                @if ($tour->status == 'pending')
                                                                    <form action="{{ route('tour.open', $tour->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button
                                                                            onclick="return confirm('Bạn có chắc muốn mở tour này, nếu mở bạn sẽ không thể chỉnh sửa tour này và chỉ có thể cập nhật lịch trình trong tương lai!')"
                                                                            type="submit" class="btn text-success"><i
                                                                                class="fa fa-unlock-alt"></i></button>
                                                                    </form>
                                                                @elseif ($tour->status == 'active' && $tour->departures()->sum('booked') == 0)
                                                                    <form action=""
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button
                                                                            onclick="return confirm('Bạn có chắc muốn đóng tour này, nếu đóng bạn sẽ không thể chỉnh sửa tour này!')"
                                                                            type="submit" class="btn text-danger"><i
                                                                                class="fa fa-lock"></i></button>
                                                                    </form>
                                                                @endif
                                                                <a href="{{ route('tour.edit', $tour->slug) }}"
                                                                    class="btn text-primary"><i
                                                                        class="fa fa-pencil-square-o"></i></a>

                                                                @if ($tour->status != 'active')
                                                                    <form action="{{ route('tour.delete', $tour->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button
                                                                            onclick="return confirm('Bạn có chắc muốn xóa toàn bộ tour này!')"
                                                                            type="submit" class="btn text-danger"><i
                                                                                class="fa fa-trash-o"></i></button>
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
    </div>
@endsection
