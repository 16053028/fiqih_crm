<?php $this->load->view('head'); ?>

<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
            <div class="card-body">

            <?php if ($this->session->flashdata('status')): ?>
                <div class="alert alert-<?php echo $this->session->flashdata('status') ?> alert-dismissible fade show">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php echo form_open(base_url('auth/proses')); ?>
                <h1>Login</h1>
                <p class="text-body-secondary">Sign In to your account</p>
                <div class="text-danger"><?php echo form_error('username'); ?></div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                    <use xlink:href="<?php echo base_url('assets/coreui-free/')?>icons/sprites/free.svg#cil-user"></use>
                    </svg></span>
                <input class="form-control" type="text" placeholder="Username" name="username" id="username" value="<?php echo set_value('username'); ?>">
                </div>

                <div class="text-danger"><?php echo form_error('password'); ?></div>

                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                    <use xlink:href="<?php echo base_url('assets/coreui-free/')?>icons/sprites/free.svg#cil-lock-locked"></use>
                    </svg></span>
                <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                </div>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<?php $this->load->view('foot'); ?>
