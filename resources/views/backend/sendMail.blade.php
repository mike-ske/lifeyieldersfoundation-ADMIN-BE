@extends('master.app')

@section('contents')
    @include('layout.nav')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Compose
            </h2>
           
            <div class="hidden" id="mls">
                <span id="closeit" style="background:rgb(142 16 16)"
                    class="flex items-center mb-10 justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-700 border border-transparent rounded-lg ">
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div id="errmail"></div>
                    </div>
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
                        aria-hidden="true">X</span>
                </span>
            </div>
           
            {{-- SEND / COMPOSE EMAIL MODALS --}}
            <header class="flex justify-between">
                <div class="flex items-center justify-center">
                    <h1
                        class="text-white font-bold text-3xl transition-colors duration-150 dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent active:text-gray-500 ">
                        Compose Mail
                    </h1>
                </div>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <form action="{{ route('email.store') }}" id="mailStudent" enctype="multipart/form-data"
                    class="mt-10">
                    @csrf
    
                    <label id="student" class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">To Student</span>
    
                        <input type="text" name="toStudent" id="student"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="To: student@gmail.com">
                        <span id="msg1" class="text-red-500 text-xs mt-4"></span>
                    </label>
                  
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Subject</span>
                        <input type="text" name="subject" id="subject"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter subject">
                        <span id="msg2" class="text-red-500 text-xs mt-4"></span>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">From</span>
                        <input type="text" name="from" id="from" disabled
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Lifeyieldersfoundation team">
                        <span id="msg3" class="text-red-500 text-xs mt-4"></span>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Leave a message</span>
                        <textarea style="height: 300px" name="message" id="message"
                            class="block resize-none w-full h-2/3 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="You have been invited for an interview by....."></textarea>
                        <span id="msg4" class="text-red-500 text-xs mt-4"></span>
                    </label>
                    <div class="flex mt-10 text-sm items-right justify-end">
                        <footer
                            class="w-full flex flex-col items-center justify-end py-3 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row ">
    
                            <button type="submit" name="save" value="mail"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                Send
                            </button>
                            <button type="reset" name="save" value="clear"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Clear
                            </button>
                        </footer>
                    </div>
                </form>
            </div>
        {{-- END OF SEND / COMPOSE EMAIL MODALS --}}
        </div>
    </main>
@endsection