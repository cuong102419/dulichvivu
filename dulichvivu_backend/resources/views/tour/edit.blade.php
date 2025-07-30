@extends('layout.master')

@section('title')
    Cập nhật Tours
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cập nhật Tours</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                @if ($tour->departures()->sum('booked') > 0)
                                    <small>Vì tour đã có người đặt nên không thể chỉnh sửa thông tin tour này.</small>
                                @else
                                    <small>Thêm thông tin chi tiết để cập nhật tour</small>
                                @endif
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div>
                                <div>
                                    <form class="form-horizontal form-label-left"
                                        action="{{ route('tour.update', $tour->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="code">Mã
                                                tour
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="code" name="code"
                                                    value="{{ $tour->code }}" disabled required="required"
                                                    class="form-control ">
                                            </div>
                                            @error('code')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tiêu
                                                đề
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="title" name="title"
                                                    value="{{ old('title') ?? $tour->title }}" required="required"
                                                    class="form-control"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}>
                                            </div>
                                            @error('title')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="area" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Khu vực <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select id="area" name="area" class="form-control"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}
                                                    id="">
                                                    <option {{ $tour->area ? 'selected' : '' }} disabled>Chọn khu vực
                                                    </option>
                                                    <option {{ $tour->area == 'northern' ? 'selected' : '' }}
                                                        value="northern">Miền Bắc</option>
                                                    <option {{ $tour->area == 'central' ? 'selected' : '' }}
                                                        value="central">Miền Trung</option>
                                                    <option {{ $tour->area == 'southern' ? 'selected' : '' }}
                                                        value="southern">Miền Nam</option>
                                                    <option {{ $tour->area == 'international' ? 'selected' : '' }}
                                                        value="international">Nước ngoài</option>
                                                </select>
                                            </div>
                                            @error('area')
                                                <span class="p-2 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="type" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Loại tour <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select id="type" name="type" class="form-control"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}
                                                    id="">
                                                    <option {{ $tour->type ? 'selected' : '' }} disabled>Chọn thể loại
                                                    </option>
                                                    <option {{ $tour->type == 'budget' ? 'selected' : '' }} value="budget">
                                                        Tiết kiệm</option>
                                                    <option {{ $tour->type == 'standard' ? 'selected' : '' }}
                                                        value="standard">Tiêu chuẩn</option>
                                                    <option {{ $tour->type == 'premium' ? 'selected' : '' }}
                                                        value="premium">Cao cấp</option>
                                                </select>
                                            </div>
                                            @error('type')
                                                <span class="p-2 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="domain" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Nơi khởi hành <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select id="domain" name="departure_location" class="form-control"
                                                    id="">
                                                    <option {{ $tour->departure_location ? 'selected' : '' }} selected
                                                        disabled>Chọn địa điểm</option>
                                                    <option {{ $tour->departure_location == 'ha_noi' ? 'selected' : '' }}
                                                        value="ha_noi">Hà Nội</option>
                                                    <option {{ $tour->departure_location == 'da_nang' ? 'selected' : '' }}
                                                        value="da_nang">Đà Nẵng</option>
                                                    <option
                                                        {{ $tour->departure_location == 'ho_chi_minh' ? 'selected' : '' }}
                                                        value="ho_chi_minh">Tp.Hồ Chí Minh</option>
                                                </select>
                                            </div>
                                            @error('departure_location')
                                                <span class="p-2 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="destination">
                                                Điểm đến <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="destination" name="destination"
                                                    required="required"
                                                    value="{{ old('destination') ?? $tour->destination }}"
                                                    class="form-control"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}>
                                            </div>
                                            @error('destination')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="quantity" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Số ngày <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="quantity" class="form-control col" type="number"
                                                    name="total_day" value="{{ old('total_day') ?? $tour->total_day }}"
                                                    required="required" min="1"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}>
                                            </div>
                                            @error('total_day')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Thời lượng <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="birthday" class="form-control"
                                                    value="{{ old('duration') ?? $tour->duration }}" required="required"
                                                    type="text" name="duration"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}>
                                            </div>
                                            @error('duration')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả <span
                                                    class="required">*</span>
                                            </label>
                                            @error('description')
                                                <span class="text-danger pt-2">{{ $message }}</span>
                                            @enderror
                                            <div class="col-md-12 col-sm-6">
                                                <textarea name="description" required class="text-area" id="">{{ old('description') ?? $tour->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Quy tắc <span
                                                    class="required">*</span>
                                            </label>
                                            @error('rules')
                                                <span class="text-danger pt-2">{{ $message }}</span>
                                            @enderror
                                            <div class="col-md-12 col-sm-6">
                                                <textarea name="rules" required class="text-area" id="">{{ old('rules') ?? $tour->rules }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <div class="col-md-12 col-sm-12 ">
                                                <a href="{{ route('tour.list', $tour->slug) }}"
                                                    class="btn btn-secondary">Quay lại</a>
                                                <button type="submit" class="btn btn-primary"
                                                    {{ $tour->departures()->sum('booked') > 0 ? 'disabled' : '' }}>Lưu</button>
                                                <a href="{{ route('image.edit', $tour->slug) }}"
                                                    class="btn btn-success">Ảnh</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replaceAll('text-area');

        @if ($tour->departures()->sum('booked') > 0)
            setTimeout(function() {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].setReadOnly(true);
                }
            }, 500);
        @endif
    </script>
@endsection
