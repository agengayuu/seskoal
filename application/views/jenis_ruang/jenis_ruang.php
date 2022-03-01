<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        Jenis Ruangan
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('jenis_ruang/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Ruangan</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruang</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no =1;
                        foreach ($jenis_ruang as $jr) : ?>

                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $jr->nama_jenis_ruang ?></td>
                            <td width="20px"> <?php echo anchor('jenis_ruang/update/'.$jr->id_jenis_ruang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?></td>
                            <td width="20px"> <?php echo anchor('jenis_ruang/delete/'.$jr->id_jenis_ruang, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                        </tr>
                            <?php
                            endforeach
                            ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>