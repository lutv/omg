 <section class="content">
    <div class="col-md-13">
      <div class="box box-body box-primary no-padding">
<form role="form" action="jurnalBank_.php" method="post" enctype="multipart/form-data" id="form_jual">
  <table class="table table-condensed">
    <tr>
      <?php 
        $pg="KBM";
        $dm=date('dm');
        $yer=date('y');
        require 'config/auto_code.php';
      ?>
    <td width="120px" >No. Order :</td>
    <td><input type="text" id="jurnal" name="jurnal" value="<?php echo $generated_number ?>" class="form-control input-sm"></td>
  </tr>
  <tr>
    <td>Kode Bank :</td>
    <td><div class="col-xs-13 input-group"><input type="text" size="5" name="acc" id="sub" class="input-group form-control input-sm"><a href="#" id="pilihan_sub" class="input-group-addon btn btn-flat"><div class="fa fa-search"></div></a><div id="sub_n"></div><input type="text" id="sub_name" disabled class="form-control input-sm"></div></td>
    <td>Tanggal :</td>
    <td><?php echo date("d/m/Y") ?></td>
  </tr>
  <tr>
    <td width="120px" >Account :</td>
    <td><input type="text" name="acc_" id="acc_atas" size="5" class="form-control  input-sm"><div id="nama_atas" ></div></td>
  </tr>
  <tr>
    <td width="120px" >Batas Kirim :</td>
    <td><div class="col-md-2"><input type="text" name="batas" class="form-control input-sm"></div>hari</td>
    <!-- <td width="120px" >Kurs:</td>
    <td><div class="col-md-4"><input type="text" name="kurs" id="ket" class="form-control input-sm"></div></td> -->
  </tr>
  <tr>
    <td width="120px" >Keterangan :</td>
    <td><input type="text" name="ket" id="ket" size="5" class="form-control input-sm"></td>
  </tr>
</table>
  <button name="next" type="submit" class="btn btn-primary pull-right">Save</button>
  <button name="next" type="reset" value="Reset" class="btn btn-flat pull-right" >Cancel</button>
  
<table class="table table-bordered table-hover">
  <thead>
    <td><b>Keterangan</b></td>
    <td><b>Kode</b></td>
    <td><b>Debet</b></td>
    <td><b>Kredit</b></td>
    <td><b>Sub Ledger</b></td>
    <td></td>
  </thead>
  <tbody id="tabel">
    <tr><td><div id="inv_ctl0"><input type='text' name='ket[]' id='kode' data-index='0' data-inv='0' class='inv form-control'></div></td>
      <td><div id="control0"><input type='text' name='kode[]' data-index='0' class='acc form-control'></div></td>
      <td><input type='text' id='qty0' data-qty='0' size='15' class='valas form-control'>
      <input type='hidden' name='debet[]' id='qty_0' size='10' class='qty form-control'></td>
      <td><input type='text' id='harga0' data-harga='0' size='15' class='jml form-control'>
        <input type='hidden' name='kredit[]' id='harga_0' size='15' class='form-control'></td>
      <td><input type='text' id="nilai0" class='form-control'>
      <input type='hidden' name='nilai[]' id="nilai_0" class='nilaiInput form-control'></td>
      <td><button input type="button" class="tambah btn btn-box-tool" onclick="tambahF();" value="Tambah"><i class="fa fa-plus"></i></button></td>
    </tr>
  </tbody>
  <tfoot>
<tr>
    <td colspan="4" align="right"> Total</td>   
    <td ><div id="total"></div><input type="hidden" name="tot" id="total_">
      <input type="hidden" name="tot_bar" id="jmlbrg">
    </td>
  </tr> 
  </tfoot>
  </form>
  </div>
</table></div></div></section></div>
        <div class="modal fade" id="modal_subacc">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bank Account</h4>
              </div>
              <div class="modal-body">
                <h2 align="center">List Bank Akun</h2>
                <select size="10" id="listSub" class="form-control">
                  <?
                    while ($view_acc=$sql->fetch_array()){
                  ?>
                  <option value="<? echo $view_acc['KDAC'].",".$view_acc['NMAC'] ?>"> <? echo $view_acc['KDAC']." - ".$view_acc['NMAC']; ?></option>
                <? } ?>
                </select>
              </div>
              <div class="modal-footer">
                <button type="submit" id="passModal" class="btn btn-success" onclick="subAcc();" data-lanjut=""> OK</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal_err">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Terjadi Kesalahan</h4>
              </div>
              <div class="modal-body">
                <p>Sub Akun Salah atau tidak terisi</p>
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
        <div class="modal modal-warning fade" id="modal_err_ket">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Terjadi Kesalahan</h4>
              </div>
              <div class="modal-body">
                <p>Keterangan Belum diisi</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                <div class="modal modal-warning fade" id="modal_err1">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin membiarkan hati ini kosong ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
   <script src="bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.js"></script>
 <script type="text/javascript" src="bower_components/jquery-ui/jquery-validate.js"></script>
 <script type="text/javascript" src="bower_components/jquery/dist/jquery.mask.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>t>
