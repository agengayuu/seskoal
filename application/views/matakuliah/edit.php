<div class="container-fluid">
    <h1 class="h3 mb-2 text-black-800">Edit Mata Kuliah</h1>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>
<?php foreach($matakuliahnya as $m) { ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('matakuliah/admineditaksi') ?>" method="post">
            <input type="hidden" class="form-control" name="id_mata_kuliah" id="id_mata_kuliah" value="<?php echo $m->id_mata_kuliah; ?>">
                <div class="form-group">
                    <label>Kode Mata Kuliah</label>
                    <input class="form-control" type="text" name="kode_mata_kuliah" value="<?php echo $m->kode_mata_kuliah; ?>">
                    <?php echo form_error('kode_mata_kuliah', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="nama_mata_kuliah" value="<?php echo $m->nama_mata_kuliah; ?>" class="form-control">
                    <?php echo form_error('nama_mata_kuliah', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

               <div class="form-group">
                    <label>Nama Dosen <i style="color:red">*</i></label>
                    <select class="form-control" name='id_dosen' id='id_dosen' value="<?php echo $m->id_dosen; ?>">
                    <option value='0' selected>--- Pilih Dosen ---</option>
                    <?php foreach ($dosen as $d) { ?>
                    <option value="<?php echo $d->id_dosen; ?>" <?php if($d->id_dosen == $m->id_dosen){
                                                                        echo "selected"; 
                                                                    } ?>><?php echo $d->nama; ?></option>
			        <?php } ?>
		            </select>
                </div>

               <div class="form-group">
                    <label>Nama Diklat <i style="color:red">*</i></label>
                    <select class="form-control" name='id_diklat' id='id_diklat' value="<?php echo $m->id_diklat; ?>">
                    <option value='0' selected>--- Pilih Diklat ---</option>
                    <?php foreach ($diklat as $di) { ?>
                    <option value="<?php echo $di->id_diklat; ?>" <?php if($di->id_diklat == $m->id_diklat){
                                                                        echo "selected"; 
                                                                    } ?>><?php echo $di->nama_diklat; ?></option>
			        <?php } ?>
		            </select>
                </div>

               <div class="form-group">
                    <label>Tahun Akademik <i style="color:red">*</i></label>
                    <select class="form-control" name='id_akademik' id='id_akademik' value="<?php echo $m->id_akademik; ?>">
                    <option value='0' selected>--- Pilih Tahun akademik ---</option>
                    <?php foreach ($akademik as $ak) { ?>
                    <option value="<?php echo $ak->id_akademik; ?>" <?php if($ak->id_akademik == $m->id_akademik){
                                                                        echo "selected"; 
                                                                    } ?>><?php echo $ak->tahun_akademik; ?></option>
			        <?php } ?>
		            </select>
                </div>

                <!-- <div class="form-group">
                    <label>SKS</label>
                    <input type="number" name="sks" value="<?php echo $m->sks; ?>" class="form-control">
                    <?php echo form_error('sks', '<div class="text-danger small ml-3">','</div>') ?>
                </div> -->

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>
        </div>
    </div>
    <?php } ?>
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