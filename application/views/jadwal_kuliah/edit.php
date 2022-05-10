<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
            <div class="card-body">
                <span>Edit Jadwal Kuliah</span>
            </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>

    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">

            <!-- Form -->
            <?php foreach ($jadwal as $jdw) { ?>
                <form method="post" action="<?php echo base_url('jadwal_kuliah/update') ?>">

                    <div class="form-group">
                        <label> Nama Diklat <i style="color:red">*</i></label>
                        <input type="hidden" name="id_jadwal_kuliah" value="<?php echo $jdw->id_jadwal_kuliah ?>">
                        <select class="form-control" name='id_diklat' id='id_diklat' required>
                            <option value='0' selected>--- Pilih Diklat ---</option>
                            <?php foreach ($diklat as $d) { ?>
                                <option value="<?php echo $d->id_diklat; ?>" <?php if ($jdw->id_diklat == $d->id_diklat) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $d->nama_diklat; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('id_diklat', '<div class="text-danger small ml-3">','</div>') ?>

                    </div>

                    <div class="form-group">
                        <label>Mata Kuliah <i style="color:red">*</i></label>
                        <select class="form-control" name='id_mata_kuliah' id='id_mata_kuliah' required>
                            <option value='0' selected>--- Pilih Mata Kuliah ---</option>
                            <?php foreach ($matkul as $mat) { ?>
                                <option value="<?php echo $mat->id_mata_kuliah; ?>" <?php if ($jdw->id_mata_kuliah == $mat->id_mata_kuliah) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?php echo $mat->nama_mata_kuliah; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('id_mata_kuliah', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <!-- <div class="form-group">
                        <label> Nama Dosen <i style="color:red">*</i></label>
                        <select class="form-control" name='id_dosen' id='id_dosen' required>
                            <option value='0' selected>--- Pilih Dosen ---</option>
                            <?php foreach ($matkul as $mat) { ?>
                                <option value="<?php echo $mat->id_dosen; ?>"<?php if ($jdw->id_mata_kuliah == $mat->id_dosen) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $d->nama; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('id_dosen', '<div class="text-danger small ml-3">','</div>') ?>
                    </div> -->

                    <!-- <div class="form-group">
            <label>Kode Jadwal<i style="color:red">*</i></label>
            <input type="text" name="kapasitas" placeholder="Masukkan Kapasitas" class="form-control">
          
        </div> -->

                    <div class="form-group">
                        <label>Tanggal<i style="color:red">*</i></label>
                        <input type="date" name="tanggal" placeholder="Masukkan Tanggal" class="form-control" id='tanggal' value="<?= $jdw->tanggal ?>" required>
                        <?php echo form_error('tanggal', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Waktu Mulai<i style="color:red">*</i></label>
                        <input type="time" name="waktu_mulai" placeholder="Masukkan Waktu" class="form-control" id='waktu_mulai' value="<?= $jdw->waktu_mulai ?>" required>
                        <?php echo form_error('waktu_mulai', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Waktu Akhir<i style="color:red">*</i></label>
                        <input type="time" name="waktu_selesai" placeholder="Masukkan Waktu" class="form-control" id='waktu_selesai' value="<?= $jdw->waktu_selesai ?>" required>
                        <?php echo form_error('waktu_akhir', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Jam Pelajaran Ke<i style="color:red">*</i></label>
                        <input type="text" name="jam_pelajaran_ke" placeholder="Masukkan Jam Pelajaran " class="form-control" id='jam_pelajaran_ke' value="<?= $jdw->jam_pelajaran_ke ?>" required>
                        <?php echo form_error('tema', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Tema<i style="color:red">*</i></label>
                        <input type="text" name="tema" placeholder="Masukkan Tema" class="form-control" id='tema' value="<?= $jdw->tema ?>" required>
                        <?php echo form_error('tema', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label> Tempat <i style="color:red">*</i></label>
                        <select class="form-control" name='id_ruang' id='id_ruang' required>
                            <option value='0' selected>--- Pilih Ruangan ---</option>
                            <?php foreach ($ruang as $r) { ?>
                                <option value="<?php echo $r->id_ruang; ?>"<?php if ($jdw->id_ruang == $r->id_ruang) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $r->nama_ruang; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('id_dosen', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Keterangan<i style="color:red">*</i></label>
                        <textarea class="form-control" name="keterangan" id='tanggal' rows="3" required><?= $jdw->keterangan; ?></textarea>
                        <?php echo form_error('keterangan', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                    <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>

                </form>
            <?php } ?>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>
<script type="text/javascript">
 $(document).ready(function() {
     $('#id_diklat').select2();
 });
 $(document).ready(function() {
     $('#id_mata_kuliah').select2();
 });
 $(document).ready(function() {
     $('#id_dosen').select2();
 });
</script>

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