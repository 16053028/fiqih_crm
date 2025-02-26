<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $title; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <h2><?= $subtitle; ?></h2>
        </div>
        <div class="col-4 text-center">
        <a href="<?= base_url('master_services/create') ?>" class="btn btn-primary" >Create</a>
        </div>
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
            <th>SERVICES</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>STATUS</th>
            <th>CREATED AT</th>
            <th>Action</th>
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
                    <?= $value->nama_layanan ?>
                </td>

                <td>
                    <?= $value->deskripsi ?>
                </td>

                <td >
                    Rp. <?= number_format($value->biaya_layanan,2,',','.') ?>
                </td>

                <td>
                    <?= ($value->deleted == 0 ) ? "ACTIVE" : "DEACTIVATED" ; ?>
                </td>

                <td >
                    <?= $value->created_at ?>
                </td>
                <td >
                    <a href="<?= base_url('master_services/update/') . $value->id_layanan ?>" class="btn btn-success" >
                    <svg class="icon">
                        <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-pencil"></use>
                    </svg> Update</a>
                    <a href="<?= ($value->deleted == 0 ) ? base_url('master_services/soft_delete/') . $value->id_layanan : base_url('master_services/deactivated/') . $value->id_layanan ?>" class="btn <?= ($value->deleted == 0 ) ? "btn-danger" : "btn-success" ?>">
                    <svg class="icon">
                        <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-trash"></use>
                    </svg> <?= ($value->deleted == 0 ) ? "DEACTIVATED" : "ACTIVATED" ?></a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
    <tfoot>
        <tr>
        <th>NO</th>
            <th>SERVICES</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>STATUS</th>
            <th>CREATED AT</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>