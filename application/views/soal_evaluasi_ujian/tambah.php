<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Soal Evaluasi
        </div>
    </div>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('mahasiswa/adminsimpan') ?>" method="post">


                <div class="form-group">
                    <label> Mata Kuliah<i style="color:red">*</i></label>
                    <select class="form-control" name='id_diklat' id='id_diklat'>
                        <option value='0' disabled="" selected>--- Pilih Mata kuliah ---</option>
                        <?php foreach ($diklat as $d) { ?>
                        <option value="<?php echo $d->id_diklat; ?>"><?php echo $d->nama_diklat; ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tulis Soal Ujian<i style="color:red">*</i></label>
                    <textarea class="form-control" name="keterangan" rows="3"></textarea>
                    <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jawaban A<i style="color:red">*</i></label>
                    <input type="text" name="Jawaban A" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('Jawaban A', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jawaban B<i style="color:red">*</i></label>
                    <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jawaban C<i style="color:red">*</i></label>
                    <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jawaban D<i style="color:red">*</i></label>
                    <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jawaban E<i style="color:red">*</i></label>
                    <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control">
                    <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kunci Jawaban</label>
                        <select class="form-control" name="kunci" required>
                            <option selected="selected" disabled="" value="">- Pilih Kunci Jawaban -</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>