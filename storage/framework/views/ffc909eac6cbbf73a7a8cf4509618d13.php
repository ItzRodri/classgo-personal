<!--[if BLOCK]><![endif]--><?php if(!empty($booking)): ?>
    <?php
        $subject = $booking->slot->subjectGroupSubjects?->subject?->name;
        $tooltipClass   = Arr::random(['warning', 'pending', 'ready', 'success'])
    ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'am-reminder-tooltip',
        "am-$tooltipClass-tooltip" => parseToUserTz($booking->slot->start_time)->isFuture() || $booking->status == 'disputed' || $booking->status == 'rescheduled' ,
        'am-blur-tooltip' => auth()->user()->role == 'student' && ($booking->status == 'rescheduled' || $booking->status == 'disputed')
        ]); ?>">
        <div class="am-reminder-tooltip_title am-titleblur">
            <figure>
                <!--[if BLOCK]><![endif]--><?php if(!empty($booking->slot->subjectGroupSubjects?->image) && Storage::disk(getStorageDisk())->exists($booking->slot->subjectGroupSubjects?->image)): ?>
                    <img src="<?php echo e(resizedImage($booking->slot->subjectGroupSubjects?->image, 40, 40)); ?>" alt="<?php echo e($subject); ?>">
                <?php else: ?> 
                    <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 40, 40)); ?>" alt="<?php echo e($subject); ?>">
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </figure>
            <h2>
                <?php echo e($subject); ?>

                <!--[if BLOCK]><![endif]--><?php if(parseToUserTz($booking->slot->start_time)->isFuture()): ?>
                    <span>
                        <i class="am-icon-time"></i>
                        <!--[if BLOCK]><![endif]--><?php if(setting('_lernen.time_format') == '12'): ?>
                            <?php echo e(parseToUserTz($booking->slot->start_time)->format('h:i a')); ?> -
                            <?php echo e(parseToUserTz($booking->slot->end_time)->format('h:i a')); ?>

                        <?php else: ?>
                            <?php echo e(parseToUserTz($booking->slot->start_time)->format('H:i')); ?> -
                            <?php echo e(parseToUserTz($booking->slot->end_time)->format('H:i')); ?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </span>
                <?php elseif($booking->rating_exists): ?>
                    <span class="am-reviewreqslot">
                        <i class="am-icon-check-circle06"></i> 
                        <?php echo e(__('calendar.review_submitted')); ?>

                    </span>
                <?php elseif($booking->status == 'completed'): ?>
                    <?php
                        $tutorInfo['name'] = $booking->tutor->full_name;
                        if (!empty($booking?->tutor?->image) &&
                            Storage::disk(getStorageDisk())->exists($booking?->tutor?->image)) {
                            $tutorInfo['image'] = resizedImage($booking?->tutor?->image, 36, 36);
                        } else {
                            $tutorInfo['image'] = setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 36, 36);
                        }
                    ?>
                    <a href="#"
                        @click=" tutorInfo = <?php echo \Illuminate\Support\Js::from($tutorInfo)->toHtml() ?>; form.bookingId = <?php echo \Illuminate\Support\Js::from($booking->id)->toHtml() ?>; $nextTick(() => $wire.dispatch('toggleModel', {id:'review-modal',action:'show'}) )">
                        <?php echo e(__('calendar.add_review')); ?> 
                    </a>
                <?php elseif(auth()->user()->role == 'student' && $booking->status == 'disputed'): ?>
                    <a href="<?php echo e(route('student.manage-dispute', ['id' => $booking?->dispute?->uuid])); ?>"><?php echo e(__('calendar.dispute_session')); ?></a>  
                <?php else: ?>
                    <a href="#" wire:click.prevent="showCompletePopup(<?php echo e(json_encode($booking)); ?>)">
                        <?php echo e(__('calendar.mark_as_completed')); ?>

                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </h2>
        </div>
        <!--[if BLOCK]><![endif]--><?php if(auth()->user()->role == 'student' && $booking->status == 'rescheduled'): ?>
            <div class="am-blur-content">
                <a href="<?php echo e(route('student.reschedule-session', ['id' => $booking->id])); ?>" wire:navigate.remove><?php echo e(__('calendar.tutor_rescheduled')); ?></a>
            </div>
        <?php elseif(auth()->user()->role == 'student' && $booking->status == 'disputed'): ?>
            <div class="am-blur-content">
                <a href="<?php echo e(route('student.manage-dispute', ['id' => $booking?->dispute?->uuid])); ?>"><?php echo e(__('calendar.dispute_session')); ?></a>   
            </div>
        <?php elseif(parseToUserTz($booking->slot->start_time)->isFuture()): ?>
            <div class="am-reminder-tooltip_body">
                <ul class="am-reminder-tooltip-content">
                    <li>
                        <span><?php echo e(__('calendar.session_fee')); ?></span>
                        <strong> <?php echo e(formatAmount($booking->slot->session_fee)); ?></strong>
                    </li>
                    <li>
                        <span><?php echo e(__('calendar.total_enrollment')); ?></span>
                        <!--[if BLOCK]><![endif]--><?php if($booking->slot->total_booked > 0 && !empty($booking->slot->students)): ?>
                            <ul class="am-reminder-enrollment-list">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $booking->slot->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($student->image) && Storage::disk(getStorageDisk())->exists($student->image)): ?>
                                            <img src="<?php echo e(resizedImage($student->image, 40, 40)); ?>" alt="profile-img">
                                        <?php else: ?> 
                                            <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 40, 40)); ?>" alt="profile-img">
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <li>
                                    <span><?php echo e(__('calendar.booked_students', ['count' => $booking->slot->bookings_count])); ?></span>
                                </li>
                            </ul>
                        <?php else: ?>
                            --
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </li>
                    <li>
                        <span><?php echo e(__('general.date')); ?></span>
                        <strong><?php echo e(parseToUserTz($booking->slot->start_time)->format(setting('_general.date_format') ?? 'F j, Y')); ?></strong>
                    </li>
                    <li>
                        <span><?php echo e(__('calendar.time')); ?></span>
                        <strong>
                            <!--[if BLOCK]><![endif]--><?php if(setting('_lernen.time_format') == '12'): ?>
                                <?php echo e(parseToUserTz($booking->slot->start_time)->format('h:i a')); ?> -
                                <?php echo e(parseToUserTz($booking->slot->end_time)->format('h:i a')); ?>

                            <?php else: ?>
                                <?php echo e(parseToUserTz($booking->slot->start_time)->format('H:i')); ?> -
                                <?php echo e(parseToUserTz($booking->slot->end_time)->format('H:i')); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </strong>
                    </li>
                </ul>
                <div class="am-reminder-btn">
                    <button class="am-btn-light" wire:loading.class="am-btn_disable" wire:click="showBookingDetail(<?php echo e($booking->id); ?>)"><?php echo e(__('calendar.view_full_details')); ?></button>
                    <!--[if BLOCK]><![endif]--><?php if(!empty($booking->slot->meta_data['meeting_link'])): ?>
                        <a href="<?php echo e($booking->slot->meta_data['meeting_link'] ?? '#'); ?>" target="_blank" class="am-btn">
                            <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('role', 'tutor')): ?><?php echo e(__('calendar.start_session_now')); ?> <?php elseif (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?> <?php echo e(__('calendar.join_session')); ?> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->    
    </div> 
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /home/lexhwdfc/public_html/resources/views/components/single-booking.blade.php ENDPATH**/ ?>