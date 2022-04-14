<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
        <i class="fas fa-fw fa-calendar-alt"></i> Daftar Matakuliah
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Matakuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <!-- <th>Keterangan</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftar_matakuliah as $dmk) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $dmk['kode_mata_kuliah'] ?></td>
                                        <td><?= $dmk['nama_mata_kuliah'] ?></td>    
                                        <td><?= $dmk['sks']?></td>
                                        <!-- <td><?= $dmk['keterangan']?></td> -->
                                        <td width="180px"> <?php echo anchor('daftar_matakuliah/lpe/'.$dmk['id_mata_kuliah'], '<div class="btn btn-sm btn-warning"> Detail <i class="fa fa-eye"></i></div>' ) ?></td>
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