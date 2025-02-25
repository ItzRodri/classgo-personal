<div class="am-whychooseus whychooseus-variation-two <?php echo e(pagesetting('select_verient')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty(pagesetting('pre_heading')) 
                    || !empty(pagesetting('heading')) 
                    || !empty(pagesetting('paragraph')) 
                    || !empty(pagesetting('section1_heading')) 
                    || !empty(pagesetting('section1_paragraph')) 
                    || !empty(pagesetting('section1_video')) 
                    || !empty(pagesetting('section2_heading')) 
                    || !empty(pagesetting('section2_paragraph'))
                    || !empty(pagesetting('section2_image'))
                    || !empty(pagesetting('section3_image'))
                    || !empty(pagesetting('section3_heading'))
                    || !empty(pagesetting('section3_paragraph'))): ?>
                    <div class="am-whychooseus-section">
                        <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph'))): ?>
                            <div class="am-section_title am-section_title_center <?php echo e(pagesetting('section_title_variation')); ?>">
                                <?php if(!empty(pagesetting('pre_heading'))): ?>
                                    <span class="am-tag">
                                        <?php echo e(pagesetting('pre_heading')); ?>

                                    </span>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('heading'))): ?><h2><?php echo pagesetting('heading'); ?></h2><?php endif; ?>
                                <?php if(!empty(pagesetting('paragraph'))): ?><p><?php echo pagesetting('paragraph'); ?></p><?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(pagesetting('section1_heading')) || !empty(pagesetting('section1_paragraph')) || !empty(pagesetting('section1_video'))
                            || !empty(pagesetting('section2_heading')) || !empty(pagesetting('section2_paragraph')) || !empty(pagesetting('section2_image')) 
                            || !empty(pagesetting('section3_image')) || !empty(pagesetting('section3_heading')) || !empty(pagesetting('section3_paragraph'))): ?>
                            <div class="am-cards-container">
                                <?php if(!empty(pagesetting('section1_heading')) || !empty(pagesetting('section1_paragraph')) || !empty(pagesetting('section1_video'))): ?>
                                    <div class="am-column">
                                        <?php if(!empty(pagesetting('section1_heading')) || !empty(pagesetting('section1_paragraph'))): ?>
                                            <div class="am-card am-yellow-card" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
                                                <?php if(!empty(pagesetting('section1_paragraph'))): ?><p><?php echo pagesetting('section1_paragraph'); ?></p><?php endif; ?>
                                                <?php if(!empty(pagesetting('section1_heading'))): ?><h2><?php echo pagesetting('section1_heading'); ?></h2><?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty(pagesetting('section1_video'))): ?>
                                            <div class="am-card am-card-video" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                                                <video class="video-js" data-setup='{}' preload="auto" id="vision-video" width="940" height="737" controls >
                                                    <source src="<?php echo e(url(Storage::url(pagesetting('section1_video')[0]['path']))); ?>#t=0.1" type="video/mp4" >
                                                </video>
                                                <div class="am-card_status"><span>Online</span></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('section2_heading')) || !empty(pagesetting('section2_paragraph')) || !empty(pagesetting('section2_image'))): ?>
                                    <div class="am-column am-tall-card">
                                        <figure class="am-card am-card-image-container" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="400">
                                            <?php if(!empty(pagesetting('section2_image'))): ?><img src="<?php echo e(url(Storage::url(pagesetting('section2_image')[0]['path']))); ?>" alt="Seamless learning image" /> <?php endif; ?>
                                            <?php if(!empty(pagesetting('section2_heading')) || !empty(pagesetting('section2_paragraph'))): ?>
                                                <figcaption>
                                                    <?php if(!empty(pagesetting('section2_heading'))): ?><h2><?php echo pagesetting('section2_heading'); ?></h2><?php endif; ?>
                                                    <?php if(!empty(pagesetting('section2_paragraph'))): ?><p><?php echo pagesetting('section2_paragraph'); ?></p><?php endif; ?>
                                                </figcaption>
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('section3_image')) || !empty(pagesetting('section3_heading')) || !empty(pagesetting('section3_paragraph'))): ?>
                                    <div class="am-column">
                                        <?php if(!empty(pagesetting('section3_image'))): ?>
                                            <div class="am-card am-card-image" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                                                <img class="card-image-thumbnail" src="<?php echo e(url(Storage::url(pagesetting('section3_image')[0]['path']))); ?>" alt="Marketplace image" /> 
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty(pagesetting('section3_heading')) || !empty(pagesetting('section3_paragraph'))): ?>
                                            <div class="am-card am-blue-card" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">
                                                <?php if(!empty(pagesetting('section3_heading'))): ?><h2><?php echo pagesetting('section3_heading'); ?></h2><?php endif; ?>
                                                <?php if(!empty(pagesetting('section3_paragraph'))): ?><p><?php echo pagesetting('section3_paragraph'); ?></p><?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('1caadfb7-233a-427e-870b-5345ec5f3176')): $__env->markAsRenderedOnce('1caadfb7-233a-427e-870b-5345ec5f3176');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['public/css/videojs.css']); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['public/css/venobox.min.css']); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('78d2c8d0-b092-43ef-964d-a0b5639fcf3e')): $__env->markAsRenderedOnce('78d2c8d0-b092-43ef-964d-a0b5639fcf3e');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/video.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/venobox.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                jQuery('.video-js').each((index, item) => {
                    item.onloadeddata =  function(){
                        videojs(item);
                    }
                })
            }, 500);
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/marketplace-stands-out/view.blade.php ENDPATH**/ ?>