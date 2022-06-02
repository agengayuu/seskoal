<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Mata Kuliah
        </div>
</div>
    

    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo validation_errors(); ?>

    <?php echo anchor('matakuliah/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Kuliah</button>') ?>
    <?php echo anchor('matakuliah/thn_akademik', '<button class="btn btn-sm btn-success mb-3">Daftar Mata Kuliah</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Diklat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach ($matakuliah as $m) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $m->kode_mata_kuliah ?></td>
                            <td><?= $m->nama_mata_kuliah ?></td>
                            <td><?= $m->nama ?></td>
                            <td><?= $m->nama_diklat ?></td>
                            <td> <?php echo anchor('matakuliah/adminedit/'.$m->id_mata_kuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                            <a onclick="return confirm('Apa anda yakin menghapus data ini?')"
                            href="<?= base_url('matakuliah/adminhapus/').$m->id_mata_kuliah?>"
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></a></div>                        
                            </td>
                        </tr>
                                <?php
                            endforeach
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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