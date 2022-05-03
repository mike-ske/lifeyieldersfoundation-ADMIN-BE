

<?php $__env->startSection('contents'); ?>
    <div class=" items-center p-6 bg-gray-50 dark:bg-gray-100">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="w-full flex items-center justify-center m-0 p-6 sm:pl-12 sm:pr-12">
                <img aria-hidden="true" class="object-cover m-0 w-full h-full dark:block"
                    src="<?php echo e(asset('image/logo-compact2.jpg')); ?>" style="width: 100px" alt="Office" />
            </div>
            <div class="flex flex-col overflow-y-auto md:flex-row w-full space-y-6 sm:space-y-8">

                <div class=" items-center justify-center m-0 p-6 w-full" style="margin: 0">

                    <div class="w-full">

                        <h1 class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200">
                            JOBCARD INFORMATION
                        </h1>
                        
                        <table class="w-full whitespace-no-wrap">
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php if(isset($data)): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devicedata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="px-4 sm:w-full  rounded-lg shadow-md">

                                            <div class="w-full flex justify-between items-center">
                                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                                    Device Data - Information
                                                </h2>
                                                <?php if($devicedata->workdone === 'Not yet fixed' || $devicedata->workdone === 'not yet fixed' ): ?>
                                                    <span style="font-size:10px"
                                                        class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                                        Awating
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($devicedata->workdone === 'Pending'): ?>
                                                    <span style="font-size:10px"
                                                        class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                        Pending
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($devicedata->workdone === 'Fixed' || $devicedata->workdone   === 'fixed'): ?>
                                                    <span style="font-size:10px"
                                                        class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                        Device Fixed
                                                    </span>
                                                <?php else: ?>
                                                    <span style="font-size:10px"
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                        Failed to fix
                                                    </span> 
                                                <?php endif; ?>

                                            </div>

                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Machine Model</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Str::upper($devicedata->machine_model)); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Seial Number</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e($devicedata->serial_no); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Nature of Fault</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Str::upper($devicedata->nature_of_fault)); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Department</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Str::upper($devicedata->department)); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Date Registered</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Carbon\Carbon::parse($devicedata->date_in)->toString()); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Date Fixed</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Carbon\Carbon::parse($devicedata->date_of_collection)->toString()); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Work Status</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php if($devicedata->workdone === 'Not yet fixed' || $devicedata->workdone === 'not yet fixed'): ?>
                                                            <span style="font-size:10px"
                                                                class="px-2 py-1 font-xs text-center  rounded-full leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                                                Awating
                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if($devicedata->workdone === 'Pending'): ?>
                                                            <span style="font-size:10px"
                                                                class="px-2 py-1 font-xs font-semibold leading-tight text-red-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                Pending
                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if($devicedata->workdone === 'Fixed' || $devicedata->workdone   === 'fixed'): ?>
                                                            <span style="font-size:10px"
                                                                class="px-2 py-1 font-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                Device Fixed
                                                            </span>
                                                        <?php else: ?>
                                                            <span style="font-size:10px"
                                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                Failed to fix
                                                            </span> 

                                                        <?php endif; ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Engineer / Fixer</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Str::upper($devicedata->workdone_by)); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <span style="font-size: 11px" class="text-gray-700 dark:text-gray-400">Date of Rgistry</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <p style="font-size: 11px"
                                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                                        <?php echo e(Carbon\Carbon::parse($devicedata->created_at)->diffForHumans()); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- You should use a button here, as the anchor is only used for the example  -->
    
                        <div class="flex justify-between items-center w-full relative">
                            <a class="block w-1/3 max-w-1/3 mx-auto px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150  border border-transparent rounded-lg hover:bg-green-700"
                                href="/application" rel="noopener noreferrer">Back</a>
                            <a class="block w-1/3 max-w-1/3 mx-auto px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                                href="javascript:print()" rel="noopener noreferrer">Print</a>
                        </div>
    
                        <div class="w-full flex items-center justify-center mt-10">
    
                            <span class="text-gray-700 text-xs dark:text-gray-400 text-center">Copyright © All right
                                reserved. Powered by
                                <a class="text-green-600 dark:text-green-400 text-center underline" target="_blank"
                                    href="http://www.faan.gov.ng">FAAN ICT.</a> <br><br>
                                Developed and Design with love by <a
                                    class="text-green-600 dark:text-green-400 text-center underline" target="_blank"
                                    href="http://mivex.herokuapp.com">Micah Alumona</a>
                            </span>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.authapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\pages\printcard.blade.php ENDPATH**/ ?>