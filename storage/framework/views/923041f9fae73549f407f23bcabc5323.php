<?php $__env->startSection('title', __('general.404_title')); ?>
<?php $__env->startSection('heading', __('general.went_wrong')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('img', asset('images/error/404.png')); ?>
<?php $__env->startSection('message', __('general.went_wrong_dec')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lexhwdfc/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>