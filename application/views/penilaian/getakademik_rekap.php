<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tahun Akademik
        </div>
</div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- <?php echo anchor('tahun_akademik/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tahun Akademik</button>') ?> -->

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahun Akademik</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Tahun Akademik</th>
                                    <th >Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no =1;
                                foreach ($akademik as $a) : ?>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $a->tahun_akademik ?></td>
                                        <td><?= $a->semester ?></td>
                                        <td>
                                        <?php echo anchor('penilaian/getrekap_mhs/'.$a->id_akademik . '/' . $diklat->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-right"></i></div>' ) ?> 
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