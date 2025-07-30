@extends('layout.master')

@section('title')
    Quản lý người dùng
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý người dùng</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 col-sm-4  profile_details">
                    <div class="well profile_view">
                        <div class="col-sm-12">
                            <h5><i>{{ $user->is_active == 'yes' ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}</i></h5>
                            <div class="left col-md-7 col-sm-7">
                                <h2>{{ $user->name }}</h2>
                                <p>{{ $user->email }} </p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-building"></i> Address: {{ $user->address }}</li>
                                </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                                <img src="{{ asset('administrator/images/user.png') }}" alt=""
                                    class="img-circle img-fluid">
                            </div>
                        </div>
                        <div class=" profile-bottom text-center">
                            <div class=" col-sm-12 emphasis d-flex justify-content-end">
                                <form action="{{ route('user.status', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @if ($user->is_active == 'no')
                                        <button type="submit" name="action" value="active"
                                            class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                            Kích
                                            hoạt</button>
                                    @endif

                                    @if ($user->status == 'banned')
                                        <button type="submit" name="action" value="unban" class="btn btn-primary btn-sm">
                                            <i class="fa fa-unlock"></i> Mở khóa
                                        </button>
                                    @else
                                        <button type="submit" name="action" value="ban"
                                            onclick="return confirm('Bạn có chắc muốn khóa tài khoản')"
                                            class="btn btn-warning btn-sm"> <i class="fa fa-ban">
                                            </i> Chặn </button>
                                    @endif
                                    <button type="submit" name="action" value="delete"
                                        onclick="return confirm('Bạn có chắc muốn xóa tài khoản')"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-close"></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $users->links() }}
    </div>
@endsection
