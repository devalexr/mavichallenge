<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/admin/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/template/images/logo-sm.png" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="/template/images/logo-dark.png" height="50">
                    </span>
                </a>
                <a href="/admin/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/template/images/logo-sm.png" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="/template/images/logo-light.png" height="50">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<?php function MENUUserItem($S_name, $LINK_link, $S_icon, $A_badge = array()){ ?>
    <a class="dropdown-item" href="<?php echo $LINK_link ?>">
        <i class="uil uil-<?php echo $S_icon ?> font-size-18 align-middle me-1 text-muted"></i> 
        <span class="align-middle"><?php echo $S_name ?></span>
        <?php if($A_badge): ?>
            <span class="badge bg-soft-<?php echo $A_badge['class'] ?> rounded-pill mt-1 ms-2"><?php echo $A_badge['value'] ?></span>
        <?php endif ?>
    </a>
<?php } ?>