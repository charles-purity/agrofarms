<?php $__env->startSection('title',trans('Invest History')); ?>
<?php $__env->startSection('content'); ?>
    <script>
        "use strict"
        function getCountDown(elementId, seconds) {
            var times = seconds;
            var x = setInterval(function () {
                var distance = times * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "COMPLETE";
                }
                times--;
            }, 1000);
        }
    </script>

    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get('Invest History'); ?></h3>
                </div>
                <!-- table -->
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('SL'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Plan'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Return Interest'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Received Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Upcoming Payment'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(loopIndex($investments) + $key); ?></td>
                                <td>
                                    <?php echo e(optional(@$invest->plan)->name); ?>

                                    <br> <?php echo e(getAmount($invest->amount).' '.trans($basic->currency)); ?>

                                </td>
                                <td>
                                    <?php echo e(getAmount($invest->profit)); ?> <?php echo e(trans($basic->currency)); ?>

                                    <?php echo e(($invest->period == '-1') ? trans('For Lifetime') : 'per '. trans($invest->point_in_text)); ?>

                                    <br>
                                    <?php echo e(($invest->capital_status == '1') ? '+ '.trans('Capital') :''); ?>

                                </td>
                                <td>
                                    <?php echo e($invest->recurring_time); ?> x <?php echo e($invest->profit); ?> =  <?php echo e(getAmount($invest->recurring_time*$invest->profit)); ?> <?php echo e(trans($basic->currency)); ?>

                                </td>
                                <td>
                                    <?php if($invest->status == 1): ?>
                                        <p id="counter<?php echo e($invest->id); ?>" class="mb-2"></p>
                                        <script>getCountDown("counter<?php echo e($invest->id); ?>", <?php echo e(\Carbon\Carbon::parse($invest->afterward)->diffInSeconds()); ?>);</script>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"  style="width: <?php echo e($invest->nextPayment); ?>"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo e($invest->nextPayment); ?></div>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-success"><?php echo app('translator')->get('Completed'); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(trans('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($investments->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/transaction/investLog.blade.php ENDPATH**/ ?>