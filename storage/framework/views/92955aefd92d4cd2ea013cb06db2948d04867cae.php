<?php $__env->startSection('title',trans('Payout Log')); ?>

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
                    <h3 class="mb-0"><?php echo app('translator')->get('Payout Log'); ?></h3>
                </div>

                <div class="search-bar">
                    <form action="<?php echo e(route('user.payout.history.search')); ?>" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box">
                                    <input
                                        type="text"
                                        name="name"
                                        value="<?php echo e(@request()->name); ?>"
                                        class="form-control"
                                        placeholder="<?php echo app('translator')->get('Type Here'); ?>"
                                    />
                                </div>
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

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker" name="date_time" autocomplete="off" readonly placeholder="<?php echo app('translator')->get('Select a date'); ?>" value="<?php echo e(old('date_time',request()->date_time)); ?>">
                            </div>

                            <div class="input-box col-lg-3">
                                <button class="btn-custom w-100" type="submit">Filter</button>
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
                            <th scope="col"><?php echo app('translator')->get('Detail'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $payoutLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->trx_id); ?></td>
                                <td><?php echo app('translator')->get(optional($item->method)->name); ?></td>
                                <td><?php echo e(getAmount($item->amount)); ?> <?php echo app('translator')->get($basic->currency); ?></td>
                                <td><?php echo e(getAmount($item->charge)); ?> <?php echo app('translator')->get($basic->currency); ?></td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                        <span class="badge bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                    <?php elseif($item->status == 2): ?>
                                        <span class="badge bg-success"><?php echo app('translator')->get('Complete'); ?></span>
                                    <?php elseif($item->status == 3): ?>
                                        <span class="badge bg-danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(dateTime($item->created_at, 'd M Y h:i A')); ?></td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-sm infoButton payoutHistoryBtn"
                                        data-information="<?php echo e(json_encode($item->information)); ?>"
                                        data-feedback="<?php echo e($item->feedback); ?>"
                                        data-trx_id="<?php echo e($item->trx_id); ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#infoModal"
                                    >
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($payoutLog->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
        class="modal fade"
        id="infoModal"
        tabindex="-1"
        data-bs-backdrop="static"
        aria-labelledby="infoModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title text-white" id="infoModalLabel">
                        <?php echo app('translator')->get('Details'); ?>
                    </h3>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times  text-white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary bg-transparent lebelFont text-white"><?php echo app('translator')->get('Transactions'); ?> : <span class="trx"></span>
                        </li>
                        <li class="list-group-item list-group-item-primary bg-transparent lebelFont text-white"><?php echo app('translator')->get('Admin Feedback'); ?> : <span
                                class="feedback"></span></li>
                    </ul>
                    <div class="payout-detail text-white">

                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="gold-btn btn-custom-rounded w-25 p-2 text-white btn-custom"
                        data-bs-dismiss="modal"
                    >
                        <?php echo app('translator')->get('Close'); ?>
                    </button>
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

    <script>
        "use strict";

        $(document).ready(function () {
            $('.infoButton').on('click', function () {
                var infoModal = $('#infoModal');
                infoModal.find('.trx').text($(this).data('trx_id'));
                infoModal.find('.feedback').text($(this).data('feedback'));
                var list = [];
                var information = Object.entries($(this).data('information'));

                var ImgPath = "<?php echo e(asset(config('location.withdrawLog.path'))); ?>/";
                var result = ``;
                for (var i = 0; i < information.length; i++) {
                    if (information[i][1].type == 'file') {
                        result += `<li class="list-group-item bg-transparent customborder lebelFont text-white">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <img src="${ImgPath}/${information[i][1].field_name}" alt="..." class="w-100 mt-2">
                                        </li>`;
                    } else {
                        result += `<li class="list-group-item bg-transparent customborder lebelFont text-white">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${information[i][1].field_name}</span>
                                        </li>`;
                    }
                }

                if (result) {
                    infoModal.find('.payout-detail').html(`<br><h4 class="my-3 text-white"><?php echo app('translator')->get('Payment Information'); ?></h4>  ${result}`);
                } else {
                    infoModal.find('.payout-detail').html(`${result}`);
                }
                infoModal.modal('show');
            });


            $('.closeModal').on('click', function (e) {
                $("#infoModal").modal("hide");
            });
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/payout/log.blade.php ENDPATH**/ ?>