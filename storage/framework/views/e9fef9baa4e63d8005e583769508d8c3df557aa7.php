<?php $__env->startSection('title',__('2 Step Security')); ?>

<?php $__env->startSection('content'); ?>
    <section class="transaction-history twofactor mt-5 pt-5">
        <div class="container">
            <div class="main row">
                <div class="col-12">
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h3 class="mb-0"><?php echo e(trans('2 Step Security')); ?></h3>
                    </div>
                </div>
                <div class="row">
                    <?php if(auth()->user()->two_fa): ?>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="card text-center">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title golden-text"><?php echo app('translator')->get('Two Factor Authenticator'); ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="box refferal-link">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                value="<?php echo e($previousCode); ?>"
                                                class="form-control"
                                                id="referralURL"
                                                readonly
                                            />
                                            <button class="gold-btn copytext" id="copyBoard" onclick="copyFunction()"><i class="fa fa-copy me-1"></i><?php echo app('translator')->get('copy code'); ?></button>
                                        </div>
                                    </div>

                                    <div class="form-group mx-auto text-center py-4">
                                        <img class="mx-auto" src="<?php echo e($previousQR); ?>">
                                    </div>

                                    <div class="form-group mx-auto text-center">
                                        <a href="javascript:void(0)" class="btn btn-bg btn-lg"
                                           data-bs-toggle="modal" data-bs-target="#disableModal"><?php echo app('translator')->get('Disable Two Factor Authenticator'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="card text-center border-1">
                                <div class="card-header bg-custom-primary text-white">
                                    <h3 class="card-title golden-text"><?php echo app('translator')->get('Two Factor Authenticator'); ?></h3>
                                </div>
                                <div class="card-body bg-darkBlack">
                                    <div class="box refferal-link">
                                        <div class="input-group input-box">
                                            <div class="input-group mb-3 cutom__referal_input__group">
                                                <input type="text" class="form-control copy__referal__input" value="<?php echo e($secret); ?>" id="referralURL" readonly>

                                                <button class="input-group-text btn-custom copy__referal__btn copytext" id="copyBoard" onclick="copyFunction()"><?php echo app('translator')->get('copy link'); ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mx-auto text-center py-4">
                                        <img class="mx-auto" src="<?php echo e($qrCodeUrl); ?>">
                                    </div>

                                    <div class="form-group mx-auto text-center">
                                        <a href="javascript:void(0)" class="btn btn-bg btn-lg btn-custom-rounded text-white"
                                           data-bs-toggle="modal"
                                           data-bs-target="#enableModal"><?php echo app('translator')->get('Enable Two Factor Authenticator'); ?></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endif; ?>


                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card text-center">
                            <div class="card-header bg-custom-primary text-white">
                                <h3 class="card-title golden-text pt-2"><?php echo app('translator')->get('Google Authenticator'); ?></h3>
                            </div>
                            <div class="card-body bg-darkBlack text-white">

                                <h6 class="text-uppercase my-3"><?php echo app('translator')->get('Use Google Authenticator to Scan the QR code  or use the code'); ?></h6>

                                <p class="p-5"><?php echo app('translator')->get('Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.'); ?></p>
                                <a class="btn btn btn-bg btn-md mt-3 btn-custom-rounded text-white"
                                   href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                                   target="_blank"><?php echo app('translator')->get('DOWNLOAD APP'); ?></a>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>


    <!--Enable Modal -->
    <div id="enableModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content form-block">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><?php echo app('translator')->get('Verify Your OTP'); ?></h4>
                    <button
                     type="button"
                     data-bs-dismiss="modal"
                     class="btn-close"
                     aria-label="Close"
                    >
                        <img src="<?php echo e(asset($themeTrue.'img/icon/cross.png')); ?>" alt="<?php echo app('translator')->get('cross img'); ?>" />
                    </button>

                </div>
                <form action="<?php echo e(route('user.twoStepEnable')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" name="key" value="<?php echo e($secret); ?>">
                            <input type="text" class="form-control" name="code" placeholder="<?php echo app('translator')->get('Enter Google Authenticator Code'); ?>">
                        </div>

                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="submit" class="btn btn-bg"><?php echo app('translator')->get('Verify'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Disable Modal -->
    <div id="disableModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content form-block">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><?php echo app('translator')->get('Verify Your OTP to Disable'); ?></h4>
                    <button
                        type="button"
                        data-bs-dismiss="modal"
                        class="btn-close"
                        aria-label="Close"
                    >
                        <img src="<?php echo e(asset($themeTrue.'img/icon/cross.png')); ?>" alt="<?php echo app('translator')->get('cross img'); ?>" />
                    </button>
                </div>
                <form action="<?php echo e(route('user.twoStepDisable')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="code" placeholder="<?php echo app('translator')->get('Enter Google Authenticator Code'); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Verify'); ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
    <script>
        function copyFunction() {
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            Notiflix.Notify.Success(`Copied: ${copyText.value}`);
        }
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/twoFA/index.blade.php ENDPATH**/ ?>