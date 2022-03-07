<!DOCTYPE html>
<html lang="en" :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LYF | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('image/favicon_io/site.webmanifest') }}">

    {{-- FONTS SECTION --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&family=Newsreader:ital,wght@0,200;0,300;0,400;0,500;0,600;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sacramento&display=swap" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <style type="text/css">
  
        .m0 {
            transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
            -ms-transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
            -webkit-transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
        }

        .v0 {
            vertical-align: 0.000000px;
        }

        .ls0 {
            letter-spacing: 0.000000px;
        }

        .sc_ {
            text-shadow: none;
        }

        .sc0 {
            text-shadow: -0.015em 0 transparent, 0 0.015em transparent, 0.015em 0 transparent, 0 -0.015em transparent;
        }

        @media screen and (-webkit-min-device-pixel-ratio:0) {
            .sc_ {
                -webkit-text-stroke: 0px transparent;
            }

            .sc0 {
                -webkit-text-stroke: 0.015em transparent;
                text-shadow: none;
            }
        }

        .ws5 {
            word-spacing: -12.628651px;
        }

        .ws3 {
            word-spacing: -12.394932px;
        }

        .ws0 {
            word-spacing: -0.279907px;
        }

        .ws4 {
            word-spacing: -0.051825px;
        }

        .ws1 {
            word-spacing: 0.000000px;
        }

        .ws2 {
            word-spacing: 38.454528px;
        }

        ._3 {
            width: 22.626720px;
        }

        ._0 {
            width: 25.589479px;
        }

        ._1 {
            width: 650.321550px;
        }

        ._2 {
            width: 844.949137px;
        }

        .fc2 {
            color: rgb(24, 31, 54);
        }

        .fc3 {
            color: rgb(0, 0, 0);
        }

        .fc1 {
            color: rgb(255, 255, 255);
        }

        .fc0 {
            color: rgb(215, 185, 67);
        }

        .fs4 {
            font-size: 47.715828px;
        }

        .fsb {
            font-size: 48.615559px;
        }

        .fsa {
            font-size: 51.824611px;
        }

        .fs7 {
            font-size: 53.594086px;
        }

        .fs3 {
            font-size: 55.963379px;
        }

        .fs8 {
            font-size: 59.952195px;
        }

        .fs2 {
            font-size: 63.971001px;
        }

        .fs9 {
            font-size: 67.090078px;
        }

        .fs6 {
            font-size: 95.161738px;
        }

        .fs5 {
            font-size: 187.714250px;
        }

        .fs1 {
            font-size: 195.612120px;
        }

        .fs0 {
            font-size: 279.906875px;
        }

        .y0 {
            bottom: -0.500000px;
        }

        .y9 {
            bottom: 0.176737px;
        }

        .y1 {
            bottom: 0.176796px;
        }

        .y8 {
            bottom: 63.583132px;
        }

        .yc {
            bottom: 76.487832px;
        }

        .y13 {
            bottom: 81.578232px;
        }

        .y7 {
            bottom: 84.995981px;
        }

        .yb {
            bottom: 101.898831px;
        }

        .y12 {
            bottom: 102.570166px;
        }

        .y11 {
            bottom: 190.034422px;
        }

        .y6 {
            bottom: 203.413831px;
        }

        .y10 {
            bottom: 210.278409px;
        }

        .y5 {
            bottom: 222.908041px;
        }

        .ya {
            bottom: 259.299860px;
        }

        .y3 {
            bottom: 281.874453px;
        }

        .yf {
            bottom: 343.095987px;
        }

        .ye {
            bottom: 378.140299px;
        }

        .y4 {
            bottom: 378.308921px;
        }

        .y2 {
            bottom: 414.951989px;
        }

        .yd {
            bottom: 425.221240px;
        }

        .y15 {
            bottom: 500.588270px;
        }

        .y14 {
            bottom: 515.379488px;
        }

        .hb {
            height: 34.598635px;
        }

        .h12 {
            height: 37.197549px;
        }

        .h11 {
            height: 37.577904px;
        }

        .h8 {
            height: 40.293633px;
        }

        .he {
            height: 41.006803px;
        }

        .h6 {
            height: 42.819636px;
        }

        .h7 {
            height: 45.483382px;
        }

        .hf {
            height: 45.871625px;
        }

        .ha {
            height: 46.385223px;
        }

        .h10 {
            height: 48.646858px;
        }

        .h5 {
            height: 48.946562px;
        }

        .hd {
            height: 68.421289px;
        }

        .hc {
            height: 135.154260px;
        }

        .h4 {
            height: 140.840726px;
        }

        .h3 {
            height: 199.573602px;
        }

        .h9 {
            height: 212.449318px;
        }

        .h2 {
            height: 595.323191px;
        }

        .h0 {
            height: 595.499987px;
        }

        .h1 {
            height: 596.000000px;
        }

        .w0 {
            width: 841.920000px;
        }

        .w1 {
            width: 842.500000px;
        }

        .x0 {
            left: 0.000000px;
        }

        .x9 {
            left: 173.698127px;
        }

        .xa {
            left: 194.014944px;
        }

        .xb {
            left: 210.829185px;
        }

        .x6 {
            left: 220.333963px;
        }

        .x8 {
            left: 233.135440px;
        }

        .x7 {
            left: 245.474934px;
        }

        .xd {
            left: 247.534631px;
        }

        .x4 {
            left: 264.385568px;
        }

        .x2 {
            left: 272.492853px;
        }

        .xc {
            left: 289.098844px;
        }

        .x1 {
            left: 297.095151px;
        }

        .x3 {
            left: 305.612378px;
        }

        .x5 {
            left: 313.238247px;
        }

        .xe {
            left: 378.815958px;
        }

        .xf {
            left: 482.021367px;
        }

        .x10 {
            left: 549.949553px;
        }

        .x11 {
            left: 694.168387px;
        }

        @media print {
            .v0 {
                vertical-align: 0.000000pt;
            }

            .ls0 {
                letter-spacing: 0.000000pt;
            }

            .ws5 {
                word-spacing: -16.838202pt;
            }

            .ws3 {
                word-spacing: -16.526576pt;
            }

            .ws0 {
                word-spacing: -0.373209pt;
            }

            .ws4 {
                word-spacing: -0.069099pt;
            }

            .ws1 {
                word-spacing: 0.000000pt;
            }

            .ws2 {
                word-spacing: 51.272704pt;
            }

            ._3 {
                width: 30.168960pt;
            }

            ._0 {
                width: 34.119306pt;
            }

            ._1 {
                width: 867.095400pt;
            }

            ._2 {
                width: 1126.598849pt;
            }

            .fs4 {
                font-size: 63.621104pt;
            }

            .fsb {
                font-size: 64.820745pt;
            }

            .fsa {
                font-size: 69.099482pt;
            }

            .fs7 {
                font-size: 71.458781pt;
            }

            .fs3 {
                font-size: 74.617839pt;
            }

            .fs8 {
                font-size: 79.936259pt;
            }

            .fs2 {
                font-size: 85.294668pt;
            }

            .fs9 {
                font-size: 89.453437pt;
            }

            .fs6 {
                font-size: 126.882317pt;
            }

            .fs5 {
                font-size: 250.285667pt;
            }

            .fs1 {
                font-size: 260.816160pt;
            }

            .fs0 {
                font-size: 373.209167pt;
            }

            .y0 {
                bottom: -0.666667pt;
            }

            .y9 {
                bottom: 0.235650pt;
            }

            .y1 {
                bottom: 0.235728pt;
            }

            .y8 {
                bottom: 84.777509pt;
            }

            .yc {
                bottom: 101.983777pt;
            }

            .y13 {
                bottom: 108.770976pt;
            }

            .y7 {
                bottom: 113.327975pt;
            }

            .yb {
                bottom: 135.865108pt;
            }

            .y12 {
                bottom: 136.760221pt;
            }

            .y11 {
                bottom: 253.379229pt;
            }

            .y6 {
                bottom: 271.218441pt;
            }

            .y10 {
                bottom: 280.371213pt;
            }

            .y5 {
                bottom: 297.210722pt;
            }

            .ya {
                bottom: 345.733146pt;
            }

            .y3 {
                bottom: 375.832604pt;
            }

            .yf {
                bottom: 457.461315pt;
            }

            .ye {
                bottom: 504.187065pt;
            }

            .y4 {
                bottom: 504.411895pt;
            }

            .y2 {
                bottom: 553.269318pt;
            }

            .yd {
                bottom: 566.961654pt;
            }

            .y15 {
                bottom: 667.451027pt;
            }

            .y14 {
                bottom: 687.172651pt;
            }

            .hb {
                height: 46.131513pt;
            }

            .h12 {
                height: 49.596732pt;
            }

            .h11 {
                height: 50.103872pt;
            }

            .h8 {
                height: 53.724844pt;
            }

            .he {
                height: 54.675737pt;
            }

            .h6 {
                height: 57.092848pt;
            }

            .h7 {
                height: 60.644509pt;
            }

            .hf {
                height: 61.162167pt;
            }

            .ha {
                height: 61.846964pt;
            }

            .h10 {
                height: 64.862477pt;
            }

            .h5 {
                height: 65.262082pt;
            }

            .hd {
                height: 91.228386pt;
            }

            .hc {
                height: 180.205680pt;
            }

            .h4 {
                height: 187.787635pt;
            }

            .h3 {
                height: 266.098136pt;
            }

            .h9 {
                height: 283.265758pt;
            }

            .h2 {
                height: 793.764255pt;
            }

            .h0 {
                height: 793.999983pt;
            }

            .h1 {
                height: 794.666667pt;
            }

            .w0 {
                width: 1122.560000pt;
            }

            .w1 {
                width: 1123.333333pt;
            }

            .x0 {
                left: 0.000000pt;
            }

            .x9 {
                left: 231.597502pt;
            }

            .xa {
                left: 258.686591pt;
            }

            .xb {
                left: 281.105580pt;
            }

            .x6 {
                left: 293.778617pt;
            }

            .x8 {
                left: 310.847253pt;
            }

            .x7 {
                left: 327.299912pt;
            }

            .xd {
                left: 330.046175pt;
            }

            .x4 {
                left: 352.514091pt;
            }

            .x2 {
                left: 363.323804pt;
            }

            .xc {
                left: 385.465126pt;
            }

            .x1 {
                left: 396.126868pt;
            }

            .x3 {
                left: 407.483171pt;
            }

            .x5 {
                left: 417.650996pt;
            }

            .xe {
                left: 505.087944pt;
            }

            .xf {
                left: 642.695156pt;
            }

            .x10 {
                left: 733.266070pt;
            }

            .x11 {
                left: 925.557849pt;
            }
        }

    </style>
    <style>
    
        @media screen and (min-width: 768px)
        {
            #cert {
                width: 1000px;
            }
        }
        @media screen and (min-width: 768px)
        {
            #cert {
                width: 1000px;
            }
        }
        div::-webkit-scrollbar,
        textarea::-webkit-scrollbar,
        html::-webkit-scrollbar,
        body::-webkit-scrollbar,
        aside::-webkit-scrollbar,
        main::-webkit-scrollbar {
            appearance: none;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            -o-appearance: none;
        }

        .t1 {
            font-size: 16px;
        }

        .t2 {
            font-size: 15px;
        }

        .t3 {
            font-size: 50px;
            text-align: center;
            margin-top: 61px;
            padding: 0;
        }

        .t4 {
            font-size: 23px;
            text-align: center;
            margin: 0;
            line-height: 107px;
        }

        .t5 {
            font-size: 13px;
            text-align: center;
        }

        .line,
        .line2,
        .line3 {
            border-bottom: 2px solid orange;
            width: 545px;
        }

        .t6 {
            font-size: 70px;
            text-align: center;

            margin: auto;
            padding-bottom: 10px;
        }

        .t7 {
            font-size: 15px;
            text-align: center;
        }

        .t8 {
            font-size: 16px;
            text-align: left;
            line-height: 20px;
        }

        .t9 {
            font-size: 12px;
            text-align: left;
            line-height: 20px;
        }

        .t10 {
            font-size: 16px;
            text-align: left;
            line-height: 20px;
        }

        .t11 {
            font-size: 12px;
            text-align: left;
            line-height: 20px;
        }

    </style>
</head>

<body>
