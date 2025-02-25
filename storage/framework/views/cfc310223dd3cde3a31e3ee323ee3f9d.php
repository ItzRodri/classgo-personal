<div class="am-reschudle-booking">
    <div class="am-reschudle-session">
        <div class="am-reschudle-header">
            <span>
                <i class="am-icon-megaphone-01"></i>
            </span>
            <h1><?php echo e(__('calendar.booking_rescheduled_title')); ?></h1>
        </div>
        <p><?php echo __('calendar.booking_rescheduled_desc', ['tutor' => $booking->tutor->full_name]); ?></p>
        <div class="am-reschudle-reason">
            <div class="am-user-detail">
                <!--[if BLOCK]><![endif]--><?php if(!empty($booking?->tutor?->image) && Storage::disk(getStorageDisk())->exists($booking?->tutor?->image)): ?>
                    <img src="<?php echo e(resizedImage($booking?->tutor?->image, 30, 30)); ?>" alt="<?php echo e($booking?->tutor?->full_name); ?>">
                <?php else: ?>
                    <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 30, 30)); ?>" alt="<?php echo e($booking?->tutor?->full_name); ?>">
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <div class="am-user-description">
                    <h3><?php echo e(__('calendar.reschedule_reason')); ?></h3>
                    <p>
                        <?php echo $booking->slot->meta_data['reason'] ?? ''; ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="am-reschudle-reason am-rescheduletimewrap">
            <h3><?php echo e(__('calendar.rescheduled_session')); ?></h3>
            <ul class="am-reschudle-list">
                <li>
                    <div class="am-reschudle-item am-rescheduletime">
                        <div class="am-session-reschudled">
                            <span>
                                <i class="am-icon-multiply-02"></i>
                            </span>
                            <strong><?php echo e(__('calendar.previous_session_date_time')); ?></strong>
                        </div>
                        <div class="am-session-time">
                            <strong><?php echo e(parseToUserTz($booking->start_time)->format(setting('_general.date_format') ?? 'F j, Y')); ?></strong>
                            <span>
                                <!--[if BLOCK]><![endif]--><?php if(setting('_lernen.time_format') == '12'): ?>
                                <?php echo e(parseToUserTz($booking->start_time)->format('h:i a')); ?> -
                                    <?php echo e(parseToUserTz($booking->end_time)->format('h:i a')); ?>

                                <?php else: ?>
                                    <?php echo e(parseToUserTz($booking->start_time)->format('H:i')); ?> -
                                    <?php echo e(parseToUserTz($booking->end_time)->format('H:i')); ?>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="am-reschudle-item am-new-session">
                        <div class="am-session-reschudled">
                            <span>
                                <i class="am-icon-check-circle06"></i>
                            </span>
                            <strong><?php echo e(__('calendar.rescheduled_session_date_time')); ?></strong>
                        </div>
                        <div class="am-session-time">
                            <strong><?php echo e(parseToUserTz($booking->slot->start_time)->format(setting('_general.date_format') ?? 'F j, Y')); ?></strong>
                            <span>
                                <!--[if BLOCK]><![endif]--><?php if(setting('_lernen.time_format') == '12'): ?>
                                <?php echo e(parseToUserTz($booking->slot->start_time)->format('h:i a')); ?> -
                                    <?php echo e(parseToUserTz($booking->slot->end_time)->format('h:i a')); ?>

                                <?php else: ?>
                                    <?php echo e(parseToUserTz($booking->slot->start_time)->format('H:i')); ?> -
                                    <?php echo e(parseToUserTz($booking->slot->end_time)->format('H:i')); ?>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="am-reschudle-confirm">
            <div class="am-reschudled-btns">
                <button class="am-btn" wire:click="confirmReschedule" wire:loading.class="am-btn_disable"><?php echo e(__('calendar.confirm_reschedule')); ?></button>
                <button class="am-white-btn" @click="$wire.dispatch('showConfirm', { 
                    id : <?php echo e($booking->id); ?>,
                    action : 'refund-session',
                    icon: 'warning',
                    title: '<?php echo e(__('calendar.confirm_refund_title')); ?>',
                    content: '<?php echo e(__('calendar.confirm_refund_desc')); ?>',
                    btnOk_title: '<?php echo e(__('calendar.btn_confirm_refund')); ?>',
                    btnCancel_title: '<?php echo e(__('calendar.btn_cancel_refund')); ?>',
                 })"><?php echo e(__('calendar.confirm_refund')); ?></button>
            </div>
            <button class="am-white-btn" data-bs-toggle="modal" data-bs-target="#session-detail"><?php echo e(__('calendar.view_session_details')); ?> 
                <i class="am-icon-arrow-06-1"></i>
            </button>
        </div>
        <div class="am-reschudle-reason">
            <p><?php echo e(__('calendar.contact_via_email')); ?><a href="mailto:<?php echo e(setting('_site.email')); ?>"><?php echo e(setting('_site.email')); ?></a></p>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc3c8c472b571ebc244c7fd652e2df334 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3c8c472b571ebc244c7fd652e2df334 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.booking-detail-modal','data' => ['currentBooking' => $booking,'wire:key' => ''.e(time()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('booking-detail-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['currentBooking' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($booking),'wire:key' => ''.e(time()).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3c8c472b571ebc244c7fd652e2df334)): ?>
<?php $attributes = $__attributesOriginalc3c8c472b571ebc244c7fd652e2df334; ?>
<?php unset($__attributesOriginalc3c8c472b571ebc244c7fd652e2df334); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3c8c472b571ebc244c7fd652e2df334)): ?>
<?php $component = $__componentOriginalc3c8c472b571ebc244c7fd652e2df334; ?>
<?php unset($__componentOriginalc3c8c472b571ebc244c7fd652e2df334); ?>
<?php endif; ?>
</div><?php /**PATH /home/lexhwdfc/public_html/resources/views/livewire/pages/student/reschedule-session.blade.php ENDPATH**/ ?>