
<div id="sidebar" class="">
    <div class="sidebar-top">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(getFile(config('location.logoIcon.path').'logo.png')); ?>"
                 alt="<?php echo e(config('basic.site_title')); ?>">
        </a>
        <button
            class="sidebar-toggler d-md-none"
            onclick="toggleSideMenu()"
        >
            <i class="fal fa-times"></i>
        </button>
    </div>

    <?php
        $user = \Illuminate\Support\Facades\Auth::user();
        $user_rankings = \App\Models\Ranking::where('rank_lavel', $user->last_lavel)->first();
    ?>

    <?php if($user->last_lavel != null && $user_rankings): ?>
        <div class="level-wrapper">
            <div class="level-box">
                <h4><?php echo app('translator')->get(@$user_rankings->rank_lavel); ?></h4>
                <p><?php echo app('translator')->get(@$user_rankings->rank_name); ?></p>
                <img src="<?php echo e(getFile(config('location.rank.path').@$user_rankings->rank_icon)); ?>" alt="<?php echo app('translator')->get('level image'); ?>" class="level-badge" />
            </div>
        </div>
    <?php endif; ?>

    <div class="wallet-wrapper">
        <div class="wallet-box d-none d-lg-block">
            <h4><?php echo app('translator')->get('Account Balance'); ?></h4>
            <h5> <?php echo app('translator')->get('Main Balance'); ?> <span><?php echo e($basic->currency_symbol); ?><?php echo e(@$user->balance); ?></span></h5>
            <h5 class="mb-0"> <?php echo app('translator')->get('Interest Balance'); ?> <span><?php echo e($basic->currency_symbol); ?><?php echo e(@$user->interest_balance); ?></span></h5>
            <span class="tag"><?php echo e($basic->currency); ?></span>
        </div>
        <div class="d-flex justify-content-between mt-1">
            <a class="btn-custom" href="<?php echo e(route('user.addFund')); ?>"><i class="fal fa-wallet"></i> <?php echo app('translator')->get('Deposit'); ?></a>
            <a class="btn-custom" href="<?php echo e(route('plan')); ?>"><i class="fal fa-usd-circle"></i> <?php echo app('translator')->get('Invest'); ?></a>
        </div>
    </div>

    <ul class="main tabScroll">
        <li>
            <a class="<?php echo e(menuActive('user.home')); ?>" href="<?php echo e(route('user.home')); ?>"
            > <i class="fal fa-border-all"></i> <?php echo app('translator')->get('Dashboard'); ?></a
            >
        </li>
        <li>
            <a href="<?php echo e(route('plan')); ?>" class="sidebar-link <?php echo e(menuActive(['plan'])); ?>">
                <i class="fal fa-layer-group"></i> <?php echo app('translator')->get('Plan'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('user.invest-history')); ?>" class="sidebar-link <?php echo e(menuActive(['user.invest-history'])); ?>">
                <i class="fal fa-file-medical-alt"></i> <?php echo app('translator')->get('invest history'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('user.addFund')); ?>" class="sidebar-link <?php echo e(menuActive(['user.addFund', 'user.addFund.confirm'])); ?>">
                <i class="far fa-funnel-dollar"></i> <?php echo app('translator')->get('Add Fund'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.fund-history')); ?>" class="sidebar-link <?php echo e(menuActive(['user.fund-history', 'user.fund-history.search'])); ?>">
                <i class="far fa-search-dollar"></i> <?php echo app('translator')->get('Fund History'); ?>
            </a>
        </li>
        <li >
            <a href="<?php echo e(route('user.money-transfer')); ?>" class="sidebar-link <?php echo e(menuActive(['user.money-transfer'])); ?>">
                <i class="far fa-money-check-alt"></i> <?php echo app('translator')->get('transfer'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.transaction')); ?>" class="sidebar-link <?php echo e(menuActive(['user.transaction', 'user.transaction.search'])); ?>">
                <i class="far fa-sack-dollar"></i> <?php echo app('translator')->get('transaction'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.payout.money')); ?>" class="sidebar-link <?php echo e(menuActive(['user.payout.money','user.payout.preview'])); ?>">
                <i class="fal fa-hand-holding-usd"></i> <?php echo app('translator')->get('payout'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.payout.history')); ?>" class="sidebar-link <?php echo e(menuActive(['user.payout.history','user.payout.history.search'])); ?>">
                <i class="far fa-badge-dollar"></i> <?php echo app('translator')->get('payout history'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.referral')); ?>" class="sidebar-link <?php echo e(menuActive(['user.referral'])); ?>">
                <i class="fal fa-retweet-alt"></i> <?php echo app('translator')->get('my referral'); ?>
            </a>
        </li>
        <li class="<?php echo e(menuActive(['user.referral.bonus', 'user.referral.bonus.search'])); ?>">
            <a href="<?php echo e(route('user.referral.bonus')); ?>" class="sidebar-link">
                <i class="fal fa-money-bill"></i> <?php echo app('translator')->get('referral bonus'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('user.badges')); ?>" class="sidebar-link <?php echo e(menuActive(['user.badges'])); ?>">
                <i class="fal fa-badge"></i><?php echo app('translator')->get('Badges'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('user.profile')); ?>" class="sidebar-link <?php echo e(menuActive(['user.profile'])); ?>">
                <i class="fal fa-user"></i> <?php echo app('translator')->get('profile settings'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.ticket.list')); ?>" class="sidebar-link <?php echo e(menuActive(['user.ticket.list', 'user.ticket.create', 'user.ticket.view'])); ?>">
                <i class="fal fa-user-headset"></i> <?php echo app('translator')->get('support ticket'); ?>
            </a>
        </li>
    </ul>
</div>
<?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/partials/sidebar.blade.php ENDPATH**/ ?>