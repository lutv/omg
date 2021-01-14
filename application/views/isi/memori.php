<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Jurnal Memori
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal</a></li>
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal Memori</a></li>
        <li class="active"></li>
      </ol>
  </section>
            
  <section class="content">
	  		<div class="row">
				<div class="col-lg-12">
	  			<div class="box box-primary">
				<table class="table table-bordered">
  <form role="form" action="#" method="post" enctype="multipart/form-data" id="memori">
  <tr>
    <td width="120px" >No. Jurnal :</td>
    <td><input type="text" id="jurnal" name="jurnal" value="" autofocus required class="form-control"></td>
  </tr>
  <tr>
    <td>Referensi :</td>
    <td><input type="text" size="5" name="ref" class="form-control"></td>
    <td>Tanggal :</td>
    <td><?php echo date("d/m/Y") ?></td>
  </tr>
  <tr>
    <td width="120px" >Keterangan :</td>
    <td><input type="text" name="ket" size="5" class="form-control"></td>
  </tr>
  <tr>
    <td>Mata uang :</td>
    <td><input type="text" name="uang" size="5" class="form-control"></td>
    <td>Kurs :</td>
    <td><input type="text" name="kurs" size="5" class="form-control"></td>
  </tr>
  <tr>
    <td>Diubah :</td>
    <td><input type="text" name="diubah" size="5" class="form-control"></td>
    <td>Oleh :</td>
    <td><input type="text" name="user" class="form-control" size="5" ></td>
    </tr><div id="test"></div>
</table>
  <button name="next" type="submit" class="process btn btn-primary pull-right" >Post</button>
<table class="table table-bordered table-hover">
  <thead>
    <td><b>Account</b></td>
    <td><b>Sub</b></td>
    <td><b>Inv</b></td>
    <td><b>Notes</b></td>
    <td><b>Valas</b></td>
    <td><b>D/K</b></td>
    <td><b>Jumlah</b></td>
    <td><b>U</b></td>
    <td><b>Nilai</b></td>
    <td><b></b></td>
  </thead>
  <tbody id="tabel">
    <tr><td><div id="control0"><input type='text' name='acc[]' id='kode0' size="10" data-index='0' class='acc form-control'></div></td>
      <td><div id="control_s0"><input type='text' name='sub[]' id="nama" size='8' data-sub='0' class='nama form-control'></div></td>
      <td><div id="control_i0"><input type='text' name='inv[]' size='8' data-inv='0' class='inv form-control'></div></td>
      <td><input type='text' name='notes[]' size='8' class='form-control'></td>
      <td><input type='text' name='valas[]' id='valas0' data-valas='0' size='8' class='valas form-control'></td>
      <td><select name='dk[]' id='dk_0' data-dk='0' onchange="setNilai(this.value)" class='dk form-control'>
        <option value="">D/K</option>
        <option value="debet" >D</option>
        <option value="kredit" >K</option>
      </select></td>
      <td><input type='text' name='jml[]' id='jml0' data-jml='0' size='2' class='jml form-control'></td>
      <td><input type='text' name='u[]' size='1' class='form-control'></td>
      <td><input type='text' name='nilai[]' id="nilai0" size="10" class='nilai form-control'></td>
      <td><button input type="button" class="tambah btn btn-box-tool" onclick="tambahF();" value="Tambah"><i class="fa fa-plus"></i></button></td>
    </tr>
  </tbody>
  <tfoot>
  <tr>
    <td colspan="8" align="right"> Total Debet</td>   
    <td id="tot_deb"></td>
  </tr> 
  <tr>
    <td colspan="8" align="right"> Total Kredit</td>    
    <td id="tot_kred"></td>
  </tr> 
  </tfoot>
</table>
  </form>
  </div>
				</div>
				</div>
	  	   </div>
        <div class="modal fade" id="mymod">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
              </div>
              <div class="modal-body">
                <p>Jumlah Debet dan Kredit Harus Seimbang</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
         <div class="modal fade" id="mymod2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
              </div>
              <div class="modal-body">
                <p>Account yang Anda masukkan tidak ada dalam database</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  </section>

  <!-- Main content -->
    