</script>
<script>

// penjumlahan otomatis
$(".valas").keyup(function(){
  var inx=$('#qty'+$(':focus').data('qty')).val();
  $('#qty_'+$(':focus').data('qty')).val(inx);
  harga = $("#harga_"+$(':focus').data('qty')).val().replace('.','');
  hargat = (harga/100)*inx;
var total = $('#qty_'+$(':focus').data('qty')).val()-hargat;
$("#nilai_"+$(':focus').data('qty')).val(total);
$("#nilai"+$(':focus').data('qty')).val(total);
var sum = 0;
   $(".nilaiInput").each(function(){
    sum += +$(this).val();
    });
 $("#total").html(sum);
  $("#total_").val(sum);
});
 
$(".jml").keyup(function(){
  var inx=$('#harga'+$(':focus').data('harga')).val();  
  qty = $('#qty_'+$(':focus').data('harga')).val().replace('.','');
  harga = $("#harga_"+$(':focus').data('harga')).val().replace('.','');
  hargat = (harga/100)*$('#qty_'+$(':focus').data('harga')).val();
  $('#harga_'+$(':focus').data('harga')).val(hargat);
  $('#harga'+$(':focus').data('harga')).val(hargat);
  var total = qty-harga;
$("#nilai_"+$(':focus').data('harga')).val(total);
var sum = 0;
   $(".nilaiInput").each(function(){
    sum += +$(this).val();
    });
 $("#total").html(sum);
  $("#total_").val(sum);
});

$(".disc").keyup(function(){
  var sum_disc=0;
  $(".disc").each(function(){
    sum_disc += +$(this).val();
    });
 $("#diskon").html(sum_disc);
 $("#diskon_").val(sum_disc);
});
$(".qty").keyup(function(){
  var sum_qty=0;
  $(".qty").each(function(){
    sum_qty += +$(this).val();
    });
 $("#jmlbrng").val(sum_qty);
});
$(document).ready(function(){
  });
</script>
<script>
  var nomor = 0;
 function tambahF(){
   nomor++;
    $('#tabel').append(
      '<tr id="baris'+nomor+'"><td><div id="inv_ctl'+nomor+'"><input type="text" size="8" name="ket[]" id="kode" data-inv='+nomor+' class="inv form-control"></div></td>'+
      '<td><div id="control'+nomor+'"><input size="8" type="text" name="kode[]" data-index='+nomor+' class="acc form-control"></div></td>'+
      '<td><input type="text" id="qty'+nomor+'" data-qty='+nomor+' size="2" class="valas form-control">'+
      '<input type="hidden" name="debet[]" id="qty_'+nomor+'" size="2" class="qty form-control"></td>'+
      '<td><input type="text" id="harga'+nomor+'" data-harga='+nomor+' size="5" class="jml form-control">'+
      '<input type="hidden" name="kredit[]" id="harga_'+nomor+'" size="5" class="form-control"></td>'+
      '<td><input type="text" id="nilai'+nomor+'" class="form-control">'+
      '<input type="hidden" name="nilai[]" id="nilai_'+nomor+'" class="nilaiInput form-control"></td>'+
      '<td><button input type="button" class="tambah btn btn-box-tool" onclick="tambahF();" value="Tambah"><i class="fa fa-plus"></i></button>'+
      '<button type="button" class="rem btn btn-box-tool" id="rem" onclick="hapusF('+nomor+');" value="Hapus"><i class="fa fa-times"></i></button></td></tr>'
            );
};
      function hapusF(hap) {
    $("#baris"+hap).remove();
    var sum = 0;
    $(".nilaiInput").each(function(){
    sum += +$(this).val();
      });
    $("#tot_sub").html(sum);
              };
</script> 