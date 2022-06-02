<div class="container-fluid">
<div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Tambah Pengumuman</span>
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('pengumuman/addsimpan'); ?>
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <!-- <form action="<?php echo base_url('pengumuman/addsimpan') ?>" method="post"> -->

                <div class="form-group">
                    <label>Judul Pengumuman<i style="color:red">*</i></label>
                    <input type="text" name="judul_pengumuman" class="form-control" placeholder="Judul Pengumuman">
                    <?php echo form_error('judul_pengumuman', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Isi Pengumuman<i style="color:red">*</i></label>
                    <textarea name="isi_pengumuman" class="form-control" id="" cols="30" rows="10" placeholder="Isi Pengumuman"></textarea>
                    <?php echo form_error('isi_pengumuman', '<div class="text-danger small ml-3">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Dokumen<i> (Opsional)</i></label>
                    <input type="file" name="dokumen" class="form-control" placeholder="dokumen" id="dokumen">
                    <label><i>hanya file ekstensi .png, .jpeg .pdf</i></label>
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

                <div class="form-group">
                    <div>
                        <label>Status<i style="color:red">*</i></label>
                    </div>
                    <div>
                        <?php echo form_radio('status',1)?>Aktif
                    </div>
                    <div>
                        <?php echo form_radio('status',0)?> Tidak Aktif
                    </div>
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