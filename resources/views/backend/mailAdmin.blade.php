@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Read Mails
            </h2>
            <div class="w-full sm:flex h-full">
                <div class="w-full mb-10 sm:w-2/6 mr-10">
                    <div class="w-full mb-10 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10" style="height: 222px">
                        <div class="relative w-full mr-3 rounded-full md:block">
                            {{-- side icons actions for mail --}}
                            <a @click="openModal"
                                class="cursor-pointer flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Compose
                                <span class="ml-2" aria-hidden="true">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                            <a href="{{ URL('email/') }}"
                                class="cursor-pointer mt-10 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-purple">
                                <span class="flex gap-4">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Inbox
                                </span>
                                @php
                                    $t = App\Models\AdminEmail::get('status_id')->count();
                                @endphp
                                @if (!isset($t))
                                    <span class="ml-2" aria-hidden="true"></span>
                                @else
                                    <span class="ml-2" aria-hidden="true">{{ $t }}</span>
                                @endif
                            </a>
                            <a id="inbox"
                                class="cursor-pointer mt-4 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-purple">
                                <span class="flex gap-4">
                                    <svg class="w-5 h-5 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Send To Mailbox
                                </span>
                            </a>

                        </div>
                    </div>

                    {{-- send mail to users --}}
                    <div id="messagebox" class="hidden w-full mb-10 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10"
                        >
                        <div class="relative w-full mr-3 rounded-full md:block">
                            {{-- side icons actions for mail --}}
                            <a
                                class="cursor-pointer flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-transparent border border-transparent rounded-lg ">
                                Send Mail To Inbox
                                <span class="ml-2" aria-hidden="true">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                            <div class="mb-6">
                                <form action="{{ route('inbox') }}" method="POST" id="mailForm"
                                    enctype="multipart/form-data" class="mt-10">
                                    @csrf

                                    <label id="admin" class="text-sm mb-4">
                                        <span class="text-gray-700 dark:text-gray-400">To</span>

                                        <input type="text" name="tomailer" id="mailer"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            placeholder="To: admin@gmail.com">
                                        
                                        <span id="msg1" class="text-red-500 text-xs mt-4"></span>
                                    </label>
                                    <label class="mt-4 block text-sm mb-4">
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
                                            rows="3"
                                            placeholder="You have been invited for an interview by....."></textarea>
                                        <span id="msg4" class="text-red-500 text-xs mt-4"></span>
                                    </label>
                                    <div class="w-full block mt-10 text-sm">
                                        <footer
                                            class="w-full flex flex-col items-center justify-between px-6 py-3 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

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

                        </div>
                    </div>
                </div>

                <!-- Mail Table -->
                @if (isset($emails))
                
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
                        @foreach ($emails as $email)
                            <div class="w-full overflow-x-auto grid px-4 py-3 ">
                                {{-- Read messages --}}
                                <div class="flex items-center text-sm mb-10">
                                    <a @click="openModal"
                                        class="cursor-pointer flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                        </svg>
                                    </a>
                                    <p class="font-semibold text-gray-600 dark:text-gray-400">Reply</p>
                                </div>
                                <div class="flex items-center text-sm mb-10">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        @php
                                            $users = DB::table('lyf_account')->where('id', $email->user_id)->get();
                                        @endphp
                                        @foreach ($users as $user)
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://ui-avatars.com/api/?name={{  $user->fname }}+{{  $user->lname }}"
                                                alt="" loading="lazy">
                                        @endforeach
                                    </div>
                                    <div>
                                        @php
                                            $users = DB::table('lyf_account')->where('id', $email->user_id)->get();
                                        @endphp
                                        @foreach ($users as $user)
                                            <p class="font-semibold text-gray-600 dark:text-gray-400 ">
                                                {{ $user->fname}} {{  $user->lname  }}
                                            </p>
                                        @endforeach
                                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-400"">
                                            {{ $email->from }}
                                        </p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $email->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                {{-- BODY OF MESSAGE --}}
                                <div class="max-w-full px-4 py-3 mb-8  rounded-lg shadow-md ">
                                    <div class="flex justify-between items-center py-3 text-sm mb-10">
                                        <h1 class="text-gray-600 font-bold dark:text-gray-400 text-2xl">
                                            {{ $email->mail_subject }}
                                        </h1>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $email->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                                        {{ $email->mail_body }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif   
              
            </div>
        </div>
    </main>
@endsection
