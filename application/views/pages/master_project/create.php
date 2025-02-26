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
        <!-- <div class="col-4 text-center">
        <a href="<?= base_url('master_project/subscription') ?>" class="btn btn-primary disabled" >Create</a>
        </div> -->
    </div>
</div>

<?php echo form_open(base_url('master_project/subscription/' . $row->id_pelanggan));?>

<div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputUsername'); ?></div>
    <label for="inputUsername" class="form-label">CUSTOMER NAME</label>
    <input type="text" class="form-control" disabled  placeholder="Username" id="inputUsername" name="inputUsername" value="<?php echo $row->nama_pelanggan;?>">
  </div>

<div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputLayanan'); ?></div>
    <label for="inputLayanan" class="form-label">SUBSCRIPTION SERVICES</label>
    <select class="form-select" aria-label="Default select" id="inputLayanan" name="inputLayanan" value="<?php echo set_value('inputLevel'); ?>">
      <option selected disabled>- Select one -</option>
      <?php
        foreach ($layanans as $layanan) { ?>
          <option value="<?= $layanan->id_layanan ?>"><?= $layanan->nama_layanan ?></option>
        <?php } ?>
    </select>
  </div>
    
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>