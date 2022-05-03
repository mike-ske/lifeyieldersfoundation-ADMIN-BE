<?php $__env->startSection('contents'); ?>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

            <div class="w-full">

                <?php if(session('resent')): ?>
                    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100  px-3 py-4 mb-4"
                        role="alert">
                        <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                    </div>
                <?php endif; ?>

                <div class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm dark:bg-gray-800">
                    <header
                        class="font-semibold bg-gray-200 dark:bg-gray-800 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        <?php echo e(__('Verify Your Email Address')); ?>

                    </header>

                    <div
                        class="w-full flex flex-wrap text-gray-700 leading-normal text-sm p-6 space-y-4 sm:text-base sm:space-y-6">
                        <p>
                            <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                        </p>

                        <p>
                            <?php echo e(__('If you did not receive the email')); ?>, <a
                                class="text-blue-500 hover:text-blue-700 no-underline hover:underline cursor-pointer"
                                onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();"><?php echo e(__('click here to request another')); ?></a>.
                        </p>

                        <form id="resend-verification-form" method="POST" action="<?php echo e(route('verification.resend')); ?>"
                            class="hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.authapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\auth\verify.blade.php ENDPATH**/ ?>