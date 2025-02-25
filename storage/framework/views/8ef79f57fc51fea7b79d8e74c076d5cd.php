<section class="am-steps"> 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty(pagesetting('pre_heading')) 
                    || !empty(pagesetting('heading')) 
                    || !empty(pagesetting('paragraph')) 
                    || !empty(pagesetting('steps_data')) 
                    || !empty(pagesetting('start_journ_icon')) 
                    || !empty(pagesetting('start_journ_heading')) 
                    || !empty(pagesetting('start_journ_description')) 
                    || !empty(pagesetting('get_start_btn_text'))
                    || !empty(pagesetting('get_start_btn_url'))): ?>
                    <div class="am-steps_content">
                        
                        <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph'))): ?>
                            <div class="am-steps_content_unlock">
                                <?php if(!empty(pagesetting('pre_heading'))): ?> <span><?php echo e(pagesetting('pre_heading')); ?></span> <?php endif; ?> 
                                <?php if(!empty(pagesetting('heading'))): ?> <h3><?php echo pagesetting('heading'); ?></h3> <?php endif; ?>
                                <?php if(!empty(pagesetting('paragraph'))): ?> <p><?php echo e(pagesetting('paragraph')); ?></p> <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(pagesetting('steps_data')) 
                            || !empty(pagesetting('start_journ_icon')) 
                            || !empty(pagesetting('start_journ_heading')) 
                            || !empty(pagesetting('start_journ_description')) 
                            || !empty(pagesetting('get_start_btn_text')) 
                            || !empty(pagesetting('get_start_btn_url'))): ?>
                            <div class="am-steps_content_start">
                                <?php if(!empty(pagesetting('steps_data'))): ?>
                                    <?php $__currentLoopData = pagesetting('steps_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($option['sub_heading']) 
                                            || !empty($option['step_image']) 
                                            || !empty($option['step_heading'])
                                            || !empty($option['step_paragraph']) 
                                            || !empty($option['btn_text']) 
                                            || !empty($option['btn_url'])): ?>
                                            <div>
                                                <div class="am-steps_content_start_info">
                                                    <?php if(!empty($option['sub_heading'])): ?> <span><?php echo e($option['sub_heading']); ?></span> <?php endif; ?>
                                                    <?php if(!empty($option['step_image'])): ?>
                                                        <figure>
                                                            <?php if(!empty($option['step_image'][0]['path'])): ?>
                                                                <img src="<?php echo e(url(Storage::url($option['step_image'][0]['path']))); ?>" alt="<?php echo e($option['step_heading']); ?> image">
                                                            <?php endif; ?>
                                                        </figure>
                                                    <?php endif; ?>
                                                    <?php if(!empty($option['step_heading']) || !empty($option['step_paragraph'])): ?>
                                                        <div class="am-steps_content_start_info_redirect">
                                                            <?php if(!empty($option['step_heading'])): ?> <h3><?php echo e($option['step_heading']); ?></h3> <?php endif; ?>
                                                            <?php if(!empty($option['step_paragraph'])): ?> <p><?php echo $option['step_paragraph']; ?></p> <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($option['btn_text'])): ?> <a href="<?php if(!empty($option['btn_url'])): ?> <?php echo e($option['btn_url']); ?> <?php endif; ?>"><?php echo e($option['btn_text']); ?></a> <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('start_journ_icon')) 
                                    || !empty(pagesetting('start_journ_heading')) 
                                    || !empty(pagesetting('start_journ_description')) 
                                    || !empty(pagesetting('get_start_btn_text')) 
                                    || !empty(pagesetting('get_start_btn_url'))): ?>
                                    <div>
                                        <div class="am-steps_content_start_info journey">
                                            <?php if(!empty(pagesetting('start_journ_icon'))): ?>
                                                <span>
                                                    <i class="<?php echo pagesetting('start_journ_icon'); ?>"></i>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty(pagesetting('start_journ_heading')) || !empty(pagesetting('start_journ_description'))): ?> 
                                                <div class="am-steps_content_start_info_redirect">
                                                    <?php if(!empty(pagesetting('start_journ_heading'))): ?> <h3><?php echo e(pagesetting('start_journ_heading')); ?></h3> <?php endif; ?> 
                                                    <?php if(!empty(pagesetting('start_journ_description'))): ?> <p><?php echo e(pagesetting('start_journ_description')); ?></p> <?php endif; ?> 
                                                </div>
                                            <?php endif; ?>
                                            <?php if(!empty(pagesetting('get_start_btn_text')) || !empty(pagesetting('get_start_btn_url'))): ?> 
                                                <a href="<?php if(!empty(pagesetting('get_start_btn_url'))): ?> <?php echo e(pagesetting('get_start_btn_url')); ?> <?php endif; ?>"><?php echo e(pagesetting('get_start_btn_text')); ?>

                                                    <i class="am-icon-arrow-right"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/steps/view.blade.php ENDPATH**/ ?>