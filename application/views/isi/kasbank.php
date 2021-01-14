<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Bukti Masuk
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal</a></li>
        <li><a href="#"><i class="fa fa-files-o"></i>Jurnal Pembelian</a></li>
        <li class="active"></li>
      </ol>
  </section>
  <section class="content">
  <div class="row">
  <div class="col-md-12">
  <a href="#" class="btn btn-flat btn-success pull-left" id="kas">Tambah Kas</a>       
  </div>
  </div>
    <div class="col-md-13">
      <div class="box no-padding box-primary">
        <table id="tabel" class="table table-condensed table-hover">
        <thead><tr>
           <td valign="top" align="center" width="5"><b>No</b></td>
           <td valign="top" align="center"><b>No Jurnal</b></td>
           <td valign="top" align="center"><b>Tanggal</b></td>
           <td valign="top" align="center"><b>Keterangan</b></td>
           <td valign="top" align="center"><b>Balanced</b></td>
           <td valign="top" align="center"><b>Nilai</b></td>
          <td valign="top" align="center"> <b>Hapus/Edit</b></td> 
          </tr></thead>
         <tbody>
         </tbody>
           </table>
      </div>
    </div>  <div class="row">
  <div class="col-md-12">
  <a href="#" class="btn btn-flat btn-success pull-left" id="bank">Tambah Bank</a>   
  </div>
  </div>
    <div class="col-md-13">
      <div class="box no-padding box-primary">
        <table id="tabel2" class="table table-condensed table-hover">
        <thead><tr>
           <td valign="top" align="center" width="5"><b>No</b></td>
           <td valign="top" align="center"><b>No Jurnal</b></td>
           <td valign="top" align="center"><b>Tanggal</b></td>
           <td valign="top" align="center"><b>Keterangan</b></td>
           <td valign="top" align="center"><b>Balanced</b></td>
           <td valign="top" align="center"><b>Nilai</b></td>
          <td valign="top" align="center"> <b>Hapus/Edit</b></td> 
          </tr></thead>
         <tbody>
         </tbody>
           </table>
      </div>
    </div>
    </section>
  </div>
</div>
        <div class="modal fade" id="modal_next">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tanggal</h4>
              </div>
              <div class="modal-body">
                <div id="modal-body">
                <h2 align="center" id="ndas"></h2>
                <p id="leher1"></p>
                <p id="leher2"> <div id="leher3" class="pull-right"></div> </p>          
 <form role="form" action="<?= base_url()?>jurnal/kas" method="post" enctype="multipart/form-data" id="form">
    <div class="col-md-5">
      <label for="date">Masukkan Tanggal</label>
      <input type="text" id="date" name="tanggal" value="<?= date('d-m-Y');?>" class="form-control input-sm">
      <input type="hidden" name="tipe" value="KBM" class="form-control input-sm">
    </div>
  </div><div class="col-md-3">
      <label> </label>
      <button type="submit" class="form-control">Pilih</button>
    </div>
    </div>   
              <div class="modal-footer">
              </div></form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
         <div class="modal fade" id="modal_nextb">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- I fucking told you not to do that
              look now you got hurt again :") -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tanggal</h4>
              </div>
              <div class="modal-body">
                <div id="modal-body">
                <h2 align="center" id="ndas"></h2>
                <p id="leher1"></p>
                <p id="leher2"> <div id="leher3" class="pull-right"></div> </p>         
    <form role="form" action="<?= base_url()?>jurnal/bank" method="post" enctype="multipart/form-data" id="form2">
    <div class="col-md-5">
      <label for="date2">Masukkan Tanggal</label>
      <input type="text" id="date2" name="tanggal" value="<?= date('d-m-Y'); ?>" class="form-control input-sm">
      <input type="hidden" name="tipe" value="KBB" class="form-control input-sm">
    </div>
    <div class="col-md-3">
      <label></label>
      <button type="submit" class="form-control">Pilih</button>
    </div>
  </div>
      </div>
              <div class="modal-footer">
              </div></form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!-- jQuery 3 -->
</div>
<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#tabel').DataTable({
      "prossesing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        "url":"<?=base_url('jurnal/ajax_list_kas')?>",
        "type":"POST"
      },
      "columnDefs":[
      {
          "target":[-1],
          "orderable":false,
      },],
    });
    $('#date').datepicker({
          format:'dd-mm-yyyy'         
        });
    $('#date2').datepicker({
          format:'dd-mm-yyyy'         
        });
  });
 $('#kas').on("click", function(){
      $('#modal_next').modal("show");
  });
  $('#bank').on("click", function(){
      $('#modal_nextb').modal("show");
  });
</script>