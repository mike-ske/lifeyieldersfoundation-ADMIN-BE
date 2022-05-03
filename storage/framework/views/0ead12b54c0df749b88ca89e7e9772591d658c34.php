<?php $__env->startComponent('mail::message'); ?>

<div style="width:100%;
        display:flex;">
    <a 
        href="http://lifeyieldersfoundation.org" 
        style="width:100%;
            display:flex;
            justify-content:end;
            margin-top:4px;
            margin-botom:4px !important;">
        <img style="margin-bottom:20px" src='https://drive.google.com/uc?id=1UlifAUz4G7fPdIRQXeBRpbPWVywSBEcA'  alt='logo' width='auto' height='80' />
    </a>

</div>

# <?php echo e($mailing->subject); ?>


Hi,

<?php echo e($mailing->message); ?>



<hr><br>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Micah\OneDrive\Desktop\FN\faan_admin\resources\views\emails\mailbox.blade.php ENDPATH**/ ?>