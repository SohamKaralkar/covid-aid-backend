<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<body>
    <div class="loader">
        <div class="loader-inner">
            <h1 class="ml6">
                <span class="text-wrapper">
                  <span class="letters">COVID-AID</span>
                </span>
            </h1>
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
              </div>
        </div>
    </div>
    <!-- Start of header -->
        @include("layouts.includes._header")
    <!-- End of header -->
    <!-- Start of content -->
    <div class="container">
        @yield("content")
    </div>
    <!-- End of content -->
    <script src="{{asset('js/anime.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    @yield("page-level-scripts")
</body>

</html>
