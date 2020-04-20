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

<section class="bg0 p-b-140 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 p-b-30">
                <h1>alo</h1>
            </div>
        </div>
    </div>
</section>

@endsection