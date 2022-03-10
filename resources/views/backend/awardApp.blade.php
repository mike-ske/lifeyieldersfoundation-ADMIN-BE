@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Application
            </h2>
            @if (session()->has('status'))
                <span
                    class="flex items-center justify-between w-full px-4 py-2 mb-8 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none ">
                    <div class="flex items-left justify-left w-full">
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                            {{ session('status') }}
                         </div>
                    </div>
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
                        aria-hidden="true">X</span>
                </span>
            @endif
            @if ($user)
                @foreach ($user as $users)
                    <div class="w-full sm:flex h-full">
                        <div class="w-full sm:w-2/6 mr-8">
                            <div class="p-4 mb-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="height: 222px">
                                <div class="relative w-full mr-3 rounded-full md:block">
                                    @if ($users->image === null)
                                        <div class="relative  w-full mr-3 rounded-full md:block">
                                            <img class="object-cover rounded-full mx-auto mb-8"
                                                style="height: 100px;width:100px"
                                                src="https://ui-avatars.com/api/?name={{ $users->fname }}+{{ $users->lname }}"
                                                alt="" loading="lazy">
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                    @else
                                        <div class="relative w-full mr-3 mb-2 rounded-full md:block" style="height:109px;">
                                            <img class="object-cover mx-auto w-full h-full rounded-full" style="width:100px"
                                                src="data:image/jpeg;base64,{{ $users->image }}" alt="" loading="lazy">
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center mt-2 text-center w-full">
                                        @php
                                            $status_id = App\Models\Award::where('user_id', $users->id)->value('lyf_approval_id');
                                        @endphp
                                        @if ($status_id == 0)
                                            <span style="font-size:10px"
                                                class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                                Awaiting
                                            </span>
                                        @endif
                                        @if ($status_id == 2)
                                            <span style="font-size:10px"
                                                class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Approved
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <p class="font-semibold text-center text-gray-600 dark:text-gray-400">
                                    {{ $users->fname }} {{ $users->lname }}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                    {{ $users->email }}
                                </p>
                            </div>
                            {{-- students examco score --}}
                            <div class="p-4 sm:h-auto bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div class="relative w-full mr-3 rounded-full md:block">
                                    <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Students Examco
                                        Examination Score</h6>
                                    <div class="mt-10">
                                        <div class="block mt-4  mb-4">
                                            @php
                                                 // get user score
                                                $score = App\Models\Score::where('user_id', $users->id)->value('score');
                                                
                                            @endphp         
                                            @if ($score !== '')
                                                {{-- @foreach ($score as $scores) --}}
                                                    <h1
                                                        class="my-6 text-4xl font-bold text-gray-700 dark:text-gray-200 text-center">
                                                        {{ $score }}%
                                                    </h1>
                                                {{-- @endforeach --}}
                                            @else
                                                <h1
                                                    class="my-6 text-4xl font-bold text-gray-700 dark:text-gray-200 text-center">
                                                    {{ 0 }} %
                                                </h1>
                                            @endif
                                        </div>

                                        <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">
                                            Select Award
                                        </h6>
                                        <form action="/award/{{ $users->id }}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <label class="block text-sm mb-8">
                                                <span class="text-gray-700 dark:text-gray-400">Award</span>
                                                <select name="awardtype"
                                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                    <option></option>
                                                    <option value="Platinum">Platinum</option>
                                                    <option value="Gold">Gold</option>
                                                    <option value="Silver">Silver</option>
                                                    <option value="Bronze">Bronze</option>
                                                </select>
                                                @error('awardtype')
                                                    <span class="text-red-500 text-xs mt-4">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </label>
                                            <button type="submit" name="save" value="award"
                                                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Add Award
                                                <span class="ml-2" aria-hidden="true">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                {{-- Leave a message to this user application --}}
                                <form action="/award/{{ $users->id }}" method="post" class="mt-10"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <label class="block mt-4 text-sm mb-4">
                                        <span class="text-gray-700 dark:text-gray-400">Upload award</span>
                                        <input
                                            class="resize-none block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray""
                                                    type=" file" name="file" id="file">
                                        @error('file')
                                            <span class="text-red-500 text-xs mt-4">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </label>
                                    <label class="block mt-4 text-sm mb-4">
                                        <span class="text-gray-700 dark:text-gray-400">Leave a message</span>
                                        <textarea name="message" id="mail"
                                            class="resize-none block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            rows="3" placeholder="Send mail to student."></textarea>
                                        @error('message')
                                            <span class="text-red-500 text-xs mt-4">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </label>
                                    <button type="submit" name="save" value="mail"
                                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Send
                                        <span class="ml-2" aria-hidden="true">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>


                        {{-- MAIN APPLICATION INFO --}}
                        <div id="cert" class="px-4 py-3 hidden sm:block mb-8 sm:w-full  rounded-lg shadow-md">
                            <div class="w-full flex justify-between items-center">
                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                    Award Scholarship Certificate
                                </h2>
                                @php
                                    $status_id = App\Models\Award::where('user_id', $users->id)->value('award_status');
                                @endphp
                                @if ($status_id == 0)
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                        Not awarded
                                    </span>
                                @endif
                                @if ($status_id == 1)
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Awarded
                                    </span>
                                @endif

                            </div>
                            <form action="/award/{{ $users->id }}" method="post" class="mt-10"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                {{-- CONTENTS FOR THE CERTIFICATE OF AWARD --}}
                                <div class="w-full h-auto p-4 bg-white" contenteditable="true">
                                    <div class="pc pc2 opened relative overflow-hidden">
                                        <div class="c absolute w-full h-full z-50 overflow-hidden">
                                            <div class=" fs6 fc2 sc0 ls0 ws1">
                                                <input type="text" name="type" id="type" style="font-family: 'Newsreader', serif;
                                                                    margin-top: 202px;
                                                                    font-size: 24px;
                                                                    text-align: center;
                                                                    color: #cd9340;
                                                                    background-color: transparent;
                                                                    font-weight: 600;" value="PLATINUM AWARD"
                                                    class="block mx-auto h-1/2 rounded-md mt-1 text-sm dark:bg-transparent form-input focus:outline-none">
                                            </div>

                                            <div class="t6 x8 ya fs0 fc2 sc0 ls0 ws1">
                                                <input type="text" name="username" id="username"
                                                    style="text-align:center;background-color:transparent;margin-top: 80px;font-size:70px!important;font-family:'Sacramento',cursive;padding-bottom:0;line-height:1;"
                                                    value="Aileen Nathania"
                                                    class="block mx-auto h-1/2 rounded-md mt-1 text-sm form-input focus:outline-none">
                                            </div>
                                            <div class=" flex justify-between items-center" ;
                                                style="width:325px;margin:auto;text-align:center;left:34px;position:relative;margin-top: 11px;">
                                                <div>
                                                    <div class="font-bold x9 yb fc2 sc0 ls0 ws1 text-tiny text-right">
                                                        <input type="text" name="date" id="date"
                                                            style="font-weight:700;background-color:transparent;font-family:'Poppins', sans-serif;font-size:10px;width:100%"
                                                            value="7th January"
                                                            class="block mx-auto h-1/2 rounded-md mt-1 text-sm form-input focus:outline-none">

                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-bold xf y12 fc2 sc0 ls0 ws1 text-tiny">
                                                        <input type="text" name="year" id="year"
                                                            style="font-weight:700;background-color: transparent;font-family:'Poppins', sans-serif;font-size:10px;width:100%;text-align:center"
                                                            class="block mx-auto h-1/2 rounded-md mt-1 text-sm form-input focus:outline-none"
                                                            value="2023">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" flex justify-between items-center"
                                                style="width:155px;margin: 100px auto 0;font-size:7px;">
                                                <div>
                                                    <div class="font-bold x9 yb ff7 fc2 sc0 ls0 ws1 text-tiny text-right">
                                                        <input type="text" name="ceo" id="ceo"
                                                            style="font-weight:700;background-color:transparent;font-family:'Poppins', sans-serif;"
                                                            class="block mx-auto h-1/2 rounded-md focus:outline-none"
                                                            value="CEO">

                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-bold xf y12 ff7 fc2 sc0 ls0 ws1 text-tiny">
                                                        <input type="text" name="manager" id="manager"
                                                            style="font-weight:700;background-color:transparent;font-family:'Poppins', sans-serif;"
                                                            class="block mx-auto h-1/2 rounded-md  focus:outline-none"
                                                            value="MANAGER">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="bi x0 y0 relative t-0">
                                            @php
                                                $image = DB::table('image')
                                                    ->where('id', 1)
                                                    ->value('certificate');
                                            @endphp
                                            {{-- <img class="relative w-full h-auto" src="{{ asset('image/certAward.png') }}" alt=""> --}}
                                            <img class="relative w-full h-auto"
                                                src="data:image/jpeg;base64,{{ $image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                @error('htmlcertificate')
                                    <span class="text-red-500 text-xs mt-4">
                                        {{ $message }}
                                    </span>
                                @enderror
                                {{-- End of AWARD --}}
                                <div class="flex mt-10 text-sm items-right justify-end">
                                    <label class="flex dark:text-gray-400 mb-8">
                                        <button type="submit" name="save" value="certificate"
                                            class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Generate Award
                                        </button>
                                    </label>
                                </div>
                            </form>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </main>
@endsection
