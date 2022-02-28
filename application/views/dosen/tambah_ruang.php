<div class="container-fluid">

    <form action="<?php echo base_url('dosen/ruang/simpan') ?>">
        <div class="form-group">
            <label>ID Ruang</label>
            <input type="text" name="id_ruang" placeholder="Masukkan ID Ruang" class="form-control">
            <?php echo form_error('id_ruang', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Nama Ruang</label>
            <input type="text" name="nama_ruang" placeholder="Masukkan Nama Ruang" class="form-control">
            <?php echo form_error('nama_ruang', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Kapasitas</label>
            <input type="text" name="kapasitas" placeholder="Masukkan Kapasitas" class="form-control">
            <?php echo form_error('kapasitas', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Gedung</label>
            <input type="text" name="gedung" placeholder="Masukkan Gedung" class="form-control">
            <?php echo form_error('gedung', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Lantai</label>
            <input type="text" name="lantai" placeholder="Masukkan Lantai" class="form-control">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="submit" class="btn btn-danger mb-4">Batal</button>
    </form>

</div>