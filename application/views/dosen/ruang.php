<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        Ruangan
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('dosen/ruang/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Ruangan</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ruang ID</th>
                            <th>Nama Ruang</th>
                            <th>Jenis Ruang</th>
                            <th>Kapasitas</th>
                            <th>Lantai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no =1;
                        foreach ($ruang as $rgn) : ?>

                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $rgn->id_ruang ?></td>
                            <td><?php echo $rgn->nama_ruang ?></td>
                            <td><?php echo $rgn->id_jenis_ruang ?></td>
                            <td><?php echo $rgn->kapasitas ?></td>
                            <td><?php echo $rgn->lantai ?></td>
                            <td><?php echo $rgn->keterangan ?></td>
                            <td width="20px"> <?php echo anchor('dosen/ruang/update/'.$rgn->id_ruang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?></td>
                            <td width="20px"> <?php echo anchor('dosen/ruang/delete/'.$id_ruang, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                        </tr>
                            <?php
                            endforeach
                            ?>
                        ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>