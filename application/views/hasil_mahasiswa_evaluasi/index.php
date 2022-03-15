<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Hasil Test Evaluasi</span>
        </div>
    </div>

    <?php echo anchor('soal_evaluasi_ujian/matakuliah', '<button class="btn btn-sm btn-info mb-3 " ><i class="fas fa-print"></i> Data Mata Kuliah</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Test Evaluasi</h6>
        </div>

            <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Mata Kuliah</th>
                                        <th>Tanggal Ujian</th>
                                        <th>Jam Ujian</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Nilai</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php
                                    $no =1;
                                    foreach ($mahasiswa_d as $md) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $md->nama_diklat ?>
                                            <td><?php echo date('d-m-Y',strtotime($d->tanggal_ujian)); ?></td>
                                            <td><?php echo date('H:i:s',strtotime($d->jam_ujian)); ?></td>

                                            
                                            <td width="180px"> <?php echo anchor('mahasiswa_d/lm/'.$md->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat Data</div>' ) ?></td>
                                            </td>
                                        </tr>
                                            <?php
                                        endforeach
                                        ?> -->
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