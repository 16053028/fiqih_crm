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
        <a href="<?= base_url('master_level/create') ?>" class="btn btn-primary disabled" >Create</a>
        </div>
    </div>
</div>

<?php echo validation_errors(); ?>

<?php echo form_open(base_url('master_level/update/' . $row->id_level)); ?>
  <div class="mb-3">
    <label for="inputLevel" class="form-label">LEVEL</label>
    <input type="text" class="form-control"  placeholder="Level" id="inputLevel" name="inputLevel" value="<?= $row->level_text ?>">
  </div>
  <div class="mb-3">
  <label for="inputDesc">Description</label>
  <textarea class="form-control" placeholder="Level description" id="inputDesc" name="inputDesc"><?= $row->keterangan ?></textarea>
  </div>
  
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>