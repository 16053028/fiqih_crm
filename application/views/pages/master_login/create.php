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

<?php echo validation_errors(); ?>

<?php echo form_open(base_url('master_login/create')); ?>
  <div class="mb-3">
    <label for="inputUsername" class="form-label">USERNAME</label>
    <input type="text" class="form-control"  placeholder="Username" id="inputUsername" name="inputUsername">
  </div>

  <div class="mb-3">
    <label for="inputPassword" class="form-label">PASSWORD</label>
    <input type="password" class="form-control"  placeholder="Password" id="inputPassword" name="inputPassword">
  </div>
  
  <div class="mb-3">
    <label for="inputConfPass" class="form-label">CONFIRMATION PASSWORD</label>
    <input type="password" class="form-control"  placeholder="Confirmation Password" id="inputConfPass" name="inputConfPass">
  </div>
  
  <div class="mb-3">
    <label for="inputLevel" class="form-label">LEVEL</label>
    <select class="form-select" aria-label="Default select" id="inputLevel" name="inputLevel">
      <option selected disabled>- Select one -</option>
      <?php
        foreach ($levels as $level) { ?>
          <option value="<?= $level->id_level ?>"><?= $level->level_text ?></option>
        <?php } ?>
    </select>
  </div>
    
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>