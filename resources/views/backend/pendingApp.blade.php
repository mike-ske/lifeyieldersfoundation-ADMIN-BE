@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Application
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
                        <div class="w-full sm:w-2/6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10"
                            style="height: 222px">
                            <div class="relative w-full mr-3 rounded-full md:block">
                                <img class="object-cover rounded-full mx-auto mb-8" style="height: 100px;width:100px"
                                    src="https://ui-avatars.com/api/?name={{ $students->fname }}+{{ $students->lname }}"
                                    alt="" loading="lazy">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <p class="font-semibold text-center text-gray-600 dark:text-gray-400">
                                {{ $students->fname }} {{ $students->lname }}
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                {{ $students->email }}
                            </p>

                        </div>
                    @endforeach
                @endisset
                {{-- MAIN APPLICATION INFO --}}
                @isset($student)
                    @foreach ($student as $students)
                        <div class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">
                            <div class="w-full flex justify-between items-center">
                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                    Personal Biodata
                                </h2>
                                @php
                                    $status_id = DB::table('lyf_approval')
                                        ->where('application_id', $students->id)
                                        ->value('status_id');
                                @endphp
                                @if ($status_id == 0)
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        Awaiting
                                    </span>
                                @endif
                                @if ($status_id == 1)
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                        Pending
                                    </span>
                                @endif
                                @if ($status_id == 2)
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                @endif
                            </div>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->phone }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Address</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->address }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">City</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->city }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">State</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->state }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Country</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->country }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">ID Card</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->typeID }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">ID Card Number</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->idNum }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">School</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->school }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Date of Birth</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->dob }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Zip</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->zip }}
                                </p>
                            </label>

                            <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                Credentials
                            </h2>
                            <div class="grid sm:flex sm:justify-between sm:items-center gap-4 mb-4">

                                <a href="#" target="_blank" data-url="{{ $students->certificate }}"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View JPEG</h5>
                                    <p class="text-tiny font-semibold font-sans">School Certificate</p>
                                </a>
                                <a href="#" target="_blank"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View JPEG</h5>
                                    <p class="text-tiny font-semibold font-sans">School Transcript</p>
                                </a>
                                <a href="#" target="_blank"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View JPEG</h5>
                                    <p class="text-tiny font-semibold font-sans">ID Card</p>
                                </a>
                            </div>
                            <div class="grid sm:flex sm:justify-between sm:items-center gap-4">
                                <a href="#" target="_blank"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View PDF</h5>
                                    <p class="text-tiny font-semibold font-sans">Examco Certificate</p>
                                </a>
                                <a href="#" target="_blank"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View PDF</h5>
                                    <p class="text-tiny font-semibold font-sans">CV / Resume</p>
                                </a>
                                <a href="#" target="_blank"
                                    class="w-full sm:w-2/5 h-auto border-4 border-dotted hover:border-gray-100 cursor-pointer border-gray-400 rounded-md p-6 text-gray-600 text-center">
                                    <h5>View PDF</h5>
                                    <p></p>
                                </a>
                            </div>
                            <hr class="mt-8 mb-4">
                            <form action="/pending/{{ $students->id }}" method="post" class="mt-7">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="user_id" value="{{ $students->user_id }}">
                                <label class="block mt-4 text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Subject</span>
                                    <input name="subject"
                                        class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        placeholder="Mail subject">
                                    @error('subject')
                                        <span class="text-red-500 text-xs mt-4">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="block mt-4 text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Leave a message</span>
                                    <textarea name="message"
                                        class="resize-none block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="3" placeholder="Send mail to student."></textarea>
                                    @error('message')
                                        <span class="text-red-500 text-xs mt-4">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <button type="submit" name="save" value="mailsave"
                                    class="flex items-center justify-between w-2/6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Send
                                    <span class="ml-2" aria-hidden="true">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                            <form action="/pending/{{ $students->id }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="pendinguser" value="{{ $students->id }}">
                                <input type="hidden" name="userId" value="{{ $students->user_id }}">
                                <div class="flex mt-10 text-sm items-right justify-end">
                                    <label class="flex dark:text-gray-400 mb-8">
                                        <div>
                                            <button type="submit" name="save" value="pend" id="pending"
                                                class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Approve
                                            </button>
                                            <button type="submit" name="save" value="decline" id="decline"
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                                Decline
                                            </button>
                                        </div>
                                    </label>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endisset

                {{-- students examco score --}}
                @isset($student)
                    @foreach ($student as $students)
                        <div class="w-full sm:w-1/2 p-4 sm:h-1/6 bg-white rounded-lg shadow-xs dark:bg-gray-800 ml-10">
                            <div class="relative w-full mr-3 rounded-full md:block">
                                <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Add Students Examco
                                    Examination Score</h6>
                                <form action="/pending/{{ $students->id }}" method="post" class="mt-7">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="appId" value="{{ $students->id }}">
                                    <input type="hidden" name="studentId" value="{{ $students->user_id }}">
                                    <span class="text-gray-700 font-semibold dark:text-gray-400 mb-8">Score - (%)</span>
                                    <div class="block mt-4 text-sm mb-4">
                                        <label class="block text-sm">
                                            <input type="number" name="score"
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                placeholder="74.0">
                                            @error('score')
                                                <span class="text-red-500 text-xs mt-4">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <button type="submit" name="save" value="score"
                                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Add score
                                        <span class="ml-2" aria-hidden="true">+</span>
                                    </button>
                                </form>
                            </div>

                            {{-- BANKING INFO --}}
                            @if ($bank)
                                @foreach ($bank as $bankdetails)
                                    <div class="relative w-full mr-3 pt-20 rounded-full md:block">
                                        <div>
                                            <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Bank
                                                Details</h6>
                                            <span class="text-gray-700 font-semibold flex dark:text-gray-400 mb-8">
                                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                    </path>
                                                </svg>
                                                Banking informations
                                            </span>
                                            @php
                                                $status_id = DB::table('banks')
                                                    ->where('application_id', $students->id)
                                                    ->value('approve_status');
                                            @endphp
                                            @if ($status_id == 0)
                                                <span style="font-size:10px"
                                                    class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                                    Awating
                                                </span>
                                            @endif
                                            @if ($status_id == 1)
                                                <span style="font-size:10px"
                                                    class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    Pending
                                                </span>
                                            @endif
                                            @if ($status_id == 2)
                                                <span style="font-size:10px"
                                                    class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Approved
                                                </span>
                                            @endif
                                        </div>
                                        <label class="block text-sm mt-8 mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">First name</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->fname }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mt-8 mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Last name</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->lname }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mt-8 mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->email }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mt-8 mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Phone</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->phone }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Address</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->address }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">City</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->city }}
                                            </p>
                                        </label>

                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Country</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->country }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Bank name</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->bankname }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Bank address</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->bankadress }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Account number</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->acctnumber }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Account type</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->acctType }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Route number</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->routenumber }}
                                            </p>
                                        </label>
                                        <label class="block text-sm mb-4">
                                            <span class="text-gray-700 dark:text-gray-400">Bank BIC/Swift code</span>
                                            <p
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                {{ $bankdetails->bankcode }}
                                            </p>
                                        </label>
                                        <form action="/pending/{{ $students->id }}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="pendinguser" value="{{ $bankdetails->id }}">
                                            <input type="hidden" name="bankId" value="{{ $bankdetails->user_id }}">
                                            <div class="flex mt-10 text-sm items-right justify-end">
                                                <label class="flex dark:text-gray-400 mb-8">
                                                    <div>
                                                        <button name="save" value="bankpending"
                                                            class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                            Approve
                                                        </button>
                                                        <button name="save" value="bankdecline"
                                                            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                                            Decline
                                                        </button>
                                                    </div>
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <h1
                                    class="text-xl p-2 mt-10 font-semibold text-center text-gray-500 uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    There are no bank infromation for <br> {{ $bankdetails->fname }}
                                    {{ $bankdetails->lname }}
                                </h1>
                            @endif
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </main>
@endsection
