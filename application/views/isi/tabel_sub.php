
<link href="<?=base_url()?>dist/css/select2.min.css" rel="stylesheet" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Tabel Perkiraan
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>Tabel</a></li>
        <li><a href="#"><i class="fa fa-files-o"></i>Tabel Perkiraan</a></li>
        <li class="active"></li>
      </ol>
  </section>
  <section class="content">
<div class="panel">
  <div class="panel-heading">  
  </div>
     <div class="panel-body">
      <button type="button" class="btn btn-success" onclick="buat_akun()" ><i class="glyphicon glyphicon-plus"></i>Tambah Akun</button>
      <button type="button" class="btn btn-warning" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Refresh</button>
      <br><br>
                <table id="tabel" class="table table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <td width="30px"><b>No</b></td>
                      <td><b>Nomer Akun</b></td>
                      <td width="120px"><b>Nama Akun</b></td>
                      <td width="120px"><b>Rek GL</b></td>
                      <td width="180px"><b>Debet</b></td>
                      <td width="180px"><b>Kredit</b></td>
                      <td width="120px"><b>Aksi</b></td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_form" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_soal" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-md-2" >Akun Sub</label>
                <div class="col-md-9">
                  <input name="nomer_akun" class="form-control "></input>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Nama Akun</label>
                <div class="col-md-9">
                  <input type="text" name="nama_akun" rows="5" class="form-control "></input>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >DK</label>
                <div class="col-md-9">
                  <button onclick="tampil_acc()"></button>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Level</label>
                <div class="col-md-9">
                  <select name="level" id="level" class="form-control">
                    <option value="">--Pilih Level--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Induk</label>
                <div class="col-md-9">
                  <select name="induk" id="induk" class="form-control">
                    <option value="">--Pilih Level--</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" id="uploadBTN" class="btn btn-primary">Simpan</button>
      </div></form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body form">
       <select size="10" id="listacc" class="form-control">
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" id="uploadBTN" class="btn btn-primary">Simpan</button>
      </div></form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" id="modal_update" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_update" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-md-2" >Akun Perkiran</label>
                <div class="col-md-9">
                  <input name="kdac" disabled="yes" class="form-control "></input>
                  <input name="nomer_akun" type="hidden" class="form-control "></input>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Nama Akun</label>
                <div class="col-md-9">
                  <input type="text" name="nama_akun" rows="5" class="form-control "></input>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >DK</label>
                <div class="col-md-9">
                  <select name="dk" class="form-control">
                    <option value="">--Pilih DK--</option>
                    <option value="D">D</option>
                    <option value="K">K</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Level</label>
                <div class="col-md-9">
                  <select name="level" id="level2" class="form-control">
                    <option value="">--Pilih Level--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" >Induk</label>
                <div class="col-md-9">
                  <select name="induk" id="induk_update" class="form-control">
                    <option value="">--Pilih Level--</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" id="uploadBTN" class="btn btn-primary">Simpan</button>
      </div></form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" id="modal_update_gambar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_update_gambar" class="form-horizontal">
            <input type="hidden" name="id_soal" rows="5" class="form-control "></input>
              <div class="form-group">
                <label class="control-label col-md-2" >Gambar</label>
                <div class="col-md-9">
                  <input type="file" name="gambar" rows="5" class="form-control "></input>
                  <input type="hidden" name="old_image" rows="5" class="form-control "></input>
                  <small><font color="green">[supported file: JPG,PNG]</font></small>
                  <span id="notifgambar" class="help-block">Belum ada gambar terupload</span>
                </div>
                <div class="col-md-9">
                  <div class="img-thumbnail" id="gambarnya">
                  </div>
                </div>
              </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">kirim</button>
      </div></form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</section>
<script src="<?=base_url()?>dist/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_url()?>dist/js/select2.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {

    table=$('#tabel').DataTable({
      "prossesing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        "url":"<?=base_url('tabel/ajax_list_sub')?>",
        "type":"POST"
      },
      "columnDefs":[
      {
          "target":[-1],
          "orderable":false,
      },],
    });

  $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
   $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });   
});

  function reload_table(){
    table.ajax.reload(null,false);
  }

  function buat_akun(){
    $('#form_soal')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $("#induk").empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Input Data Akun');
  };
   function induk(id_induk){
   $.ajax({
          url : "<?=site_url('tabel/lihat_induk/')?>"+id_induk,
          type: "GET",
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {
            $("#induk_update").empty();
            for (var i=0; i<data.length; i++){
             $("#induk_update").append('<option value="'+data[i].id+'">'+data[i].label+'</option>');
           };
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Upload gagal, file tidak sesuai/ukuran terlalu besar');

          }
      });
      return false;
 }
$('#form_soal').on('submit', function()
  {
    event.preventDefault();
      $.ajax({
          url : "<?=site_url('tabel/simpan_jurnal')?>",
          type: "POST",
          data: new FormData(this),
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {

              if(data.status) 
              {
               $('#modal_form').modal('hide');
               reload_table();
              }
              else
              {
                  for (var i = 0; i < data.inputerror.length; i++) 
                  {
                      $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                  }
              }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('data error, Error Login');

          }
      });
  });
  function edit_soal(id_soal){
    $('#form_update')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $.ajax({
      url: "<?=site_url('tabel/ajax_edit/')?>"+id_soal,
      type: "GET",
      dataType:"JSON",
      success: function(data){
        $('[name="kdac"]').val(data.KDAC);
        $('[name="nomer_akun"]').val(data.KDAC);
        $('[name="nama_akun"]').val(data.NMAC);
        $('[name="dk"]').val(data.dk);
        $('[name="level"]').val(data.level);
        induk(data.level);
        $('[name="induk"]').val(data.induk);
        $('#modal_update').modal('show');
        $('.modal-title').text('Edit Akun');
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('Error Pengambilan data ajax');
      }
    })
  };
  $('#form_update').on('submit', function()
  {
    event.preventDefault();
      $.ajax({
          url : "<?=site_url('tabel/update_akun')?>",
          type: "POST",
          data: new FormData(this),
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {

              if(data.status) 
              {
               $('#modal_update').modal('hide');
               reload_table();
              }
              else
              {
                  for (var i = 0; i < data.inputerror.length; i++) 
                  {
                      $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                  }
              }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('data error, Penyimpanan gagal');

          }
      });
  });
  function hapus_akun(id_soal){
    if (confirm('Yakin akun akan dihapus? Akun yang akan dihapus akan mengakibatkan kerusakan terhadap sistem, apabila Akun tersebut telah terpakai')) {
        $.ajax({
          url : "<?=site_url('tabel/ajax_delete/')?>"+id_soal,
          type: "POST",
          type: "POST",
          dataType: "JSON",
          success: function(data){
            reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('data error, Penghapusan gagal');

          }
        });
    };
  }
  function tampil_gambar(id_soal){
    $('#gambarnya').load('<?=base_url('home/tampilkan_gambar/')?>'+id_soal);
  }
  function tampilkan_gambar(){
    $('#gambarnya_t').load('<?=base_url('home/tampilkan_gambar_sementara')?>');
  }
  function gambar_edit(){
    $('#gambarUpdate').load('<?=base_url('home/tampilkan_gambarUpdate')?>');
  }
$('#level').on('change', function()
  {
    // event.preventDefault();
      $.ajax({
          url : "<?=site_url('tabel/lihat_induk/')?>"+$(this).val(),
          type: "GET",
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {
            $("#induk").empty();
            for (var i=0; i<data.length; i++){
             $("#induk").append('<option value="'+data[i].id+'">'+data[i].label+'</option>');
           };
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Upload gagal, file tidak sesuai/ukuran terlalu besar');

          }
      });
      return false;
  });
$('#level2').on('change', function()
  {
    // event.preventDefault();
      $.ajax({
          url : "<?=site_url('tabel/lihat_induk/')?>"+$(this).val(),
          type: "GET",
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {
            $("#induk_update").empty();
            for (var i=0; i<data.length; i++){
             $("#induk_update").append('<option value="'+data[i].id+'">'+data[i].label+'</option>');
           };
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Upload gagal, file tidak sesuai/ukuran terlalu besar');

          }
      });
      return false;
  });
  function tampil_acc(){
    $('#listacc').load('<?=base_url('tabel/tampil_akun')?>');
    $('#modal_akun').modal('show');
    $('.modal-title').text('Pilih Data Akun');
  }
  $("#listacc").select2( {
  placeholder: "Pilih Akun",
  allowClear: true
  } );
  $('#form_update_gambar').on('submit', function()
  {
    event.preventDefault();
      $.ajax({
          url : "<?=site_url('home/updatefileGambar')?>",
          type: "POST",
          data: new FormData(this),
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {

              if(data.status) 
              {
               $('#modal_update_gambar').modal('hide');
               reload_table();
              }
              else
              {
                  for (var i = 0; i < data.inputerror.length; i++) 
                  {
                      $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                  }
              }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('data error, Penyimpanan gagal');

          }
      });
  });
  function hapus_gambar(id_soal){
    $.ajax({
          url : "<?=site_url('home/hapus_gambar/')?>"+id_soal,
          type: "POST",
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {
          tampil_gambar(id_soal);
          $('[name="old_image"]').val('default.jpg');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          tampil_gambar(id_soal);

          }
      });
      return false;
  }
    function hapus_gambar_sementara(id_soal){
    $.ajax({
          url : "<?=site_url('home/hapus_gambar_sementara/')?>"+id_soal,
          type: "POST",
          dataType: "JSON",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data)
          {
          tampilkan_gambar();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          tampilkan_gambar();
          }
      });
      return false;
  }
</script>