<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Dosen
        </div>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('dosen/adminsimpan'); ?> 
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
    <!-- <form action="<?php echo base_url('dosen/adminsimpan') ?>" method="post" enctype="multipart/form-data"> -->

        <div class="form-group">
            <label>NID<i style="color:red">*</i></label>
            <input type="number" name="nip"  value="<?php echo set_value('nip'); ?>" placeholder="Masukkan NID" class="form-control">
            <?php echo form_error('nip', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>NIK<i style="color:red">*</i></label>
            <input type="number" name="nik" value="<?php echo set_value('nik'); ?>" placeholder="Masukkan NIK" class="form-control">
            <?php echo form_error('nik', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>NPWP<i style="color:red">*</i></label>
            <input type="number" name="npwp" value="<?php echo set_value('npwp'); ?>" placeholder="Masukkan NPWP" class="form-control">
            <?php echo form_error('npwp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Kewarganegaraan<i style="color:red">*</i></label>
            <input type="text" name="kewarganegaraan"  value="<?php echo set_value('kewarganegaraan'); ?>" placeholder="Masukkan Kewarganegaraan" class="form-control">
            <?php echo form_error('kewarganegaraan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Dosen<i style="color:red">*</i></label>
            <input type="text" name="nama" value="<?php echo set_value('nama'); ?>"  placeholder="Masukkan Nama Dosen" class="form-control">
            <?php echo form_error('nama', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Email<i style="color:red">*</i></label>
            <input type="email" name="email"  value="<?php echo set_value('email'); ?> " placeholder="Masukkan Email" class="form-control">
            <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>No. Telepon<i style="color:red">*</i></label>
            <input type="number" name="no_tlp" value="<?php echo set_value('no_tlp'); ?>" placeholder="Masukkan No. Telepon" class="form-control">
            <?php echo form_error('no_tlp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" value="<?php echo set_value('gelar_depan'); ?>" placeholder="Masukkan Gelar Depan" class="form-control">
            <?php echo form_error('gelar_depan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" value="<?php echo set_value('gelar_belakang'); ?>" placeholder="Masukkan Gelar Belakang" class="form-control">
            <?php echo form_error('gelar_belakang', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        
        <div class="form-group">
            <label>Tempat Lahir<i style="color:red">*</i></label>
            <input type="text" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" placeholder="Masukkan Tempat Lahir" class="form-control">
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        
        <div class="form-group">
            <label>Tanggal Lahir<i style="color:red">*</i></label>
            <input type="date" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" placeholder="Masukkan Tanggal Lahir" class="form-control">
            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin<i style="color:red">*</i></label>
            <select class="form-control" id='jk'name="jk">
                <option>-- Pilih Jenis Kelamin --</option>
                <option value='Perempuan'>Perempuan </option>
                <option value='Laki-laki'>Laki-Laki</option>
            </select>
            <?php echo form_error('jk', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Agama<i style="color:red">*</i></label>
            <select class="form-control" id='agama'name="agama">
                <option>-- Pilih Agama --</option>
                <option value='Islam'>Islam</option>
                <option value='Kristen'>Kristen</option>
                <option value='Katholik'>Katholik</option>
                <option value='Budha'>Budha</option>
                <option value='Hindu'>Hindu</option>
                <option value='Konghucu'>Konghucu</option>
            </select>
            <?php echo form_error('agama', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Alamat<i style="color:red">*</i></label>
            <textarea class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" name="alamat" rows="3"></textarea>
            <?php echo form_error('alamat', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <!-- <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" placeholder="Masukkan Foto" class="form-control">
            <label><i>hanya file ekstensi .png, .jpeg</i></label>
            <?php echo form_error('foto', '<div class="text-danger small ml-3">','</div>') ?>
        </div> -->

        <button type="submit" class="btn btn-primary mb-4 mt-4">Simpan</button>
        <button type="button" value="Cancel" class="btn btn-danger mb-4 mt-4" onclick="history.back()">Batal</button>
    <!-- </form> -->
    <?php form_close(); ?>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>