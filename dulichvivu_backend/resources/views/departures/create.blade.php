@extends('layout.master')

@section('title')
    Ngày đi và giá
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Thêm ngày khởi hành và giá</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <p>Thêm tối thiểu 1 đợt.</p>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('departure.store', $tour->id) }}" method="post">
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày khởi hành <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="start-date" class="date-picker form-control" name="start_date" type="date"
                                        required="required" value="{{ old('start_date') }}">
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
                                        required="required" value="{{ old('end_date') }}">
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
                                    <input id="departure-time" class="date-picker form-control" name="departure_time" type="time"
                                    value="{{ old('departure_time') }}">
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
                                        required="required" class="form-control" value="{{ old('price_adult') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price-child">Giá trẻ em
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" step="0.1" min="1" id="price-child" name="price_child"
                                        required="required" class="form-control" value="{{ old('price_child') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="capacity">Số lượng <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" min="1" id="capacity" name="capacity" required="required"
                                        class="form-control" value="{{ old('capacity') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-secondary" href="{{ route('departure.list', $tour->slug) }}">Quay lại</a>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
