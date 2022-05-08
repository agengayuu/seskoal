<div class="container-fluid">
<div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Tambah Galeri</span>
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('galeri/simpan'); ?>
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <!-- <form action="<?php echo base_url('galeri/simpan') ?>" method="post"> -->

                <div class="form-group">
                    <label>Nama Kegiatan<i style="color:red">*</i></label>
                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan">
                    <?php echo form_error('nama_kegiatan', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Foto<i style="color:red">*</i></label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto" id="foto">
                    <label><i>hanya file ekstensi .png, .jpeg .pdf</i></label>
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3">','</div>') ?>
                </div>


                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
            <!-- </form> -->
        </div>
         <?php form_close(); ?>
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