<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Edit Mahasiswa Evaluasi
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>


    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa Evaluasi</h6>
        </div>
        <?php foreach ($peserta as $p) { ?>

            <form method="post" action="<?php echo base_url('peserta_evaluasi/update_aksi') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label"> Nama Mahasiswa <i style="color:red">*</i></label>
                    <div class="col-sm-9">
                    <input type="hidden" name="id_evaluasi" value="<?php echo $p->id_evaluasi ?>">
                        <select class="form-control" name='id_mahasiswa' id='id_mahasiswa' value="<?php echo $mhs->id_mahasiswa; ?>">
                            <option value='0' disabled="" selected>--- Pilih Mahasiswa ---</option>
                            <?php foreach ($mahasiswa as $mhs) { ?>
                                <option value="<?php echo $mhs->id_mahasiswa; ?>" <?php if ($mhs->id_mahasiswa == $p->id_mahasiswa) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $mhs->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label"> Mata Kuliah <i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <select class="form-control" name='id_mata_kuliah' id='id_mata_kuliah' value="<?php echo $mk->id_mata_kuliah; ?>">
                            <option value='0' disabled="" selected>--- Pilih Mata Kuliah ---</option>
                            <?php foreach ($matakuliah as $mk) { ?>
                                <option value="<?php echo $mk->id_mata_kuliah; ?>" <?php if ($mk->id_mata_kuliah == $p->id_mata_kuliah) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $mk->nama_mata_kuliah; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Tanggal Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control" value="<?= $p->tanggal_ujian ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Jam Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="time" name="jam_ujian" id="jam_ujian" class="form-control" value="<?= $p->jam_ujian ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Durasi Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="text" name="durasi_ujian" id="durasi_jam" placeholder="Masukkan lama waktu ujian dalam menit" class="form-control" value="<?= $p->durasi_ujian ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info mb-4 mt-4">Update</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4 mt-4" onclick="history.back()">Batal</button>
            </div>     
            </div>
    </form>
    <?php } ?>
</div>
<script type="text/javascript">
    

  $('#cek-semua').click(function(){
    $('input:checkbox').prop('checked', this.checked);
  })

  $(function(){
		$('#data').dataTable();
	});

   $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom auto",
    format: 'yyyy-mm-dd'
  });
  $('#date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#timepicker').timepicker({
    showInputs: false,
    showMeridian: false
  });
  $('#time').timepicker({
    showInputs: false,
    showMeridian: false
  });

  $('.select2').select2();

	$('.alert-dismissible').alert().delay(3000).slideUp('slow');
  

</script>

<script type="text/javascript">
 $(document).ready(function() {
     $('#id_mahasiswa').select2();
 });
</script>

<script type="text/javascript">
 $(document).ready(function() {
     $('#id_mata_kuliah').select2();
 });
</script>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>