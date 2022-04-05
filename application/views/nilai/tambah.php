<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Nilai
        </div>
    </div>

     <?php echo validation_errors(); ?>
    <div class="card-header bg-white">
        <div class="card-body">
        <form method="post" action="<?php echo base_url('nilai/simpan') ?>">

            <div class="form-group">
                <label>Batas Awal<i style="color:red"></i></label>
                <input type="number" step="0.01" id="batas_awal" name="batas_awal" placeholder="Masukkan Batas Awal" class="form-control">
                <?php echo form_error('batas_awal', '<div class="text-danger small" ml-3></div>') ?>
            </div>

            <div class="form-group">
                <label>Batas Akhir<i style="color:red"></i></label>
                <input type="number" step="0.01" id="batas_akhir" name="batas_akhir" placeholder="Masukkan Batas Akhir" class="form-control">
                <?php echo form_error('batas_akhir', '<div class="text-danger small" ml-3></div>') ?>
            </div>

        <div class="form-group">
            <label>Mutu<i style="color:red"></i></label>
            <select class="form-control" id='mutu'name="mutu">
                <option>-- Pilih Mutu --</option>
                <option value='A'>A </option>
                <option value='B'>B</option>
                <option value='C'>C</option>
                <option value='D'>D</option>
            </select>
            <?php echo form_error('mutu', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <!-- <div class="form-group">
            <label>Keterangan<i style="color:red"></i></label>
            <select class="form-control" id='keterangan'name="keterangan">
                <option>-- Pilih Ketarangan --</option>
                <option value='Sangat Baik'>Sangat Baik </option>
                <option value='Cukup Baik'>Cukup Baik</option>
                <option value='Baik'>Baik</option>
                <option value='Kurang Baik'>Kurang Baik</option>
            </select>
            <?php echo form_error('keterangan', '<div class="text-danger small ml-3">','</div>') ?>
        </div> -->
            
        <div class="form-group">
                <label>Keterangan<i style="color:red"></i></label>
                <input type="text" step="0.01" id='keterangan' name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                <?php echo form_error('batas_akhir', '<div class="text-danger small" ml-3></div>') ?>
        </div>

            <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Batal</button>
        </form>
        <?php form_close(); ?>
    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>

<script>
$("#batas_awal").on("keyup", function() {
  var valid = /^\d{0,15}(\.\d{0,2})?$/.test(this.value),
    val = this.value;

  if (!valid) {
    console.log("Invalid input!");
    this.value = val.substring(0, val.length - 1);
  }
});

$("#batas_akhir").on("keyup", function() {
  var valid = /^\d{0,15}(\.\d{0,2})?$/.test(this.value),
    val = this.value;

  if (!valid) {
    console.log("Invalid input!");
    this.value = val.substring(0, val.length - 1);
  }
});
</script>