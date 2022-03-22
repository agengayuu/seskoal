<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Penilaian Mahasiswa</span>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Diklat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($penilaian_d as $pd) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $pd->nama_diklat ?>
                                            
                                            <td width="180px"> <?php echo anchor('penilaian_d/lm/'.$pd->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Selanjutnya</div>' ) ?></td>
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