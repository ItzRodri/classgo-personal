<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<div class="page-<?php echo e($page->slug == "/" ? "home-page" : $page->slug); ?>">
    <?php echo $pageSections; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('pagebuilder.site_layout'),['page' => $page, 'edit' => false ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lexhwdfc/public_html/vendor/larabuild/pagebuilder/src/../resources/views/page.blade.php ENDPATH**/ ?>