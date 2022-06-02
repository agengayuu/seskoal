<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Update Paket Evaluasi
        </div>
    </div>

    <?php foreach($paket_evaluasi as $pe ) : ?>

    <div class="card-header bg-white">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('paket_evaluasi/update_aksi')?>">

                <div class="form-group">
                    <label>Nama Paket<i style="color:red">*</i></label>
                    <input type="hidden" name="id_paket_evaluasi" value="<?php echo $pe->id_paket_evaluasi ?>">
                    <input type="text" name="nama_paket_evaluasi" class="form-control" value="<?php echo $pe->nama_paket_evaluasi ?>">
                    <?php echo form_error('nama_paket_evaluasi', '<div class="text-danger small" ml-3></div>') ?>
                </div>

                <button type="submit" class="btn btn-info mb-4">Update</button>
                <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
            </form>

        </div>
    </div>

    <?php endforeach; ?>
</div>