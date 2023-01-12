<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <!-- CSS here -->
    @include('front.partials.css')
    @vite('resources/js/app.js')
@yield('css')
</head>

<body>
<div id="app">
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('front.partials.header')
    <main>

        @yield('content')

    </main>
</div>

@include('front.partials.footer')
<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->

@include('front.partials.js')
@stack('js')

</body>
</html>
