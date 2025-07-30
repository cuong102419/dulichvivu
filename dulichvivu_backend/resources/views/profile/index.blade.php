@extends('layout.master')

@section('title')
    Thông tin tài khoản
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Thông tin tài khoản</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view rounded"
                                        src="{{ Storage::url($admin->avatar) ?? asset('administrator/images/user.png') }}"
                                        width="150" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>

                            <h3>{{ $admin->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i>
                                    {{ $admin->address }}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i>
                                    {{ $admin->role == 'super_admin' ? 'Quản trị viên' : 'Nhân viên' }}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-envelope user-profile-icon"></i>
                                    <span>{{ $admin->email }}</span>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <form action="{{ route('profile.update', $admin->id) }}" class="form-horizontal form-label-left"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Họ tên
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" required="required"
                                            class="form-control" value="{{ $admin->name }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Mật khẩu
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="password" id="password" minlength="6" name="password"
                                            required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="address" class="col-form-label col-md-3 col-sm-3 label-align">Địa
                                        chỉ</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="address" class="form-control" type="text" name="address"
                                            value="{{ $admin->address }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="avatar">Ảnh</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="avatar" name="avatar" class="form-file">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
