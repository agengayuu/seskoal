<div class="container-fluid">
<h1 class="h3 mb-2 text-black-800">Tambah Dosen</h1>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
    <form action="<?php echo base_url('dosen/adminsimpan') ?>" method="post">

        <div class="form-group">
            <label>NIP<i style="color:red">*</i></label>
            <input type="number" name="nip" placeholder="Masukkan NIP" class="form-control" required>
            <?php echo form_error('nip', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Dosen<i style="color:red">*</i></label>
            <input type="text" name="nama" placeholder="Masukkan Nama Dosen" class="form-control">
            <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Email<i style="color:red">*</i></label>
            <input type="email" name="email" placeholder="Masukkan Email" class="form-control">
            <?php echo form_error('tgl_lhr', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>No. Telepon<i style="color:red">*</i></label>
            <input type="number" name="no_tlp" placeholder="Masukkan No. Telepon" class="form-control">
            <?php echo form_error('no_tlp', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Depan<i style="color:red">*</i></label>
            <input type="text" name="gelar_depan" placeholder="Masukkan Gelar Depan" class="form-control">
            <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Belakang<i style="color:red">*</i></label>
            <input type="text" name="gelar_belakang" placeholder="Masukkan Gelar Belakang" class="form-control">
            <?php echo form_error('gelar_belakang', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>Tempat Lahir<i style="color:red">*</i></label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control">
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        
        <div class="form-group">
            <label>Tanggal Lahir<i style="color:red">*</i></label>
            <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin<i style="color:red">*</i></label>
            <select class="form-control" id='jk'name="jk">
                <option value="Kosong">--- Pilih Jenis Kelamin ---</option>
                <option value='p'>Perempuan </option>
                <option value='l'>Laki-Laki</option>
            </select>
            <?php echo form_error('jk', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Agama<i style="color:red">*</i></label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control">
            <?php echo form_error('agama', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Alamat<i style="color:red">*</i></label>
            <textarea class="form-control" name="alamat" rows="3"></textarea>
            <?php echo form_error('alamat', '<div class="text-danger small ml-3"></div>') ?>
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