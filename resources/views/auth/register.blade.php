@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><b>QUẢN TRỊ WEBSITE</b></a>
        <small>Chúc ngày mới an lành</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="/register">
                @csrf
                <div class="msg">Mời bạn đăng kí</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Tên quản trị"  autocomplete="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}" autocomplete="email">
                    </div>
                    @error('email')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu" name="password"  autocomplete="new-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu"  autocomplete="new-password">
                    </div>
                </div>

                <div class="row">
                  
                    <div class="col-xs-12">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">Đăng Ký</button>
                    </div>
                    <div class="col-xs-6 align-left">
                        <a href="/login">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection