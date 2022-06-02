<div class="container-fluid">
    <?php foreach ($siswanya as $s) { ?>
        <form action="<?php echo base_url('mahasiswa/update') ?>" method="post">
            <input type="hidden" class="form-control" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo $s->id_mahasiswa; ?>">
            <div class="text-center">
            <?php foreach($detail as $dt) : ?>
                <img src="<?php echo base_url().'assets/uploads/' .$s->foto ?>" style="width: 200px">
            <?php endforeach; ?>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?php echo $s->nim; ?>" class="form-control" required readonly>
                <?php echo form_error('nim', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" value="<?php echo $s->nama; ?>" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir<i style="color:red">*</i></label>
                <input type="date" name="tgl_lahir" value="<?php echo $s->tgl_lahir; ?>" placeholder="Masukkan Tanggal Lahir" class="form-control">
                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
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

            <label>Tahun Akademik</label>
            <div class="form-group">
                <select class="form-control" name='id_akademik' id='id_akademik' value ="<?= $s->id_akademik ?>">
                    <option value='0' selected>--- Pilih Tahun Akademik ---</option>
                    <?php foreach ($akademik as $ak) { ?>
                    <option value="<?php echo $ak->id_akademik; ?>" <?php if ($s->id_akademik == $ak->id_akademik) {
                                                                    echo "selected";
                                                                    } ?> ><?php echo $ak->tahun_akademik . ' - ' . $ak->semester; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="<?php echo $s->jabatan; ?>" class="form-control">
                <?php echo form_error('jabatan', '<div class="text-danger small ml-3"></div>') ?>
                
            </div>
            
            <label> Diklat<i style="color:red">*</i></label>
            <div class="form-group">
                <select class="form-control" name='id_diklat' id='id_diklat' value ="<?= $s->id_diklat ?>">
                    <option value='0' selected>--- Pilih Diklat ---</option>
                    <?php foreach ($diklat as $d) { ?>
                    <option value="<?php echo $d->id_diklat; ?>" <?php if ($s->id_diklat == $d->id_diklat) {
                                                                    echo "selected";
                                                                    } ?> ><?php echo $d->nama_diklat; ?></option>
                    <?php } ?>
                </select>
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

            <!-- <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" value="<?php echo $s->foto; ?>" class="form-control" >
                 <label><i>hanya file ekstensi .png, .jpeg</i></label>
                <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
            </div> -->

            <button type="submit" class="btn btn-primary mb-4">Update</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        </form>
    <?php } ?>

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