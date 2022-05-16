<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span><i class="fa fa-eye"></i> Detail Daftar Matakuliah</span>
        </div>
    </div>

    <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()"><i class="fas fa-arrow-left"></i> Kembali</button>
    
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
                                        <!-- <label class="control-label col-md-8"><b>SKS</b> <b><?php echo ": ".$sks; ?></b></label><br /> -->
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
                                        <th>Status</th>
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
                                            <td><?= $pe->waktu_evaluasi_mulai ?></td>
                                            <td><?= $pe->waktu_evaluasi_selesai ?></td>
                                            <td><?= $pe->durasi_ujian ?></td>
                                            <td>
                                                <?php if ($pe->status_ujian == "1") {
                                                    echo "<span style='color:red'> Belum Ujian </span>";
                                                } else if ($pe->status_ujian == "2") {
                                                    echo "<span class='btn btn-xs btn-info'> Selesai Ujian </span>";
                                                }
                                                ?>
                                            </td>
                                            
                                            <td width="100px">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php echo anchor('daftar_matakuliah/detail/'.$pe->id_paket_evaluasi.'/'.$pe->id_mata_kuliah, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>' ) ?>
                                                    <?php echo anchor('daftar_matakuliah/update/'.$pe->id_paket_evaluasi.'/'.$pe->id_mata_kuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                                    <?php echo anchor('daftar_matakuliah/delete/'.$pe->id_paket_evaluasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
                                                </div>
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