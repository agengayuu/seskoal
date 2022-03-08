<div class="container-fluid">

    <form action="<?php echo base_url('diklat/adminsimpan') ?>" method="post">

        <div class="form-group">
            <label>Nama Diklat<i style="color:red">*</i></label>
            <!-- <div class="col-md-4"> -->
            <input type="text" name="nama_diklat" placeholder="Masukkan Diklat" class="form-control" required>
            <?php echo form_error('nama_diklat', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>