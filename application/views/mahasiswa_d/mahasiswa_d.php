<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            <h4>Mahasiswa per Diklat</h4>
            <span>Data Mahasiswa akan ditampilkan berupa data per Diklat.</span>
        </div>
</div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa per Diklat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Diklat</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no =1;
                        foreach ($mahasiswa_d as $md) : ?>

                        <tr  style="text-align: center;">
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $md->nama_diklat ?>
                            
                            <td width="180px"> <?php echo anchor('mahasiswa_d/adminedit/'.$md->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat Data</div>' ) ?></td>
                            </td>
                        </tr>
                            <?php
                            endforeach
                            ?>
                        
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>