<div class="container-fluid">
<h1 class="h3 mb-2 text-black-800">Tambah Mahasiswa</h1>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('mahasiswa/adminsimpan') ?>" method="post">

                <div class="form-group">
                    <label>NIM<i style="color:red">*</i></label>
                    <input type="text" name="nim" placeholder="Masukkan NIM" class="form-control" required>
                    <?php echo form_error('nim', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Mahasiswa<i style="color:red">*</i></label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Anda" class="form-control">
                    <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir<i style="color:red">*</i></label>
                    <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
                    <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Angkatan<i style="color:red">*</i></label>
                    <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tahun Masuk<i style="color:red">*</i></label>
                    <input type="text" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" class="form-control">
                    <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tahun Akademik<i style="color:red">*</i></label>
                    <input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control">
                    <?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Jabatan<i style="color:red">*</i></label>
                    <input type="text" name="jabatan" placeholder="Masukkan Jabatan" class="form-control">
                    <?php echo form_error('jabatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label> Diklat<i style="color:red">*</i></label>
                    <select class="form-control" name='id_diklat' id='id_diklat'>
                    <option value='0' selected>--- Pilih Diklat ---</option>
                    <?php foreach ($diklat as $d) { ?>
                    <option value="<?php echo $d->id_diklat; ?>"><?php echo $d->nama_diklat; ?></option>
                    <?php } ?>
                </select>
                </div>
                
                <div class="form-group">
                    <label>Email<i style="color:red">*</i></label>
                    <input type="email" name="email" placeholder="Masukkan Email" class="form-control">
                    <?php echo form_error('email', '<div class="text-danger small ml-3"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>No. Telepon<i style="color:red">*</i></label>
                    <input type="number" name="no_tlp" placeholder="Masukkan Nomor Telepon" class="form-control">
                    <?php echo form_error('no_tlp', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Foto<i style="color:red">*</i></label>
                    <input type="file" name="foto" placeholder="Masukkan Foto" class="form-control" required>
                    <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="submit" class="btn btn-danger mb-4">Batal</button>
            </form>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>