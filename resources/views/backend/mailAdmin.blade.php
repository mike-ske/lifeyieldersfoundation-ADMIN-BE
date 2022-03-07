@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Read Mails
            </h2>
            <div class="w-full sm:flex h-full">
                <div class="w-full sm:w-2/6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10" style="height: 222px">
                    <div class="relative w-full mr-3 rounded-full md:block">
                        {{-- side icons actions for mail --}}
                        <a href="#"
                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
                        <a href="#"
                            class="mt-10 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-purple">
                            <span class="flex gap-4">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Inbox
                            </span>
                            <span class="ml-2" aria-hidden="true">8</span>
                        </a>
                        <a href="#"
                            class="mt-4 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-purple">
                            <span class="flex gap-4">
                                <svg class="w-5 h-5 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Sent
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Mail Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
                    <div class="w-full overflow-x-auto grid px-4 py-3 ">
                        {{-- Read messages --}}
                        <div class="flex items-center text-sm mb-10">
                            <a href="#"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex items-center text-sm mb-10">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                    alt="" loading="lazy">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-600 dark:text-gray-400">Hans Burger</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    January 17 2020
                                </p>
                            </div>
                        </div>
                        <hr>
                        {{-- BODY OF MESSAGE --}}
                        <div class="max-w-full px-4 py-3 mb-8  rounded-lg shadow-md ">
                            <div class="flex justify-between items-center py-3 text-sm mb-10">
                                <h1 class="text-gray-600 font-bold dark:text-gray-400 text-2xl">A Continuation Of
                                    Applications Process</h1>
                                <p class="text-gray-600 dark:text-gray-400">January 18th 2020 : 12:20</p>
                            </div>
                            <p class="mb-4 text-gray-600 dark:text-gray-400">
                                This is possibly
                                <strong>the most accessible a modal can get</strong>
                                , using JavaScript. When opened, it uses
                                to create a focus trap, which means that if you use your keyboard to navigate around, focus won't leak to the elements behind, staying inside the modal in a loop until you take any action.
                            </p>

                            <p class="text-gray-600 dark:text-gray-400">
                                Also, on small screens it is placed at the bottom of the screen,
                                to account for larger devices and make it easier to click the
                                larger buttons.
                            </p>
                        </div>
                    </div>

                </div>

            </div>



        </div>
    </main>
@endsection
