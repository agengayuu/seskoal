<div class="container-fluid">

    <form action="<?php echo base_url('mahasiswa/adminsimpan') ?>" method="post">

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" placeholder="Masukkan NIM" class="form-control" required>
            <?php echo form_error('nim', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Anda" class="form-control">
            <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lhr" placeholder="Masukkan Tanggal Lahir" class="form-control">
            <?php echo form_error('tgl_lhr', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Angkatan</label>
            <input type="text" name="angkatan" placeholder="Masukkan Kapasitas" class="form-control">
            <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Tahun Masuk</label>
            <input type="text" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" class="form-control">
            <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control">
            <?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" placeholder="Masukkan Jabatan" class="form-control">
            <?php echo form_error('jabatan', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label> Diklat </label>
            <select class="form-control" name='nama_diklat' id='nama_diklat'>
			<option value='0' selected>--- Pilih Diklat ---</option>
		    <?php foreach ($diklat as $d) { ?>
			<option value="<?php echo $d->id_diklat; ?>"><?php echo $d->nama_diklat; ?></option>
			<?php } ?>
		</select>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan Email" class="form-control">
            <?php echo form_error('email', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="number" name="no_tlp" placeholder="Masukkan Nomor Telepon" class="form-control">
            <?php echo form_error('no_tlp', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" placeholder="Masukkan Foto" class="form-control" required>
            <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="submit" class="btn btn-danger mb-4">Batal</button>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>