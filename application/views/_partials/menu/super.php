<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-speedometer"></use>
        </svg>
        Dashboard
        <!-- <span class="badge badge-sm bg-info ms-auto">NEW</span> -->
    </a>
    </li>
    <li class="nav-title">Master Data</li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_login'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-lock-locked"></use>
        </svg> Logins</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_level'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-list-numbered"></use>
        </svg> Levels</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_services'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-wifi-signal-4"></use>
        </svg> services</a>
    </li>

    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_customers'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-address-book"></use>
        </svg> Customers</a>
    </li>

    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_project'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-briefcase"></use>
        </svg> Projects</a>
    </li>

    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('master_approval'); ?>">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-bell"></use>
        </svg> Approvals</a>
    </li>
    <li class="nav-divider"></li>
    <li class="nav-title">Report</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-chart"></use>
        </svg> Sales</a>
        <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-account-logout"></use>
                </svg> Login</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-account-logout"></use>
                </svg> Register</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-bug"></use>
                </svg> Error 404</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-bug"></use>
                </svg> Error 500</a>
            </li>
        </ul>
    </li>
</ul>