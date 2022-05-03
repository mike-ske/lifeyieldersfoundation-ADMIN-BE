@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Register A Device
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
                {{-- @isset($student)
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
                @endisset --}}

                {{-- MAIN APPLICATION INFO --}}

                <div class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">

                    <div class="w-full flex justify-between items-center">
                        <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                            Device Register
                        </h2>

                    </div>
                    <form action="{{ route('device') }}" method="post">

                        @csrf

                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Requesting Officer</span>
                            <input type="text" name="requesting_officer"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Mr. John Doe">
                            @error('requesting_officer')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Phone</span>
                            <input type="tel" name="mobile"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="090346345545">
                            @error('mobile')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Machine Model</span>
                            <input type="text" name="machine_model"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="HP Pavilon 6440">
                            @error('machine_model')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Serial No</span>
                            <input type="text" name="serial_no"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="AD3K4GFJ46655">
                            @error('serial_no')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Nature of Fault</span>
                            <input type="text" name="nature_of_fault"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Bad Screen">
                            @error('Bad Screen')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Department</span>
                            <input type="text" name="department"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Account">
                            @error('department')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Date In</span>
                            <input type="date" name="date_in"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="02-04-2022">
                            @error('date_in')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Date Of Collection</span>
                            <input type="date" name="date_of_collection"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="02-04-2022">
                            @error('date_of_collection')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Work Status</span>
                            <select name="workdone"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="pending">
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value=""></option>
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value="Fixed">Fixed</option>
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value="Pending">Pending</option>
                            </select>
                            @error('workdone')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Work Done By</span>
                            <input type="text" name="workdone_by"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Mr. Uzoh">
                            @error('workdone_by')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <div class="flex mt-10 text-sm items-right justify-end">
                            <label class="flex dark:text-gray-400 mb-8">
                                <div>
                                    <button type="submit" name="save" value="pend" id="pending"
                                        class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Register
                                    </button>
                                    <button type="reset" value="decline" id="decline"
                                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                        Clear
                                    </button>
                                </div>
                            </label>
                        </div>
                    </form>

                </div>

                <div class="w-full sm:w-1/2 p-4 sm:h-1/6 bg-white rounded-lg shadow-xs dark:bg-gray-800 ml-10">
                    <div class="relative w-full mr-3 rounded-full md:block">
                        <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Add Students Examco
                            Examination Score</h6>

                    </div>

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
