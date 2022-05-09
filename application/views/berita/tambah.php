<div class="container-fluid">
<div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Tambah Berita</span>
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('berita/simpan'); ?>
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <!-- <form action="<?php echo base_url('berita/simpan') ?>" method="post"> -->

                <div class="form-group">
                    <label>Judul Berita<i style="color:red">*</i></label>
                    <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita">
                    <?php echo form_error('judul_berita', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Isi<i style="color:red">*</i></label>
                    <textarea name="isi" class="form-control" id="" cols="30" rows="10" placeholder="Isi"></textarea>
                    <?php echo form_error('isi', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Link<i style="color:red">*</i></label>
                    <input name="link" class="form-control" id="link" cols="30" rows="10" placeholder="Link"></input>
                    <?php echo form_error('link', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Gambar<i style="color:red">*</i></label>
                    <input type="file" name="dokumen" class="form-control" placeholder="dokumen" id="dokumen">
                    <!-- <label><i>hanya file ekstensi .png, .jpeg .pdf</i></label> -->
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <!-- <div class="form-group">
                    <label>Status<i style="color:red">*</i></label>
                    <select class="form-control" name='status' id='status' required>
                        <option value='0' selected>--- Pilih Status ---</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    
                    <?php echo form_error('status', '<div class="text-danger small ml-3">','</div>') ?>
                </div> -->

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