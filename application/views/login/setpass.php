<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Ganti Password
        </div>
    </div>

    <div class="card-header bg-white">
        <div class="card-body">

            <form method="post" action="<?php echo base_url('login/set_password') ?>">

                <div class="form-group">
                    <label>Password Lama<i style="color:red">*</i></label>
                    <input type="password" name="passlama" id="passlama" placeholder="Masukkan Password Lama" class="form-control" required>
                    <?php echo form_error('passlama', '<div class="text-danger small" ml-3></div>') ?>
                </div>
 
                <div class="form-group">
                    <label>Password Baru<i style="color:red">*</i></label>
                    <input type="password" name="passbaru" id="passbaru" placeholder="Masukkan Password Baru" class="form-control" required>
                    <?php echo form_error('passbaru', '<div class="text-danger small" ml-3></div>') ?>
                </div>

                <div class="form-group">
                    <label> Ulangi password<i style="color:red">*</i></label>
                    <input type="password" name="passbaru1" id="passbaru1" placeholder="Konfirmasi Password" class="form-control" required>
                    <?php echo form_error('passbaru1', '<div class="text-danger small" ml-3></div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>