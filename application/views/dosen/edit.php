<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Edit Dosen 
        </div>
    </div> 

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">

    <?php foreach($dosennya as $d) : ?> 
    <?php echo form_open_multipart('dosen/adminupdate'); ?> 

    <input type="hidden" class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $d->id_dosen; ?>">

        <div class="form-group">
            <label>NID<i style="color:red">*</i></label>
            <input type="number" name="nip" placeholder="Masukkan NIP" class="form-control" value="<?php echo $d->nip ?>" required readonly>
            <?php echo form_error('nip', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>NIK<i style="color:red">*</i></label>
            <input type="number" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $d->nik ?>" required readonly>
            <?php echo form_error('nik', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>NPWP<i style="color:red">*</i></label>
            <input type="number" name="npwp" placeholder="Masukkan NPWP" class="form-control" value="<?php echo $d->npwp ?>" required readonly> 
            <?php echo form_error('npwp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Kewarganegaraan<i style="color:red">*</i></label>
            <input type="text" name="kewarganegaraan" placeholder="Masukkan Kewarganegaraan" class="form-control" value="<?php echo $d->kewarganegaraan ?>" required>
            <?php echo form_error('kewarganegaraan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Dosen<i style="color:red">*</i></label>
            <input type="text" name="nama" placeholder="Masukkan Nama Dosen" class="form-control" value="<?php echo $d->nama ?>" required>
            <?php echo form_error('nama', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Email<i style="color:red">*</i></label>
            <input type="email" name="email" class="form-control" value="<?php echo $d->email ?>" required>
            <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="number" name="no_tlp" placeholder="Masukkan No. Telepon" class="form-control" value="<?php echo $d->no_tlp ?>" required>
            <?php echo form_error('no_tlp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" placeholder="Masukkan Gelar Depan" class="form-control" value="<?php echo $d->gelar_depan ?>">
            <?php echo form_error('gelar_depan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" placeholder="Masukkan Gelar Belakang" class="form-control" value="<?php echo $d->gelar_belakang ?>">
            <?php echo form_error('gelar_belakang', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        
        <div class="form-group">
            <label>Tempat Lahir<i style="color:red">*</i></label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?php echo $d->tempat_lahir ?>" required>
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir<i style="color:red">*</i></label>
            <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php echo $d->tgl_lahir ?>" required>
            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
        <label>Jenis Kelamin<i style="color:red">*</i></label>
            <select class="form-control" id='jk'name="jk" value ="<?php echo $d->jk; ?>">
                <option value="<?= $d->jk;?>"> <?= $d->jk;?> </option>
                <option value="Perempuan"> Perempuan </option>
                <option value="Laki-laki">Laki-Laki</option>
            </select>
            <?php echo form_error('jk', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Agama<i style="color:red">*</i></label>
            <select class="form-control" id='agama' name="agama" value="<?php echo $d->agama ?>">
            <option value="<?php echo $d->agama ?>"> <?= "$d->agama"?> </option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            <?php echo form_error('agama', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Alamat<i style="color:red">*</i></label>
            <textarea class="form-control" name="alamat" rows="3" required> <?= "$d->alamat"?> </textarea>
            <?php echo form_error('alamat', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <?php foreach($detail as $dt) : ?>
                <img src="<?php echo base_url().'assets/uploads/' .$d->foto ?>" style="width: 200px">
                <?php endforeach; ?><br><br>
                <label>Foto</label>
            <input type="file" name="userfile" class="form-control"  value = "<?= $d->foto;?>">
            <label><i>hanya file ekstensi .png, .jpeg</i></label>
        </div>

        <button type="submit" class="btn btn-info mb-4">Update</button>
        <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>


    <?php form_close(); ?>
    <?php endforeach; ?>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>