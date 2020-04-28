@extends('layouts.index')

@section('content')

<div class="login-box">
 
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="/admin/newpassword">
                @csrf
                @include('error.note1')
                <div class="msg">Đổi mật khẩu</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{Auth::user()->email}}" autocomplete="email" disabled>
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
                        <input id="password" type="password" class="form-control @error('password_cu') is-invalid @enderror" placeholder="Mật khẩu cũ" name="password_cu"  autocomplete="new-password">
                    </div>
                    @error('password_cu')
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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu mới" name="password"  autocomplete="new-password">
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
                   @error('password_confirmation')
                   <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="row">
              
                <div class="col-xs-12">
                    <button class="btn btn-block bg-pink waves-effect" type="submit">Đồng ý</button>
                </div>
                <div class="col-xs-6 align-left">
                    <a href="/admin/home">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection