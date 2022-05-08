<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Update Paket Evaluasi
        </div>
    </div>

    <?php foreach($daftar_matakuliah as $dmk ) : ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Paket Evaluasi </h6>
        </div>

        <form method="post" action="<?php echo base_url('daftar_matakuliah/updateEval')?>">

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 ml-4 col-form-label">Nama Paket<i style="color:red">*</i></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="id_paket_evaluasi" value="<?php echo $dmk->id_paket_evaluasi ?>">
                            <input type="text" name="nama_paket_evaluasi" id="nama_paket_evaluasi" class="form-control" value="<?php echo $dmk->nama_paket_evaluasi ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 ml-4 col-form-label">Jam Mulai<i style="color:red">*</i></label>
                        <div class="col-sm-9">
                            <input type="datetime-local" name="waktu_evaluasi_mulai" id="waktu_evaluasi_mulai" class="form-control" value="<?php echo $dmk->waktu_evaluasi_mulai ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 ml-4 col-form-label">Jam Selesai<i style="color:red">*</i></label>
                        <div class="col-sm-9">
                            <input type="datetime-local" name="waktu_evaluasi_selesai" id="waktu_evaluasi_selesai" class="form-control" value="<?php echo $dmk->waktu_evaluasi_selesai ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 ml-4 col-form-label">Durasi Waktu<i style="color:red">*</i></label>
                        <div class="col-sm-9">
                            <input type="text" name="durasi_ujian" id="durasi_ujian" class="form-control" value="<?php echo $dmk->durasi_ujian ?>">
                        </div>
                    </div>
                </div>  
                
            <input type="hidden" name="id_paket_evaluasi" value="<?= $id_eval; ?>">
            <input type="hidden" name="id_mata_kuliah" value="<?= $id_matkul; ?>">

            <button type="submit" class="btn btn-info mb-4 ml-4">Update</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        
        </form>

    </div>

    <?php endforeach; ?>

</div>