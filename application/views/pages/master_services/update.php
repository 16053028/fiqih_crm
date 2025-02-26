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
        <a href="<?= base_url('master_services/create') ?>" class="btn btn-primary disabled" >Create</a>
        </div>
    </div>
</div>

<?php echo form_open(base_url('master_services/update/' . $row->id_layanan)); ?>
<div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputLayanan'); ?></div>
    <label for="inputLayanan" class="form-label">SERVICES</label>
    <input type="text" class="form-control"  placeholder="Username" id="inputLayanan" name="inputLayanan" value="<?php echo $row->nama_layanan;?>">
  </div>

  <div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputBiaya'); ?></div>
    <label for="inputBiaya" class="form-label">PRICE</label>
    <input type="number" class="form-control"  placeholder="Username" id="inputBiaya" name="inputBiaya" value="<?php echo $row->biaya_layanan;?>">
  </div>

  <div class="mb-3">
  <div class="text-danger"><?php echo form_error('inputDesc'); ?></div>
  <label for="inputDesc">DESCRIPTION</label>
  <textarea class="form-control" placeholder="Service Description" id="inputDesc" name="inputDesc"><?php echo $row->deskripsi;?></textarea>
  </div>
    
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>