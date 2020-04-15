<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        Về chúng tôi
                    </a>
                </div>

                <div class="right-topbar">
                    <a href="https://www.facebook.com/groups/506105220057506/">
                        <span class="fab fa-facebook"></span>
                    </a>
                    <a href="https://github.com/chinguyen98/tt-news">
                        <span class="fab fa-github"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <a href="#" class="left-topbar-item">
                            Về chúng tôi
                        </a>
                    </span>
                </li>


                <li class="right-topbar">
                    <a href="https://www.facebook.com/groups/506105220057506/">
                        <span class="fab fa-facebook"></span>
                    </a>
                    <a href="https://github.com/chinguyen98/tt-news">
                        <span class="fab fa-github"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="/">Trang chủ</a>
                </li>

                @foreach($listnhomtin as $nhomtin)

                <li>
                    <a href="/nhomtin/{{$nhomtin->Id_nhomtin}}">{{$nhomtin->Ten_nhomtin}}</a>
                </li>

                @endforeach
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="/"><img src="images/icons/logo-01.png" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="/">
                        <img src="images/icons/logo-01.png" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="mega-menu-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        @foreach($listnhomtin as $nhomtin)
                        <li class="mega-menu-item">
                            <a href="/nhomtin/{{$nhomtin->Id_nhomtin}}">{{$nhomtin->Ten_nhomtin}}</a>
                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    @foreach($nhomtin->listLoaiTin as $loaitin)

                                    @if($loaitin->Trangthai == 0)

                                    @continue

                                    @else

                                    <a class="nav-link" data-toggle="pill" href="#loaitin-{{$loaitin->Id_loaitin}}" role="tab">{{$loaitin->Ten_loaitin}}</a>

                                    @endif

                                    @endforeach
                                </div>
                                <div class="tab-content">
                                    @foreach($nhomtin->listLoaiTin as $loaitin)

                                    @if($loop->index===0)

                                    <div class="tab-pane show active" id="loaitin-{{$loaitin->Id_loaitin}}" role="tabpanel" aria-expanded="true">

                                        @else

                                        <div class="tab-pane show" id="loaitin-{{$loaitin->Id_loaitin}}" role="tabpanel" aria-expanded="false">

                                            @endif

                                            <div class="row">
                                                @foreach($loaitin->listTin as $tin)

                                                @if($loaitin->Trangthai == 0)

                                                @break

                                                @elseif($tin->Trangthai == 0)

                                                @continue

                                                @else

                                                <div class="col-3">
                                                    <div>
                                                        <a href="/tin/{{$tin->Id_tin}}" class="wrap-pic-w hov1 trans-03">
                                                            <img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="/tin/{{$tin->Id_tin}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    {{$tin->Tieude}}
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <span class="f1-s-3">
                                                                    {{$tin->Ngaydangtin}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif

                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>