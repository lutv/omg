<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Jurnal KAS
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal</a></li>
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal Kas</a></li>
        <li class="active"></li>
      </ol>
  </section>        
  <section class="content">
        <div class="row">
        <div class="col-lg-12">
<form role="form" action="<?= base_url()?>jurnal/simpan_jurnal_kas" method="post" enctype="multipart/form-data" id="memori">
          <div class="box box-primary">
        <table class="table table-bordered">
  <tr>
    <td width="120px" >No. Jurnal :</td>
    <td><input type="text" id="jurnal" name="jurnal" value="<?= $generated_number?>" autofocus required class="form-control"><a href="#" id="pilihan_sub" class="input-group-addon btn btn-xs btn-flat">pilih</a></td>
  </tr>
  <tr>
    <td>Referensi :</td>
    <td><input type="text" size="5" name="ref" class="form-control"></td>
  </tr>
  <tr>
    <td width="120px" >Keterangan :</td>
    <td><input type="text" name="ket" size="5" class="form-control"></td>
  </tr>
</table>
  <button name="next" type="submit" class="process btn btn-primary pull-right" >Post</button>
<table class="table table-bordered table-hover">
  <thead>
    <td><b>Sub</b></td>
    <td><b>Account</b></td>
    <td><b>No. Transaksi</b></td>
    <td><b>Notes</b></td>
    <td><b>Valas</b></td>
    <td><b>D/K</b></td>
    <td><b>Nilai</b></td>
    <td><b></b></td>
  </thead>
  <tbody id="tabel">
    <tr><td>
      <div id="control_s0"><input type='text' name='sub[]' id="nama" size='8' data-sub='0' class='nama form-control'></div></td>
      <td><div id="control0"><input type='text' name='acc[]' id='kode0' size="10" data-index='0' class='acc form-control'></div></td>
      <td><div id="control_i0"><input type='text' name='inv[]' size='8' data-inv='0' class='inv form-control'></div></td>
      <td><input type='text' name='notes[]' id="notes0" data-notes='0' size='8' class='notes form-control'></td>
      <td><input type='text' name='valas[]' id='valas0' data-valas='0' size='8' class='valas form-control'></td>
      <td><select name='dk[]' id='dk_0' data-dk='0' onchange="setNilai(this.value)" class='dk form-control'>
        <option value="">D/K</option>
        <option value="D" >D</option>
        <option value="K" >K</option>
      </select></td>
      <td><input type='text' name='nilai[]' id="nilai0" size="10" class='nilai form-control'></td>
      <td><button input type="button" class="tambah btn btn-box-tool" onclick="tambahF();" value="Tambah"><i class="fa fa-plus"></i></button></td>
    </tr>
  </tbody>
  <tfoot>
  <tr>
    <td colspan="6" align="right"> Total Debet</td>   
    <td><div id="tot_deb"></div><input type="hidden" id="f_deb"  name="tot_debit"></td>
  </tr> 
  <tr>
    <td colspan="6" align="right"> Total Kredit</td>    
    <td> <div id="tot_kred"></div><input id="f_kred" type="hidden" name="tot_kredit"><input type="hidden" name="halaman" value="<?= $pg?>"></td>
  </tr> 
  </tfoot>
</form>
  </div>
</table></div></div></div></section></div>
         <div class="modal fade" id="modal_subacc">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Account</h4>
              </div>
              <div class="modal-body">
                <h2 align="center">List Akun</h2>
                <select size="10" id="listSub" class="form-control">
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
    
  <!-- /.content -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>bower_components/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
  var sum;
  var sum2;
  var ar_4;
  var ar_3;
 var arrayTabel=[]
