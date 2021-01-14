<div class="container">
  <h2>UPDATE PRODI</h2>
<form action="<?=base_url();?>home/update_prodi" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Program Studi</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_prodi" value="<?=$prodi['nama_prodi'] ?>">
    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_prodi" value="<?=$prodi['id_prodi'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Fakultas</label>
    <select class="form-control" name="id_fakultas">
      <?php
         foreach ($fakultas as $rows) {
      ?>
      <option value="<?= $rows['id_fakultas'] ?>" <?php if($prodi['id_fakultas']==$rows['id_fakultas']) echo "selected" ?>><?= $rows['nama_fakultas'] ?></option>
      <?php 
       }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status Program Studi</label>
    <select class="form-control" name="status_prodi">
      <option value="Aktif" <?php if ($prodi['status_prodi']=="Aktif") echo "selected" ?>>Aktif</option>
      <option value="Tidak Aktif" <?php if ($prodi['status_prodi']=="Tidak Aktif") echo "selected" ?>>Tidak Aktif</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default btn-success">UPDATE</button>
</form>
</div>