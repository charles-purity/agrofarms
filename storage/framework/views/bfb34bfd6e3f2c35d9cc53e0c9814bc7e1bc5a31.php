<?php $__env->startSection('title', 'badges'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get('All Badges'); ?></h3>
                </div>

                <div class="col-xl-12 col-md-12">
                        <?php if($allBadges): ?>
                            <div class="badge-box-wrapper">
                                <div class="row g-4 mb-4">
                                    <?php $__currentLoopData = $allBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-3 col-md-6 box">
                                            <div class="badge-box">
                                                <img src="<?php echo e(getFile(config('location.rank.path').@$badge->rank_icon)); ?>" alt="" />
                                                <h3><?php echo app('translator')->get($badge->rank_lavel); ?></h3>
                                                <p><?php echo app('translator')->get($badge->description); ?></p>
                                                <div class="text-start">
                                                    <h5><?php echo app('translator')->get('Minimum Invest'); ?>: <span><?php echo e($basic->currency_symbol); ?><?php echo e(@$badge->min_invest); ?></span></h5>
                                                    <h5><?php echo app('translator')->get('Minimum Deposit'); ?>: <span><?php echo e($basic->currency_symbol); ?><?php echo e(@$badge->min_deposit); ?></span></h5>
                                                    <h5><?php echo app('translator')->get('Minimum Earning'); ?>: <span><?php echo e($basic->currency_symbol); ?><?php echo e(@$badge->min_earning); ?></span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                </div>

            </div>
        </div>
    </div>





















































<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(document).ready(function () {
            var getProductHeight = $(".product.active").height();

            $(".products").css({
                height: getProductHeight
            });

            function calcProductHeight() {
                getProductHeight = $(".product.active").height();

                $(".products").css({
                    height: getProductHeight
                });
            }

            function animateContentColor() {
                var getProductColor = $(".product.active").attr("product-color");

                $("body").css({
                    color: getProductColor
                });

                $(".title").css({
                    color: getProductColor
                });

                $(".btn").css({
                    color: getProductColor
                });
            }

            var productItem = $(".product"),
                productCurrentItem = productItem.filter(".active");

            $("#next").on("click", function (e) {
                e.preventDefault();

                var nextItem = productCurrentItem.next();

                productCurrentItem.removeClass("active");

                if (nextItem.length) {
                    productCurrentItem = nextItem.addClass("active");
                } else {
                    productCurrentItem = productItem.first().addClass("active");
                }

                calcProductHeight();
                animateContentColor();
            });

            $("#prev").on("click", function (e) {
                e.preventDefault();

                var prevItem = productCurrentItem.prev();

                productCurrentItem.removeClass("active");

                if (prevItem.length) {
                    productCurrentItem = prevItem.addClass("active");
                } else {
                    productCurrentItem = productItem.last().addClass("active");
                }

                calcProductHeight();
                animateContentColor();
            });

            // Ripple
            $("[ripple]").on("click", function (e) {
                var rippleDiv = $('<div class="ripple" />'),
                    rippleSize = 60,
                    rippleOffset = $(this).offset(),
                    rippleY = e.pageY - rippleOffset.top,
                    rippleX = e.pageX - rippleOffset.left,
                    ripple = $(".ripple");

                rippleDiv
                    .css({
                        top: rippleY - rippleSize / 2,
                        left: rippleX - rippleSize / 2,
                        background: $(this).attr("ripple-color")
                    })
                    .appendTo($(this));

                window.setTimeout(function () {
                    rippleDiv.remove();
                }, 1900);
            });
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/badge/index.blade.php ENDPATH**/ ?>