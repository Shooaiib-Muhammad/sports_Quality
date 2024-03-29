<header class="page-header" role="banner">
    <!-- we need this logo when user switches to nav-function-top -->
    <div class="page-logo">
        <a href="<?php echo base_url() ?>DashboardController" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
            <img src="<?php echo base_url('/') ?>Assets/img/Forward12355.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1"></span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <!-- <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i> -->
        </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
            <i class="ni ni-menu"></i>
        </a>
        <ul>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                    <i class="ni ni-minify-nav"></i>
                </a>
            </li>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                    <i class="ni ni-lock-nav"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
            <i class="ni ni-menu"></i>
        </a>
    </div>

    <div class="ml-auto d-flex">
        <!-- activate app search icon (mobile) -->
        <div class="hidden-sm-up">
            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                <i class="fal fa-search"></i>
            </a>
        </div>
        <!-- app settings -->
        <div class="hidden-md-down">
            <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                <i class="fal fa-cog"></i>
            </a>
        </div>
        <!-- app shortcuts -->

        <!-- app message -->

        <!-- app notification -->

        <!-- app user menu -->
        <div>
            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                <img src="<?php echo base_url(); ?>/assets/img/admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                        <span class="mr-2">
                            <img src="<?php echo base_url(); ?>/assets/img/admin.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                        </span>

                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>

                <div class="dropdown-multilevel dropdown-multilevel-left">

                    <div class="dropdown-menu">

                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-6">
                        <a href="<?php echo base_url('index.php/main/Logout') ?>" class="dropdown-item fw-500 pt-3 pb-3">
                            <span data-i18n="drpdwn.page-logout">Logout</span>
                            <?php
        
                            $username =  $this->session->userdata('Username');
                            ?>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <span class="float-right fw-n pt-3 pb-3 pr-3"><?php echo  $username; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>