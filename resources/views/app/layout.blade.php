<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:locale" content="vn_VN" />
        <meta property="og:type" content="film" />
        <meta property="og:title" content="Phim: Nguoi Phan Xu" />
        <meta name="description" content="Phim Nguoi Phan Xu | Nguoi Phan Xu | Phim VTV Nguoi phan xu | Khai thác đề tài về hoạt động tội phạm, băng nhóm
         có tổ chức thời kinh tế thị trường - sự kết hợp giữa bạo lực và kinh doanh,
         trùm giang hồ đội lốt doanh nhân, Người phán xử hy vọng sẽ mang lại luồng gió mới cho thể loại phim hình sự.">

        <meta name="keywords" content="Phim Nguoi Phan Xu,Phan Xu,Phan Quân,Thế Chột, Lân Sứa, Hải Khùng">

        <meta property="og:url" content="http://nguoi-phan-xu.com" />
        <meta property="og:site_name" content="Người Phán Xử" />
        <meta property="article:section" content="Film" />
        <meta property="og:image" content="http://res.cloudinary.com/dzaidinjj/image/upload/v1495904041/Nguoi-phan-xu-660_rknnyy.jpg" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
        <title>Phim Nguoi Phan Xu</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="./css/all.css" rel="stylesheet" type="text/css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
         @yield('css')
        <script>
            var cookie_code = "{{COOKIE_CODE}}";
        </script>
        @include('partials.adsense')
    </head>
    <body>
        @include('app.menu')
        <div class="container-fluid main">
            @yield('body')
        </div>
        @include('app.footer')
        @include('partials.ga')
    </body>
</html>
