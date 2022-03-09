<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Hak Akses
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('hak_akses/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Menu</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hak Akses</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1; 
                        foreach ($role as $r) : ?>
                            <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $r->nama?></td>
                            <td width="20px">
                            <?php echo anchor('hak_akses/akses/'.$r->id_grup_user, '<div class="btn btn-sm btn-warning"><i class="fa fa-list"></i></div>' ) ?>
                             <?php echo anchor('hak_akses/edit/'.$r->id_grup_user, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                             <?php echo anchor('hak_akses/hapus/'.$r->id_grup_user, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
                             
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