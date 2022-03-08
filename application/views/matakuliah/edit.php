<div class="container-fluid">
    <h1 class="h3 mb-2 text-black-800">Edit Mata Kuliah</h1>

    <?php foreach($matakuliahnya as $m) { ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('matakuliah/admineditaksi') ?>" method="post">
            <input type="hidden" class="form-control" name="id_mata_kuliah" id="id_mata_kuliah" value="<?php echo $m->id_mata_kuliah; ?>">
                <div class="form-group">
                    <label>Kode Mata Kuliah</label>
                    <input class="form-control" type="text" name="kode_mata_kuliah" value="<?php echo $m->kode_mata_kuliah; ?>"readonly>
                    <?php echo form_error('kode_mata_kuliah', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="nama_mata_kuliah" value="<?php echo $m->nama_mata_kuliah; ?>" class="form-control">
                    <?php echo form_error('nama_mata_kuliah', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Bobot</label>
                    <input type="number" name="bobot" value="<?php echo $m->bobot; ?>" class="form-control">
                    <?php echo form_error('bobot', '<div class="text-danger small ml-3"></div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php } ?>
</div>