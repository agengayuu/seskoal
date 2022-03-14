<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Soal Evaluasi
        </div>
    </div>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('soal_evaluasi_ujian/simpan') ?>" method="post">


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Mata Kuliah<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name='id_mata_kuliah' id='id_mata_kuliah'>
                            <option value='0' disabled="" selected>--- Pilih Mata kuliah ---</option>
                            <?php foreach ($matakuliah as $mk) { ?>
                            <option value="<?php echo $mk->id_mata_kuliah; ?>"><?php echo $mk->nama_mata_kuliah; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tulis Soal Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="pertanyaan" rows="3"></textarea>
                        <?php echo form_error('pertanyaan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban A<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="a" placeholder="Masukkan Jawaban A" class="form-control">
                        <?php echo form_error('Jawaban A', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban B<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="b" placeholder="Masukkan Jawaban B" class="form-control">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban C<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="c" placeholder="Masukkan Jawaban C" class="form-control">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban D<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="d" placeholder="Masukkan Jawaban D" class="form-control">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban E<i style="color:red">*</i></label>
                    <div class="col-sm-10">
                        <input type="text" name="e" placeholder="Masukkan Jawaban E" class="form-control">
                        <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Kunci Jawaban</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kunci_jawaban" required>
                            <option selected="selected" disabled="" value="">- Pilih Kunci Jawaban -</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#data-tables').dataTable();
    });

    $('.select2').select2();

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>