<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Mahasiswa
        </div>
</div>
    

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('mahasiswa/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama Mahasiswa</th>
                            <th>Angkatan</th>
                            <th>Tahun Masuk</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no =1;
                        foreach ($siswa as $s) : ?>

                        <tr style="text-align: center;">
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $s->nim ?></td>
                            <td><?= $s->nama ?></td>
                            <td><?= $s->angkatan ?></td>
                            <td><?= $s->tahun_masuk ?></td>
                            <td><?= $s->jabatan ?></td>
                            <td><?= $s->email ?></td>
                            <center>
                            <td width="20px"> <?php echo anchor('mahasiswa/adminedit/'.$s->nim, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?></td>
                            <td width="20px"> <?php echo anchor('mahasiswa/adminhapus/'.$s->nim, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                            </center>
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