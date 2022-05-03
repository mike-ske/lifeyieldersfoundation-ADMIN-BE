<?php $__env->startSection('contents'); ?>
    <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="h-full overflow-y-auto">
        <?php if($student): ?>
            <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Welcome to <?php echo e(Str::ucfirst($studentValue->surname)); ?> <?php echo e(Str::ucfirst($studentValue->first_name)); ?> Profile
                    </h2>
                    
                    <div class="w-full sm:flex h-full">

                        <div class="sm:w-2/6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-10" style="height: 222px">
                            <?php if($studentValue->image === '' || $studentValue->image == null): ?>
                                <div class="relative w-full mr-3 rounded-full md:block">
                                    <img class="object-cover mb-8 mx-auto w-full h-full rounded-full"
                                        style="height: 100px;width:100px"
                                        src="https://ui-avatars.com/api/?name=<?php echo e($studentValue->surname); ?>+<?php echo e($studentValue->first_name); ?>"
                                        alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="relative w-full mr-3 mb-2 rounded-full md:block" style="height:109px;">
                                    <img class="object-cover mx-auto w-full h-full rounded-full" style="width:100px"
                                        src="data:image/jpeg;base64,<?php echo e($studentValue->image); ?>" alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <p class="font-semibold text-center text-gray-600 dark:text-gray-400">
                                <?php echo e(Str::ucfirst($studentValue->surname)); ?> <?php echo e(Str::ucfirst($studentValue->first_name)); ?>

                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                <?php echo e($studentValue->email_address); ?>

                            </p>

                        </div>
                  
                        
                        <div class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">
                            <?php if(session()->has('status')): ?>
                                <span id="closeit" style="background:rgb(41 142 16 / 52%)"
                                    class="flex items-center mb-10 justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg ">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                            </path>
                                        </svg>
                                        <?php echo e(session('status')); ?>

                                    </div>
                                    <span class="ml-2 cursor-pointer"
                                        onclick="document.getElementById('closeit').style.display = 'none' "
                                        aria-hidden="true">X</span>
                                </span>
                            <?php endif; ?>
                            <?php if(session()->has('error')): ?>
                                <span id="closeit" style="background:rgb(142 16 16)"
                                    class="flex items-center mb-10 justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-700 border border-transparent rounded-lg ">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <?php echo e(session('error')); ?>

                                    </div>
                                    <span class="ml-2 cursor-pointer"
                                        onclick="document.getElementById('closeit').style.display = 'none' "
                                        aria-hidden="true">X</span>
                                </span>
                            <?php endif; ?>

                            <div class="w-full flex justify-between items-center">
                                <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                                    Account
                                </h2>
                            </div>

                            <form action="/students/<?php echo e($studentValue->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">First name</span>
                                    <input type="text" value="<?php echo e(Str::ucfirst($studentValue->surname)); ?>" name="first_name"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="John Paul">
                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Last name</span>
                                    <input type="text" value="<?php echo e(Str::ucfirst($studentValue->first_name)); ?>" name="last_name"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="John Paul">
                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                                    <input type="email" value="<?php echo e($studentValue->email_address); ?> " name="email"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="john@gmail.com">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Phone number</span>
                                    <input type="tel" value="<?php echo e($studentValue->phone_number); ?> " name="phone"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="09023343445">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                                    <input type="text" value="<?php echo e($studentValue->residential_address); ?>" name="residential_address"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="204, Ken Tower Gate, Block 22">
                                    <?php $__errorArgs = ['residential_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Start Programme - <?php echo e(Carbon\Carbon::parse($studentValue->start_duration)->diffForHumans()); ?></span>
                                    <input type="date" name="start_duration" value=""
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    <?php $__errorArgs = ['start_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <label class="block text-sm mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">End Programme - <?php echo e(Carbon\Carbon::parse($studentValue->end_duration)->diffForHumans()); ?></span>
                                    <input type="date" name="end_duration" value=""
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    <?php $__errorArgs = ['end_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-red-500 text-xs mt-4">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>
                                <div class="flex mt-10 text-sm items-right justify-end">
                                    <label class="flex dark:text-gray-400 mb-8">
                                        <div>
                                            <button type="submit" name="update"
                                                class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Update
                                            </button>
                                            <input type="reset" value="Clear"
                                                class="px-3 py-1 text-sm font-medium cursor-pointer leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                        </div>
                                    </label>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\backend\studentProfile.blade.php ENDPATH**/ ?>