function setNilai(dork){
  $('#nilai'+$(':focus').data('dk')).removeClass("debet kredit");
  $('#nilai'+$(':focus').data('dk')).addClass(dork);
}
  function subAcc(){
      var awal=$("#listSub").val();
      var ar=awal.split(",");
      var ar_1=ar[0];
      var ar_2=ar[1];
       ar_3=ar[2];
       ar_4=ar[4];
      $("#jurnal").val(ar_1);
      $("#tgl_bukti").html(ar_2);
      if(ar_4="D"){
        $("#tot_deb").html(ar_3);
      }else if(ar_4="K"){
        $("#tot_kred").html(ar_3);
      }
      $('#modal_subacc').modal("hide");
    }
 $(document).ready(function() { 
  $('#pilihan_sub').click(function(){
    $('#modal_subacc').modal("show");
  });
   $('#listSub option').dblclick(function(){
  var awal=$("#listSub").val();
      var ar=awal.split(",");
      var ar_1=ar[0];
      var ar_2=ar[1];
       ar_3=ar[2];
       ar_4=ar[4];
      $("#jurnal").val(ar_1);
      $("#tgl_bukti").html(ar_2);
      if(ar_4="D"){
        $("#tot_deb").html(ar_3);
      }else if(ar_4="K"){
        $("#tot_kred").html(ar_3);
      }
      $('#modal_subacc').modal("hide");
});
  
// Format mata uang dan Jurnal
//$( '.n' ).mask('000.000.000', {reverse: true});
  $( '#jurnal').mask('AAA-AAAA-AAAAAA', {reverse: true});
  $('.nilai').keyup(function() {
         sum = 0;
   $(".debet").each(function(){
    sum += +$(this).val();
    });
      sum2 = 0;
   $(".kredit").each(function(){
    sum2 += +$(this).val();
    });
    $("#tot_deb").html(sum);
    $("#f_deb").val(sum);
    $("#tot_kred").html(sum2);
    $("#f_kred").val(sum2);
  });
});
  // $("#test").html("kode"+$(':focus').data('test').val());
 var ac_config = {
 source: "<?=base_url()?>jurnal/acc/?",
 select: function(event, ui){
 //$(".nama").val(ui.item.kode);
 },
 minLength:0
 };
 var ad_config = {
 source:   function(request, response) {
            $.getJSON(
                "subacc.php",
                { term:request.term, rek_gl:$("#kode"+$(':focus').data('sub')).val() }, 
                response
            );
        },
 select: function(event, ui){
 //$(".acc").val(ui.item.kode);
 $("#nama"+$(':focus').data('index')).val(ui.item.nama);
 },
 minLength:0
 };
 var ae_config = {
 source: "inv.php",
 select: function(event, ui){
 //$(".acc").val(ui.item.kode);
 $("#nama"+$(':focus').data('index')).val(ui.item.nama);
 
 },
 minLength:0
 };
 $(".nama").autocomplete(ad_config);
 $(".inv").autocomplete(ae_config);
 $(".acc").autocomplete(ac_config);
// }); 
</script>
<script type="text/javascript">
// $(document).ready(function(){
  $('.acc').on("blur",function(){
    var username = $(this).val();
    var where=$(this).data('index');
    $.ajax({
      type  : 'GET',
      url   : '<?=base_url()?>jurnal/validate_acc/'+username,
      success : function(data){
        $('#control'+where).addClass(data);
      }
    })

  });
  $('.acc').on("keyup",function(){
    $('#control'+$(':focus').data('index')).removeClass();
  });
    $('.nama').blur(function(){
    var username = $(this).val();
    var where=$(this).data('sub');
    $.ajax({
      type  : 'GET',
      url   : '<?=base_url()?>jurnal/validate_sub',
      data  : 'kode='+username,
      success : function(data){
        $('#control_s'+where).addClass(data);
      }
    })

  });
  $('.nama').on("keyup" , function(){
    $('#control_s'+$(':focus').data('sub')).removeClass();
  });
  $('.inv').blur(function(){
    var username = $(this).val();
    var where=$(this).data('inv');
    $.ajax({
      type  : 'GET',
      url   : '<?=base_url()?>jurnal/validate_inv/',
      data  : username,
      success : function(data){
        $('#control_i'+where).addClass(data);
      }
    })

  });
  $('.inv').keyup(function(){
    $('#control_i'+$(':focus').data('inv')).removeClass();
  // });
});
</script>
<script type="text/javascript">
  $('#memori').submit(function(){ 
    if(ar_4=="D"){
 var sum_tot=ar_3-sum2;
} else if (ar_4=="K"){
  var sum_tot=sum-ar_3;
}
/*  if (sum_tot!=0) {
   // alert('Total Debet harus sama dengan Total Kredit');
    $('#mymod').modal("show");
    return false;
  }*/
  var count=0;
  for (var i = 1; i <= nomor; i++) {
    if ($("#control"+(i-1)).hasClass("has-error")) {
      count=count+i;
    }
  }
  if (count!=0) {
      $('#mymod2').modal("show");
      return false;
        }
  }); 
