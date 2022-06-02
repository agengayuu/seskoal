<div class="container-fluid">

    <form method="post" action="<?php echo base_url('hak_akses/simpan') ?>">

        <div class="form-group">
            <label>Role<i style="color:red">*</i></label>
            <input type="text" name="nama" placeholder="Masukkan Nama Role" class="form-control">
            <?php echo form_error('nama', '<div class="text-danger small" ml-3></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>