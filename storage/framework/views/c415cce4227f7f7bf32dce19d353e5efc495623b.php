<?php if(isset($templates['deposit-withdraw'][0]) && $depositWithdraw = $templates['deposit-withdraw'][0]): ?>
    <section class="deposit-withdraw-section">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="header-text text-center">
                    <h5><?php echo app('translator')->get(@$depositWithdraw->description->title); ?></h5>
                    <h2><?php echo app('translator')->get(@$depositWithdraw->description->sub_title); ?></h2>
                    <p><?php echo app('translator')->get(@$depositWithdraw->description->short_title); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="deposit-switcher">
                    <button tab-id="tab1" class="tab active"><?php echo e(trans('Deposit')); ?></button>
                    <button tab-id="tab2" class="tab"><?php echo e(trans('Withdraw')); ?></button>
                </div>
                <div id="tab1" class="content active">
                    <div class="table-parent table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Gateway'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <td><?php echo e(optional($item->user)->fullname); ?></td>
                                <td><?php echo e($basic->currency_symbol); ?> <?php echo e(getAmount($item->amount)); ?></td>
                                <td>
                                    <span class="currency">
                                       <img src="<?php echo e(getFile(config('location.gateway.path').optional($item->gateway)->image)); ?>" alt="" />
                                       <?php echo e(optional($item->gateway)->name); ?>

                                    </span>
                                </td>
                                <td><?php echo e(dateTime($item->created_at)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="tab2" class="content">
                    <div class="table-parent table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Gateway'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(optional($item->user)->fullname); ?></td>
                                    <td><?php echo e($basic->currency_symbol); ?> <?php echo e(getAmount($item->amount)); ?></td>
                                    <td>
                                        <span class="currency">
                                           <img src="<?php echo e(getFile(config('location.withdraw.path').optional($item->method)->image)); ?>" alt="" />
                                          <?php echo e(optional($item->method)->name); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e(dateTime($item->created_at)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/sections/deposit-withdraw.blade.php ENDPATH**/ ?>