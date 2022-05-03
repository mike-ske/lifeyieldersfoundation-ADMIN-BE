@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Your Device Application
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
                                    src="https://ui-avatars.com/api/?name=F+T" alt="" loading="lazy">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <p class="font-semibold text-center text-gray-600 dark:text-gray-400">
                                {{ $students->requesting_officer }}
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                {{ Str::upper($students->department) }}
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
                                    Device Data - Information
                                </h2>
                                @if ($students->workdone === 'Not yet fixed' || $students->workdone === 'not yet fixed' )
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                        Awating
                                    </span>

                                @endif
                                @if ($students->workdone === 'Pending')
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                        Pending
                                    </span>
                                @endif
                                @if ($students->workdone === 'Fixed' || $students->workdone   === 'fixed')
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Device Fixed
                                    </span>
                                @else
                                    <span style="font-size:10px"
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        Failed to fix
                                    </span> 
                                @endif

                            </div>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Machine Model</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Str::upper($students->machine_model) }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Seial Number</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ $students->serial_no }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Nature of Fault</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Str::upper($students->nature_of_fault) }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Department</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Str::upper($students->department) }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Date Registered</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Carbon\Carbon::parse($students->date_in)->toString() }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Date Fixed</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Carbon\Carbon::parse($students->date_of_collection)->toString() }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Work Status</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    @if ($students->workdone === 'Not yet fixed' || $students->workdone === 'not yet fixed' )
                                        <span style="font-size:10px"
                                            class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                            Awating
                                        </span>
                                    @endif
                                    @if ($students->workdone === 'Pending')
                                        <span style="font-size:10px"
                                            class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            Pending
                                        </span>
                                    @endif
                                    @if ($students->workdone === 'Fixed' || $students->workdone   === 'fixed')
                                        <span style="font-size:10px"
                                            class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Device Fixed
                                        </span>
                                    @else
                                        <span style="font-size:10px"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            Failed to fix
                                        </span> 
                                    @endif
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Engineer / Fixer</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Str::upper($students->workdone_by) }}
                                </p>
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Date of Rgistry</span>
                                <p
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    {{ Carbon\Carbon::parse($students->created_at)->diffForHumans() }}
                                </p>
                            </label>
                            <hr class="mt-8 mb-4">
                            <form action="/application/{{ $students->id }}" method="post">
                                @csrf
                                @method('PATCH')
        
                                <input type="hidden" name="pendinguser" value="{{ $students->id }}">
                                <input type="hidden" name="userId" value="{{ $students->id }}">
                                <div class="flex mt-10 text-sm items-right justify-end">
                                    <label class="flex dark:text-gray-400 mb-8">
                                        <div>
                                            <button type="submit" name="save" value="pend" id="pending" 
                                                class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Update Work Status
                                            </button>
                                            <button type="submit" name="save" value="print" id="pending" 
                                                class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-600 border border-transparent rounded-md active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                                Print Device Card
                                            </button>
                                        </div>
                                    </label>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endisset

                <div class="w-full sm:w-1/2 p-4 sm:h-1/6 bg-white rounded-lg shadow-xs dark:bg-gray-800 ml-10">
                    <div class="relative w-full mr-3 rounded-full md:block">
                        <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Add Students Examco
                            Examination Score</h6>

                    </div>

                    {{-- BANKING INFO --}}
                    <div class="relative w-full mr-3 pt-20 rounded-full md:block">
                        <div>
                            <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Bank Details
                            </h6>
                            <span class="text-gray-700 font-semibold flex dark:text-gray-400 mb-8">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                                Banking informations
                            </span>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
    </main>
@endsection
