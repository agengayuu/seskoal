<div class="container-fluid">
    <?php
    // echo "<pre>";
    // print_r($akademik);
    // die();
     foreach ($akademik as $ak) { ?>
        <form action="<?php echo base_url('tahun_akademik/update') ?>" method="post">

            <div class="form-group">
                <label>Tahun Akademik<i style="color:red">*</i></label>
                <!-- <div class="col-md-4"> -->
                <input type="text" name="id_akademik" value="<?php echo $ak->id_akademik ?>">
                <input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control" value="<?= $ak->tahun_akademik; ?>" required>
                <?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3"></div>') ?>
            </div>
            <div class="form-group">
                <label>Semester<i style="color:red">*</i></label>
                <select class="form-control" name='semester' id='semester'>
                    <option value="Ganjil" <?php echo  ($ak->semester == 'Ganjil') ? 'selected':''?>>Ganjil</option>
                    <option value="Genap" <?php echo ($ak->semester == 'Genap') ? 'selected':''?>>Genap</option>
                </select>
            </div>


            <div class="form-group">
                <label>Status<i style="color:red">*</i></label>
                <select class="form-control" name='status' id='status'>
                    <option value="Aktif" <?php echo ($ak->status == 'Aktif') ? 'selected':'' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?php echo ($ak->status == 'Tidak Aktif') ? 'selected':'' ?>>Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        </form>
    <?php } ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>