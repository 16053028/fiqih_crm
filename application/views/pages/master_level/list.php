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
        <a href="<?= base_url('master_level/create') ?>" class="btn btn-primary" >Create</a>
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
            <th>Level</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Last Modified</th>
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
                    <?= $value->level_text ?>
                </td>

                <td>
                    <?= $value->keterangan ?>
                </td>

                <td >
                    <?= $value->created_at ?>
                </td>

                <td >
                    <?= $value->last_modified ?>
                </td>
                <td >
                    <a href="<?= base_url('master_level/update/') . $value->id_level ?>" class="btn btn-success" >
                    <svg class="icon">
                        <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-pencil"></use>
                    </svg> Update</a>
                    <a href="<?= base_url('master_level/soft_delete/') . $value->id_level ?>" class="btn btn-danger" >
                    <svg class="icon">
                        <use xlink:href="<?php echo base_url(); ?>assets/coreui-free/icons/sprites/free.svg#cil-trash"></use>
                    </svg> Delete</a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
    <tfoot>
        <tr>
        <th>NO</th>
            <th>Level</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Last Modified</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>