<div class="am-tracklearning">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="am-tracklearning_wrap">
                    <div class="am-tracklearning_content">
                        <div class="am-section_title <?php echo e(pagesetting('section_title_variation')); ?>">
                            <?php if(!empty(pagesetting('pre_heading'))): ?><span><?php echo e(pagesetting('pre_heading')); ?></span><?php endif; ?>
                            <?php if(!empty(pagesetting('heading'))): ?><h2><?php echo pagesetting('heading'); ?></h2><?php endif; ?>
                            <?php if(!empty(pagesetting('paragraph'))): ?><p><?php echo e(pagesetting('paragraph')); ?></p><?php endif; ?>
                        </div>
                        <?php if(!empty(pagesetting('steps_repeater'))): ?>
                            <ul>
                                <?php $__currentLoopData = pagesetting('steps_repeater'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="am-tracklearning_activities">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M7.75 0.5L9.77568 5.97432L15.25 8L9.77568 10.0257L7.75 15.5L5.72432 10.0257L0.25 8L5.72432 5.97432L7.75 0.5Z" fill="#3CCF3C"/>
                                            </svg>
                                            <div>
                                                <?php if(!empty($option['step_heading'])): ?><h5><?php echo $option['step_heading']; ?></h5><?php endif; ?>
                                                <?php if(!empty($option['step_paragraph'])): ?><span><?php echo $option['step_paragraph']; ?></span><?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <?php if(!empty(pagesetting('get_started_btn_url')) 
                            || !empty(pagesetting('get_started_btn_txt'))
                            || !empty(pagesetting('explore_tutor_btn_url'))
                            || !empty(pagesetting('explore_tutor_btn_txt'))): ?>
                            <div class="am-tracklearning_btns">
                                <?php if(!empty(pagesetting('get_started_btn_txt')) || !empty(pagesetting('get_started_btn_url'))): ?> 
                                    <a href="<?php if(!empty(pagesetting('get_started_btn_url'))): ?> <?php echo e(pagesetting('get_started_btn_url')); ?> <?php endif; ?>" class="am-primary-btn">
                                        <?php echo e(pagesetting('get_started_btn_txt')); ?>

                                    </a>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('explore_tutor_btn_txt')) || !empty(pagesetting('explore_tutor_btn_url'))): ?> 
                                    <a href="<?php if(!empty(pagesetting('explore_tutor_btn_url'))): ?> <?php echo e(pagesetting('explore_tutor_btn_url')); ?> <?php endif; ?>" class="am-primary-btn-white">
                                        <?php echo e(pagesetting('explore_tutor_btn_txt')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty(pagesetting('subject_image')) 
                    || !empty(pagesetting('summary_image'))
                    || !empty(pagesetting('student_image'))
                    || !empty(pagesetting('calander_image'))): ?>
                        <div class="am-tracklearning_images">
                            <?php if(!empty(pagesetting('subject_image')[0]['path'])): ?>
                                <figure class="am-subject-img">
                                    <img src="<?php echo e(url(Storage::url(pagesetting('subject_image')[0]['path']))); ?>" alt="Subject statistics image">
                                </figure>
                            <?php endif; ?>
                            <?php if(!empty(pagesetting('summary_image')[0]['path'])): ?>
                                <figure class="am-summary-img">
                                    <img src="<?php echo e(url(Storage::url(pagesetting('summary_image')[0]['path']))); ?>" alt="Order summary image">
                                </figure>
                            <?php endif; ?>
                            <?php if(!empty(pagesetting('student_image')[0]['path'])): ?>
                                <figure class="am-student-img">
                                    <img src="<?php echo e(url(Storage::url(pagesetting('student_image')[0]['path']))); ?>" alt="Student statistics image">
                                </figure>
                            <?php endif; ?>
                            <?php if(!empty(pagesetting('calander_image')[0]['path'])): ?>
                                <figure class="am-calander-logo">
                                    <img src="<?php echo e(url(Storage::url(pagesetting('calander_image')[0]['path']))); ?>" alt="Calander image">
                                </figure>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/track/view.blade.php ENDPATH**/ ?>