<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
        <i class="fas fa-fw fa-calendar-alt"></i> Jadwal Kuliah
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

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
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Nama Diklat</th>
                                    <th>Mata Kuliah</th>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>JP ke</th>
                                    <th>Tema</th>
                                    <th>Ruangan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwal as $jdw) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $jdw['nama_diklat'] ?></td>
                                        <td><?= $jdw['nama_mata_kuliah'] ?></td>    
                                        <!-- <td><?= $jdw['tanggal'] ?></td> -->
                                        <td><?php echo date('l', strtotime($jdw['tanggal'])); ?></td>
                                        <td><?= $jdw['waktu_mulai'] ?> - <?=  $jdw['waktu_selesai'] ?></td>
                                        <td><?= $jdw['jam_pelajaran_ke']?></td>
                                        <td><?= $jdw['tema'] ?></td>
                                        <td><?= $jdw['nama_ruang'] ?></td>
                                        <td><?= $jdw['keterangan']?></td>
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