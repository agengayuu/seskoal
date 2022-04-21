<div class="container-fluid">

    <form action="<?php echo base_url('tahun_akademik/simpan') ?>" method="post">

        <div class="form-group">
            <label>Tahun Akademik<i style="color:red">*</i></label>
            <!-- <div class="col-md-4"> -->
            <input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control" required>
            <?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Semester<i style="color:red">*</i></label>
            <select class="form-control" name='semester' id='semester'>
            <option value='0' selected>--- Pilih Semester ---</option>
            <option value='Ganjil' >Ganjil</option>
            <option value='Genap' >Genap</option>
            </select>
        </div>
        <!-- <div class="form-group">
            <label>Status<i style="color:red">*</i></label>
            <select class="form-control" name='status' id='status'>
            <option value='0' selected>--- Pilih Status ---</option>
            <option value='Aktif' >Aktif</option>
            <option value='Tidak Aktif' >Tidak Aktif</option>
            </select>
        </div> -->

        <div class="form-group">
                <div>
                    <label>Status<i style="color:red">*</i></label>
                </div>
                <div>
                    <?php echo form_radio('status','Aktif',FALSE)?>Aktif
                </div>
                <div>
                    <?php echo form_radio('status','Tidak Aktif',FALSE)?> Tidak Aktif
                </div>
            </div>  
            
        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
    </form>

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