<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Hasil Evaluasi Mahasiswa</span>
        </div>
    </div>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Evaluasi</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Jam Ujian</th>
                                    <th>Benar</th>
                                    <th>Salah</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (count($mahasiswa) > 0) {
                                    foreach ($mahasiswa as $md) :
                                ?>
                                        <tr style="text-align:center">
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $md->nama_mata_kuliah ?>
                                            <td><?php echo date('d-m-Y', strtotime($md->waktu_evaluasi_mulai)); ?></td>
                                            <td><?php echo date('H:i:s', strtotime($md->waktu_evaluasi_mulai)); ?></td>
                                            <td>
                                                <?php
                                                if ($md->benar == '') {
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Test Evaluasi</span>";
                                                } else {
                                                    echo $md->benar;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($md->salah == '') {
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Test Evaluasi</span>";
                                                } else {
                                                    echo $md->salah;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($md->nilai == '') {
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Test Evaluasi</span>";
                                                } else {
                                                    echo $md->nilai;
                                                }
                                                ?>
                                            </td>

                                            <!-- <td width="180px"> <?php echo anchor('mahasiswa_d/lm/' . $md->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat Data</div>') ?></td> -->
                                        </tr>
                                    <?php
                                    endforeach;
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</div>