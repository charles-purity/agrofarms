<?php $__env->startSection('title', trans($title)); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('Payout Money'); ?></h3>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-md-6">
                        <div class="dashboard-box p-3">
                            <img
                                class="img-fluid gateway"
                                src="<?php echo e(getFile(config('location.withdraw.path').$gateway->image)); ?>"
                                alt="<?php echo e($gateway->name); ?>"
                            >
                            <button
                                data-id="<?php echo e($gateway->id); ?>"
                                data-name="<?php echo e($gateway->name); ?>"
                                data-min_amount="<?php echo e(getAmount($gateway->minimum_amount, $basic->fraction_number)); ?>"
                                data-max_amount="<?php echo e(getAmount($gateway->maximum_amount,$basic->fraction_number)); ?>"
                                data-percent_charge="<?php echo e(getAmount($gateway->percent_charge,$basic->fraction_number)); ?>"
                                data-fix_charge="<?php echo e(getAmount($gateway->fixed_charge, $basic->fraction_number)); ?>"

                                <?php if($payoutSettings->saturday == 0 && $today == 'saturday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->sunday == 0 && $today == 'sunday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->monday == 0 && $today == 'monday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->tuesday == 0 && $today == 'tuesday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->wednesday == 0 && $today == 'wednesday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->thursday == 0 && $today == 'thursday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php elseif($payoutSettings->friday == 0 && $today == 'friday'): ?>
                                    data-bs-toggle="modal" data-bs-target="#payoutOffDayModal"
                                data-offday="<?php echo e($today); ?>"
                                data-days="<?php echo e($payoutSettings); ?>"
                                class="gold-btn add__fund__pay__now__btn mt-2 notifyOffDay"
                                <?php else: ?>
                                    data-bs-toggle="modal" data-bs-target="#addFundModal"
                                    class="gold-btn addFund add__fund__pay__now__btn mt-2"
                                <?php endif; ?>

                            ><?php echo app('translator')->get('PAYOUT NOW'); ?>
                            </button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php $__env->startPush('loadModal'); ?>
        <div class="modal fade" id="addFundModal" tabindex="-1" aria-labelledby="addListingmodal" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-header-custom">
                        <h4 class="modal-title method-name text-white"></h4>
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times text-white" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form action="<?php echo e(route('user.payout.moneyRequest')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="payment-form">
                                    <p class="darkblue-text depositLimit"></p>
                                    <p class="darkblue-text depositCharge"></p>

                                <input type="hidden" class="gateway" name="gateway" value="">

                                <div class="form-group mb-30 mt-3">
                                    <div class="box input-box">
                                        <h5 class="darkblue-text-bold"><?php echo app('translator')->get('Select Walet'); ?></h5>
                                        <select class="form-select" name="wallet_type" aria-label="Default select example">
                                            <option value="balance" ><?php echo app('translator')->get('Deposit Balance - '.$basic->currency_symbol.getAmount(auth()->user()->balance)); ?></option>
                                            <option value="interest_balance" ><?php echo app('translator')->get('Interest Balance -'.$basic->currency_symbol.getAmount(auth()->user()->interest_balance)); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-30 mt-3">
                                    <div class="box">
                                        <h5 class="darkblue-text-bold"><?php echo app('translator')->get('Amount'); ?></h5>
                                        <div class="input-group">
                                            <div class="input-group mb-3 cutom__referal_input__group">
                                                <input type="text" class="form-control amount darkpurple__input__group__fixed" name="amount">
                                                <button class="input-group-text btn-custom copy__referal_btn copytext show-currency bg-transparent" type="button"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-custom btn-custom-rounded text-white"><?php echo app('translator')->get('Next'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="payoutOffDayModal" tabindex="-1" aria-hidden="true" aria-labelledby="addListingmodal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-custom">
                        <h4 class="modal-title text-white"><?php echo app('translator')->get('Payout Information'); ?></h4>
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times text-white" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form action="<?php echo e(route('user.payout.moneyRequest')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="payment-form">
                                <span class="withdrawClose"></span> <span class="toDay text-danger"></span>
                                <p class="openDays mt-3"> <?php echo app('translator')->get('Opening Days :'); ?>
                                    <span class="saturday badge bg-primary custom-size"></span>
                                    <span class="sunday badge bg-success custom-size"></span>
                                    <span class="monday badge bg-info custom-size"></span>
                                    <span class="tuesday badge bg-warning custom-size"></span>
                                    <span class="wednesday badge bg-success custom-size"></span>
                                    <span class="thursday badge bg-primary custom-size"></span>
                                    <span class="friday badge bg-info custom-size"></span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <?php if(count($errors) > 0 ): ?>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            Notiflix.Notify.Failure("<?php echo app('translator')->get($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

    <script>
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, gateway;

        $('.notifyOffDay').on('click', function (){
            let today = $(this).data('offday');
            let days = $(this).data('days');
            if (days.saturday != 0){
                $('.saturday').text('Saturday');
            }
            if (days.sunday != 0){
                $('.sunday').text('Sunday');
            }
            if (days.monday != 0){
                $('.monday').text('Monday');
            }
            if (days.tuesday != 0){
                $('.tuesday').text('Tuesday');
            }
            if (days.wednesday != 0){
                $('.wednesday').text('Wednesday');
            }
            if (days.thursday != 0){
                $('.thursday').text('Thursday');
            }
            if (days.friday != 0){
                $('.friday').text('Friday');
            }


            $('.withdrawClose').text(`<?php echo app('translator')->get('Payment withdrawal closes on '); ?>`);
            $('.toDay').text(`${today}`);


        })

        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "<?php echo e(config('basic.currency_symbol')); ?>";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`<?php echo app('translator')->get('Transaction Limit:'); ?> ${minAmount} - ${maxAmount}  ${baseSymbol}`);

            var depositCharge = `<?php echo app('translator')->get('Charge:'); ?> ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);
            $('.method-name').text(`<?php echo app('translator')->get('Payout By'); ?> ${$(this).data('name')}`);
            $('.show-currency').text("<?php echo e(config('basic.currency')); ?>");
            $('.gateway').val(id);
        });
        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/payout/money.blade.php ENDPATH**/ ?>