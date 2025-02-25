<section class="am-vision-section">
    <div class="container-fluaid">
        <?php if(!empty(pagesetting('video'))
            || !empty(pagesetting('pre_heading')) 
            || !empty(pagesetting('heading')) 
            || !empty(pagesetting('paragraph')) 
            || !empty(pagesetting('list_data'))
            || !empty(pagesetting('discover_more_btn_text'))
            || !empty(pagesetting('discover_more_btn_url'))): ?>
            <div class="row">
                <?php if(!empty(pagesetting('video'))): ?>
                <div class="col-12 col-lg-6 container-video">
                    <?php if(!empty(pagesetting('video'))): ?>
                        <div class="col-12 col-lg-6 video-wrapper">
                            <?php if(!empty(pagesetting('video')[0]['path'])): ?>
                                <img src="<?php echo e(asset('images/Tugo_With_Phone.png')); ?>" 
                                     alt="Imagen de reemplazo" 
                                     class="custom-video-replacement"
                                     width="940" height="737">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
<?php endif; ?>
                <?php if(!empty(pagesetting('pre_heading')) 
                    || !empty(pagesetting('heading')) 
                    || !empty(pagesetting('paragraph')) 
                    || !empty(pagesetting('list_data'))
                    || !empty(pagesetting('discover_more_btn_text'))
                    || !empty(pagesetting('discover_more_btn_url'))): ?>
                    <div class="col-12 col-lg-6 tutor-vision">
                        <div class="am-tutor-vision">
                            <div class="am-content_box am-left-text">
                                <?php if(!empty(pagesetting('pre_heading'))): ?> <span><?php echo e(pagesetting('pre_heading')); ?></span> <?php endif; ?> 
                                <?php if(!empty(pagesetting('heading'))): ?> <h3><?php echo pagesetting('heading'); ?></h3> <?php endif; ?>
                                <?php if(!empty(pagesetting('paragraph'))): ?> <p><?php echo pagesetting('paragraph'); ?></p> <?php endif; ?>
                                <?php if(!empty( pagesetting('list_data'))): ?>
                                    <ul>
                                        <?php $__currentLoopData = pagesetting('list_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($data['item_heading']) || !empty($data['list_item'])): ?> 
                                              
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if(!empty(pagesetting('discover_more_btn_text'))): ?>
                                    <a href="<?php if(!empty(pagesetting('discover_more_btn_url'))): ?> <?php echo e(pagesetting('discover_more_btn_url')); ?> <?php endif; ?>" class="am-marketplace_content_list_btn">
                                        <?php echo e(pagesetting('discover_more_btn_text')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php if (! $__env->hasRenderedOnce('fdbff78a-c666-4ef5-8e70-c3c6cb32e133')): $__env->markAsRenderedOnce('fdbff78a-c666-4ef5-8e70-c3c6cb32e133');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['public/css/videojs.css']); ?>
<?php $__env->stopPush(); endif; ?>
<?php if (! $__env->hasRenderedOnce('0cb47ad7-abd0-49d3-8ff6-48f93015394d')): $__env->markAsRenderedOnce('0cb47ad7-abd0-49d3-8ff6-48f93015394d');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/video.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                visionVideoJs();
            }, 500);
        }); 

        document.addEventListener('loadSectionJs', (event) => {
            if(event.detail.sectionId === 'vision'){
                visionVideoJs();
            }
        }); 

        function visionVideoJs(){
            if(typeof videojs !== 'undefined'){
                jQuery('.video-js').each((index, item) => {
                    item.onloadeddata =  function(){
                        videojs(item);
                    }
                })
            }
        }       
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/vision/view.blade.php ENDPATH**/ ?>