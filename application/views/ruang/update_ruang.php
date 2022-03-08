<div class="container-fluid">
<h1 class="h3 mb-2 text-black-800">Edit Ruangan</h1>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
    
    <?php foreach($ruangnya as $r) { ?>        
    <!-- Form -->
    <form method="post" action="<?php echo base_url('ruang/update_aksi') ?>">
        <div class="form-group">
            <label>Nama Ruang<i style="color:red">*</i></label>
            <input type="hidden" name="id_ruang" id="id_ruang" placeholder="Masukkan ID Ruang" class="form-control" >
            <input type="text" name="nama_ruang" placeholder="Masukkan Nama Ruang" class="form-control" value="<?= $r->nama_ruang ;?>">
            <?php echo form_error('nama_ruang', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        <div class="form-group">
            <label>Jenis Ruang<i style="color:red">*</i></label>
                <select class="form-control" name='id_jenis_ruang' id='id_jenis_ruang'>
                    <option value='0' selected>--- Pilih Jenis Ruangan ---</option>
                    <?php foreach ($jenisnya as $jr) { ?>
                    <option value="<?php echo $jr->id_jenis_ruang; ?>"><?php echo $jr->nama_jenis_ruang; ?></option>
                    <?php } ?>
		        </select>
            <?php echo form_error('id_jenis_ruang', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Kapasitas<i style="color:red">*</i></label>
            <input type="text" name="kapasitas" placeholder="Masukkan Kapasitas" class="form-control" value="<?= $r->kapasitas ;?>" >
            <?php echo form_error('kapasitas', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Gedung<i style="color:red">*</i></label>
            <input type="text" name="gedung" placeholder="Masukkan Gedung" class="form-control" value="<?= $r->gedung ;?>">
            <?php echo form_error('gedung', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <div class="form-group">
            <label>Lantai<i style="color:red">*</i></label>
            <input type="text" name="lantai" placeholder="Masukkan Lantai" class="form-control" value="<?= $r->lantai ;?>">
            <?php echo form_error('lantai', '<div class="text-danger small ml-3"></div>') ?>
        </div>
        
        <div class="form-group">
            <label>Keterangan<i style="color:red">*</i></label>
            <textarea class="form-control" name="keterangan" rows="3" value="<?= $r->keterangan;?>"></textarea>
            <?php echo form_error('keterangan', '<div class="text-danger small ml-3"></div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        <button type="batal" class="btn btn-danger mb-4" onclick=self.history.back()>Batal</button>

    </form>
    <?php } ?>

    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>