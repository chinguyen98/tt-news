@extends('layouts/app')

@section('content')

<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="/" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                {{$nhomtin->Ten_nhomtin}}
            </span>
        </div>

        @include('inc.searchBar')
    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        {{$nhomtin->Ten_nhomtin}}
    </h2>
</div>

<!-- Feature post -->
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-12 p-rl-1">
                <div class="row m-rl--1">
                    @foreach($nhomtin->listLoaiTin as $loaitin)

                    @if($loaitin->Trangthai == 0)

                    @continue

                    @else

                    <div class="col-sm-4 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(images/notfound.png);">
                            <a href="/loaitin/{{$loaitin->Id_loaitin}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <h1 class="how1-child2 m-t-14">
                                    <a href="/loaitin/{{$loaitin->Id_loaitin}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{$loaitin->Ten_loaitin}}
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>

                    @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page content -->
<div class="container p-t-4 p-b-40 pt-5">
    <h2 class="f1-l-1 cl2">
        {{$nhomtin->Ten_nhomtin}} mới nhất
    </h2>
</div>

<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-12 p-rl-1">
                <div class="row m-rl--1">
                    @foreach($tins as $tin)

                    @if($loop->index==6)

                    @break

                    @else

                    <div class="col-sm-4 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(images/{{$tin->Hinhdaidien}});">
                            <a href="/tin/{{$tin->Id_tin}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="/loaitin/{{$loaitin->Id_loaitin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$loaitin->Ten_loaitin}}
                                </a>
                                <h1 class="how1-child2 m-t-14">
                                    <a href="/tin/{{$tin->Id_tin}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{$tin->Tieude}}
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>

                    @endif

                    @endforeach
                </div>
            </div>
            <div class="col-md-12 p-rl-1 my-5">
                <!-- Begin pagination -->
                <nav class="tinPagination" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Trước</a>
                        </li>
                        <li class="page-item active"><a class="page-link">1</a></li>

                        @for ($i = 0; $i < ceil(count($tins)/6); $i++)

                        @if($i==0)

                        @continue

                        @else

                        <li class="page-item"><a class="page-link">{{$i+1}}</a></li>

                        @endif

                        @endfor

                        <li class="page-item">
                            <a class="page-link" href="#">Sau</a>
                        </li>
                    </ul>
                </nav>
                <!-- End pagination -->
            </div>
        </div>
    </div>
</section>

<script src="/js/pagination"></script>

@endsection