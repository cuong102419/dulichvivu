@extends('layout.master')

@section('title')
    Thêm hình ảnh tour
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Thêm hình ảnh Tours</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <p>Thêm hình ảnh, tối thiểu 4 hình ảnh.</p>
                            <form id="image-create" action="{{ route('image.store', $tour->id) }}"
                                data-url="{{ route('image.store', $tour->id) }}" method="post"
                                enctype="multipart/form-data" class="dropzone">
                                @csrf
                            </form>
                            <div class="mt-4">
                                <a href="{{ route('timeline.create', $tour->slug) }}"
                                    data-redirect-url="{{ route('timeline.create', $tour->slug) }}"
                                    class="btn btn-primary btn-upload">Tiếp theo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
