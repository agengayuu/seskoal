<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Mata Kuliah
            
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('matakuliah/adminsimpanaksi') ?>" method="post">

                <div class="form-group">
                    <label>Kode Mata Kuliah<i style="color:red">*</i></label>
                    <input type="text" name="kode_mata_kuliah" class="form-control" placeholder="Masukan Kode mata kuliah" required>
                    <?php echo form_error('kode_mata_kuliah', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Mata Kuliah<i style="color:red">*</i></label>
                    <input type="text" name="nama_mata_kuliah" class="form-control" placeholder="Masukan Nama mata kuliah">
                    <?php echo form_error('nama_mata_kuliah', '<div class="text-danger small ml-3">','</div>') ?>
                    
                </div>

                <div class="form-group">
                    <label>Dosen Mata Kuliah<i style="color:red">*</i></label>
                    <select class="form-control" name='id_dosen' id='id_dosen'>
                    <option value='0' selected>--- Pilih Dosen ---</option>
                    <?php foreach ($dosen as $d) { ?>
                    <option value="<?php echo $d->id_dosen; ?>"><?php echo $d->nama; ?></option>
			    <?php } ?>
		        </select>
                </div>

                <div class="form-group">
                    <label>Nama diklat<i style="color:red">*</i></label>
                    <select class="form-control" name='id_diklat' id='id_diklat'>
                    <option value='0' selected>--- Pilih Diklat ---</option>
                    <?php foreach ($diklat as $di) { ?>
                    <option value="<?php echo $di->id_diklat; ?>"><?php echo $di->nama_diklat; ?></option>
			    <?php } ?>
		        </select>
                </div>

                <div class="form-group">
                    <label>Tahun akademik<i style="color:red">*</i></label>
                    <select class="form-control" name='id_akademik' id='id_akademik'>
                    <option value='0' selected>--- Pilih tahun akademik ---</option>
                    <?php foreach ($akademik as $ak) { ?>
                    <option value="<?php echo $ak->id_akademik; ?>"><?php echo $ak->tahun_akademik ?></option>
			    <?php } ?>
		        </select>
                </div>

                <div class="form-group">
                    <label>SKS<i style="color:red">*</i></label>
                    <input type="number" name="sks" class="form-control" placeholder="Masukan SKS">
                    <?php echo form_error('sks', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
</script>