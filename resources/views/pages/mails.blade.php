@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Emails
            </h2>
            <!-- CTA -->
            <a
                class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>Here you can view all new and updated emails.</span>
                </div>
            </a>
            <div class="w-full sm:flex h-full">
                <div class="w-full mb-10 sm:w-2/6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10"
                    style="height: 222px">
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
                            <span class="ml-2" aria-hidden="true">8</span>
                        </a>
                        <a @click="sentMessage"
                            class="cursor-pointer mt-4 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-purple">
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
                    @if ($mail->count() > 0)
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($mail as $mails)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <a href="email/{{ $mails->id }}"
                                                        class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 overflow-hidden">
                                                <a href="email/{{ $mails->id }}"
                                                    class="flex items-center justify-between w-full px-4 py-2 text-sm leading-5 transition-colors duration-150  rounded-lg  focus:outline-none">
                                                    {{ $mails->mail_body }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $mails->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            {{ $mail->links() }}
                        </div>
               
                    @endif

                    @php
                        $mail = true;
                    @endphp
                    {{-- FOR GENERAL ADMINS TO VIEW MAILS --}}
                    @if ($genEmail->count() > 0)
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($genEmail as $genEmails)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <a href="email/{{ $genEmails->id }}"
                                                        class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 overflow-hidden">
                                                <a href="email/{{ $genEmails->id }}"
                                                    class="flex items-center justify-between w-full px-4 py-2 text-sm leading-5 transition-colors duration-150  rounded-lg  focus:outline-none">
                                                    {{ $genEmails->subject }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $genEmails->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            {{ $genEmail->links() }}
                        </div>
                    @else
                        <div class="w-full items-center justify-center flex" style="margin-top:120px">
                            <svg class="w-6 h-6 mb-2 mr-6 text-center text-xl font-medium text-gray-600 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <h1 class=" mb-2 text-center text-xl font-medium text-gray-600 dark:text-gray-600">
                                NO NEW MAIL
                            </h1>
                        </div>
                    @endif
                    @if ($mail == false)
                        <div x-show="sentMessage" class="hidden w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($mail as $mails)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <a href="email/{{ $mails->id }}"
                                                        class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 overflow-hidden">
                                                <a href="email/{{ $mails->id }}"
                                                    class="flex items-center justify-between w-full px-4 py-2 text-sm leading-5 transition-colors duration-150  rounded-lg  focus:outline-none">
                                                    {{ $mails->mail_body }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $mails->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            {{ $mail->links() }}
                        </div>
                    @else
                        <div class="hidden w-full items-center justify-center flex" style="margin-top:120px">
                            <svg class="w-6 h-6 mb-2 mr-6 text-center text-xl font-medium text-gray-600 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <h1 class=" mb-2 text-center text-xl font-medium text-gray-600 dark:text-gray-600">
                                NO message sent
                            </h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
