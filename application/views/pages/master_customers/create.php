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
        <a href="<?= base_url('master_login/create') ?>" class="btn btn-primary disabled" >Create</a>
        </div>
    </div>
</div>

<?php echo form_open(base_url('master_customers/create')); ?>
  <div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputCustomerName'); ?></div>
    <label for="inputCustomerName" class="form-label">Customer Name</label>
    <input type="text" class="form-control"  placeholder="Customer Name" id="inputCustomerName" name="inputCustomerName" value="<?php echo set_value('inputUsername');?>">
  </div>
  
  <div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputTelp'); ?></div>
    <label for="inputTelp" class="form-label">Telp</label>
    <input type="number" class="form-control"  placeholder="Telp" id="inputTelp" name="inputTelp" value="<?php echo set_value('inputUsername');?>">
  </div>

  <div class="mb-3">
  <label for="inputAddress">Address</label>
  <textarea class="form-control" placeholder="Customer Address" id="inputAddress" name="inputAddress"></textarea>
  </div>
  
  <!-- <div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputService'); ?></div>
    <label for="inputService" class="form-label">Services</label>
    <select class="form-select" aria-label="Default select" id="inputService" name="inputService" value="<?php echo set_value('inputLevel'); ?>">
      <option selected disabled>- Select one -</option>
      <?php
        foreach ($services as $service) { ?>
          <option value="<?= $service->id_layanan ?>"><?= $service->nama_layanan ?></option>
        <?php } ?>
    </select>
  </div> -->
    
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>