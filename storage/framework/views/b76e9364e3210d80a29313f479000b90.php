<section class="am-feedback am-feedback-two <?php echo e(pagesetting('enable_slider') == 'no' ? 'am-feedback-three' : ''); ?> <?php echo e(pagesetting('verient')); ?>"> 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph')) || !empty(pagesetting('feedback_repeater'))): ?>
                    <div class="am-feedback-two_wrap">
                        <?php if(!empty(pagesetting('pre_heading')) || !empty(pagesetting('heading')) || !empty(pagesetting('paragraph'))): ?>
                            <div class="am-section_title am-section_title_center <?php echo e(pagesetting('select_title_verient')); ?>">
                                <?php if(!empty(pagesetting('pre_heading'))): ?> <span><?php echo e(pagesetting('pre_heading')); ?></span> <?php endif; ?> 
                                <?php if(!empty(pagesetting('heading'))): ?> <h2><?php echo pagesetting('heading'); ?></h2> <?php endif; ?>
                                <?php if(!empty(pagesetting('paragraph'))): ?> <p><?php echo e(pagesetting('paragraph')); ?></p> <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(pagesetting('enable_slider') == 'yes'): ?>
                        <div class="am-testimonial-section" data-aos="fade-up"  data-aos-duration="1000" data-aos-easing="ease">
                            <div class="splide" id="testimonial-slider">
                                <div class="splide__track">
                        <?php endif; ?>
                        <div id="feedbackCarousel" class="carousel slide" data-bs-interval="false">
                            <div class="carousel-inner am-feedback_content_list">
                                <?php $__currentLoopData = pagesetting('feedback_repeater'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                        <li class="<?php echo e(pagesetting('enable_slider') == 'yes' ? 'splide__slide' : ''); ?>">
                                            <?php if(pagesetting('enable_slider') == 'yes'): ?><div class="am-testimonial-card"><?php endif; ?>
                                            <div class="am-feedback_content_list_info">
                                                <div class="am-feedback_content_list_info_image"> 
                                                    <?php if(!empty($option['tutor_image'])): ?>
                                                        <figure>
                                                            <?php if(!empty($option['tutor_image'][0]['path'])): ?>
                                                                <img src="<?php echo e(url(Storage::url($option['tutor_image'][0]['path']))); ?>" alt="Profile image">
                                                            <?php endif; ?>
                                                        </figure>
                                                    <?php endif; ?>
                                                    <?php if(!empty($option['student_image'])): ?>
                                                        <span class="am-rating-company">
                                                            <?php if(!empty($option['student_image'][0]['path'])): ?>
                                                                <img src="<?php echo e(url(Storage::url($option['student_image'][0]['path']))); ?>" alt="Profile image">
                                                            <?php endif; ?>      
                                                        </span>
                                                    <?php endif; ?> 
                                                </div>
                                                <div class="am-feedback_content_list_info_text">
                                                    <?php if(!empty($option['feedback_paragraph'])): ?>
                                                        <p><?php echo $option['feedback_paragraph']; ?></p>
                                                    <?php endif; ?>
                                                   <!-- <?php if(!empty($option['tutor_rating'])): ?>
                                                        <div class="am-feedback_content_list_stars">
                                                            <?php $rating = $option['tutor_rating']; ?>
                                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                                <i class="am-icon-star-filled <?php echo e($i <= $rating ? '' : 'am-icon-start-empty'); ?>"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                    <?php endif; ?>-->
                                                    <div class="am-feedback_content_list_info_text_prof"> 
                                                        <div>
                                                            <?php if(!empty($option['tutor_name'])): ?> <h3><?php echo $option['tutor_name']; ?></h3> <?php endif; ?>
                                                            <?php if(!empty($option['tutor_tagline'])): ?> <span><?php echo $option['tutor_tagline']; ?></span> <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(pagesetting('enable_slider') == 'yes'): ?></div><?php endif; ?>
                                        </li>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                        
                        <?php if(pagesetting('enable_slider') == 'yes'): ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['public/css/flags.css']); ?>
<?php $__env->stopPush(); ?>

<?php if (! $__env->hasRenderedOnce('87c3e819-0e92-4adf-be49-bfed5c183ca6')): $__env->markAsRenderedOnce('87c3e819-0e92-4adf-be49-bfed5c183ca6');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/splide.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.querySelector('#testimonial-slider')) {
                initClientsFeedbackSlider();
            }
        });

        document.addEventListener('loadSectionJs', function (event) {
            if (event.detail.sectionId === 'clients-feedback') {
                if (document.querySelector('#testimonial-slider')) {
                    initClientsFeedbackSlider();
                }
            }
        });

        function initClientsFeedbackSlider() {
            new Splide('#testimonial-slider', {
                gap: '20px',
                perPage: 3,
                perMove: 1,
                focus: 1,
                type: 'loop',
                direction: document.documentElement.dir === 'rtl' ? 'rtl' : 'ltr', 
                breakpoints: {
                    1024: {
                        perPage: 2,
                    },
                    768: {
                        perPage: 1,
                    },
                },
            }).mount();
        }
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH /home/lexhwdfc/public_html/resources/views/pagebuilder/clients-feedback/view.blade.php ENDPATH**/ ?>