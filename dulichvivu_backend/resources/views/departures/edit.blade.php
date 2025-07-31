@extends('layout.master')

@section('title')
    Ngày đi và giá
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cập nhật ngày khởi hành và giá</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <p>
                            Cập nhật.
                            @if ($departure->booked > 0)
                                Vì lịch này đã được mở nên chỉ có thể cập nhật tăng số lượng.
                            @endif
                        </p>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('departure.update', [$tour->id, $departure->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày khởi hành <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="start-date" class="date-picker form-control" name="start_date" type="date"
                                        required="required"
                                        value="{{ old('start_date') ?? $departure->start_date->format('Y-m-d') }}"
                                        {{ $departure->booked > 0 || $departure->status === 'open' ? 'disabled' : '' }}>
                                </div>
                                @error('start_date')
                                    <span class="text-danger pt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày kết thúc <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="end-date" class="date-picker form-control" name="end_date" type="date"
                                        required="required"
                                        value="{{ old('end_date') ?? $departure->end_date->format('Y-m-d') }}"
                                        {{ $departure->booked > 0 || $departure->status === 'open' ? 'disabled' : '' }}>
                                </div>
                                @error('end_date')
                                    <span class="text-danger pt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Giờ xuất phát <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" name="departure_time" type="time"
                                        value="{{ old('departure_time') ?? \Carbon\Carbon::createFromFormat('H:i:s', $departure->departure_time)->format('H:i') }}"
                                        {{ $departure->booked > 0 || $departure->status === 'open' ? 'disabled' : '' }}>
                                </div>
                                @error('departure_time')
                                    <span class="text-danger pt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price-adult">Giá người lớn
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" step="0.1" min="0" id="price-adult" name="price_adult"
                                        required="required" class="form-control"
                                        value="{{ old('price_adult') ?? $departure->price_adult }}"
                                        {{ $departure->booked > 0 || $departure->status === 'open' ? 'disabled' : '' }}>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price-child">Giá trẻ em
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" step="0.1" min="1" id="price-child" name="price_child"
                                        required="required" class="form-control"
                                        value="{{ old('price_child') ?? $departure->price_child }}"
                                        {{ $departure->booked > 0 || $departure->status === 'open' ? 'disabled' : '' }}>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="capacity">Số lượng <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" min="1" id="capacity" name="capacity" required="required"
                                        class="form-control" value="{{ old('capacity') ?? $departure->capacity }}" {{ $departure->status == 'closed' ? 'disabled' : '' }}>
                                </div>
                                @error('capacity')
                                    <span class="text-danger pt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-secondary" href="{{ route('departure.list', $tour->slug) }}">Quay
                                        lại</a>
                                    <button type="submit" class="btn btn-primary" {{ $departure->status == 'closed' ? 'disabled' : '' }}>Lưu</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
