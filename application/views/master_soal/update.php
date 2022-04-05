<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Edit Master Soal
        </div>
    </div>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
        <?php foreach ($ujian as $u) { ?>

            <form action="<?php echo base_url('master_soal/update_aksi') ?>" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Mata Kuliah<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <select class="form-control" name='id_mata_kuliah' id='id_mata_kuliah' value="<?php echo $u->id_mata_kuliah; ?>">
                            <option value='0' selected  disabled>--- Pilih Mata Kuliah ---</option>
                            <?php foreach ($matakuliah as $mk) { ?>
                                <option value="<?= $mk['id_mata_kuliah']; ?>" <?php if ($mk->id_mata_kuliah == $u->id_mata_kuliah) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $mk['nama_mata_kuliah']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="id_master_soal" value="<?php echo $u->id_master_soal ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tulis Soal <i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="pertanyaan" rows="3"><?= $u->pertanyaan; ?></textarea>
                        <?php echo form_error('pertanyaan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban A<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="a" placeholder="Masukkan Jawaban A" class="form-control" value="<?= $u->a; ?>">
                        <?php echo form_error('Jawaban A', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban B<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="b" placeholder="Masukkan Jawaban B" class="form-control" value="<?= $u->b; ?>">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban C<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="c" placeholder="Masukkan Jawaban C" class="form-control" value="<?= $u->c; ?>">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban D<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="d" placeholder="Masukkan Jawaban D" class="form-control" value="<?= $u->d; ?>">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban E<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="e" placeholder="Masukkan Jawaban E" class="form-control" value="<?= $u->e; ?>">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Kunci Jawaban</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" id='kunci_jawaban'name="kunci_jawaban" value ="<?php echo $u->kunci_jawaban; ?>">
                            <option value="<?= $u->kunci_jawaban;?>"> <?= $u->kunci_jawaban;?> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-info mb-4">Update</button>
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
     $('#id_mata_kuliah').select2();
 });
</script>