<!doctype html>
<html lang="en">
<head>


    <meta charset="utf-8">


    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>Prestashop_Savemart</title>
    <meta name="description" content="Shop powered by PrestaShop">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link href="{{asset('assets/front/css/css.css')}}?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="{{asset('assets/front/css/css-1.css')}}?family=Oswald:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/themes/vinova_savemart/assets/cache/theme-78026624.css')}}"
          type="text/css" media="all">


    <script type="text/javascript">

        var prestashop = {
            "static_token": "28add935523ef131c8432825597b9928",
            "token": "cad5fe8236d849a3b4023c4e5ca6a313"
        };
    </script>

    <script type="text/javascript">
        var baseDir = "/savemart/";
        var static_token = "28add935523ef131c8432825597b9928";
    </script>


    <style type="text/css">
        #main-site {
            background-color: #ffffff;
        }

        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }

            #header .container {
                width: 1200px;
            }

            .footer .container {
                width: 1200px;
            }

            #index .container {
                width: 1200px;
            }
        }

        #popup-subscribe .modal-dialog .modal-content {
            background-image: url(../modules/novthemeconfig/images/newsletter_bg-1.png);
        }
    </style>

    @yield('styles')
</head>
<body id="index" class="lang-en country-gb currency-gbp layout-full-width page-index tax-display-enabled">


<main id="main-site" class="displayhomenovthree">


    <header id="header" class="header-3 sticky-menu">

        @include('front.includes.header-mobile')
        @include('front.includes.header-top')
        @include('front.includes.header-center')
        @include('front.includes.header-bottom')
    </header>

    <div id="header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex align-items-center col-xl-3 col-md-3">
                    <div class="contentstickynew_verticalmenu"></div>
                    <div class="contentstickynew_logo"></div>
                </div>
                <div class="contentstickynew_search col-xl-7 col-md-6"></div>
                <div class="contentstickynew_group d-flex justify-content-end col-xl-2 col-md-3"></div>
            </div>
        </div>
    </div>


    <aside id="notifications">
        <div class="container">


        </div>
    </aside>

    @yield('slider')
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            @yield('content')
        </div>
    </div>

    @include('front.includes.footer')
    <div class="canvas-overlay"></div>
    <div id="back-top">
  <span>
    <i class="fa fa-long-arrow-up"></i>  </span>
    </div>
</main>


<script type="text/javascript"
        src="{{asset('assets/front/themes/vinova_savemart/assets/cache/bottom-3c96ed23.js')}}"></script>

@yield('scripts')

</body>
</html>
