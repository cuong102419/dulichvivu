@extends('layout.master')

@section('title')
    Lộ trình
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Cập nhật lộ trình</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        @if ($timelines->isEmpty())
                            <h4>Chưa có lộ trình nào cho tour này, bạn cần thêm lộ trình trước khi sửa.</h4>
                            <div class="mt-3">
                                <a href="{{ route('timeline.create', $tour->slug) }}" class="btn btn-sm btn-primary">Thêm lộ
                                    trình</a>
                            </div>
                        @else
                            <form action="{{ route('timeline.update', $tour->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                @foreach ($timelines as $index => $timeline)
                                    <div class="item form-group justify-content-between">
                                        <label for="">Ngày thứ {{ $index + 1 }}</label>
                                        @if ($index + 1 > $tour->total_day)
                                            <h6 class="text-danger">
                                                Lộ trình thừa
                                            </h6>
                                        @endif
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="timeline-title">Tiêu đề
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="timeline-title" name="title[]"
                                                value="{{ $timeline->title }}" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group mb-5">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="timeline-description">Mô tả lộ trình <span class="required">*</span>
                                            </label>
                                            <textarea class="description" name="description[]" id="timeline-description">{{ $timeline->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                @endforeach

                                @if ($count < $tour->total_day)
                                    @for ($i = $count; $i < $tour->total_day; $i++)
                                        <div class="item form-group">
                                            <label for="">Ngày thứ {{ $i + 1 }} (Mới)</label>
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
                                                <label for="timeline-description">Mô tả lộ trình <span
                                                        class="required">*</span>
                                                </label>
                                                <textarea class="description" name="description[]" id="timeline-description"></textarea>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                    @endfor
                                @endif

                                <div class="item form-group">
                                    <a href="{{ route('image.edit', $tour->slug) }}" class="btn btn-secondary">Quay lại</a>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{ route('departure.list', $tour->slug) }}" class="btn btn-success">Lịch
                                        trình</a>
                                </div>

                            </form>
                            @if ($count > $tour->total_day)
                                <form action="{{ route('timeline.delete', $tour->id) }}" method="post" onsubmit="return confirm('Xóa hết lộ trình thừa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa tất cả lộ trình thừa</button>
                                </form>
                            @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replaceAll('description');
    </script>
@endsection
