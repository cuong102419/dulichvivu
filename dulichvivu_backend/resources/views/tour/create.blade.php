@extends('layout.master')

@section('title')
    Thêm Tours
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Thêm Tours</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><small>Thêm thông tin chi tiết để tạo tour mới</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div>
                                <div>
                                    <form class="form-horizontal form-label-left" action="{{ route('tour.store') }}"
                                        method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="code">Mã
                                                tour
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="code" name="code" required="required"
                                                    class="form-control  ">
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
                                                <input type="text" id="title" name="title" required="required"
                                                    class="form-control  ">
                                            </div>
                                            @error('title')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="domain" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Khu vực <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select id="domain" name="area" class="form-control" id="">
                                                    <option selected disabled>Chọn khu vực</option>
                                                    <option value="northern">Miền Bắc</option>
                                                    <option value="central">Miền Trung</option>
                                                    <option value="southern">Miền Nam</option>
                                                    <option value="international">Nước ngoài</option>
                                                </select>
                                            </div>
                                            @error('area')
                                                <span class="p-2 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="domain" class="col-form-label col-md-3 col-sm-3 label-align">
                                                Loại tour <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select id="domain" name="type" class="form-control" id="">
                                                    <option selected disabled>Chọn thể loại</option>
                                                    <option value="budget">Tiết kiệm</option>
                                                    <option value="standard">Tiêu chuẩn</option>
                                                    <option value="premium">Cao cấp</option>
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
                                                    <option selected disabled>Chọn địa điểm</option>
                                                    <option value="ha_noi">Hà Nội</option>
                                                    <option value="da_nang">Đà Nẵng</option>
                                                    <option value="ho_chi_minh">Tp.Hồ Chí Minh</option>
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
                                                    required="required" class="form-control ">
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
                                                    name="total_day" required="required" min="1">
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
                                                <input id="birthday" class="form-control" required="required"
                                                    type="text" name="duration">
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
                                                <textarea name="description" required class="text-area" id=""></textarea>
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
                                                <textarea name="rules" required class="text-area" id=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-6 text-center">
                                                <button type="submit" class="btn btn-primary">Tiếp theo</button>
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
    </script>
@endsection
