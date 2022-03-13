<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CERTIFICATE</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=New+Rocker&family=Newsreader:ital,wght@0,200;0,300;0,400;0,500;0,600;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sacramento&display=swap');

        @media screen and (min-width: 768px) {
            .cert {
                width: 776px;
            }
        }

        @media screen and (min-width: 768px) {
            .cert {
                width: 776px;
            }
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        /* styles for certificate */
        body::-webkit-scrollbar {
            appearance: none;
        }

        body {
            width: 100%;
            height: 100vh;
            background-image: url({{ asset('image/certificateAward.png') }});
            margin: auto;
            text-align: center;
            box-sizing: border-box;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        #at {
            width: 100%;
            height: auto;
        }

        #a2 {
            background: transparent;
            overflow: hidden;
        }

        #a3 {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 50;
        }

        #a4 {
            font-family: 'Newsreader', serif;
            margin-top: 255px;
            font-size: 20px;
            text-align: center;
            color: #cd9340;
            font-weight: 600;
           
        }

        #a5 {
            margin-top: 150px;
            line-height: 1;
            font-size: 75px !important;
            font-family: 'Sacramento', cursive;
            padding-bottom: 0;
            line-height: 1;
            margin-left: auto;
            margin-right: auto;
        }

        #a6 {
            width: 280px;
            margin: auto;
            text-align: center;
            left: 34px;
            position: relative;
            display: flex;
            justify-contents: space-between;
            align-items: center;
            margin-top: 43px;
            gap: 140px;
        }

        #a7 {
            font-weight: 600;
            text-align: left;
            font-size: 10px;
        }

        #a8 {
            font-weight: 600;
            text-align: left;
            font-size: 10px;
        }

        #date {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            width: 100%;
            display: block;
            margin-top: 20px;
            font-size: 11px;
            height: 50%;
        }

        #year {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            width: 100%;
            text-align: center;
            display: block;
            margin: 0 auto;
            height: 50%;
            font-size: 11px;
            margin-top: 20px
        }

        #a9 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 190px;
            margin: 115px auto 0;
            font-size: 7px;
        }

        #a10 {
            font-weight: 700;
            font-size: 11px;
            text-align: right;
        }

        #ceo {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            display: block;
            height: 50%;
            margin: 0 auto
        }

        #a11 {
            font-weight: 700;
            font-size: 10px;
        }

        #manager {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            display: block;
            height: 50%;
            margin: 0 auto
        }

    </style>
</head>

<body>

    {{-- CONTENTS FOR THE CERTIFICATE OF AWARD --}}
    @if ($request)
    {{-- {{ dd($request) }} --}}
        <div id="at" style="border: 7px solid red">
            <div id="a2" class="cert">
                <div id="a3">
                    <div>
                        <div id="a4">
                            <h1>
                                {{ $request->type }} 
                            </h1>
                        </div>
                    </div>

                    <div>
                        <div id="a5">
                            {{ $request->username }}  
                        </div>
                        <div id="a6">
                            <div>
                                <div id="a7" class="">
                                    <div id="date" class="">
                                        {{ $request->date }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div id="a8">
                                    <div id="year">
                                        {{ $request->year }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="a9">
                            <div>
                                <div id="a10" class="">
                                    <div id="ceo">
                                        {{ $request->ceo }} 
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div id="a11">
                                    <div id="manager">
                                        {{ $request->manager }} 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

</body>

</html>
