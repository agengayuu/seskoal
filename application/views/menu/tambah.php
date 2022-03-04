<div class="container-fluid">

    <form method="post" action="<?php echo base_url('menu/simpan') ?>">

        <div class="form-group">
            <label>Nama Menu<i style="color:red">*</i></label>
            <input type="text" name="nama_menu" placeholder="Masukkan Nama Menu" class="form-control">
            <?php echo form_error('nama_menu', '<div class="text-danger small" ml-3></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="cancel" class="btn btn-danger mb-4">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>