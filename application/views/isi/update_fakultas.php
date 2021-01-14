<div class="container">
  <h2>UPDATE FAKULTAS</h2>
<form action="<?=base_url();?>home/update_fakultas" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Fakultas</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_fakultas" value="<?=$fakultas['nama_fakultas'] ?>">
    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_fakultas" value="<?=$fakultas['id_fakultas'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status Fakultas</label>
    <select class="form-control" name="status_fakultas">
      <option value="Aktif" <?php if ($fakultas['status_fakultas']=="Aktif") echo "selected" ?>>Aktif</option>
      <option value="Tidak Aktif" <?php if ($fakultas['status_fakultas']=="Tidak Aktif") echo "selected" ?>>Tidak Aktif</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">UPDATE</button>
</form>
</div>