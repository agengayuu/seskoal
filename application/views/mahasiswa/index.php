
<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Mahasiswa
        </div>
    </div>


    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('mahasiswa/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>') ?>
    <?php echo anchor('mahasiswa/CSV', '<button class="btn btn-sm btn-warning mb-3"><i class="fas fa-plus fa-sm"></i> Import CSV</button>') ?>

    <!--table -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>

        <div class="dropdown inline">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-download">Export</i>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo base_url('mahasiswa/ex_pdf') ?>"> PDF</a></li>
                <li><a href="<?php echo base_url('mahasiswa/excel') ?>"> Excel</a></li>
            </ul>
        </div> -->


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nama Diklat</th>
                            <th>Angkatan</th>
                            <th>Tahun Masuk</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =  1;
                        foreach ($siswa as $s) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?= $s->nim ?></td>
                                <td><?= $s->nama ?></td>
                                <td><?= $s->nama_diklat ?></td>
                                <td><?= $s->angkatan ?></td>
                                <td><?= $s->tahun_masuk ?></td>
                                <td><?= $s->email ?></td>

                                <td> <?php echo anchor('mahasiswa/admindetail/' . $s->nim, '<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></div>') ?>
                                    <?php echo anchor('mahasiswa/adminedit/' . $s->nim, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                                    <?php echo anchor('mahasiswa/adminhapus/' . $s->nim, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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