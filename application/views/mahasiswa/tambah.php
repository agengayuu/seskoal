<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Mahasiswa
            
        </div>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('mahasiswa/adminsimpan'); ?>
    
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <!-- <form action="<?php echo base_url('mahasiswa/adminsimpan') ?>" method="post" > -->

            <div class="form-group">
                <label>NIM<i style="color:red">*</i></label>
                <input type="text" name="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM" class="form-control" required>
                <?php echo form_error('nim', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Mahasiswa<i style="color:red">*</i></label>
                <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Mahasiswa" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir<i style="color:red">*</i></label>
                <input type="date" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" placeholder="Masukkan Tanggal Lahir" class="form-control">
                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>Angkatan<i style="color:red">*</i></label>
                <input type="text" name="angkatan" value="<?php echo set_value('angkatan'); ?>" placeholder="Masukkan Angkatan" class="form-control">
                <?php echo form_error('angkatan', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>Tahun Masuk<i style="color:red">*</i></label>
                <input type="text" name="tahun_masuk" value="<?php echo set_value('tahun_masuk'); ?>" placeholder="Masukkan Tahun Masuk" class="form-control">
                <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>Tahun Akademik<i style="color:red">*</i></label>
                <select class="form-control" name='id_akademik' id='id_akademik'>
                    <option value='0' selected>--- Pilih Tahun Akademik ---</option>
                    <?php foreach ($akademik as $ak) { ?>
                        <option value="<?php echo $ak->id_akademik; ?>"><?php echo $ak->tahun_akademik . ' - ' . $ak->semester; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jabatan<i style="color:red">*</i></label>
                <input type="text" name="jabatan" value="<?php echo set_value('jabatan'); ?>" placeholder="Masukkan Jabatan" class="form-control">
                <?php echo form_error('jabatan', '<div class="text-danger small ml-3">','</div>') ?>
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
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan Email" class="form-control">
                <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <div class="form-group">
                <label>No. Telepon<i style="color:red">*</i></label>
                <input type="number" name="no_tlp" value="<?php echo set_value('no_tlp'); ?>" placeholder="Masukkan Nomor Telepon" class="form-control">
                <?php echo form_error('no_tlp', '<div class="text-danger small ml-3">','</div>') ?>
            </div>

            <!-- <div class="form-group">
                <label>Foto</i></label>
                <input type="file" name="foto" multiple accept="image/*" class="form-control" >
                 <label><i>hanya file ekstensi .png, .jpeg</i></label>
                <?php echo form_error('foto', '<div class="text-danger small ml-3">','</div>') ?>
            </div> -->

            <!-- document -->
            <!-- <br />
                <hr>
                <br />
                <table class="table table-bordered mb-4">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th>Jenis Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead> -->
            <!-- <tbody>
                        <tr align="center">
                            <th>Dokumen 1</th>
                            <th><input type="file" name="foto" placeholder="Masukkan Foto" class="form-control" required></th>
                        </tr>
                        <tr align="center">
                            <th>Dokumen 2</th>
                            <th><input type="file" name="foto" placeholder="Masukkan Foto" class="form-control" required></th>
                        </tr>
                        <tr align="center">
                            <th>Dokumen 3</th>
                            <td><input type="file" name="foto" placeholder="Masukkan Foto" class="form-control" required></th>
                        </tr>
                    </tbody> -->
            </table>
            <!-- end document -->

            <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            <!-- </form> -->
            <?php form_close(); ?>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
</script>