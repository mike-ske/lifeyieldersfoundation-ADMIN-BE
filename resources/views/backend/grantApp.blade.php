@extends('master.app')

@section('contents')
    @include('layout.nav')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Candidates Banking Infromation
            </h2>

            <div
                class="font-semibold text-xs  text-red-700 bg-yellow-100 dark:bg-yellow-300 dark:text-red-700 min-w-0 p-4 rounded-lg shadow-xs ">
                Make all transactions / grants to the selected candidates through the below Banking information
                <br>
                <strong>PLEASE NOTE:</strong> All transfers made by admin would not be refunded back by the candidate unless
                otherwise
                stated. Ensure to check and confirm the banking information for candidates, that they are true and accurate
                before carrying out the transactions. Lifeyieldersfoudation will not be liable to any inapproprate /
                uncordinated / transaction
                failures perform by the admin.
            </div>
            <div class="sm:flex w-full gap-4 ">
                {{-- BANKING INFO --}}
                <div class="relative w-full mr-3 mb-8 pt-10 rounded-full md:block">
                    <div>
                        <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Bank Details</h6>
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
                    <div>
                        {{-- <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Bank Details</h6> --}}
                        <span class="text-gray-700 font-semibold flex dark:text-gray-400 mb-8">
                            Make Transfer To This Banking Information
                        </span>
                    </div>
                    <label class="block text-sm mt-8 mb-4">
                        <span class="text-gray-700 dark:text-gray-400">First name</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            Paul
                        </p>
                    </label>
                    <label class="block text-sm mt-8 mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Last name</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            John
                        </p>
                    </label>
                    <label class="block text-sm mt-8 mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            pauljohn@gmail.com
                        </p>
                    </label>
                    <label class="block text-sm mt-8 mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            pauljohn@gmail.com
                        </p>
                    </label>
                    <label class="block text-sm mt-8 mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Phone</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            +23499545456
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Address</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            2 western road
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">City</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            Nurtheham
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">State</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            Washinthon
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Country</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            USA
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Bank name</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            ZENITH
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Bank address</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            105 Nothen burg, USA
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Account number</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            222035208
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Account type</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            Savings
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Route number</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            222035208
                        </p>
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Bank BIC/Swift code</span>
                        <p
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            92023
                        </p>
                    </label>

                </div>
                {{-- CONFIRM ORDER TRANSACTIONS --}}
                <div class="w-full sm:w-2/5 ">
                    <div class="w-full sm:flex bg-white dark:bg-gray-800 mt-10">
                        {{-- MAIN APPLICATION INFO --}}
                        <form class="px-4 py-3 sm:w-full  rounded-lg shadow-md">

                            <div class="w-full flex justify-between items-center">
                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                    Confirm Transfer
                                </h2>
                            </div>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Amount - ($)</span>
                                <input type="number"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="78000">
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">By Admin</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Paul">
                            </label>
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">From</span>
                                <input type="text" value="Lifeyieldersfoundation" disabled
                                    class="block w-full mt-1 text-sm disabled dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            </label>
                            <div class="flex mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <span class="ml-2">
                                        I confirm that the details here are true and accurate
                                    </span>
                                </label>
                            </div>
                            <div class="flex mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <span class="ml-2">
                                        I agree to the
                                        <a target="_blank" href="http://www.lifeyieldersfoundation.org/privacy" class="underline">privacy policy</a>
                                    </span>
                                </label>
                            </div>

                            <div class="flex mt-10 text-sm items-right justify-end">
                                <label class="flex dark:text-gray-400 mb-8">
                                    <div>
                                        <button
                                            class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Confirm
                                        </button>
                                        <button type="reset"
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
        </div>

        <div>
        </div>
    </main>
@endsection