</script>
<script type="text/javascript">
var nomor = 0;
 function tambahF(){
   nomor++;
    $('#tabel').append(
      '<tr id="baris'+nomor+'"><td><div id="control_s'+nomor+'"><input type="text" name="sub[]" id="nama" size="8" data-sub='+nomor+' class="nama form-control"></div></td><td>'+
      '<div id="control'+nomor+'"><input type="text" name="acc[]" id="kode'+nomor+'" size="10" data-index='+nomor+' class="acc form-control"></div></td>'+
      '<td><div id="control_i'+nomor+'"><input type="text" name="inv[]" size="8" data-inv='+nomor+' class="inv form-control"></div></td>'+
      '<td><input type="text" name="notes[]" id="notes'+nomor+'" data-notes='+nomor+' size="8" class="form-control"></td>'+
      '<td><input type="text" name="valas[]" id="valas'+nomor+'" data-valas='+nomor+' size="8" class="valas form-control"></td>'+
      '<td><select name="dk[]" id="dk_'+nomor+'" data-dk='+nomor+' onchange="setNilai(this.value)" class="dk form-control">'+
        '<option value="">D/K</option>'+
        '<option value="D" >D</option>'+
        '<option value="K" >K</option>'+
      '</select></td>'+
      '<td><input type="text" name="nilai[]" id="nilai'+nomor+'" size="10" class="nilai form-control"></td>'+
      '<td><button input type="button" class="tambah btn btn-box-tool" onclick="tambahF();" value="Tambah"><i class="fa fa-plus"></i></button>'+
      '<button type="button" class="rem btn btn-box-tool" id="rem" onclick="hapusF('+nomor+');" value="Hapus"><i class="fa fa-times"></i></button></td></tr>'
            );
    $(".nama").autocomplete(ad_config);
    $(".inv").autocomplete(ae_config);
    $(".acc").autocomplete(ac_config);
    $('.nilai').keyup(function() {
         sum = 0;
        $(".debet").each(function(){
         sum += +$(this).val();
         });
         sum2 = 0;
        $(".kredit").each(function(){
         sum2 += +$(this).val();
         });
    $("#tot_deb").html(sum);
    $("#f_deb").val(sum);
    $("#tot_kred").html(sum2);
    $("#f_kred").val(sum2);
        });
    $('.acc').on("blur",function(){
    var username = $(this).val();
    var where=$(this).data('index');
    $.ajax({
      type  : 'GET',
      url   : 'json_acc.php',
      data  : 'kode='+username,
      success : function(data){
        $('#control'+where).addClass(data);
      }
    })

  });
  $('.acc').on("keyup",function(){
    $('#control'+$(':focus').data('index')).removeClass();
  });
    $('.nama').blur(function(){
    var username = $(this).val();
    var where=$(this).data('sub');
    $.ajax({
      type  : 'GET',
      url   : 'json_subacc.php',
      data  : 'kode='+username,
      success : function(data){
        $('#control_s'+where).addClass(data);
      }
    })

  });
  $('.nama').on("keyup" , function(){
    $('#control_s'+$(':focus').data('sub')).removeClass();
  });
  $('.inv').blur(function(){
    var username = $(this).val();
    var where=$(this).data('inv');
    $.ajax({
      type  : 'GET',
      url   : 'json_inv.php',
      data  : 'kode='+username,
      success : function(data){
        $('#control_i'+where).addClass(data);
      }
    });
  });
  $('.inv').keyup(function(){
    $('#control_i'+$(':focus').data('inv')).removeClass();
  // });
});
  $('.notes').on("keyup" , function(){
  var plus=$('#notes'+(':focus').data('notes'))-1;
  var notes=$('#notes'+plus).val();
  $('#notes'+(':focus').data('notes')).val(notes);
  });
      };
      function hapusF(hap) {
      $("#baris"+hap).remove();
              };
</script>