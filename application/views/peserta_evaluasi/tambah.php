<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Mahasiswa Evaluasi
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>
    
    <form action="" method="get">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Pilih Diklat </label>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name='id_diklat' id='id_diklat'>
                            <option value='0' disabled="" selected>--- Pilih Mata Diklat ---</option>
                            <?php foreach ($diklat as $d) { ?>
                            <option value="<?php echo $d->nama_diklat; ?>"><?php echo $d->nama_diklat; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-flat" title="Pilih Diklat">Pilih Diklat</button>
                    </div>
                </div>
            </div>     
        </div>
    </form>


    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa Evaluasi</h6>
        </div>

        <form action="<?php echo base_url('peserta_evaluasi/simpan') ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label"> Mata Kuliah <i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <select class="select2 form-control" name="id_mata_kuliah" id="id_mata_kuliah" required>
                            <option value='0' disabled="" selected>--- Pilih Mata Kuliah ---</option>
                            <?php foreach ($matakuliah as $mk) { ?>
                            <option value="<?php echo $mk->id_mata_kuliah; ?>"><?php echo $mk->nama_mata_kuliah; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Tanggal Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Jam Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="time" name="jam_ujian" id="jam_ujian" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Durasi Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="text" name="durasi_ujian" id="durasi_jam" placeholder="Masukkan lama waktu ujian dalam menit" class="form-control" required>
                    </div>
                </div>
            </div>     

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Diklat</th>
                                    <th width="13%">
                                        <input type="checkbox" class="check-all" id="cek-semua"/> Pilih Semua
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no =  1;
                                foreach ($mahasiswa as $mhs) : ?>
                                <tr>
                                    <td width="20px"><?php echo $no++ ?></td>
                                    <td><?= $mhs->nama ?></td>
                                    <td><?= $mhs->nim ?></td>
                                    <td><?= $mhs->nama_diklat ?></td>
                                    
                                    <td>
                                        <input type="checkbox" name="id_mahasiswa[]" value="<?php echo $mhs->id_mahasiswa; ?>"/>
                                    </td>
                                    
                                </tr>
                                        <?php
                                    endforeach
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary mb-4 mt-4">Simpan</button>
                    <button type="button" value="Cancel" class="btn btn-danger mb-4 mt-4" onclick="history.back()">Batal</button>
                </div>
            </div>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>