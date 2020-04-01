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
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
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
            <div class="col-md-10 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            {{$tin->loaitin->Ten_loaitin}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection