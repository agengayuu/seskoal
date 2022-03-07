<div class="container-fluid">
    <h1 class="h3 mb-2 text-black-800">Edit Menu</h1>

    <?php foreach($menunya as $m) { ?>
    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('menu/editaksi') ?>" method="post">
            <input type="hidden" class="form-control" name="id_menu" id="id_menu" value="<?php echo $m->id_menu; ?>">
                <div class="form-group">
                    <label>Nama Menu</label>
                    <input class="form-control" type="text" name="nama_menu" value="<?php echo $m->nama_menu; ?>">
                    <?php echo form_error('nama_menu', '<div class="text-danger small ml-3"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                <button class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php } ?>
</div>