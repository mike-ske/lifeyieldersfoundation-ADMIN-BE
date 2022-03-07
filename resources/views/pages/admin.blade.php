@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Create Admin Account
            </h2>

            <div class="w-full sm:flex h-full">

                {{-- MAIN APPLICATION INFO --}}
                <div id="check" class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">
                    @if (session()->has('status'))
                        <span
                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none ">
                            {{ session('status') }}
                            <span class="ml-2" aria-hidden="true">X</span>
                        </span>
                    @endif
                    <form action="/profile" method="post">
                        <div class="w-full flex justify-between items-center">
                            @csrf
                            <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                Account
                            </h2>
                        </div>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">First name</span>
                            <input type="text" name="first_name"
                                class="block w-full mt-1 text-sm dark:border-gray-600 @error('first_name') border-2 border-red-700 @enderror dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="John">
                            @error('first_name')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Last name</span>
                            <input type="text" name="last_name"
                                class="block w-full mt-1 text-sm dark:border-gray-600 @error('last_name') border-2 border-red-700 @enderror dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Paul">
                            @error('last_name')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input type="email" name="email"
                                class="block w-full mt-1 text-sm dark:border-gray-600 @error('email') border-2 border-red-700 @enderror dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="john@gmail.com">
                            @error('email')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input type="password" name="password"
                                class="block w-full mt-1 text-sm dark:border-gray-600 @error('password') border-2 border-red-700 @enderror dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="*********">
                            @error('password')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <label class="block text-sm mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Role</span>
                            @php
                                $roles = App\Models\Role::orderBy('id')->get();
                            @endphp
                            <select name="role"
                                class="block w-full mt-1 text-sm @error('role') border-2 border-red-700 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->continent }}</option>
                                @endforeach
                            </select>

                            @error('role')
                                <span class="text-red-500 text-xs mt-4">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                        <div class="flex mt-10 text-sm items-right justify-end">
                            <label class="flex dark:text-gray-400 mb-8">
                                <div>
                                    <button
                                        class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Register
                                    </button>
                                    <button
                                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                        Clear
                                    </button>
                                </div>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
