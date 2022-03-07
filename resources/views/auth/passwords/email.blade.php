@extends('master.authapp')

@section('contents')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

            @if (session('status'))
                <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="flex flex-col overflow-y-auto md:flex-row w-full space-y-6 sm:space-y-8" method="POST"
                action="{{ route('password.email') }}">

                @csrf

                <div class="h-32 md:h-auto md:w-1/2 m-0" style="margin: 0">
                    <img aria-hidden="true" class="object-cover  m-0 w-full h-full dark:hidden"
                        src="{{ asset('image/forgot-password-office.jpeg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover  m-0 w-full h-full dark:block"
                        src="{{ asset('image/forgot-password-office-dark.jpg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center m-0 p-6 sm:p-12 md:w-1/2" style="margin: 0">
                    <div class="w-full">
                        <div class="w-full flex items-center justify-center m-0 p-6 sm:pl-12 sm:pr-12">
                            <img aria-hidden="true" class="hidden object-cover  m-0 w-full h-full dark:block"
                                src="{{ asset('image/logo-compact2.png') }}" alt="Office" />
                        </div>
                        <div class="flex flex-wrap">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Forgot password
                            </h1>
                        </div>
                        <div class="flex flex-wrap">
                            <label class="block text-sm w-full">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input id="email" type="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none 
                                focus:shadow-outline-purple rounded-md dark:text-gray-300 
                                dark:focus:shadow-outline-gray form-input @error('email') border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                    placeholder="john@gmail.com" />
                            </label>
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div
                            class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 mb-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <p
                                class=" mt-8 text-xs text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0">
                                <a class="text-sm mt-2 font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('login') }}">
                                    {{ __('Back to login') }}
                                </a>
                            </p>
                        </div>
                         <div class="w-full flex items-center justify-center mt-10">
                            <span class="text-gray-700 text-xs dark:text-gray-400 text-center">Copyright © All right reserved. Supported & Powered by 
                                <a class="text-purple-600 dark:text-purple-400 text-center underline" target="_blank" href="http://www.lifeyieldersfoundation.org">lifeyieldersfoundation</a> 
                            </span>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
