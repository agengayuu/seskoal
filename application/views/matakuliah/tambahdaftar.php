<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Mata Kuliah
            
        </div>
    </div>

    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">
            <form action="<?php echo base_url('matakuliah/simpanmatkul') ?>" method="post">


                <div class="form-group">
                    <label>Tahun Akademik<i style="color:red">*</i></label>
                    <select class="form-control" name='id_akademik' id='id_akademik'>
                    <option value='0' selected>--- Pilih tahun akademik ---</option>
                    <?php foreach ($akademik as $ak) { ?>
                    <option value="<?php echo $ak->id_akademik; ?>"><?php echo $ak->tahun_akademik; ?></option>
			    <?php } ?>
		        </select>
                </div>

                <div class="form-group">
                    <label> Mata Kuliah<i style="color:red">*</i></label>
                    <select class="form-control" name='id_mata_kuliah' id='id_mata_kuliah'>
                    <option value='0' selected>--- Pilih Mata Kuliah ---</option>
                    <?php foreach ($matkul as $mat) { ?>
                    <option value="<?php echo $mat->id_mata_kuliah; ?>"><?php echo $mat->nama_mata_kuliah; ?></option>
			    <?php } ?>
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