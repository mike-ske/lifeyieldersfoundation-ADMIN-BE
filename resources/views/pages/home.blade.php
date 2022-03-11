@extends('master.app')

@section('contents')
    @include('layout.nav')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}'s - Dashboard
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
                  
                    <span>Welcome  {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}   to the Life Yielders Foundation Admin.</span>
                </div>
            </a>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Applications
                        </p>
                        @php
                            $application = DB::table('lyf_application')->orderBy('created_at')->get()
                        @endphp
                        @if ($application)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $application->count() > 10000 ? $application->count() .'+' :  $application->count() }}
                            </p>
                        @else
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ 0.0 }}
                            </p>
                        @endif
                       
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Grants
                        </p>
                        @php
                            $gt = App\Models\Grant::where('grant_status', 1)->value('amount');
                            // $grant = json_decode($grant, true);
                            // $k = array_keys($grant);
                            // dd($grant);
                        @endphp
                        @if ($gt > 0)
                            {{-- @foreach ($grant as $grants) --}}
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $gt > 10000 ? '$'.$gt.'+' :  '$'.$gt }}
                                </p>
                                
                            {{-- @endforeach --}}
                        @else
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ '$'. 0 }}
                            </p>
                        @endif
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Awards
                        </p>
                        @php
                            $award = App\Models\Award::where('award_status', 1)->get()
                        @endphp
                        @if ($award)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $award->count() > 10000 ? $award->count() .'+' :  $award->count() }}
                            </p>
                        @else
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ 0 }}
                            </p>
                        @endif
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Approved
                        </p>
                        @php
                            $approve = DB::table('lyf_approval')->where('status_id', 2)->orderBy('id')->get()
                        @endphp
                        @if ($approve)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $approve->count() > 2 ? $approve->count() .'+' :  $approve->count() }}
                            </p>
                        @else
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ 0 }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Student</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $student = DB::table('lyf_application')->orderBy('id', 'DESC')->paginate(50)
                            @endphp
                            @if ($student->count() > 0)
                                @foreach ($student as $studentValue)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                @php
                                                    $image = DB::table('lyf_account')->where('id', $studentValue->user_id)->value('image')
                                                @endphp
                                                @if ($image === '')
                                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://ui-avatars.com/api/?name={{ $studentValue->fname }}+{{ $studentValue->lname }}" alt=""
                                                            loading="lazy">
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block" >
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="data:image/jpeg;base64,{{ $image }}" alt=""
                                                            loading="lazy">
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true">
                                                        </div>
                                                    </div>
                                                @endif

                                                <div>
                                                    <p class="font-semibold">{{ $studentValue->fname }} {{ $studentValue->lname }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        Student
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $studentValue->email }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                        @php
                                            $grant = App\Models\Grant::where('lyf_account_id', $studentValue->user_id)->orderBy('id')->value('amount')
                                            
                                        @endphp
                                        @if ($grant > 0)
                                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                                {{  $grant > 10000 ? '$'.$grant.'+' :  '$'.$grant  }}
                                            </p>
                                        @else
                                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                                {{ '$'. 0 }}
                                            </p>
                                        @endif
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @php
                                                $aprove_id  = DB::table('lyf_approval')->where('user_id', $studentValue->user_id)->value('status_id')
                                            @endphp
                                            @if ($aprove_id == 2)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Approved
                                                </span>
                                            @endif
                                            @if ($aprove_id == 0)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Awating
                                                </span>
                                            @endif
                                            @if ($aprove_id == 1)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    Pending
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ Carbon\Carbon::parse($studentValue->created_at)->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <div
                    class=" px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    {{ $student->links() }}
                </div>
            </div>

        </div>
    </main>
@endsection
