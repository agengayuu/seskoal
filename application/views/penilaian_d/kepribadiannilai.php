<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-plus"></i> Penilaian Mahasiswa</span>
        </div>
    </div>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penilaian Jasmani</h6>
        </div>

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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($penilaian_d as $pd) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $pd->nim ?>
                                            <td><?= $pd->nama ?>
                                            
                                            <td width="180px"> <?php echo anchor('penilaian_dosen/isijasmani/'.$idnya.'/'.$tahun_masuknya.'/'.$angkatannya.'/'.$pd->nim, '<div class="btn btn-sm btn-primary"> Isi/Update Nilai <i class="fa fa-arrow-right"></i></div>' ) ?></td>
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
        </div>
    </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
</div>