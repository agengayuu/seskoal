<div class="container-fluid">
<div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Edit Berita</span>
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>
     <?php echo form_open_multipart('galeri/update'); ?> 


    <?php foreach($galeri as $g) { ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('galrri/update') ?>" method="post">

                <div class="form-group">
                    <label>Nama Kegiatan<i style="color:red">*</i></label>
                    <input type="hidden" name="id_galeri" id="id_galeri" value="<?= $g->id_galeri; ?>" >
                    <input type="text" name="nama_kegiatan" value="<?php echo $g->nama_kegiatan; ?>" class="form-control" placeholder="Nama Kegiatan" required>
                    <?php echo form_error('judul_berita', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                     <div class="col-md-2">
                              <img src="<?php echo base_url().'assets/uploads/' .$g->foto ?>" style="width: 200px">
                            </div>
                    <label>Foto<i style="color:red">*</i></label>
                    <input type="file" name="foto" class="form-control" placeholder="foto" id="foto">
                    <?php echo form_error('foto', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <!-- <div class="form-group">
                    <label>Status<i style="color:red">*</i></label>
                    <select class="form-control" name='status' id='status' required>
                        <option value='0' selected>--- Pilih Status ---</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3"></div>') ?>
                </div> -->

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php form_close(); ?>
    <?php } ?>
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