<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Update Jenis Ruangan
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>

    <?php foreach($jenis_ruang as $jr ) : ?>

        <form method="post" action="<?php echo base_url('jenis_ruang/update_aksi')?>">

            <div class="form-group">
                <label>Jenis Ruangan</label>
                <input type="hidden" name="id_jenis_ruang" value="<?php echo $jr->id_jenis_ruang ?>">
                <input type="text" name="nama_jenis_ruang" class="form-control" value="<?php echo $jr->nama_jenis_ruang ?>">
            </div>

            <button type="submit" class="btn btn-info mb-4">Update</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        </form>

    <?php endforeach; ?>
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