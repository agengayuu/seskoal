<div class="container-fluid">

    <form action="<?php echo base_url('jenis_ruang/simpan') ?>">

        <div class="form-group">
            <label>Nama Jenis Ruang</label>
            <input type="text" name="nama_jenis_ruang" placeholder="Masukkan Jenis Ruangan" class="form-control">
            <?php echo form_error('nama_jenis_ruang', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="submit" class="btn btn-danger mb-4">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>