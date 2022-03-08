<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Update Diklat 
        </div>
    </div>

    <?php foreach($diklat as $d ) : ?>

        <form method="post" action="<?php echo base_url('diklat/admin_update_aksi')?>">

            <div class="form-group">
                <label>Diklat</label>
                <input type="hidden" name="id_diklat" value="<?php echo $d->id_diklat ?>">
                <input type="text" name="nama_diklat" class="form-control" value="<?php echo $d->nama_diklat ?>">
            </div>

            <button type="submit" class="btn btn-info mb-4">Update</button>
            <button class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        </form>

    <?php endforeach; ?>
</div>