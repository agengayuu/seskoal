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
                                        <th>Nim</th>
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
                                <?php
                                    $no=1;
                                    foreach($hasil as $d) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>                              
                                            <td><?php echo $d->nama; ?></td>   
                                            <td><?php echo $d->nim; ?></td>                             
                                            <td><?php echo $d->nama_mata_kuliah; ?></td>                                                          
                                            <td><?php echo date('d-m-Y',strtotime($d->tanggal_ujian)); ?></td>
                                            <td><?php echo date('H:i:s',strtotime($d->jam_ujian)); ?></td>
                                            <td>
                                                <?php
                                                if($d->benar == ''){
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                                }else {
                                                    echo $d->benar;
                                                }
                                                ?>
                                            </td>                                
                                            <td>
                                                <?php
                                                if($d->salah == ''){
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                                }else {
                                                    echo $d->salah;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($d->nilai == ''){
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                                }else {
                                                    echo $d->nilai;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($d->nilai == ''){
                                                    echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                                }else {
                                                    echo "<a href='".'hasil_ujian/cetak/'."$d->id_peserta' class='btn btn-xs btn-success' title='Cetak Hasil Ujian' target='_blank'><span class='fa fa-print'></span></a>";;
                                                }
                                                ?>
                                            </td> 
                                        </tr>
                                    <?php } ?> 
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