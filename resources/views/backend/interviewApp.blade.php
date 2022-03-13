@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Welcome to Interviews 
            </h2>
            @if (session()->has('status'))
                <span id="closeit" style="background:rgb(41 142 16 / 52%)"
                    class="flex items-center mb-10 justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg ">
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                        {{ session('status') }}
                    </div>
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
                        aria-hidden="true">X</span>
                </span>
            @endif
            @if (session()->has('error'))
                <span id="closeit" style="background:rgb(142 16 16)"
                    class="flex items-center mb-10 justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-700 border border-transparent rounded-lg ">
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    {{ session('error') }}
                    </div>
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
                        aria-hidden="true">X</span>
                </span>
            @endif

            <div class="w-full sm:flex h-full">
                @isset($student)
                    @foreach ($student as $students)
                        <div class="sm:w-2/6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10" style="height: 222px">
                            @php
                                $status_id = DB::table('lyf_approval')
                                    ->where('application_id', $students->id)
                                    ->value('status_id');
                                $image = DB::table('lyf_account')->where('id', $students->user_id)->value('image');
                            @endphp
                            @if ($image === '')
                                <div class="relative w-full mr-3 rounded-full md:block">
                                    <img class="object-cover rounded-full mx-auto mb-8" style="height: 100px;width:100px"
                                        src="https://ui-avatars.com/api/?name={{ $students->fname }}+{{ $students->lname }}"
                                        alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                            @else
                                <div class="relative w-full mr-3 rounded-full md:block">
                                    <img class="object-cover rounded-full mx-auto mb-8" style="height: 100px;width:100px"
                                        src="data:image/jpeg;base64,{{ $image }}"
                                        alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                            @endif

                            @if ($status_id == 0)
                                <div class="mx-auto w-full flex justify-center items-center">
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                        Awating
                                    </span>
                                </div>
                            @endif
                            @if ($status_id == 1)
                                <div class="mx-auto w-full flex justify-center items-center">
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                        Pending
                                    </span>
                                </div>
                            @endif
                            @if ($status_id == 2)
                                <div class="mx-auto w-full flex justify-center items-center">
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                </div>
                            @endif
                            <p class="font-semibold text-center text-gray-600 dark:text-gray-400">
                                {{ $students->fname }} {{ $students->lname }}
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                {{ $students->email }}
                            </p>

                        </div>
                        {{-- MAIN APPLICATION INFO --}}
                        <div class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">
        
                            <div class="w-full flex justify-between items-center">
                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                    Add Interview Link
                                </h2>
                            </div>
        
                            <form action="/interview/{{ $students->id }}" method="post" class="mt-10">
                                @csrf
                                @method('PATCH')
        
                                <input type="hidden" name="email" value="{{ $students->email }}">
        
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Subject</span>
                                    <input type="text" name="subject" id="subject"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Enter subject">
                                    @error('subject')
                                        <span class="text-red-500 text-xs mt-4">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Meeting Link</span>
                                    <input type="url" name="url" id="url"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="http://www.googlemeet.com/interview">
                                    @error('url')
                                        <span class="text-red-500 text-xs mt-4">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Leave a message</span>
                                    <textarea style="height: 300px" name="message" id="message"
                                        class="block resize-none w-full h-2/3 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="3" placeholder="You have been invited for an interview by....."></textarea>
                                    @error('message')
                                        <span class="text-red-500 text-xs mt-4">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <div class="flex mt-10 text-sm items-right justify-end">
                                    <label class="flex dark:text-gray-400 mb-8">
                                        <div>
                                            <button type="submit" name="save" value="mail"
                                                class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Send mail
                                            </button>
                                            <button type="reset" name="save" value="clear"
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                                Clear
                                            </button>
                                        </div>
                                    </label>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </main>
@endsection
