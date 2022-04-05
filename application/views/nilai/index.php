<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Nilai
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('nilai/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Nilai</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nilai</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr> 
                            <th style = "text-align:center" >No</th>
                            <th style = "text-align:center">Batas Awal</th>
                            <th style = "text-align:center">Batas Akhir</th>
                            <th style = "text-align:center">Mutu</th>
                            <th style = "text-align:center">Keterangan</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        foreach ($nilai as $n) : ?>
                            <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td style = "text-align:center"><?= $n->batas_awal?></td>
                            <td style = "text-align:center"><?= $n->batas_akhir?></td>
                            <td style = "text-align:center"><?= $n->mutu?></td>
                            <td style = "text-align:center"><?= $n->keterangan 
                                                            //     if ($n->mutu == 'A'){
                                                            //     echo"Sangat Baik"; 
                                                            //     }elseif ($n->mutu == 'B'){
                                                            //         echo"Cukup Baik";
                                                            //     }elseif ($n->mutu == 'C'){
                                                            //         echo"Baik";
                                                            //     } else{
                                                            //         echo "Kurang Baik";
                                                            //     } 
                                                             ?>
                            </td>
                            <td width="20px"> <?php echo anchor('nilai/edit/'.$n->id_nilai, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                            <?php echo anchor('nilai/hapus/'.$n->id_nilai, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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