<div class="am-resumebox_content am-favourites" wire:init="loadData">
    <?php $__env->slot('title'); ?>
        <?php echo e(__('sidebar.favourites')); ?>

    <?php $__env->endSlot(); ?>
    <div class="am-title_wrap">
        <div class="am-title">
            <h2><?php echo e(__('profile.favourite_title')); ?></h2>
            <p><?php echo e(__('profile.description_text')); ?></p>
        </div>
    </div>
    <div class="am-resumewrap">
        <!--[if BLOCK]><![endif]--><?php if($isLoading): ?>
            <?php echo $__env->make('skeletons.favourites', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
             <!--[if BLOCK]><![endif]--><?php if(!$favourites->isEmpty()): ?>
            <div class="am-resume">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $favourites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favourite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="am-resume_item am-resume_wrap">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($favourite->profile->image) && Storage::disk(getStorageDisk())->exists($favourite->profile->image)): ?>
                                <img src="<?php echo e(resizedImage($favourite->profile->image,50,50)); ?>" alt="<?php echo e($favourite->profile->image); ?>" />
                            <?php else: ?>
                                <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 50, 50)); ?>" alt="<?php echo e($favourite->profile->image); ?>" />
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <div class="am-resume_content">
                            <div class="am-resume_item_title">
                                <h3><?php echo e($favourite->profile->full_name); ?></h3>
                                <div class="am-itemdropdown">
                                    <a href="#" id="am-itemdropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="am-icon-ellipsis-horizontal-02"></i>
                                    </a>
                                    <ul class="am-itemdropdown_list dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a href="<?php echo e(route('tutor-detail',['slug' => $favourite->profile->slug])); ?>">
                                                <i class="am-icon-eye-open-01"></i>
                                                <?php echo e(__('profile.view_profile')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" @click="$wire.dispatch('showConfirm', { id : <?php echo e($favourite->id); ?>, action : 'remove-favourite-user' })">
                                                <i class="am-icon-trash-02"></i>
                                                <?php echo e(__('profile.remove_from_list')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="am-resume_item_info">
                                <li>
                                    <span>
                                        <i class="am-icon-book-1"></i>
                                        <?php echo e($favourite->profile->native_language); ?>

                                    </span>
                                </li>
                                <!--[if BLOCK]><![endif]--><?php if($favourite?->address?->country?->short_code): ?>
                                <li>
                                    <span>
                                        <span class="flag flag-<?php echo e(strtolower($favourite?->address?->country?->short_code)); ?>"></span>
                                        <?php echo e($favourite?->address?->country?->name); ?>

                                    </span>
                                </li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <li>
                                    <span class="am-favrating">
                                        <i class="am-icon-star-filled"></i>
                                        <span class="am-uniqespace"><em><?php echo e(number_format($favourite?->reviews_avg_rating, 1)); ?></em>/5.0</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <?php else: ?>
            <div class="am-page-error-wrap">
                <?php if (isset($component)) { $__componentOriginal86cd4a276c2978c462f28bbb510e89a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86cd4a276c2978c462f28bbb510e89a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.no-record','data' => ['image' => asset('images/fvt.png'),'title' => __('general.no_record_title'),'description' => __('general.no_record_desc')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(asset('images/fvt.png')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('general.no_record_title')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('general.no_record_desc'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86cd4a276c2978c462f28bbb510e89a0)): ?>
<?php $attributes = $__attributesOriginal86cd4a276c2978c462f28bbb510e89a0; ?>
<?php unset($__attributesOriginal86cd4a276c2978c462f28bbb510e89a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86cd4a276c2978c462f28bbb510e89a0)): ?>
<?php $component = $__componentOriginal86cd4a276c2978c462f28bbb510e89a0; ?>
<?php unset($__componentOriginal86cd4a276c2978c462f28bbb510e89a0); ?>
<?php endif; ?>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')([
'public/css/flags.css'
]); ?>
<?php $__env->stopPush(); ?><?php /**PATH /home/lexhwdfc/public_html/resources/views/livewire/pages/student/favourite/favourites.blade.php ENDPATH**/ ?>