<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-eye"></i> List Paket Evaluasi</span>
        </div>
    </div>

    <button type="button" class="btn btn-danger mb-4" onclick="history.back()"><i class="fa fa-arrow-left"></i> Kembali</button>

    <!--table-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Paket Evaluasi</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2"><b>Diklat</b> <b><?php echo ": " . $nama_diklat; ?></b></label><br />
                            <label class="control-label col-md-2"><b>Tahun Akademik</b> <b><?php echo ": " . $tahun_akademik[0]['tahun_akademik']; ?></b></label><br />
                            <label class="control-label col-md-2"><b>Matakuliah </b> <b><?php echo ": " . $nama_mata_kuliah[0]['nama_mata_kuliah']; ?></b></label><br />
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered id=" dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket Evaluasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($paket_evaluasi as $pe) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $pe->nama_paket_evaluasi ?></td>

                                        <td width="180px"> <?php echo anchor('penilaian_thn/listmahasiswa/' . $idnya . '/' . $tahun_akademik2 . '/' . $nama_mata_kuliah2 . '/' . $pe->id_paket_evaluasi, '<div class="btn btn-sm btn-primary"> List Mahasiswa <i class="fa fa-arrow-right"></i></div>') ?></td>
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
    <!--end table-->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>