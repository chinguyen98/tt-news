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
                Về chúng tôi
            </span>
        </div>

        @include('inc.searchBar')
    </div>
</div>

<div class="row slider-text justify-content-center align-items-center">
    <div class="col-md-9 col-sm-12 text-center ftco-animate">
        <p class="intro-cd">Thông Tin Thành Viên</p>
    </div>
</div>
<div class="row slider-text justify-content-center align-items-center mb-5">
    <div class="col-md-9 col-sm-12 text-center ftco-animate">
        <ul style="font-size: 1.2rem">
            <li class="mb-1">Nguyễn Đắc Chí - DH51601700</li>
            <li class="mb-1">Lê Văn Hiểu - DH51601561</li>
            <li class="mb-1">Trần Thanh Hiếu - DH51601158</li>
            <li class="mb-1">Đặng Tấn Đạt - DH51601489</li>
            <li class="mb-1">Phạm Ngọc Thạch - DH51601233</li>
            <li class="mb-1">Lê Hoàng Tân - DH51601296</li>
        </ul>
    </div>
</div>

<div class="row slider-text justify-content-center align-items-center">
    <div class="col-md-9 col-sm-12 text-center ftco-animate">
        <p class="intro-cd">Đôi Nét Về Website Tin Tức Trực Tuyến</p>
    </div>
</div>
<div class="container">
    <div class="col-md-6 col-sm-12 text-center ftco-animate">
        <p class="td"><u>ĐẶC ĐIỂM CỦA MỘT THIẾT KẾ WEBSITE TIN TỨC:</u> </p>
    </div>
</div>

<div class="container">
    <div class="col-md-11 col-sm-11 text-center ftco-animate">
        <div class="tr">
            <p class="pt-2"><i>-Khi thành lập webiste dạng này, đặc thù riêng là phải phục vụ đến nhiều đối tượng độc giả nên giao diện và bố cục đơn giản,tốc độ đường truyền nhanh, máy chủ ổn định và chịu tải cao, dung lượng và băng thông lớn.</i></p>
            <p class="pt-2"><i>-Thiết kế Website chuyên nghiệp, bố cục khoa học các chức năng nhằm tạo sự dễ dàng, thuận tiện, giao diện lôi cuốn người đọc.</i></p>
            <p class="pt-2"><i>-Website được sử dung các công nghệ trong thiết kế và code để load nhanh và tăng tính linh hoạt cho website.</i></p>
            <p class="pt-2"><i>-Có hệ thống quản trị website chuyên nghiệp và đa chức năng nhằm giúp doanh nghiệp có thể thay đổi nội dung website, cập nhật thông tin mới, chỉnh sửa hoặc xóa.</i></p>
            <p class="pt-2"><i>-Hệ quản trị có sự phân quyền để một doanh nghiệp chuyên nghiệp có thể phân công nhiệm vụ cập nhật tin tức theo chức năng.</i></p>
            <p class="pt-2"><i>-Tích hợp tool editor cho phép người quản trị cập nhật nội dung ngay trên website mà không cần sử dụng thêm công cụ nào khác.</i></p>
            <p class="pt-2"><i>-Cho phép người đọc đăng ký thành viên để chia sẻ thông tin, viết bài…</i></p>
            <p class="pt-2"><i>-Website được thiết kế là hệ thống quản trị thông tin – một toàn soạn điện tử, cho phép phần quyền nhiều cấp như: xoạn bài viết, duyệt bài viết, xuất bản bài viết..</i></p>
            <p class="pt-2"><i>-Các tiện ích – ứng dụng web giúp người truy cập khai thác tối đa các thông tin trên website</i></p>
            <p class="pt-2"><i>-Xây dựng đường dẫn thân thiện với các công cụ tìm kiếm</i></p>
            <p class="pt-2"><i>-Về mặt tương thích: website có thể chạy tốt trên các trình duyệt thông dung như IE, Firefox, Google chrome, Opera…</i></p>
            <p class="pt-2"><i>-Xây dựng hệ thống chuyên nghiệp, mở rộng để dể dàng nâng cấp mà không cần phải thiết kế mới</i></p>
            <p class="pt-2"><i>-Ngôn ngữ lập trình Microsoft Visual C# trên nền tảng Asp.Net. Dung lượng code website 5MB và Phiên bản website chạy trên mobile.</i></p>
            <p class="pt-2"><i><b>Ngày nay, số lượng website tin tức riêng ở Việt Nam đã là một con số không thể đếm được, nội dung cập nhật, tin tức mỗi ngày tương đối là giống nhau. Điều thu hút người truy cập ở đấy chính là nằm ở thiết kế web tin tức, giao diện bắt mắt, bố cục rõ ràng dễ dàng tìm kiếm, dung lượng ít, tải nhanh,…. Nếu các doanh nghiệp đang có ý định xây dựng một trang báo mạng cho riêng mình thì cần phải chú ý đến các đặc điểm kể trên và tạo dựng cho website của mình một ấn tượng riêng, một phong cách riêng, như vậy mới thu hút được độc giả internet hết sức nhạy bén và biết chọn lọc như hiện nay.</b></i></p>
            <a href="https://hocvien.haravan.com/blogs/chia-se-thong-tin/lam-sao-de-thiet-ke-web-noi-that-that-noi-bat">Xem thêm</a>
        </div>
    </div>
</div>
</br>

<div class="container">
    <div class="col-md-5 col-sm-12 text-center ftco-animate">
        <p class="td"><u>ĐÔI NÉT VỀ WEBSITE TIN TỨC TT-NEWS:</u> </p>
    </div>
</div>

<div class="container">
    <div class="col-md-11 col-sm-11 text-center ftco-animate">
        <div class="tr">
            <p class="pt-2"><i>-Website của chúng tôi xây dựng theo nền tảng Laravel Framework. Chúng tôi lựa chọn Laravel Framework để thực hiện website vì các php Framework hiện nay đều được xây dựng theo chuẩn mô</i></p>
            <p class="pt-2"><i>-Sử dụng Framework Bootstrap là một nền tảng (framework) miễn phí, mã nguồn mở, dựa trên HTML, CSS & Javascript, nó được tạo ra để xây dựng các giao diện Website tương thích với tất cả các thiết bị có kích thước màn hình khác nhau.</i></p>
            <p class="pt-2"><i>-Bootstrap bao gồm những cái cơ bản có sẵn như: typography, forms, buttons, tables, navigation, modals, image carousels và nhiều thứ khác. Nó cũng có nhiều Component, Javascript hỗ trợ cho việc thiết kế Reponsive của bạn dễ dàng, thuận tiện và nhanh chóng hơn.</i></p>
        </div>
    </div>
</div>

<style type="text/css">
    .intro-cd {
        font-size: 30px;
        font-family: UTM Aquarelle;
        padding-top: 10px;
        padding-bottom: 10px;
        color: blue;

    }

    .td {
        font-size: 20px;
        color: blue;
    }

    .tr {
        font-size: 16px;
        color: black;
        text-align: justify;
        padding: auto;
    }
</style>

@endsection