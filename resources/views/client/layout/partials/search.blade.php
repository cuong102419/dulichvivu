@section('search')
    <div class="container container-1400">
        <div class="search-filter-inner shadow" data-aos="zoom-out-down" data-aos-duration="1500" data-aos-offset="50">
            <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                <span class="title">Điểm đến</span>
                <select name="city" id="city">
                    <option value="value1">City or Region</option>
                    <option value="value2">City</option>
                    <option value="value2">Region</option>
                </select>
            </div>
            <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                <span class="title">Ngày khởi hành</span>
                <input type="text" id="start_date" name="start_date" class="datetimepicker datetimepicker-custom" placeholder="Chọn ngày đi" readonly>
            </div>
             <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                <span class="title">Ngày kết thúc</span>
                <input type="text" id="end_date" name="end_date" class="datetimepicker datetimepicker-custom" placeholder="Chọn ngày về" readonly>
            </div>
            <div class="search-button">
                <button class="theme-btn">
                    <span data-hover="Tìm kiếm">Tìm kiếm</span>
                    <i class="far fa-search"></i>
                </button>
            </div>
        </div>
</div>
@endsection