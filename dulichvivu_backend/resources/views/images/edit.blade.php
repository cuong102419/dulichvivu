@extends('layout.master')

@section('title')
    Thêm hình ảnh tour
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Sửa hình ảnh Tours</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <p>Thêm hình ảnh, tối thiểu 4 hình ảnh và tối đa 5 hình ảnh.</p>
                            <form id="image-create" action="{{ route('image.update', $tour->id) }}"
                                data-url="{{ route('image.update', $tour->id) }}" method="post"
                                enctype="multipart/form-data" class="dropzone">
                                @csrf
                            </form>
                            <div class="mt-3">
                                <div>
                                    <label for="">Ảnh gốc của tour</label>
                                    @if (!$images)
                                        <p>Chưa có ảnh nào.</p>
                                    @endif
                                </div>
                                @foreach ($images as $image)
                                    <img style="object-fit: cover; max-width: 100%; height: 150px;"
                                        src="{{ Storage::url($image->image_url) }}" alt="" class="mr-2 mb-2 rounded">
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('tour.edit', $tour->slug) }}" class="btn btn-secondary">Quay lại</a>
                                <a href="{{ route('timeline.edit', $tour->slug) }}"
                                    data-redirect-url="{{ route('timeline.edit', $tour->slug) }}"
                                    class="btn btn-primary btn-upload">Lưu</a>
                                <a href="{{ route('timeline.edit', $tour->slug) }}" class="btn btn-success">Lộ trình</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
