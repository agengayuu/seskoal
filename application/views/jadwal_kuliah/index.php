<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Jadwal Kuliah
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('jadwal_kuliah/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal Kuliah</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Kuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th width="50px">Nama Diklat</th>
                                    <th width="50px">Mata Kuliah</th>
                                    <th width="50px">Nama Dosen</th>
                                    <!-- <th width="50px">Kode</th> -->
                                    <th width="50px">Tanggal</th>
                                    <th width="50px">Waktu</th>
                                    <th width="50px">Jam Pelajaran ke</th>
                                    <th width="50px">Tema</th>
                                    <th width="50px">Ruangan</th>
                                    <th width="50px">Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwal as $jdw) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $jdw->nama_diklat ?></td>
                                        <td><?= $jdw->nama_mata_kuliah ?></td>
                                        <td><?= $jdw->nama ?></td>
                                        <!-- <td><?= $jdw->kode_jadwal ?></td> -->
                                        <td><?= $jdw->tanggal ?></td>
                                        <td><?= $jdw->waktu_mulai ?></td>
                                        <td><?= $jdw->jam_pelajaran_ke ?></td>
                                        <td><?= $jdw->tema ?></td>
                                        <td><?= $jdw->nama_ruang ?></td>
                                        <td><?= $jdw->keterangan ?></td>

                                        <td width="20px"> <?php echo anchor('jadwal_kuliah/adminedit/' . $jdw->id_jadwal_kuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                                            <?php echo anchor('jadwal_kuliah/hapus/' . $jdw->id_jadwal_kuliah, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
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
    </div>
</div>