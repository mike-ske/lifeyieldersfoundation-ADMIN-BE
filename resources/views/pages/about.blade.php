@extends('master.app')

@section('contents')
    @include('layout.nav')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                About WORKIT Software Application
            </h2>
            <!-- CTA -->
            <a
                class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>A software that simplify device registry for admin ICT Work Shop.</span>
                </div>
            </a>
               
            <!-- New Table -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                About WORKIT
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
                <div class="w-full gap-4 overflow-x-auto sm:flex justify-between items-center">
                    <div class="w-1/3 border whitespace-no-wrap">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="https://ui-avatars.com/api/?name=W+S"
                                    alt="" loading="lazy">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <div>
                                <p class=" font-semibold text-gray-600 dark:text-gray-300">WORKIT SOFTWARE</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    Version 1.2.1
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border whitespace-no-wrap">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="https://ui-avatars.com/api/?name=W+S"
                                    alt="" loading="lazy">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <div>
                                <p class=" font-semibold text-gray-600 dark:text-gray-300">WORKIT SOFTWARE</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    Version 1.2.1
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection