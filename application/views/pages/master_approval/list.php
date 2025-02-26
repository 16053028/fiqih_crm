<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $title; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <h2><?= $subtitle; ?></h2>
        <!-- </div>
        <div class="col-4 text-center">
        <a href="<?= base_url('master_login/create') ?>" class="btn btn-primary" >Create</a>
        </div> -->
    </div>
</div>


<?php if ($this->session->flashdata('status')): ?>
    <div class="alert alert-<?php echo $this->session->flashdata('status') ?> alert-dismissible fade show">
        <?php echo $this->session->flashdata('msg'); ?>
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php $no=0;?>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>CUSTOMER NAME</th>
            <th>SERVICES</th>
            <th>SALES</th>
            <th>CREATED AT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($results as $res => $value) { ++$no;?>
            <tr>
                <td>
                    <?= $no; ?>
                </td>

                <td>
                    <?= $value->nama_pelanggan ?>
                </td>

                <td>
                    <?= $value->nama_layanan ?>
                </td>

                <td >
                    <?= $value->username ?>
                </td>

                <td >
                    <?= $value->created_at ?>
                </td>
                <td >
                <a href="<?= base_url('master_approval/approve/') . $value->id_pelanggan ?>" class="btn btn-primary">
                    <svg class="icon">
                        <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-check-alt"></use>
                    </svg></a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
    <tfoot>
        <tr>
        <th>NO</th>
            <th>CUSTOMER NAME</th>
            <th>SERVICES</th>
            <th>SALES</th>
            <th>CREATED AT</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>