<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get($page_title); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get($page_title); ?></h3>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end mb-3">
                    <a href="<?php echo e(route('user.ticket.create')); ?>" class="btn btn-custom create-ticket-button notiflix-confirm text-white"> <i class="fal fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('Create Ticket'); ?></a>
                </div>

                <!-- table -->
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('Subject'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Last Reply'); ?></th>
                            <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <span class="font-weight-bold"> [<?php echo e(trans('Ticket#').$ticket->ticket); ?>

                                    ] <?php echo e($ticket->subject); ?>

                                    </span>
                                </td>
                                <td>
                                    <?php if($ticket->status == 0): ?>
                                        <span class="badge rounded-pill bg-success"><?php echo app('translator')->get('Open'); ?></span>
                                    <?php elseif($ticket->status == 1): ?>
                                        <span class="badge rounded-pill bg-primary"><?php echo app('translator')->get('Answered'); ?></span>
                                    <?php elseif($ticket->status == 2): ?>
                                        <span class="badge rounded-pill bg-warning"><?php echo app('translator')->get('Replied'); ?></span>
                                    <?php elseif($ticket->status == 3): ?>
                                        <span class="badge rounded-pill bg-danger"><?php echo app('translator')->get('Closed'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(diffForHumans($ticket->last_reply)); ?></td>
                                <td class="text-end">
                                    <a
                                        href="<?php echo e(route('user.ticket.view', $ticket->ticket)); ?>"
                                        class="btn btn-sm infoButton payoutHistoryBtn"
                                    >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($tickets->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/support/index.blade.php ENDPATH**/ ?>