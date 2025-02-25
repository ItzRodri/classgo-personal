
<section class="am-works"> 
    <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph'))): ?>
        <div class="am-page-title-wrap">    
            <div class="am-content_box">
                <?php if(!empty(pagesetting('pre_heading'))): ?> <span><?php echo e(pagesetting('pre_heading')); ?></span> <?php endif; ?> 
                <?php if(!empty(pagesetting('heading'))): ?>  <h3 class="custom-heading"><?php echo pagesetting('heading'); ?></h3>  <?php endif; ?>
                <?php if(!empty(pagesetting('paragraph'))): ?> <p><?php echo e(pagesetting('paragraph')); ?></p> <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty(pagesetting('student_btn_txt')) || !empty(pagesetting('student_btn_url')) || !empty(pagesetting('tutor_btn_url')) || !empty(pagesetting('tutor_btn_txt'))): ?>
        <div class="am-joincommunity_btn">
            <?php if(!empty(pagesetting('student_btn_txt'))): ?>
                <a href="<?php if(!empty(pagesetting('student_btn_url'))): ?> <?php echo e(pagesetting('student_btn_url')); ?> <?php endif; ?>" class="am-btn">
                    <?php echo e(pagesetting('student_btn_txt')); ?>

                </a>
            <?php endif; ?>
            <?php if(!empty(pagesetting('tutor_btn_url'))): ?>
                <a href="<?php if(!empty(pagesetting('tutor_btn_url'))): ?> <?php echo e(pagesetting('tutor_btn_url')); ?> <?php endif; ?>" class="am-white-btn">
                    <?php echo e(pagesetting('tutor_btn_txt')); ?>

                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/content-banner/view.blade.php ENDPATH**/ ?>