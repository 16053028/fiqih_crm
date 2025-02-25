<?php $this->load->view('head'); ?>
<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
        <span>PT. Smart</span>
          <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/brand/coreui.svg#full"></use>
          </svg>
          <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/brand/coreui.svg#signet"></use>
          </svg> 
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
      </div>

      <?php $this->load->view('_partials/sidemenu') ?>

      <div class="sidebar-footer border-top d-none d-md-flex">     
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      </div>
    </div>
    
    <div class="wrapper d-flex flex-column min-vh-100">
      <header class="header header-sticky p-0 mb-4">
        <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-menu"></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-lg-flex">
            <!-- <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="#">Users</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="#">Settings</a></li> -->
          </ul>
          <ul class="header-nav ms-auto">
            <!-- <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-bell"></use>
                </svg></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-list-rich"></use>
                </svg></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-envelope-open"></use>
                </svg></a>
            </li> -->
          </ul>
          <ul class="header-nav">
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                <svg class="icon icon-lg theme-icon-active">
                  <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-contrast"></use>
                </svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-sun"></use>
                    </svg>Light
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-moon"></use>
                    </svg>Dark
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-contrast"></use>
                    </svg>Auto
                  </button>
                </li>
              </ul>
            </li>
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="<?php echo base_url(); ?>assets/coreui-free/img/avatars/8.jpg" alt="user@email.com"></div></a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <!-- <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-bell"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-envelope-open"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-task"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-comment-square"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-credit-card"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-file"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a> -->
                <!-- <div class="dropdown-divider"></div> -->
                  <!-- <a class="dropdown-item" href="DFDF">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-lock-locked"></use>
                  </svg> Lock Account</a> -->
                  <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-account-logout"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>

        <div class="container-fluid px-4">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span>
              </li> -->

              <?php
                foreach ($breadcrumb as $data => $value) { ?>
                    <li class="breadcrumb-item <?= $value['stat'] ?>">
                      <?php 
                        if ($value['stat'] == "active") {
                          echo "<span>" . $value['text'] . "</span>";
                          
                        } else {
                          echo ("<a href=" . $value['link'] . ">" . $value['text'] ."</a>");
                          
                        } 
                      ?>
                    </li>
                      
                    
                  </li>
              <?php } ?>

            </ol>
          </nav>
        </div>
      </header>

      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          
          <?php $this->load->view($content); ?>
          
          
          
        </div>
      </div>


<?php $this->load->view('foot'); ?>
