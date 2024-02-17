<?php $__env->startSection('title',trans($title)); ?>

<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-datepicker.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3><?php echo e(trans($title)); ?></h3>
                </div>

                <div class="search-bar">
                    <form action="<?php echo e(route('user.referral.bonus.search')); ?>" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="input-box">
                                    <input
                                        type="text"
                                        name="search_user"
                                        value="<?php echo e(@request()->search_user); ?>"
                                        class="form-control"
                                        placeholder="<?php echo app('translator')->get('Search User'); ?>"
                                    />
                                </div>
                            </div>

                            <div class="input-box col-lg-4 col-md-4 col-sm-12">
                                <input type="text" class="form-control datepicker" name="datetrx" autocomplete="off" readonly placeholder="<?php echo app('translator')->get('Select a date'); ?>" value="<?php echo e(old('datetrx', request()->datetrx)); ?>">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <button class="btn-custom w-100" type="submit"><?php echo app('translator')->get('Search'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- table -->
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('SL No.'); ?></th>
                            <th><?php echo app('translator')->get('Bonus From'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <th><?php echo app('translator')->get('Remarks'); ?></th>
                            <th><?php echo app('translator')->get('Time'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(loopIndex($transactions) + $loop->index); ?></td>
                                <td><?php echo e(optional(@$transaction->bonusBy)->fullname); ?></td>
                                <td>
                                    <span class="font-weight-bold text-success"><?php echo e(getAmount($transaction->amount, config('basic.fraction_number')). ' ' . trans(config('basic.currency'))); ?></span>
                                </td>
                                <td><?php echo app('translator')->get($transaction->remarks); ?></td>
                                <td><?php echo e(dateTime($transaction->created_at, 'd M Y h:i A')); ?></td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($transactions->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-datepicker.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($themeTrue.'js/bootstrap-datepicker.js')); ?>"></script>
    <script>
        'use strict'
        $(document).ready(function () {
            $( ".datepicker" ).datepicker({
            });
        });
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/transaction/referral-bonus.blade.php ENDPATH**/ ?>