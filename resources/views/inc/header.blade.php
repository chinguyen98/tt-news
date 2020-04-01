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
                        <span>
                            New York, NY
                        </span>

                        <img class="m-b-1 m-rl-8" src="images/icons/icon-night.png" alt="IMG">

                        <span>
                            HI 58° LO 56°
                        </span>
                    </span>
                </li>

                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="#" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.html">Home</a>
                    <ul class="sub-menu-m">
                        <li><a href="index.html">Homepage v1</a></li>
                        <li><a href="home-02.html">Homepage v2</a></li>
                        <li><a href="home-03.html">Homepage v3</a></li>
                    </ul>

                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="category-01.html">News</a>
                </li>

                <li>
                    <a href="category-02.html">Entertainment </a>
                </li>

                <li>
                    <a href="category-01.html">Business</a>
                </li>

                <li>
                    <a href="category-02.html">Travel</a>
                </li>

                <li>
                    <a href="category-01.html">Life Style</a>
                </li>

                <li>
                    <a href="category-02.html">Video</a>
                </li>

                <li>
                    <a href="#">Features</a>
                    <ul class="sub-menu-m">
                        <li><a href="category-01.html">Category Page v1</a></li>
                        <li><a href="category-02.html">Category Page v2</a></li>
                        <li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
                        <li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
                        <li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
                        <li><a href="blog-detail-01.html">Blog Detail Sidebar</a></li>
                        <li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>

                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
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
                        @foreach($listnhomtin as $nhomtin)
                        <li class="mega-menu-item">
                            <a href="/nhomtin/{{$nhomtin->Id_nhomtin}}">{{$nhomtin->Ten_nhomtin}}</a>
                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    @foreach($nhomtin->listLoaiTin as $loaitin)
                                    <a class="nav-link" data-toggle="pill" href="#loaitin-{{$loaitin->Id_loaitin}}" role="tab">{{$loaitin->Ten_loaitin}}</a>
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