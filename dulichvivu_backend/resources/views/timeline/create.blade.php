@extends('layout.master')

@section('title')
    Lộ trình
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Nhập lộ trình</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="{{ route('timeline.store', $tour->id) }}" method="post">
                            @csrf

                            @for ($i = 1; $i <= $tour->total_day; $i++)
                                <div class="item form-group">
                                    <label for="">Ngày thứ {{ $i }}</label>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="timeline-title">Tiêu đề
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" id="timeline-title" name="title[]" required="required"
                                            class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group mb-5">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="timeline-description">Mô tả lộ trình <span class="required">*</span>
                                        </label>
                                        <textarea class="description" name="description[]" id="timeline-description"></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                            @endfor
                            <div class="item form-group">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replaceAll('description');
    </script>
@endsection
