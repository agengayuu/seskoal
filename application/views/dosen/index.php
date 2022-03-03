<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Dosen
        </div>
</div>
    

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('dosen/admintambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Kuliah</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    
                        <?php
                        $no =1;
                        foreach ($dosen as $d) : ?>

                        <tr style="text-align: center;">
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $d->nip ?></td>
                            <td><?= $d->nama ?></td>
                            <td><?= $d->email ?></td>
                            <td><?= $d->no_tlp ?></td>
                            <center>
                            <td width="15px"> <?php echo anchor('matakuliah/adminedit/'.$m->kode_mata_kuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?></td>
                            <td width="15px"> <?php echo anchor('matakuliah/adminhapus/'.$m->kode_mata_kuliah, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                            </center>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>