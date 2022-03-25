<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Dosen
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>
    <!-- <?php echo form_open_multipart('dosen/adminsimpan'); ?> -->

    <?php echo anchor('dosen/admintambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Dosen</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dosen</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width = "5px%" >No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th><centerAksi</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        foreach ($dosen as $d) : ?>

                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $d->nip ?></td>
                            <td><?= $d->gelar_depan ?> <?= $d->nama ?> <?= $d->gelar_belakang ?> </td>
                            <td><?= $d->email ?></td>
                            
                            <td> 
                                <center>
                                <?php echo anchor('dosen/admindetail/'.$d->id_dosen, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>' ) ?> 
                                <?php echo anchor('dosen/adminedit/'.$d->id_dosen, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                <?php echo anchor('dosen/adminhapus/'.$d->id_dosen, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
                                </center>
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