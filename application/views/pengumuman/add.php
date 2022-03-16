<div class="container-fluid">
    <h1 class="h3 mb-2 text-black-800">Tambah Pengumuman</h1>

    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('pengumuman/addsimpan') ?>" method="post">

                <div class="form-group">
                    <label>Judul Pengumuman<i style="color:red">*</i></label>
                    <input type="text" name="judul_pengumuman" class="form-control" placeholder="Judul Pengumuman">
                    <?php echo form_error('judul_pengumuman', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Isi Pengumuman<i style="color:red">*</i></label>
                    <textarea name="isi_pengumuman" class="form-control" id="" cols="30" rows="10" placeholder="Isi Pengumuman"></textarea>
                    <?php echo form_error('isi_pengumuman', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>File<i style="color:red">*</i></label>
                    <input type="file" name="dokumen" class="form-control" placeholder="dokumen" id="dokumen">
                    <?php echo form_error('dokumen', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>