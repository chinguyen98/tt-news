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

        @include('inc.searchBar')
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
                        <button class="showReplyContainerBtn btn btn-primary mt-3">Bình luận bài viết này.</button>
                        <div class="row mt-5">
                            <div class="col col-sm-12 col-md-8">
                                <!-- Show BinhLuan -->

                                <div>

                                    @foreach($listBinhluan as $binhluan)

                                    @if($binhluan->Trangthai == 0)

                                    @continue

                                    @elseif($binhluan->Trangthai != 0 && $binhluan->Binhluan_cha==null)

                                    <div>
                                        <div class="d-flex">
                                            <strong class="mr-3">{{$binhluan->Ten}}</strong>
                                            <div><strong class="text-success">{{$binhluan->Thoigian}}</strong></div>
                                        </div>
                                        <p>{{$binhluan->Noidung}}</p>
                                        <a data-idBinhLuanCha="{{$binhluan->Id_binhluan}}" style="cursor: pointer" class="replyBinhluan text-primary">Xem phản hồi</a>
                                        <a data-idBinhLuanCha="{{$binhluan->Id_binhluan}}" style="cursor: pointer" class=" ml-3 text-success">Trả lời</a>
                                        <div data-replyBinhluanCha="{{$binhluan->Id_binhluan}}" class="ml-4">

                                        </div>
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
    <div class="replyContainer d-none p-1">
        <!-- Leave a comment -->
        <div class="d-flex justify-content-between align-items-center">
            <span>
                <h1>Bình luận:</h1>
            </span>
            <span class="replyContainer__close">X</span>
        </div>

        <p class="f1-s-13 cl8 p-b-40 text-white">
            Vui lòng kèm địa chỉ email (Địa chỉ email của bạn sẽ không công khai)!
        </p>
        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="Ten" placeholder="Tên của bạn">
        <div class="notifyName mb-2 bg-danger text-white p-1 text-center d-none"></div>

        <textarea rows="2" class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Nhập bình luận"></textarea>
        <div class="notifyNoidung mb-2 bg-danger text-white p-1 text-center d-none"></div>

        <!--
                                    <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Tên">
                                    -->

        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="abc@gmail.com">
        <div class="notifyEmail mb-2 bg-danger text-white p-1 text-center d-none"></div>

        <input type="hidden" name="Idtin" value="{{$tin->Id_tin}}">

        <h1 class="mb-5">Vui lòng nhập đúng mã bảo vệ</h1>
        <div class='mt-3'>
            <div class="captchaContainer"><i>
                    <h1 class="captcha"></h1>
                </i></div>
            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="captcha">
        </div>
        <div class="notifyCaptcha bg-danger text-white p-1 text-center d-none"></div>
        <div class="mt-5 notifySuccess bg-success text-white p-3 text-center d-none"></div>
        <button class="btnBinhLuan size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
            Bình luận
        </button>
    </div>
</section>

<script src="/js/captcha.js"></script>

@endsection