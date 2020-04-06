@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><b>QUẢN TRỊ WEBSITE</b></a>
        <small>Chúc ngày mới an lành</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="/login">
                @csrf
                <div class="msg">Mời bạn đăng nhập</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus value="">
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
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    @error('password')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Ghi nhớ</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">Đăng Nhập</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">

                    <div class="col-xs-12 align-right">
                        <a href="forgot-password.html">Quên mật khẩu?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection