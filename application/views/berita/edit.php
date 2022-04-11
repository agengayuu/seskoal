<div class="container-fluid">
    <h1 class="h3 mb-2 text-black-800">Edit Berita</h1>

    <?php foreach($beritanya as $b) { ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('berita/update') ?>" method="post">

                <div class="form-group">
                    <label>Judul Berita<i style="color:red">*</i></label>
                    <input type="hidden" name="id_berita" id="id_berita" value="<?= $b->id_berita; ?>" >
                    <input type="text" name="judul_berita" value="<?php echo $b->judul_berita; ?>" class="form-control" placeholder="Judul Berita" required>
                    <?php echo form_error('judul_berita', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Isi<i style="color:red">*</i></label>
                    <textarea name="isi" class="form-control" id="" cols="30" rows="10" placeholder="Isi " required><?php echo $b->isi; ?></textarea>
                    <?php echo form_error('isi', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                     <div class="col-md-2">
                              <img src="<?= base_url('./assets/file/' . $b->dokumen) ?>" class="img-fluid" alt="avatar" style="width: 100px">
                            </div>
                    <label>Dokumen<i> (Opsional)</i></label>
                    <input type="file" name="dokumen" class="form-control" placeholder="dokumen" id="dokumen">
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <!-- <div class="form-group">
                    <label>Status<i style="color:red">*</i></label>
                    <select class="form-control" name='status' id='status' required>
                        <option value='0' selected>--- Pilih Status ---</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3"></div>') ?>
                </div> -->

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php } ?>
</div>