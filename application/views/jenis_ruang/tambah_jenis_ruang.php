<div class="container-fluid">
<h1 class="h3 mb-2 text-black-800">Tambah Jenis Ruangan</h1>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
        <form method="post" action="<?php echo base_url('jenis_ruang/simpan') ?>">

            <div class="form-group">
                <label>Nama Jenis Ruang<i style="color:red">*</i></label>
                <input type="text" name="nama_jenis_ruang" placeholder="Masukkan Jenis Ruangan" class="form-control">
                <?php echo form_error('nama_jenis_ruang', '<div class="text-danger small" ml-3></div>') ?>
            </div>

            <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            <button type="submit" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
        </form>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>