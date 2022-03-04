<div class="container-fluid">
<h1 class="h3 mb-2 text-black-800">Edit Dosen</h1>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
    <?php foreach($dosennya as $d) { ?>
    <form action="<?php echo base_url('dosen/adminupdate') ?>" method="post">
    <input type="hidden" class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $d->id_dosen; ?>">

        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" placeholder="Masukkan NIP" class="form-control" value = "<?= $d->nip;?>" required>
            <?php echo form_error('nip', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Dosen" class="form-control" value = "<?= $d->nama;?>">
            <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan Email" class="form-control" value = "<?= $d->email;?>">
            <?php echo form_error('email', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="number" name="no_tlp" placeholder="Masukkan No. Telepon" class="form-control" value = "<?= $d->no_tlp;?>">
            <?php echo form_error('no_tlp', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" placeholder="Masukkan Gelar Depan" class="form-control" value = "<?= $d->gelar_depan;?>">
            <?php echo form_error('gelar_depan', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" placeholder="Masukkan Gelar Belakang" class="form-control" value = "<?= $d->gelar_belakang;?>">
            <?php echo form_error('gelar_belakang', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value = "<?= $d->tempat_lahir;?>">
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value = "<?= $d->tgl_lahir;?>">
            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <select class="form-control" id='jk'name="jk">
                <option value="<?= $d->jk;?>"> <?= $d->jk;?> </option>
                <option value="Perempuan"> Perempuan </option>
                <option value='Laki-Laki'>Laki-Laki</option>
            </select>
            <?php echo form_error('jk', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Jenis Kelamin" class="form-control" value = "<?= $d->agama;?>">
            <?php echo form_error('agama', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" placeholder="Masukkan Foto" class="form-control"  value = "<?= $d->foto;?>" required>
            <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="submit" class="btn btn-danger mb-4">Batal</button>
    </form>
    <?php } ?>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>