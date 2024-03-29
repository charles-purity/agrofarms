<!-- pricing section -->
<section class="pricing-section">
    <div class="container">
        <?php if(isset($templates['investment'][0]) && $investment = $templates['investment'][0]): ?>
            <div class="row">
                <div class="col-12">
                    <div class="header-text text-center">
                        <h5><?php echo app('translator')->get(@$investment->description->title); ?></h5>
                        <h2><?php echo app('translator')->get(@$investment->description->sub_title); ?></h2>
                        <p><?php echo app('translator')->get(@$investment->description->short_details); ?></p>
                    </div>
                </div>
            </div>

            <div class="row g-4 g-lg-5 justify-content-center">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $getTime = \App\Models\ManageTime::where('time', $data->schedule)->first();
                    ?>


                    <?php if($data): ?>
                        <div class="col-lg-4 col-md-6">
                            <div
                                class="pricing-box"
                                data-aos="fade-up"
                                data-aos-duration="1000"
                                data-aos-anchor-placement="center-bottom">
                                <h4 class="text-capitalize"><?php echo app('translator')->get($data->name); ?></h4>
                                <h2><?php echo e($data->price); ?></h2>
                                <?php if($data->profit_type == 1): ?>
                                    <h5><?php echo e(getAmount($data->profit)); ?><?php echo e('%'); ?> <small
                                            class="small-font"><?php echo app('translator')->get('Every'); ?> <?php echo e(trans($getTime->name)); ?></small></h5>
                                <?php else: ?>
                                    <h5>
                                        <small><sup><?php echo e(trans($basic->currency_symbol)); ?></sup></small><?php echo e(getAmount($data->profit)); ?>

                                        <small class="small-font"><?php echo app('translator')->get('Every'); ?> <?php echo e(trans($getTime->name)); ?></small></h5>
                                <?php endif; ?>
                                <ul>
                                    <li>
                                        <i class="far fa-chevron-double-right"></i> <?php echo app('translator')->get('Profit For'); ?>  <?php echo e(($data->is_lifetime ==1) ? trans('Lifetime') : trans('Every').' '.trans($getTime->name)); ?>

                                        <span class="badge"><?php echo app('translator')->get('Yes'); ?></span>
                                    </li>
                                    <li>
                                        <i class="far fa-chevron-double-right"></i> <?php echo app('translator')->get('Capital will back'); ?>
                                        <small><span
                                                class="badge"><?php echo e(($data->is_capital_back ==1) ? trans('Yes'): trans('No')); ?></span></small>
                                    </li>

                                    <li>
                                        <?php if($data->is_lifetime == 0): ?>
                                            <i class="far fa-chevron-double-right"></i> <?php echo e(trans($data->profit*$data->repeatable)); ?> <?php echo e(($data->profit_type == 1) ? '%': trans($basic->currency)); ?>

                                            +
                                            <?php if($data->is_capital_back == 1): ?>
                                                <span class="badge"><?php echo app('translator')->get('Capital'); ?></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="badge"><?php echo app('translator')->get('Lifetime Earning'); ?></span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <button type="button" class="btn-custom investNow" data-price="<?php echo e($data->price); ?>"
                                        data-resource="<?php echo e($data); ?>">
                                    <?php echo app('translator')->get('Invest Now'); ?>
                                </button>
                                <span class="feature text-capitalize"><?php echo app('translator')->get(\Illuminate\Support\Str::limit($data->badge, 8)); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Modal -->
            <div class="modal fade addFundModal" id="investNowModal" tabindex="-1" aria-labelledby="planModalLabel"
                 aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <form action="<?php echo e(route('user.purchase-plan')); ?>" method="post" id="invest-form" class="login-form">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="planModalLabel"><?php echo app('translator')->get('Invest Now'); ?></h4>
                                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <h2 class="title text-center plan-name"></h2>
                                <p class="text-center price-range font-20"></p>
                                <p class="text-center profit-details font-18"></p>
                                <p class="text-center profit-validity pb-3 font-18"></p>

                                <div class="row g-4">
                                    <div class="input-box col-12">
                                        <h6 class="mb-2 golden-text d-block modal_text_level"><?php echo app('translator')->get('Select wallet'); ?></h6>
                                        <select class="form-select" name="balance_type">
                                            <?php if(auth()->guard()->check()): ?>
                                                <option
                                                    value="balance"><?php echo app('translator')->get('Deposit Balance - '.$basic->currency_symbol.getAmount(auth()->user()->balance)); ?></option>
                                                <option
                                                    value="interest_balance"><?php echo app('translator')->get('Interest Balance -'.$basic->currency_symbol.getAmount(auth()->user()->interest_balance)); ?></option>
                                            <?php endif; ?>
                                            <option value="checkout"><?php echo app('translator')->get('Checkout'); ?></option>
                                        </select>
                                    </div>
                                    <div class="input-box col-12">
                                        <h6 class="mb-2 golden-text d-block modal_text_level"><?php echo app('translator')->get('Amount'); ?></h6>
                                        <div class="input-group mb-3">
                                            <input
                                                type="text" class="invest-amount form-control" name="amount" id="amount"
                                                value="<?php echo e(old('amount')); ?>"
                                                onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                autocomplete="off"
                                                placeholder="<?php echo app('translator')->get('Enter amount'); ?>" required>
                                            <button class="gold-btn show-currency input-group-text btn-custom-2"
                                                    id="basic-addon2" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="plan_id" class="plan-id">
                                <button type="submit" class="btn-custom"><?php echo app('translator')->get('Invest Now'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function ($) {
            $(document).on('click', '.investNow', function () {
                var planModal = new bootstrap.Modal(document.getElementById('investNowModal'))
                planModal.show()
                let data = $(this).data('resource');
                let price = $(this).data('price');
                let symbol = "<?php echo e(trans($basic->currency_symbol)); ?>";
                let currency = "<?php echo e(trans($basic->currency)); ?>";
                $('.price-range').text(`<?php echo app('translator')->get('Invest'); ?>: ${price}`);

                if (data.fixed_amount == '0') {
                    $('.invest-amount').val('');
                    $('#amount').attr('readonly', false);
                } else {
                    $('.invest-amount').val(data.fixed_amount);
                    $('#amount').attr('readonly', true);
                }

                $('.profit-details').html(`<?php echo app('translator')->get('Interest'); ?>: ${(data.profit_type == '1') ? `${data.profit} %` : `${data.profit} ${currency}`}`);
                $('.profit-validity').html(`<?php echo app('translator')->get('Per'); ?> ${data.schedule} <?php echo app('translator')->get('hours'); ?> ,  ${(data.is_lifetime == '0') ? `${data.repeatable} <?php echo app('translator')->get('times'); ?>` : `<?php echo app('translator')->get('Lifetime'); ?>`}`);
                $('.plan-name').text(data.name);
                $('.plan-id').val(data.id);
                $('.show-currency').text("<?php echo e(config('basic.currency')); ?>");
            });

        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/sections/investment.blade.php ENDPATH**/ ?>