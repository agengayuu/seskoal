<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-eye"></i> Detail Daftar Matakuliah</span>
        </div>
    </div>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Paket Evaluasi</h6>
        </div>

            <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-8"><b>Kode Matakuliah</b> <b><?php echo ": ".$kode_mata_kuliah; ?></b></label><br />
                                        <label class="control-label col-md-8"><b>Nama Matakuliah</b> <b><?php echo ": ".$tt; ?></b></label><br />
                                        <label class="control-label col-md-8"><b>Bobot</b> <b><?php echo ": ".$sks; ?></b></label><br />
                                        <label class="control-label col-md-8"><b>Keterangan</b> <b><?php echo ": ".$keterangan; ?></b></label>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo anchor('daftar_matakuliah/input/'.$id_mata_kuliah, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Paket Evaluasi</button>') ?>
                            
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Tanggal Waktu Mulai</th>
                                        <th>Tanggal Waktu Selesai</th>
                                        <th>Durasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($paket_evaluasi as $pe) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?= $pe->nama_paket_evaluasi ?></td>
                                            <td><?= $pe->nama_paket_evaluasi ?></td>
                                            <td><?= $pe->nama_paket_evaluasi ?></td>
                                            <td><?= $pe->nama_paket_evaluasi ?></td>
                                            
                                            <td width="100px"> <?php echo anchor('paket_evaluasi/update/'.$pe->id_paket_evaluasi, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</div>' ) ?>
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