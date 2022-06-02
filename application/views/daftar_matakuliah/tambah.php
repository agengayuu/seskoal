<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
        <i class="fas fa-plus fa-sm"></i> Tambah Paket Evaluasi
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    
    <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()"><i class="fas fa-arrow-left"></i> Kembali</button>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Paket Evaluasi </h6>
        </div>

        <form action="<?php echo base_url('daftar_matakuliah/simpan') ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Nama Paket<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_paket_evaluasi" id="nama_paket_evaluasi" placeholder="Masukkan Nama Paket" class="form-control" required>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Tanggal Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Jam Mulai<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="waktu_evaluasi_mulai" id="waktu_evaluasi_mulai" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Jam Selesai<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="waktu_evaluasi_selesai" id="waktu_evaluasi_selesai" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Durasi Waktu<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="text" name="durasi_ujian" id="durasi_ujian" placeholder="Masukkan lama waktu ujian dalam menit" class="form-control" required>
                    </div>
                </div>
            </div>     

                <div class="card-body">
                    <!-- <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th width="13%">
                                        <input type="checkbox" class="check-all" id="cek-semua"/> Pilih Semua
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no =  1;
                                foreach ($mastersoal as $ms) : ?>
                                <tr>
                                    <td width="20px"><?php echo $no++ ?></td>
                                    <td><?= $ms->pertanyaan ?></td>
                                    
                                    <td>
                                        <input type="checkbox" name="id_master_soal[]" value="<?php echo $ms->id_master_soal; ?>"/>
                                    </td>
                                    
                                </tr>
                                        <?php
                                    endforeach
                                    ?>
                            </tbody>
                        </table> -->
                    <input type="hidden" name="id_mata_kuliah" value="<?= $id_mata_kuliah; ?>">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" value="Cancel" class="btn btn-danger"">Batal</button>
        </form>
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

<!-- <script type="text/javascript">
 $(document).ready(function() {
     $('#id_mata_kuliah').select2();
 });
</script>
<script type="text/javascript">
 $(document).ready(function() {
     $('#id_diklat').select2();
 });
</script> -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>