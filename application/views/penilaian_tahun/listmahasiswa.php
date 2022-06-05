<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-eye"></i> List Mahasiswa</span>
        </div>
    </div>

    <button type="button" class="btn btn-danger mb-4" onclick="history.back()"><i class="fa fa-arrow-left"></i> Kembali</button>

    <!--table-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi List Mahasiswa</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2"><b>Diklat</b> <b><?php echo ": " . $nama_diklat; ?></b></label><br />
                            <label class="control-label col-md-2"><b>Tahun Akademik</b> <b><?php echo ": " . $tahun_akademik[0]['tahun_akademik']; ?></b></label><br />
                            <label class="control-label col-md-2"><b>Matakuliah </b> <b><?php echo ": " . $nama_mata_kuliah[0]['nama_mata_kuliah']; ?></b></label><br />
                            <label class="control-label col-md-2"><b>Paket Evaluasi </b> <b><?php echo ": " . $nama_paket_evaluasi[0]['nama_paket_evaluasi']; ?></b></label><br />
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
                                $no = 1;
                                foreach ($hasil_mahasiswa as $hm) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $hm->nim ?></td>
                                        <td><?= $hm->nama ?></td>
                                        <td></td>
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
    <!--table end-->

</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>