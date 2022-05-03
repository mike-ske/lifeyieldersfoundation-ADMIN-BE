

<?php $__env->startSection('contents'); ?>
    <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Register A Student
            </h2>
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
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
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
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <?php echo e(session('error')); ?>

                    </div>
                    <span class="ml-2 cursor-pointer" onclick="document.getElementById('closeit').style.display = 'none' "
                        aria-hidden="true">X</span>
                </span>
            <?php endif; ?>
            <div class="w-full sm:flex h-full">
                

                

                <div class="px-4 py-3 mb-8 sm:w-full  rounded-lg shadow-md">

                    <div class="w-full flex justify-between items-center">
                        <h2 class="my-6 text-l font-semibold text-gray-700 dark:text-gray-200">
                            Students Registration
                        </h2>
                    </div>
                    <form action="<?php echo e(route('student')); ?>" method="post">

                        <?php echo csrf_field(); ?>

                        <div class="sm:flex w-full justify-between items-center gap-4 mb-4">

                            <label class="block w-full text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">First name</span>
                                <input type="text" name="surname"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    placeholder="John">
                                <?php $__errorArgs = ['surname'];
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
                            <label class="block w-full text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Last name</span>
                                <input type="text" name="first_name"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    placeholder="Doe">
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

                        </div>

                        <div class="sm:flex w-full justify-between items-center gap-4 mb-4">
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Gender</span>
                                <select name="gender"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option
                                        class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        value=""></option>
                                    <option
                                        class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        value="Male">Male</option>
                                    <option
                                        class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        value="Female">Female</option>
                                </select>
                                <?php $__errorArgs = ['gender'];
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
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input type="text" name="email"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
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
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                                <input type="tel" name="phone_number"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    placeholder="090346345545">
                                <?php $__errorArgs = ['phone_number'];
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
                        </div>

                        <label class="block text-sm mb-6">
                            <span class="text-gray-700 dark:text-gray-400">Address</span>
                            <input type="text" name="residential_address"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="104, Kenny Street, Block 22">
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
                        <div class="sm:flex w-full justify-between items-center gap-4 mb-6">
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">State of Origin</span>
                                <input type="text" name="state_of_origin"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    placeholder="Delta">
                                <?php $__errorArgs = ['state_of_origin'];
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
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Country</span>
                                <?php
                                    $country = DB::table('countries')->orderBy('id')->get('country_name');
                                ?>
                                <select name="nationality"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option
                                        class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        value=""></option>
                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            value="<?php echo e($countries->country_name); ?>"><?php echo e($countries->country_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['nationality'];
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
                        </div>
                       
                        <label class="block text-sm mb-6">
                            <span class="text-gray-700 dark:text-gray-400">School</span>
                            <input type="text" name="school"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Convenant University">
                            <?php $__errorArgs = ['school'];
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
                        <label class="block text-sm mb-6">
                            <span class="text-gray-700 dark:text-gray-400">Course</span>
                            <input type="text" name="course_of_study"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                placeholder="Computer Science">
                            <?php $__errorArgs = ['course_of_study'];
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
                        <label class="block text-sm mb-6">
                            <span class="text-gray-700 dark:text-gray-400">Programme</span>
                            <select name="programme"
                                class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value=""></option>
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value="I.T">I.T</option>
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value="SIWES">SIWES</option>
                                <option
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    value="NYSC">NYSC</option>
                            </select>
                            <?php $__errorArgs = ['programme'];
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
                        
                        <div class="sm:flex w-full justify-between items-center gap-4 mb-6">
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Start programme</span>
                                <input type="date" name="start_duration"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
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
                            <label class="w-full block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">End programme</span>
                                <input type="date" name="end_duration"
                                    class="block w-full h-1/2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
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
                        </div>
                        <div class="flex mt-10 text-sm items-right justify-end">
                            <label class="flex dark:text-gray-400 mb-8">
                                <div>
                                    <button type="submit" name="save" value="pend" id="pending"
                                        class="px-3 mr-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Register
                                    </button>
                                    <button type="reset" value="decline" id="decline"
                                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-md active:bg-yellow-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-purple">
                                        Clear
                                    </button>
                                </div>
                            </label>
                        </div>
                    </form>

                </div>

                <div class="w-full sm:w-1/2 p-4 sm:h-1/6 bg-white rounded-lg shadow-xs dark:bg-gray-800 ml-10">
                    <div class="relative w-full mr-3 rounded-full md:block">
                        <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Add Students Examco
                            Examination Score</h6>
                    </div>

                    <div class="relative w-full mr-3 pt-20 rounded-full md:block">
                        <div>
                            <h6 class="my-4 text-l font-semibold text-gray-700 dark:text-gray-200">Bank Details
                            </h6>
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
                    </div>


                </div>

            </div>

        </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\pages\regstudent.blade.php ENDPATH**/ ?>