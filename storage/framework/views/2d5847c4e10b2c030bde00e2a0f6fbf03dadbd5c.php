
<div style="display: none" x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class=" fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div style="overflow-y:scroll;height:500px;" x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-between">
            <div class="flex items-center justify-center">
                <h1
                    class="text-white font-bold text-3xl transition-colors duration-150 dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent active:text-gray-500 ">
                    Compose Mail
                </h1>
            </div>
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
            <form action="mail" id="mailStudent" enctype="multipart/form-data"
                class="mt-10">
                <?php echo csrf_field(); ?>

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
                        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

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











<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="popup-modal" aria-hidden="true">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0 text-center ">
                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 id="alert" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                </h3>
                <button data-modal-toggle="popup-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-green-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                    Ok</button>
            </div>
        </div>
    </div>
</div>



<?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\pages\modal.blade.php ENDPATH**/ ?>