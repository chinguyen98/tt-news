@extends('layouts/app')

@section('content')

<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="/" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>

            <a href="/nhomtin/{{$tin->loaitin->nhomtin->Id_nhomtin}}" class="breadcrumb-item f1-s-3 cl9">
                {{$tin->loaitin->nhomtin->Ten_nhomtin}}
            </a>

            <a href="/loaitin/{{$tin->loaitin->Id_loaitin}}" class="breadcrumb-item f1-s-3 cl9">
                {{$tin->loaitin->Ten_loaitin}}
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                {{$tin->Tieude}}
            </span>
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Tìm kiếm">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </div>
</div>

<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            {{$tin->loaitin->Ten_loaitin}}
                        </a>
                        <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                            {{$tin->Tieude}}
                        </h3>
                        <div class="flex-wr-s-s p-b-40">
                            <span class="f1-s-3 cl8 m-r-15">
                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                    bởi {{$tin->Tacgia}}
                                </a>

                                <span class="m-rl-3">-</span>

                                <span>
                                    {{$tin->Ngaydangtin}}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{$tin->Solanxem}} lượt xem
                            </span>

                            <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
                                {{count($tin->listBinhLuan)}} bình luận
                            </a>
                        </div>

                        <div class="wrap-pic-max-w p-b-30">
                            <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                        </div>

                        <div style="text-align: justify">
                            {!! $tin->Noidung !!}
                        </div>
                        <div class="row mt-5">
                            <div class="col col-sm-12 col-md-8">
                                <!-- Leave a comment -->
                                <h4 class="f1-l-4 cl3 p-b-12">
                                    Bình luận:
                                </h4>

                                <p class="f1-s-13 cl8 p-b-40">
                                    Vui lòng kèm địa chỉ email (Địa chỉ email của bạn sẽ không công khai)!
                                </p>
                                    <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Bình luận..."></textarea>
                                    <div class="notifyNoidung mb-2 bg-danger text-white p-1 text-center d-none"></div>

                                    <!--
                                    <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Tên">
                                    -->

                                    <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="abc@gmail.com">
                                    <div class="notifyEmail mb-2 bg-danger text-white p-1 text-center d-none"></div>

                                    <input type="hidden" name="Idtin" value="{{$tin->Id_tin}}">

                                    <h1>Vui lòng nhập đúng mã bảo vệ</h1>
                                    <div class='mt-3'>
                                        <h1 class="captcha"></h1>
                                        <input class="mt-2 bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="captcha">
                                    </div>
                                    <div class="notifyCaptcha bg-danger text-white p-1 text-center d-none"></div>
                                    <button class="btnBinhLuan mt-2 size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                        Bình luận
                                    </button>
                                    <div class="mt-5 notifySuccess bg-success text-white p-3 text-center d-none"></div>
                                <hr>
                                <!-- Show BinhLuan -->

                                <div>

                                    @foreach($listBinhluan as $binhluan)

                                    @if($binhluan->Trangthai == 0)

                                    @continue

                                    @else

                                    <div>
                                        <strong>{{$binhluan->Thoigian}}</strong>
                                        <p>{{$binhluan->Noidung}}</p>
                                        <hr>
                                    </div>

                                    @endif

                                    @endforeach

                                </div>

                                <!-- End Show BinhLuan -->
                            </div>
                            <div class="col col-sm-12 col-md-4">
                                <div class="size-h-3 flex-s-c">
                                    <h5 class="f1-m-7 cl0 text-danger">
                                        Bài viết liên quan
                                    </h5>
                                </div>
                                <ul>
                                    @foreach($relatedPosts as $tin)

                                    <li class="flex-wr-sb-s p-b-20">
                                        <a href="/tin/{{$tin->Id_tin}}" class="size-w-4 wrap-pic-w hov1 trans-03">
                                            <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                                        </a>

                                        <div class="size-w-5">
                                            <h6 class="p-b-5">
                                                <a href="/tin/{{$tin->Id_tin}}" class="f1-s-5 cl11 hov-cl10 trans-03">
                                                    {{$tin->Tieude}}
                                                </a>
                                            </h6>

                                            <span class="f1-s-3 cl6">
                                                {{$tin->Ngaydangtin}}
                                            </span>
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/js/captcha.js"></script>

@endsection