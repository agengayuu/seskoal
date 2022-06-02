<div class="container-fluid">
     <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Tambah Ruangan</span>
        </div>
    </div>
<?php echo $this->session->flashdata('pesan') ?>
<?php echo validation_errors(); ?>

<!-- Fungsi ini akan membuat atribut tambahan berupa 
enctype=”multipart/form-data” pada form pembuka yang mengizinkan 
kita untuk mengunggah berkas. -->
<?php echo form_open_multipart('ruang/simpan'); ?>  


    <div class="card-header bg-white">
    <h4 class="h5 align-middle m-0 font-weight-bold text-primary"></h4>
        <div class="card-body">

    <!-- Form -->
    <form method="post" action="<?php echo base_url('ruang/simpan') ?>">
        <div class="form-group">
            <label>Nama Ruang<i style="color:red">*</i></label>
            <input type="text" name="nama_ruang" placeholder="Masukkan Nama Ruang" class="form-control">
            <?php echo form_error('nama_ruang', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Jenis Ruang<i style="color:red">*</i></label>
                <select class="form-control" name='id_jenis_ruang' id='id_jenis_ruang'>
                    <option value='0' selected>--- Pilih Jenis Ruangan ---</option>
                    <?php foreach ($jenis_ruang as $jr) { ?>
                    <option value="<?php echo $jr->id_jenis_ruang; ?>"><?php echo $jr->nama_jenis_ruang; ?></option>
                    <?php } ?>
		        </select>
            <?php echo form_error('id_jenis_ruang', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Kapasitas<i style="color:red">*</i></label>
            <input type="text" name="kapasitas" placeholder="Masukkan Kapasitas" class="form-control">
            <?php echo form_error('kapasitas', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Gedung<i style="color:red">*</i></label>
            <input type="text" name="gedung" placeholder="Masukkan Gedung" class="form-control">
            <?php echo form_error('gedung', '<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Lantai<i style="color:red">*</i></label>
            <input type="text" name="lantai" placeholder="Masukkan Lantai" class="form-control">
            <?php echo form_error('lantai', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        
        <div class="form-group">
            <label>Keterangan<i style="color:red">*</i></label>
            <textarea class="form-control" name="keterangan" rows="3"></textarea>
            <?php echo form_error('keterangan', '<div class="text-danger small ml-3">','</div>') ?>
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

<script type="text/javascript">
 $(document).ready(function() {
     $('#id_jenis_ruang').select2();
 });
</script>

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
</script>