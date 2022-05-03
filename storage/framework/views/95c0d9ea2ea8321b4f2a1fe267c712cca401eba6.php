<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="<?php echo e(__('Pagination Navigation')); ?>" class="w-full flex items-center justify-between">
       
        
        <div class="w-full hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="w-full">
                <p class="text-tiny text-gray-400 leading-5">
                    <?php echo __('Showing'); ?>

                    <?php if($paginator->firstItem()): ?>
                        <span class="font-medium"><?php echo e($paginator->firstItem()); ?></span>
                        <?php echo __('to'); ?>

                        <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    <?php else: ?>
                        <?php echo e($paginator->count()); ?>

                    <?php endif; ?>
                    <?php echo __('of'); ?>

                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('results'); ?>

                </p>
            </div>
        </div>
       
        
        <div class="flex justify-between sm:flex ">
            <div class="flex justify-between sm:flex ">
                <?php if($paginator->onFirstPage()): ?>
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium focus:outline-none focus:shadow-outline-purple cursor-default leading-5 rounded-md">
                        <?php echo __('pagination.previous'); ?>

                    </span>
                <?php else: ?>
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md focus:outline-none focus:shadow-outline-purpleactive:text-gray-700 transition ease-in-out duration-150">
                        <?php echo __('pagination.previous'); ?>

                    </a>
                <?php endif; ?>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    
                    <?php if($paginator->onFirstPage()): ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.previous')); ?>">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple cursor-default rounded-l-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-white rounded-md focus:outline-none focus:shadow-outline-purple transition ease-in-out duration-150"
                            aria-label="<?php echo e(__('pagination.previous')); ?>">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <span aria-disabled="true">
                                <span
                                    class="cursor-default  relative inline-flex items-center  px-3 py-2 rounded-md focus:outline-none focus:shadow-outline-purple leading-5"><?php echo e($element); ?></span>
                            </span>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-3 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple cursor-default leading-5"><?php echo e($page); ?></span>
                                    </span>
                                <?php else: ?>
                                    <a href="<?php echo e($url); ?>"
                                        class="relative inline-flex items-center px-3 py-2 rounded-md focus:outline-none focus:shadow-outline-purple ease-in-out"
                                        aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>">
                                        <?php echo e($page); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($paginator->hasMorePages()): ?>
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium rounded-md focus:outline-none focus:shadow-outline-purple ease-in-out duration-150"
                            aria-label="<?php echo e(__('pagination.next')); ?>">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    <?php else: ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.next')); ?>">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple cursor-default rounded-r-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    <?php endif; ?>

                </span>
            </div>

            <div class="flex justify-between sm:flex">
                <?php if($paginator->hasMorePages()): ?>
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>"
                        class="relative inline-flex items-center px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-purple active:text-gray-700  ease-in-out">
                        <?php echo __('pagination.next'); ?>

                    </a>
                <?php else: ?>
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm rounded-md focus:outline-none focus:shadow-outline-purplecursor-default leading-5">
                        <?php echo __('pagination.next'); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>


    </nav>
<?php endif; ?>
<?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>