<?php $__env->startSection('contents'); ?>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
           
            <form class="flex flex-col overflow-y-auto md:flex-row w-full space-y-6 sm:space-y-8" method="POST"
                action="<?php echo e(route('login')); ?>">

                <?php echo csrf_field(); ?>

                <div class="h-32 md:h-auto md:w-1/2 m-0" style="margin: 0">
                    <img aria-hidden="true" class="object-cover  m-0 w-full h-full dark:hidden"
                        src="<?php echo e(asset('image/login-office.jpeg')); ?>" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover  m-0 w-full h-full dark:block"
                        src="<?php echo e(asset('image/login-office-dark.jpg')); ?>" alt="Office" />
                </div>
                <div class="flex items-center justify-center m-0 p-6 sm:p-12 md:w-1/2" style="margin: 0">
                    
                    <div class="w-full">
                        <div class="w-full flex items-center justify-center m-0 p-6 sm:pl-12 sm:pr-12">
                            <img aria-hidden="true" class="hidden object-cover m-0 w-full h-full dark:block"
                                src="<?php echo e(asset('image/logo-compact2.jpg')); ?>" style="width: 150px" alt="Office" />
                        </div>
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <div class="flex flex-wrap">
                            <label class="block text-sm w-full">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input id="email" type="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none 
                                        focus:shadow-outline-green rounded-md dark:text-gray-300 
                                        dark:focus:shadow-outline-gray form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus
                                    placeholder="john@gmail.com" />
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
                            <label id="password" type="password" required class="block mt-4 text-sm  w-full">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password"
                                    class="form-input rounded-md <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" type="password" />
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
                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <button type="submit"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                            <?php echo e(__('Login')); ?>

                        </button>
                        <div class="grid mt-4 items-center">
                            <label class="inline-flex items-center text-sm text-white" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                    <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <span class="ml-2"><?php echo e(__('Remember Me')); ?></span>
                            </label>

                            <?php if(Route::has('password.request')): ?>
                                <a class="text-sm mt-2 font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="w-full flex items-center justify-center mt-10">
                            
                            <span class="text-gray-700 text-xs dark:text-gray-400 text-center">Copyright © All right reserved. Powered by 
                                <a class="text-green-600 dark:text-green-400 text-center underline" target="_blank" href="http://www.faan.gov.ng">FAAN ICT.</a> <br><br>
                                  Developed and Design with love by <a class="text-green-600 dark:text-green-400 text-center underline" target="_blank" href="http://mivex.herokuapp.com">Micah Alumona</a> 
                            </span>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.authapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\auth\login.blade.php ENDPATH**/ ?>