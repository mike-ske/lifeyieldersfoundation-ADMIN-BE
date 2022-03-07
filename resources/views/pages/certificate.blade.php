<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CERTIFICATE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&family=Newsreader:ital,wght@0,200;0,300;0,400;0,500;0,600;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sacramento&display=swap" rel="stylesheet">
                            
    <style>
        @media screen and (min-width: 768px)
        {
            #cert {
                width: 776px;
            }
        }
        @media screen and (min-width: 768px)
        {
            #cert {
                width: 776px;
            }
        }
    </style>
</head>

<body>

    @if ($request->count() > 0)
        @foreach ($request as $requests)
            <div class="w-full h-auto p-4 bg-white" contenteditable="true">
                <div class="pc pc2 opened relative overflow-hidden">
                    <div class="c absolute w-full h-full z-50 overflow-hidden">
                        <div class=" fs6 fc2 sc0 ls0 ws1" style="font-family:'Newsreader', serif; margin-top: 147px; font-size:
                            17px; text-align: center; color: #cd9340; font-weight: 600;">
                            {{ $requests->type }}
                        </div>

                        <div style="margin-top: 82px;font-size:50px!important;font-family:'
                            Sacramento',cursive;padding-bottom:0;line-height:1;" class="t6 x8 ya fs0 fc2 sc0 ls0 ws1">
                            {{ $requests->username }}
                        </div>
                        <div class="flex justify-between items-center" 
                            style="width: 190px;margin:auto;text-align:center;left:34px;position:relative;margin-top: 31px;font-size:10px;">
                            <div>
                                <div style="font-family:'Poppins', sans-serif;"
                                    class="font-bold x9 yb fc2 sc0 ls0 ws1 text-tiny text-right">{{ $request->date }}</div>
                            </div>
                            <div>
                                <div style="font-family:'Poppins', sans-serif;"
                                    class="font-bold xf y12 fc2 sc0 ls0 ws1 text-tiny">{{ $requests->year }}</div>
                            </div>
                        </div>
                        <div class=" flex justify-between items-center" style="width: 120px;margin: 65px auto 0;font-size:7px;">
                            <div>
                                <div style="font-family:'Poppins', sans-serif;"
                                    class="font-bold x9 yb ff7 fc2 sc0 ls0 ws1 text-tiny text-right">{{ $requests->ceo }}
                                </div>
                            </div>
                            <div>
                                <div style="font-family:'Poppins', sans-serif;"
                                    class="font-bold xf y12 ff7 fc2 sc0 ls0 ws1 text-tiny">{{ $requests->manager }}</div>
                            </div>
                        </div>

                    </div>
                    @php
                        $image = DB::table('image')->where('id', 1)->value('certificate');
                    @endphp
                    <div class="bi x0 y0 relative t-0">
                        <img class="relative w-full h-auto" src="data:image/jpeg;base64,{{ $image }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
