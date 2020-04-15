@extends('layouts/app')

@section('content')

<!-- Headline -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            <span class="text-uppercase cl2 p-r-8">
                Tin mới nổi:
            </span>

            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                @foreach($trendingList as $item)

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{$item->Tieude}}
                </span>

                @endforeach
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

<!-- Feature post -->
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-6 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(images/{{$listLastestNew[0]->Hinhdaidien}});">
                    <a href="/tin/{{$listLastestNew[0]->Id_tin}}" class="dis-block how1-child1 trans-03"></a>
                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="/nhomtin/{{$listLastestNew[0]->Id_nhomtin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{$listLastestNew[0]->tenNhomTin}}
                        </a>

                        <h3 class="how1-child2 m-t-14 m-b-10">
                            <a href="/tin/{{$listLastestNew[0]->Id_tin}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{$listLastestNew[0]->Tieude}}
                            </a>
                        </h3>

                        <span class="how1-child2">
                            <span class="f1-s-4 cl11">
                                {{$listLastestNew[0]->Tacgia}}
                            </span>

                            <span class="f1-s-3 cl11 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3 cl11">
                                {{$listLastestNew[0]->Ngaydangtin}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    <div class="col-12 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(images/{{$listLastestNew[1]->Hinhdaidien}});">
                            <a href="/tin/{{$listLastestNew[1]->Id_tin}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="/nhomtin/{{$listLastestNew[1]->Id_nhomtin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$listLastestNew[1]->tenNhomTin}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="/tin/{{$listLastestNew[1]->Id_tin}}" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        {{$listLastestNew[1]->Tieude}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(images/{{$listLastestNew[2]->Hinhdaidien}});">
                            <a href="/tin/{{$listLastestNew[2]->Id_tin}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="/nhomtin/{{$listLastestNew[2]->Id_nhomtin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$listLastestNew[2]->tenNhomTin}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="/tin/{{$listLastestNew[0]->Id_tin}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{$listLastestNew[2]->Tieude}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(images/{{$listLastestNew[3]->Hinhdaidien}});">
                            <a href="/tin/{{$listLastestNew[3]->Id_tin}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="/nhomtin/{{$listLastestNew[3]->Id_nhomtin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$listLastestNew[3]->tenNhomTin}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="/tin/{{$listLastestNew[3]->Id_tin}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{$listLastestNew[3]->Tieude}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Post -->
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    @foreach($listnhomtin as $nhomtin)

                    <div class="tab01 p-b-20">
                        <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                            <h3 class="f1-m-2 cl12 tab01-title">
                                {{$nhomtin->Ten_nhomtin}}
                            </h3>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($nhomtin->listLoaiTin as $loaitin)

                                @if($loaitin->Trangthai == 0)

                                @continue

                                @else

                                <li class="nav-item">
                                    @if($loop->index===0)
                                    <a class="nav-link active" data-toggle="tab" href="#loaitin2-{{$loaitin->Id_loaitin}}" role="tab">{{$loaitin->Ten_loaitin}}</a>
                                    @else
                                    <a class="nav-link" data-toggle="tab" href="#loaitin2-{{$loaitin->Id_loaitin}}" role="tab">{{$loaitin->Ten_loaitin}}</a>
                                    @endif
                                </li>

                                @endif

                                @endforeach
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content p-t-35">
                            <!-- - -->
                            @foreach($nhomtin->listLoaiTin as $loaitin)

                            @if($loop->index===0)
                            <div class="tab-pane fade active show" id="loaitin2-{{$loaitin->Id_loaitin}}" role="tabpanel">
                                @else
                                <div class="tab-pane fade" id="loaitin2-{{$loaitin->Id_loaitin}}" role="tabpanel">
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="/tin/{{$loaitin->listTin[0]->Id_tin}}" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/{{$loaitin->listTin[0]->Hinhdaidien}}" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="/tin/{{$loaitin->listTin[0]->Id_tin}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{$loaitin->listTin[0]->Tieude}}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{$loaitin->listTin[0]->Tacgia}}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$loaitin->listTin[0]->Ngaydangtin}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            @foreach($loaitin->listTin as $tin)

                                            @if($loop->index===0)
                                            @continue

                                            @elseif($loop->index>3)
                                            @break

                                            @elseif($tin->Trangthai == 0)
                                            @continue

                                            @else

                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="/tin/{{$loaitin->listTin[0]->Id_tin}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                                                </a>
                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="/tin/{{$loaitin->listTin[0]->Id_tin}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {{
                                                            strlen($tin->Tieude)>52 ?  mb_strimwidth($tin->Tieude, 0, 52, '...') :  $tin->Tieude
                                                            }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            {{$tin->Tacgia}}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$tin->Ngaydangtin}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>



                                            @endif

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>

                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Tin hot -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Tin hot:
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach($trendingList as $news)

                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        {{$loop->index+1}}
                                    </div>

                                    <a href="/tin/{{$news->Id_tin}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{$news->Tieude}}
                                    </a>
                                </li>

                                @endforeach
                            </ul>
                        </div>
                        <!--  -->

                        <!--  -->
                        <div class="p-t-50">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Lượt theo dõi
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            6879 lượt
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Thích
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fab fa-twitter"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            568 lượt
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Theo dõi
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fab fa-youtube"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            5039 lượt
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Đăng ký
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Latest -->
<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Tin mới nhất
                    </h3>
                </div>

                <div class="row p-t-35">
                    @foreach($latestNewsList as $tin)

                    <div class="col-sm-3 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->
                        <div class="m-b-45">
                            <a href="/tin/{{$tin->Id_tin}}" class="wrap-pic-w hov1 trans-03">
                                <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="/tin/{{$tin->Id_tin}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$tin->Tieude}}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{$tin->Tacgia}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{$tin->Ngaydangtin}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@endsection