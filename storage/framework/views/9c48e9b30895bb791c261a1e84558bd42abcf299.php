<!-- banner section -->
<style>
    .banner-section {
        background-image: url(<?php echo e(getFile(config('location.logo.path').'partials_darkpurple_banner.png')); ?>) !important;
    }
</style>
<?php if(!request()->routeIs('home')): ?>
    <section class="banner-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3><?php echo $__env->yieldContent('title'); ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $__env->yieldContent('title'); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/partials/banner.blade.php ENDPATH**/ ?>