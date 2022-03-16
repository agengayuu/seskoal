<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Daftar Mahasiswa Evaluasi
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>


    <?php echo anchor('peserta_evaluasi/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Evaluasi</button>') ?>


    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa Evaluasi</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Diklat</th>
                            <th>Mata Kuliah</th>
                            <th>Waktu Ujian</th>
                            <th>Durasi</th>
                            <th>Aksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =  1;
                        foreach ($peserta as $p) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $p->nama ?></td>
                            <td><?= $p->nama_diklat ?></td>
                            <td><?= $p->nama_mata_kuliah ?></td>
                            <td><?php echo date('d-m-Y', strtotime($p->tanggal_ujian)); ?> | <?php echo $p->jam_ujian; ?></td>
                            <td><?= $p->durasi_ujian ?></td>
                            <td>
                                <?php if ($p->nilai == null) { ?>
                                    <?php echo anchor('peserta_evaluasi/update/'.$p->id_evaluasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                    <?php echo anchor('peserta_evaluasi/delete/'.$p->id_evaluasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
                                <?php } else {
                                        echo '-';
                                    }
                                        ?>
                            </td>
                            <td>
                                <?php if ($p->status_ujian == "1") {
                                    echo "<span class='btn btn-xs btn-warning'> Belum Ujian </span>";
                                } else if ($p->status_ujian == "2") {
                                    echo "<span class='btn btn-xs btn-info'> Selesai Ujian </span>";
                                }
                                ?>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>