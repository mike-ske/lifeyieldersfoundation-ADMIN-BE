<?php $__env->startSection('contents'); ?>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

            <form class="flex flex-col overflow-y-auto md:flex-row w-full space-y-6 sm:space-y-8" method="POST"
                action="<?php echo e(route('password.update')); ?>">
                <?php echo csrf_field(); ?>

                <div class="h-32 md:h-auto md:w-1/2 m-0" style="margin: 0">
                    <img aria-hidden="true" class="object-cover  m-0 w-full h-full dark:hidden"
                        src="<?php echo e(asset('image/forgot-password-office.jpg')); ?>" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover  m-0 w-full h-full dark:block"
                        src="<?php echo e(asset('image/forgot-password-office-dark.jpg')); ?>" alt="Office" />
                </div>

                <div class="flex items-center justify-center m-0 p-6 sm:p-12 md:w-1/2" style="margin: 0">
                    <input type="hidden" name="token" value="<?php echo e($token); ?>">
                    <div class="w-full">
                        <div class="flex flex-wrap">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Email address
                            </h1>
                        </div>
                        <div class="flex flex-wrap">
                            <label class="block text-sm w-full">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input id="email" type="email"
                                    class="block mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none 
                                        focus:shadow-outline-purple rounded-md dark:text-gray-300 
                                        dark:focus:shadow-outline-gray form-input w-full <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email"
                                    autofocus>
                            </label>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-4">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex flex-wrap">
                            <label class="block text-sm w-full">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input id="password" type="password"
                                    class="block mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none 
                                focus:shadow-outline-purple rounded-md dark:text-gray-300 
                                dark:focus:shadow-outline-gray form-input w-full <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="password" required autocomplete="new-password">
                            </label>

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-4">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex flex-wrap">
                            <label class="block text-sm w-full">
                                <span class="text-gray-700 dark:text-gray-400">Confirm password</span>
                                <input id="password-confirm" type="password"
                                    class="block mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none 
                                focus:shadow-outline-purple rounded-md dark:text-gray-300 
                                dark:focus:shadow-outline-gray form-input w-full"
                                    name="password_confirmation" required autocomplete="new-password">
                            </label>
                        </div>

                        <div
                            class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 mb-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                <?php echo e(__('Reset Password')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.authapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\auth\passwords\reset.blade.php ENDPATH**/ ?>