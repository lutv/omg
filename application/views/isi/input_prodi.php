<div class="container">
<form action="<?=base_url();?>home/simpan_prodi" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Program Studi</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Program Studi" name="nama_prodi">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Fakultas</label>
    <select class="form-control" name="id_fakultas">
      <?php
         foreach ($fakultas as $rows) {
      ?>
      <option value="<?= $rows['id_fakultas'] ?>"><?= $rows['nama_fakultas'] ?></option>
      <?php 
       }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status Prodi</label>
    <select class="form-control" name="status_prodi">
      <option value="Aktif" >Aktif</option>
      <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default btn-primary">TAMBAH PRODI</button>
</form>
<br><br>
<h2>Lutfi Muhamad Majid - 17111100090 - 17B</h2>
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <td><b>No</b></td>
      <td><b>Nama Program Studi</b></td>
      <td><b>Nama fakultas</b></td>
      <td><b>Status Fakultas</b></td>
      <td><b>Aksi</b></td>
    </tr>
  </thead>
  <tbody>
    <?php 
      $no=1;
        foreach ($prodi as $row) {
    ?>
    <tr>
      <td><?=$no++; ?></td>
      <td><?= $row['nama_prodi'] ?></td>
      <td><?= $row['nama_fakultas'] ?></td>
      <td><?=$row['status_prodi'] ?></td>
      <td><a href="<?=base_url() ?>home/lihat_prodi/<?= $row['id_prodi'] ?>"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-pencil"> </i></button></a>
        <a href="<?=base_url() ?>home/hapus_prodi/<?=$row['id_prodi'] ?>"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"> </i></button></a>
      </td>
    </tr>
    <?php
    } 
    ?>
  </tbody>
</table>
</div>