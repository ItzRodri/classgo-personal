<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="am-easysetup <?php echo e(pagesetting('style_variation')); ?>">
                <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph'))): ?>
                    <div class="am-section_title am-section_title_center <?php echo e(pagesetting('section_title_variation')); ?>">
                        <?php if(!empty(pagesetting('pre_heading'))): ?><span class="am-tag"><?php echo e(pagesetting('pre_heading')); ?></span><?php endif; ?>
                        <?php if(!empty(pagesetting('heading'))): ?><h2><?php echo pagesetting('heading'); ?></h2><?php endif; ?>
                        <?php if(!empty(pagesetting('paragraph'))): ?><p><?php echo pagesetting('paragraph'); ?></p><?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty(pagesetting('steps_repeater'))): ?>
                    <div class="am-easysetup_list">
                        <ul>
                            <?php $__currentLoopData = pagesetting('steps_repeater'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($option['step_image']) || !empty($option['scnd_step_image']) 
                                    || !empty($option['step_heading']) || !empty($option['step_paragraph']) 
                                    || !empty($option['learn_more_btn_url']) || !empty($option['learn_more_btn_txt'])): ?>
                                    <li data-aos="fade-up" data-aos-easing="ease" data-aos-delay="<?php echo e($loop->iteration * 400); ?>">
                                        <div class="am-easysetup_list_item <?php if(!empty($option['image_verient'])): ?> <?php echo e($option['image_verient']); ?> <?php endif; ?>">
                                            <?php if(!empty($option['step_image'][0]['path']) || !empty($option['scnd_step_image'][0]['path'])): ?>
                                                <span class="am-setup-signup">
                                                    <?php if(!empty($option['step_image'][0]['path'])): ?><img class="am-step-gif" src="<?php echo e(url(Storage::url($option['step_image'][0]['path']))); ?>" alt="Easy steps image"><?php endif; ?>
                                                    <?php if(!empty($option['scnd_step_image'][0]['path'])): ?><img class="am-step-img" src="<?php echo e(url(Storage::url($option['scnd_step_image'][0]['path']))); ?>" alt="Easy steps image"><?php endif; ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty($option['step_heading'])): ?><h4><?php echo $option['step_heading']; ?></h4><?php endif; ?>
                                            <?php if(!empty($option['step_paragraph'])): ?><p><?php echo $option['step_paragraph']; ?></p><?php endif; ?>
                                            <?php if(!empty($option['learn_more_btn_txt'])): ?>
                                                <a href="<?php if(!empty($option['learn_more_btn_url'])): ?> <?php echo e($option['learn_more_btn_url']); ?> <?php endif; ?>">
                                                    <?php echo e($option['learn_more_btn_txt']); ?>

                                                    <i class="am-icon-arrow-right"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if(!empty(pagesetting('shape_image'))): ?>
        <img class="am-guide-pattranimg" src="<?php echo e(url(Storage::url(pagesetting('shape_image')[0]['path']))); ?>" alt="Background shape image"> 
    <?php endif; ?>
</div>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/easy-steps/view.blade.php ENDPATH**/ ?>