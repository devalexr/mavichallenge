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
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="/template/images/users/default.png" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{$SESSION_user['name']}}</span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <?php MENUUserItem('Salir', '/logout', 'sign-out-alt') ?>
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