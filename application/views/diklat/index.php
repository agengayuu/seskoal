<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Diklat
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('diklat/admintambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Diklat</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Diklat</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Diklat</th>
                                    <th style="text-align:center"width = "40%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no =1;
                                foreach ($diklatnya as $d) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $d->nama_diklat ?></td>
                                        <td style="text-align:center" width="20px"> 
                                        <?php echo anchor('diklat/getmhs/'.$d->id_diklat, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>' ) ?> 
                                        <?php echo anchor('diklat/adminedit/'.$d->id_diklat, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                        <?php echo anchor('diklat/adminhapus/'.$d->id_diklat, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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