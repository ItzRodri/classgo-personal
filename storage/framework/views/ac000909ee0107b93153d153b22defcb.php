<section class="am-mission_section <?php echo e(pagesetting('style_variation')); ?>">
    <div class="container">
        <?php if(!empty(pagesetting('pre_heading')) 
            || !empty(pagesetting('heading')) 
            || !empty(pagesetting('paragraph')) 
            || !empty(pagesetting('list_data'))): ?>
            <div class="row">
                <?php if(!empty(pagesetting('pre_heading')) 
                    || !empty(pagesetting('heading')) 
                    || !empty(pagesetting('paragraph')) 
                    || !empty(pagesetting('list_data'))): ?>
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <div class="am-content_box am-left-text <?php echo e(pagesetting('select_title_verient')); ?>">
                            <?php if(!empty(pagesetting('pre_heading'))): ?> <span><?php echo e(pagesetting('pre_heading')); ?></span> <?php endif; ?> 
                            <?php if(!empty(pagesetting('heading'))): ?> <h3><?php echo pagesetting('heading'); ?></h3> <?php endif; ?>
                            <?php if(!empty(pagesetting('paragraph'))): ?> <p><?php echo e(pagesetting('paragraph')); ?></p> <?php endif; ?>
                            <?php if(!empty(pagesetting('list_data'))): ?>
                                <ul>
                                    <?php $__currentLoopData = pagesetting('list_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($data['item_heading']) || !empty($data['list_item'])): ?> 
                                          
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                          
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty(pagesetting('mission_frame_image')) 
                    || !empty(pagesetting('user_one_image')) 
                    || !empty(pagesetting('handshake_image')) 
                    || !empty(pagesetting('user_two_image'))
                    || !empty(pagesetting('image_heading'))
                    || !empty(pagesetting('courses_text'))): ?>
                    <div class="col-12 col-lg-6 order-1 order-lg-2">
                        <div class="am-mission_iframe">
                            <?php if(!empty(pagesetting('mission_frame_image')) 
                                || !empty(pagesetting('user_one_image')) 
                                || !empty(pagesetting('handshake_image')) 
                                || !empty(pagesetting('user_two_image'))
                                || !empty(pagesetting('image_heading'))
                                || !empty(pagesetting('courses_text'))): ?>
                                <figure>
                                    <?php if(!empty(pagesetting('mission_frame_image'))): ?>
                                        <?php if(!empty(pagesetting('mission_frame_image')[0]['path'])): ?>
                                            <img src="<?php echo e(url(Storage::url(pagesetting('mission_frame_image')[0]['path']))); ?>" alt="Empowering learners image">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(!empty(pagesetting('user_one_image')) 
                                        || !empty(pagesetting('handshake_image')) 
                                        || !empty(pagesetting('user_two_image'))
                                        || !empty(pagesetting('image_heading'))
                                        || !empty(pagesetting('courses_text'))): ?>
                                        <figcaption>
                                            <?php if(!empty(pagesetting('user_one_image'))): ?>
                                                <?php if(!empty(pagesetting('user_one_image')[0]['path'])): ?>
                                                    <img src="<?php echo e(url(Storage::url(pagesetting('user_one_image')[0]['path']))); ?>" alt="User image">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                         
                                           
                                            <?php if(!empty(pagesetting('courses_text'))): ?>
                                                <div class="am-mission_courses">
                                                    <span><?php echo pagesetting('courses_text'); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </figcaption>
                                    <?php endif; ?>
                                </figure>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/mission/view.blade.php ENDPATH**/ ?>