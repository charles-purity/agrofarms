<!-- faq section -->
<?php if(isset($templates['faq'][0]) && $faq = $templates['faq'][0]): ?>
    <?php if(0 < count($contentDetails['faq'])): ?>
        <section class="faq-section faq-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="accordionExample">
                            <?php $__currentLoopData = $contentDetails['faq']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-item">
                                    <h5 class="accordion-header <?php echo e((session()->get('rtl') == 1) ? 'isRtl': ''); ?>" id="headingOne<?php echo e($k); ?>">
                                        <button
                                            class="accordion-button <?php echo e(($k != 0) ? 'collapsed': ''); ?>"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne<?php echo e($k); ?>"
                                            aria-expanded="<?php echo e(($k == 0) ? 'true' : 'false'); ?>"
                                            aria-controls="collapseOne<?php echo e($k); ?>">
                                            <?php echo app('translator')->get(@$data->description->title); ?>
                                        </button>
                                    </h5>
                                    <div
                                        id="collapseOne<?php echo e($k); ?>"
                                        class="accordion-collapse collapse <?php echo e(($k == 0) ? 'show' : ''); ?>"
                                        aria-labelledby="headingOne<?php echo e($k); ?>"
                                        data-bs-parent="#accordionExample"
                                    >
                                        <div class="accordion-body">
                                            <?php echo app('translator')->get(@$data->description->description); ?>
                                        </div>
                                    </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/sections/faq.blade.php ENDPATH**/ ?>