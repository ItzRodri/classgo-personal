<div class="am-dbbox am-invoicelist_wrap" wire:init="loadData">
    <!--[if BLOCK]><![endif]--><?php if($isLoading): ?>
        <?php echo $__env->make('skeletons.invoices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="am-dbbox_content am-invoicelist">
            <div class="am-dbbox_title">
                <?php $__env->slot('title'); ?>
                    <?php echo e(__('invoices.invoices')); ?>

                <?php $__env->endSlot(); ?>
                <h2><?php echo e(__('invoices.invoices')); ?></h2>
                <div class="am-dbbox_title_sorting">
                    <em><?php echo e(__('invoices.filter_by')); ?></em>
                    <span class="am-select" wire:ignore>
                        <select data-componentid="window.Livewire.find('<?php echo e($_instance->getId()); ?>')" data-live="true" class="am-select2" id="status"
                            data-wiremodel="status">
                            <option value="" <?php echo e($status == '' ? 'selected' : ''); ?>><?php echo e(__('invoices.all_invoices')); ?></option>
                            <option value="pending" <?php echo e($status == 'pending' ? 'selected' : ''); ?>><?php echo e(__('invoices.pending')); ?></option>
                            <option value="complete" <?php echo e($status == 'complete' ? 'selected' : ''); ?>><?php echo e(__('invoices.complete')); ?></option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="am-invoicetable">
                <table class="am-table <?php if(setting('_general.table_responsive') == 'yes'): ?> am-table-responsive <?php endif; ?>">
                    <thead>
                        <tr>
                            <th><?php echo e(__('booking.id')); ?></th>
                            <th><?php echo e(__('booking.date')); ?></th>
                            <th><?php echo e(__('booking.transaction_id')); ?></th>
                            <th><?php echo e(__('general.item' )); ?></th>
                            <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('role', 'tutor')): ?>
                                <th><?php echo e(__('booking.student_name')); ?></th>
                                <th><?php echo e(__('booking.amount')); ?></th>
                                <th><?php echo e(__('booking.tutor_payout')); ?></th>
                            <?php elseif (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
                                <th><?php echo e(__('booking.tutor_name')); ?></th>
                                <th><?php echo e(__('booking.amount')); ?></th>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <th><?php echo e(__('booking.status')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php if(!$orders->isEmpty()): ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $options        = $order?->options;
                                    $subject        = !empty($options['subject']) ? $options['subject'] : '';
                                    $image          = !empty($options['image']) ? $options['image'] : '';
                                    $subjectGroup   = !empty($options['subject_group']) ? $options['subject_group'] : '';
                                    $tutor_payout = $order?->price - getCommission($order?->price);
                                ?>
                                <tr>
                                    <td data-label="<?php echo e(__('booking.id')); ?>"><span><?php echo e($order?->order_id); ?></span></td>
                                    <td data-label="<?php echo e(__('booking.date')); ?>"><span><?php echo e($order?->created_at->format('F j, Y')); ?></span></td>
                                    <td data-label="<?php echo e(__('booking.transaction_id')); ?>"><span><?php echo e(!empty($order?->orders?->transaction_id) ? $order?->orders?->transaction_id : '-'); ?></span></td>
                                    <td data-label="<?php echo e(__('general.item' )); ?>">
                                        <div class="tb-varification_userinfo">
                                            <strong class="tb-adminhead__img">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($image) && Storage::disk(getStorageDisk())->exists($image)): ?>
                                                    <img src="<?php echo e(resizedImage($image,34,34)); ?>" alt="<?php echo e($image); ?>" />
                                                <?php else: ?>
                                                    <img src="<?php echo e(resizedImage('placeholder.png',34,34)); ?>" alt="<?php echo e($image); ?>" />
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </strong>
                                            <!--[if BLOCK]><![endif]--><?php if($order->orderable_type == App\Models\SlotBooking::class): ?>
                                                <span><?php echo e($subject); ?><small><?php echo e($subjectGroup); ?></small></span>
                                            <?php elseif($order->orderable_type == \Modules\Courses\Models\Course::class && !empty($options['title'])): ?>
                                                <span><?php echo e($options['title']); ?></span>
                                            <?php elseif(\Nwidart\Modules\Facades\Module::has('subscriptions') && \Nwidart\Modules\Facades\Module::isEnabled('subscriptions') && $order->orderable_type == 'Modules\Subscriptions\Models\Subscription'): ?>
                                                <span><?php echo e($order->options['name']); ?> <small><?php echo e(__($order->options['period'])); ?></small></span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </td>
                                    <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
                                        <td data-label="<?php echo e(__('booking.tutor_name' )); ?>">
                                            <div class="tb-varification_userinfo">
                                                <!--[if BLOCK]><![endif]--><?php if($order?->orderable_type == \Modules\Courses\Models\Course::class): ?>
                                                    <strong class="tb-adminhead__img">
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($order?->orderable?->instructor?->profile?->image) && Storage::disk(getStorageDisk())->exists($order?->orderable?->instructor?->profile?->image)): ?>
                                                        <img src="<?php echo e(resizedImage($order?->orderable?->instructor?->profile?->image,34,34)); ?>" alt="<?php echo e($order?->orderable?->instructor?->profile?->image); ?>" />
                                                        <?php else: ?>
                                                            <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 34, 34)); ?>" alt="<?php echo e($order?->orderable?->instructor?->profile?->image); ?>" />
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </strong>
                                                    <span><?php echo e($order?->orderable?->instructor?->profile?->first_name); ?></span>
                                                <?php elseif($order?->orderable_type == App\Models\SlotBooking::class): ?>
                                                    <strong class="tb-adminhead__img">
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($order?->orderable?->tutor?->image) && Storage::disk(getStorageDisk())->exists($order?->orderable?->tutor?->image)): ?>
                                                        <img src="<?php echo e(resizedImage($order?->orderable?->tutor?->image,34,34)); ?>" alt="<?php echo e($order?->orderable?->tutor?->image); ?>" />
                                                        <?php else: ?>
                                                            <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 34, 34)); ?>" alt="<?php echo e($order?->orderable?->tutor?->image); ?>" />
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </strong>
                                                    <span><?php echo e($order?->orderable?->tutor?->first_name); ?></span>
                                                <?php else: ?>
                                                    <span>-</span>    
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.amount')); ?>">
                                            <span><?php echo formatAmount($order?->price); ?></span>
                                        </td>
                                    <?php elseif (\Illuminate\Support\Facades\Blade::check('role', 'tutor')): ?>
                                        <td data-label="<?php echo e(__('booking.student_name' )); ?>">
                                            <div class="tb-varification_userinfo">
                                                <!--[if BLOCK]><![endif]--><?php if($order->orderable_type != 'Modules\Subscriptions\Models\Subscription'): ?>
                                                    <strong class="tb-adminhead__img">
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($order?->orders?->userProfile?->image) && Storage::disk(getStorageDisk())->exists($order?->orders?->userProfile?->image)): ?>
                                                        <img src="<?php echo e(resizedImage($order?->orders?->userProfile?->image,34,34)); ?>" alt="<?php echo e($order?->orders?->userProfile?->image); ?>" />
                                                        <?php else: ?>
                                                            <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 34, 34)); ?>" alt="<?php echo e($order?->orderable?->student?->image); ?>" />
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </strong>
                                                    <span><?php echo e($order?->orders?->userProfile?->first_name); ?></span>
                                                <?php else: ?>
                                                    <span>-</span> 
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.amount')); ?>">
                                            <span><?php echo formatAmount($order?->price); ?></span>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.tutor_payout')); ?>">
                                            <!--[if BLOCK]><![endif]--><?php if($order->orderable_type != 'Modules\Subscriptions\Models\Subscription'): ?>
                                                <span><?php echo formatAmount($tutor_payout); ?></span>
                                            <?php else: ?>
                                                <span>-</span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <td data-label="<?php echo e(__('booking.status' )); ?>">
                                        <div class="am-status-tag">
                                            <em class="tk-project-tag-two <?php echo e($order?->orders?->status == 'complete' ? 'tk-hourly-tag' : 'tk-fixed-tag'); ?>"><?php echo e($order?->orders?->status); ?></em>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($orders->isEmpty()): ?>
            <?php if (isset($component)) { $__componentOriginal86cd4a276c2978c462f28bbb510e89a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86cd4a276c2978c462f28bbb510e89a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.no-record','data' => ['image' => asset('images/payouts.png'),'title' => __('general.no_record_title'),'description' => __('general.no_records_available')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(asset('images/payouts.png')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('general.no_record_title')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('general.no_records_available'))]); ?>
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
            <?php else: ?>
            <?php echo e($orders->links('pagination.pagination')); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php $__env->startPush('scripts' ); ?>
<script type="text/javascript" data-navigate-once>
    var component = '';
    document.addEventListener('livewire:navigated', function() {
            component = window.Livewire.find('<?php echo e($_instance->getId()); ?>');
    },{ once: true });
    document.addEventListener('loadPageJs', (event) => {
        component.dispatch('initSelect2', {target:'.am-select2'});
    })
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/lexhwdfc/public_html/resources/views/livewire/pages/student/invoices.blade.php ENDPATH**/ ?>