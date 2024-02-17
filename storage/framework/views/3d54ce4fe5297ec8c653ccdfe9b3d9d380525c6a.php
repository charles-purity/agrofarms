<?php $__env->startSection('title', trans($title)); ?>
<?php $__env->startSection('content'); ?>

<section class="payment-gateway mt-5 pt-5">
    <div class="container">
       <div class="row">
          <div class="col">
             <div class="header-text-full">
                <h2><?php echo app('translator')->get($title); ?></h2>
             </div>
          </div>
       </div>

       <div class="row profile-setting">
            <div class="col-md-3">
                <div class="card text-center">
                    <ul class="list-group">
                        <li class="list-group-item font-weight-bold bg-darkBlack">
                            <img
                                src="<?php echo e(getFile(config('location.withdraw.path').optional($withdraw->method)->image)); ?>"
                                class="card-img-top w-50 pt-3" alt="<?php echo e(optional($withdraw->method)->name); ?>">
                        </li>
                        <li class="list-group-item font-weight-bold list-text bg-custom-primary  text-white"><?php echo app('translator')->get('Request Amount'); ?> :
                            <span
                                class="float-right text-white"><?php echo e(getAmount($withdraw->amount)); ?> <?php echo e(@$basic->currency_symbol); ?></span>
                        </li>
                        <li class="list-group-item font-weight-bold list-text bg-custom-primary text-white"><?php echo app('translator')->get('Charge Amount'); ?> :
                            <span
                                class="float-right text-danger text-white"><?php echo e(getAmount($withdraw->charge)); ?> <?php echo e(@$basic->currency_symbol); ?></span>
                        </li>
                        <li class="list-group-item font-weight-bold list-text bg-custom-primary text-white"><?php echo app('translator')->get('Total Payable'); ?> :
                            <span
                                class="float-right text-danger text-white"><?php echo e(getAmount($withdraw->net_amount)); ?> <?php echo e(@$basic->currency_symbol); ?></span>
                        </li>
                        <li class="list-group-item font-weight-bold list-text bg-custom-primary text-white"><?php echo app('translator')->get('Available Balance'); ?> :
                            <span
                                class="float-right text-white"><?php echo e(@$basic->currency_symbol); ?><?php echo e($remaining); ?> </span>
                        </li>
                    </ul>
                </div>

            </div>

        <div class="col-md-8">

            <div class="card card-type-1 bg-custom-primary">
                <div class="card-header custom-header text-center borderBottom">
                    <h3 class="golden-text card-title pt-2"><?php echo app('translator')->get('Additional Information To Withdraw Confirm'); ?></h3>
                </div>

                <div class="card-body edit-area bg-darkBlue">

                    <form action="" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                        <?php echo csrf_field(); ?>
                        <?php if(optional($withdraw->method)->input_form): ?>
                            <?php $__currentLoopData = $withdraw->method->input_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($v->type == "text"): ?>
                                    <div class="col-md-12 mb-3 input-box">
                                        <div class="form-group mt-2">
                                            <label class="golden-text"><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                        <span class="text-danger">*</span>  <?php endif; ?></strong></label>
                                            <input type="text" name="<?php echo e($k); ?>"
                                                   class="form-control"
                                                   <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                            <?php if($errors->has($k)): ?>
                                                <span
                                                    class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php elseif($v->type == "textarea"): ?>
                                    <div class="col-md-12 mb-3 input-box">
                                        <div class="form-group">
                                            <label class="golden-text"><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                        <span class="text-danger">*</span>  <?php endif; ?>
                                                </strong></label>
                                            <textarea name="<?php echo e($k); ?>" class="form-control" rows="2" <?php if($v->validation == "required"): ?> required <?php endif; ?>></textarea>
                                            <?php if($errors->has($k)): ?>
                                                <span class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php elseif($v->type == "file"): ?>

                                    <div class="col-md-12 mb-3 input-box">
                                        <label class="golden-text"><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                    <span class="text-danger">*</span>  <?php endif; ?>
                                            </strong></label>

                                        <div class="form-group mt-2">
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail withdraw-thumbnail"
                                                     data-trigger="fileinput">
                                                    <img class="w-25 d-flex justify-content-start"
                                                         src="<?php echo e(getFile(config('location.default'))); ?>"
                                                         alt="...">
                                                </div>
                                                <div
                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                                <div class="img-input-div">
                                                    <span class="btn btn-success btn-file">
                                                        <span
                                                            class="fileinput-new "> <?php echo app('translator')->get('Select'); ?> <?php echo e($v->field_level); ?></span>
                                                        <span
                                                            class="fileinput-exists"> <?php echo app('translator')->get('Change'); ?></span>
                                                        <input type="file" name="<?php echo e($k); ?>" accept="image/*"
                                                               <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> <?php echo app('translator')->get('Remove'); ?></a>
                                                </div>

                                            </div>
                                            <?php if($errors->has($k)): ?>
                                                <br>
                                                <span
                                                    class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                        <div class="col-md-12">
                            <button type="submit" class="gold-btn strpe___btn btn-custom">
                                <?php echo app('translator')->get('Confirm Now'); ?>
                            </button>
                        </div>

                    </form>
                </div>

            </div>


        </div>
    </div>
    </div>
</section>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-fileinput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('extra-js'); ?>
    <script src="<?php echo e(asset($themeTrue.'js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/payout/preview.blade.php ENDPATH**/ ?>