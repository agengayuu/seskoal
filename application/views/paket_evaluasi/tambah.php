<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Paket Evaluasi
        </div>
    </div>

    <div class="card-header bg-white">
        <div class="card-body">
        <form method="post" action="<?php echo base_url('paket_evaluasi/simpan') ?>">

            <div class="form-group">
                <label>Nama Paket<i style="color:red">*</i></label>
                <input type="text" name="nama_paket_evaluasi" placeholder="Masukkan Paket Evaluasi" class="form-control">
                <?php echo form_error('nama_paket_evaluasi', '<div class="text-danger small" ml-3></div>') ?>
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