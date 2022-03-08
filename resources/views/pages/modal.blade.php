{{-- SEND / COMPOSE EMAIL MODALS --}}
<div style="display: none" x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class=" fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div style="overflow-y:scroll;height:500px;" x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
            <form action="email/" method="post" class="mt-10">
                @csrf

                <input type="hidden" name="email" >
                {{-- To send to specific users --}}
                <label id="mailField" class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">To</span>
                    <input type="text" name="to" id="to"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="To: monaly@gmail.com">
                    @error('to')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label id="admin" class="hidden text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Role</span>
                    @php
                        $role = App\Models\Role::orderBy('id')->get()
                    @endphp
                    <select name="role"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                        @foreach ($role as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->continent }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label id="student" class="hidden text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Role</span>
                    @php
                        $role = App\Models\Role::orderBy('id')->get()
                    @endphp
                    <select name="role"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                        @foreach ($role as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->continent }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <div class="flex mt-4 items-end justify-end gap-4">
                    <div id="addAdmin" onclick="return document.getElementById('admin').classList.toggle('hidden'); document.getElementById('mailField').classList.toggle('hidden') "
                            class="cursor-pointer w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Add Admin
                    </div>
                    <div id="addStudent" onclick="return document.getElementById('student').classList.toggle('hidden'); document.getElementById('mailField').classList.toggle('hidden') "
                            class="cursor-pointer w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Add Student
                    </div>
                </div>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Subject</span>
                    <input type="text" name="subject" id="subject"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter subject">
                    @error('subject')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">From</span>
                    <input type="text" name="from" id="from" disabled
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Lifeyieldersfoundation team">
                    @error('from')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Leave a message</span>
                    <textarea style="height: 300px" name="message" id="message"
                        class="block resize-none w-full h-2/3 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="You have been invited for an interview by....."></textarea>
                    @error('message')
                        <span class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <div class="flex mt-10 text-sm items-right justify-end">
                    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                            
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
{{-- END OF SEND / COMPOSE EMAIL MODALS --}}
