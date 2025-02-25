
<div class="am-coming-section <?php echo e(pagesetting('select_verient')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="am-coming-soon_wrap">
                    <div class="am-coming-soon">
                        <div class="am-coming-soon_content">
                            <?php if(!empty(pagesetting('pre_heading'))): ?><span data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200"><?php echo e(pagesetting('pre_heading')); ?></span><?php endif; ?>
                            <?php if(!empty(pagesetting('heading'))): ?><h3 data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300"><?php echo pagesetting('heading'); ?></h3><?php endif; ?>
                            <?php if(!empty(pagesetting('paragraph'))): ?><p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="400"><?php echo pagesetting('paragraph'); ?></p><?php endif; ?>
                            <?php if(!empty(pagesetting('app_store_image')) || !empty(pagesetting('google_image'))): ?>
                            <div class="am-coming-soon_btns" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500">
                                <?php if(!empty(pagesetting('app_store_image')[0]['path'])): ?>
                                    <img src="<?php echo e(url(Storage::url(pagesetting('app_store_image')[0]['path']))); ?>" alt="App store image">
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('google_image')[0]['path'])): ?>
                                    <img src="<?php echo e(url(Storage::url(pagesetting('google_image')[0]['path']))); ?>" alt="Google play store image">
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty(pagesetting('mobile_image'))): ?>
                            <figure data-aos="fade-left"  data-aos-duration="500" data-aos-easing="linear" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                                <?php if(!empty(pagesetting('mobile_image')[0]['path'])): ?>
                                    <img src="<?php echo e(url(Storage::url(pagesetting('mobile_image')[0]['path']))); ?>" alt="Mobile image">
                                <?php endif; ?>
                            </figure>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo e(asset('demo-content/footer-vector-img.png')); ?>" alt="image">
</div><?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/get-app/view.blade.php ENDPATH**/ ?>