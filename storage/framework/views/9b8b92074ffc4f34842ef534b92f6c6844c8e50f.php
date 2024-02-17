<?php $__env->startSection('title',trans('Fund History')); ?>

<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-datepicker.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- main -->
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get('Fund History'); ?></h3>
                </div>
                <!-- search area -->
                <div class="search-bar">
                    <form action="<?php echo e(route('user.fund-history.search')); ?>" method="get" enctype="multipart/form-data">
                        <div class="row g-3 align-items-end">
                            <div class="input-box col-lg-3">
                                <input type="text"
                                       name="name"
                                       value="<?php echo e(@request()->name); ?>"
                                       class="form-control"
                                       placeholder="<?php echo app('translator')->get('Type Here'); ?>" />
                            </div>
                            <div class="input-box col-lg-3">
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value=""><?php echo app('translator')->get('All Payment'); ?></option>
                                    <option value="1"
                                            <?php if(@request()->status == '1'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Complete Payment'); ?></option>
                                    <option value="2"
                                            <?php if(@request()->status == '2'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Pending Payment'); ?></option>
                                    <option value="3"
                                            <?php if(@request()->status == '3'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Cancel Payment'); ?></option>
                                </select>
                            </div>

                            <div class="input-box col-lg-3">
                                <input type="text" class="form-control datepicker" name="date_time" autocomplete="off" readonly placeholder="<?php echo app('translator')->get('Select a date'); ?>" value="<?php echo e(old('purchase_date',request()->purchase_date)); ?>">
                            </div>
                            <div class="input-box col-lg-3">
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
                            <th scope="col"><?php echo app('translator')->get('Transaction ID'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Gateway'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Charge'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Time'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                            <td>
                                <?php echo e($data->transaction); ?>

                            </td>
                            <td><?php echo app('translator')->get(optional($data->gateway)->name); ?></td>
                            <td><?php echo e(getAmount($data->amount)); ?> <?php echo app('translator')->get($basic->currency); ?></td>
                            <td><?php echo e(getAmount($data->charge)); ?> <?php echo app('translator')->get($basic->currency); ?></td>
                            <td>
                                <?php if($data->status == 1): ?>
                                    <span class="badge bg-success"><?php echo app('translator')->get('Complete'); ?></span>
                                <?php elseif($data->status == 2): ?>
                                    <span class="badge bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                <?php elseif($data->status == 3): ?>
                                    <span class="badge bg-danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                <?php endif; ?>
                            </td>
                                <td><?php echo e(dateTime($data->created_at, 'd M Y h:i A')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($funds->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

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


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/transaction/fundHistory.blade.php ENDPATH**/ ?>