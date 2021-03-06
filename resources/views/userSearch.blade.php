@extends('layouts/app')

@section('content')

<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="/" class="breadcrumb-item f1-s-3 cl9">
                Trang chủ
            </a>
        </div>

        @include('inc.searchBar')
    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <div class="row">
        <div class="col col-md-12 d-block">
            <h2 class="f1-l-1 cl2 " style="overflow: auto">
                <span>Kết quả tìm kiếm:</span>
                <span style="overflow: auto" class="ml-3">{{$searchKey}}</span>
            </h2>
        </div>
    </div>
</div>

<!-- Post -->
<section class="bg0 p-b-25">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 p-b-80">
                <div class="row">
                    @foreach($searchResult as $tin)

                    @if($tin->Trangthai == 0)

                    @continue

                    @else

                    <div class="col-sm-4 p-r-25 p-r-15-sr991">
                        <!-- Item -->
                        <div class="p-b-53">
                            <a href="/tin/{{$tin->Id_tin}}" class="wrap-pic-w hov1 trans-03">
                                <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                            </a>

                            <div class="flex-col-s-c p-t-16">
                                <h5 class="p-b-5 txt-center" title="{{$tin->Tieude}}">
                                    <a href="/tin/{{$tin->Id_tin}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{
                                            strlen($tin->Tieude)>70 ?  mb_strimwidth($tin->Tieude, 0, 70, '...') :  $tin->Tieude
                                        }}
                                    </a>
                                </h5>

                                <div class="cl8 txt-center p-b-17">
                                    <a href="/loaitin/{{$tin->loaitin->Id_loaitin}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{$tin->loaitin->Ten_loaitin}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{$tin->Ngaydangtin}}
                                    </span>
                                </div>

                                <p class="f1-s-11 cl6 txt-center p-b-16">
                                    {{strlen($tin->Mota)>80 ? mb_strimwidth($tin->Tieude, 0, 80, '...') : $tin->Mota}}
                                </p>

                                <a href="/tin/{{$tin->Id_tin}}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                    Đọc thêm
                                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @endif

                    @endforeach
                </div>
            </div>
        </div>
</section>

@endsection