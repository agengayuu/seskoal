<div class="container-fluid">
<?php foreach($subnya as $s ) { ?>
    <form method="post" action="<?php echo base_url('menu/editsubaksi') ?>">

        <div class="form-group">

            <label>Nama Sub Menu<i style="color:red">*</i></label>
            <input type="text" name="id_sub_menu" value="<?php echo $s->id_sub_menu ?>">
            <input type="text" name="title" placeholder="Masukkan Nama Sub Menu" class="form-control" value = "<?= $s->title;?>">
            <?php echo form_error('title', '<div class="text-danger small" ml-3></div>') ?>

            <label>Nama Menu<i style="color:red">*</i></label>
            <select class="form-control" name="id_menu" id="id_menu">
                <option value='0' selected>--- Pilih Menu ---</option>
                <?php foreach ($menunya as $m) { ?>
                <option value="<?php echo $m->id_menu; ?>"><?php echo $m->nama_menu; ?></option>
                <?php } ?>
                </select>

            <label>URL<i style="color:red">*</i></label>
            <input type="text" name="url" placeholder="Masukkan Nama Sub Menu" class="form-control"  value = "<?= $s->url;?>">
            <?php echo form_error('url', '<div class="text-danger small" ml-3></div>') ?>

            <label>Icon<i style="color:red">*</i></label>
            <input type="text" name="icon" placeholder="Masukkan Nama Sub Menu" class="form-control"  value = "<?= $s->icon;?>">
            <?php echo form_error('icon', '<div class="text-danger small" ml-3></div>') ?>

            <label>Status<i style="color:red">*</i></label>
            <select class="form-control" name='is_active' id='is_active'>
                <option value='0' selected> --- Pilih Status ---</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>  
                </select>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="cancel" class="btn btn-danger mb-4">Batal</button>
    </form>
    <?php } ?>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>