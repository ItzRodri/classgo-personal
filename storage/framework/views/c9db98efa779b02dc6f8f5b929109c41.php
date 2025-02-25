<?php $__env->startPush('styles'); ?>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <?php echo app('Tighten\Ziggy\BladeRouteGenerator')->generate(); ?>

    <?php echo e(translationsUIAssets()); ?>


    <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->head; } ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<body class="font-sans antialiased h-full">
    <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->body; } else { ?><div id="app" data-page="<?php echo e(json_encode($page)); ?>"></div><?php } ?>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(config('translations.layout'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lexhwdfc/public_html/vendor/amentotech/laravel-translations/src/../resources/views/app.blade.php ENDPATH**/ ?>