<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Set Password
        </div>
    </div>

    <form method="post" action="<?php echo base_url('#') ?>">

        <div class="form-group">
            <label>Set Password</label>
            <input type="text" name="" placeholder="Masukkan Password Baru" class="form-control">
            <?php echo form_error('#', '<div class="text-danger small" ml-3></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>