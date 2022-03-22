<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-plus"></i> Angkatan Masuk</span>
        </div>
    </div>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>
        </div>

            <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2"><b>Diklat</b> <b><?php echo ": ".$nama_diklat; ?></b></label><br />
                                        <label class="control-label col-md-2"><b>Tahun Masuk</b> <b><?php echo ": ".$tahun_masuknya; ?></b></label><br />
                                        <label class="control-label col-md-2"><b>Angkatan</b> <b><?php echo ": ".$angkatannya; ?></b></label>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="20px">1</td>
                                    <td>Nilai Senam Pagi</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/senamnilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-primary">
                                                    Input Nilai &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20px">2</td>
                                    <td>Nilai Per Materi</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/permaterinilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-primary">
                                                    Input Nilai &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20px">3</td>
                                    <td>Nilai Perseorangan</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/perseorangannilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-primary">
                                                    Input Nilai &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20px">4</td>
                                    <td>Nilai Kepribadian</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/kepribadiannilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-primary">
                                                    Input Nilai &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20px">5</td>
                                    <td>Nilai Jasmani</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/jasmaninilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-primary">
                                                    Input Nilai &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20px">6</td>
                                    <td>Rekap Nilai</td>
                                    <td>
                                        <center>
                                                <a href="<?php echo base_url('penilaian_dosen/akademiknilai/' .$idnya.'/'. $tahun_masuknya . '/'.$angkatannya); ?>" class="btn btn-info">
                                                    Lihat Rekap &nbsp;<i class="fa fa-arrow-right"></i>
                                                </a>
                                        </center>
                                    </td>
                                </tr>
                                    <!-- <?php
                                    $no =1;
                                    foreach ($angkatan as $ak) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $ak->tahun_masuk ?>
                                            
                                            <td width="180px"> <?php echo anchor('penilaian_dosen/angkatanmasuk/' .$idnya.'/'. $ak->tahun_masuk . '/'.$ak->angkatan, '<div class="btn btn-sm btn-primary"> List Kategori Penilaian <i class="fa fa-arrow-right"></i></div>' ) ?></td>
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