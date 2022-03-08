<div class="container-fluid">
    <?php foreach($siswanya as $s) { ?>
        <form action="<?php echo base_url('mahasiswa/adminsimpan') ?>" method="post">
            <input type="hidden" class="form-control" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo $s->id_mahasiswa; ?>">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?php echo $s->nim; ?>" class="form-control" required>
                <?php echo form_error('nim', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" value="<?php echo $s->nama; ?>" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Angkatan</label>
                <input type="text" name="angkatan" value="<?php echo $s->angkatan; ?>" class="form-control">
                <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Tahun Masuk</label>
                <input type="text" name="tahun_masuk" value="<?php echo $s->tahun_masuk; ?>" class="form-control">
                <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" value="<?php echo $s->tahun_akademik; ?>" class="form-control">
                <?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3"></div>') ?>
            </div>
        
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan"value="<?php echo $s->jabatan; ?>" class="form-control">
                <?php echo form_error('jabatan', '<div class="text-danger small ml-3"></div>') ?>
            </div>
        
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $s->email; ?>" class="form-control">
                <?php echo form_error('email', '<div class="text-danger small ml-3"></div>') ?>
            </div>
        
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="number" name="no_tlp" value="<?php echo $s->no_tlp; ?>" class="form-control">
                <?php echo form_error('no_tlp', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" value="<?php echo $s->foto; ?>" class="form-control" required>
                <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            <button class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
           
    </form>
    <?php } ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>