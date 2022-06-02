<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profil Mahasiswa 
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('profil_mahasiswa/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah Profil Mahasiswa</button>') ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Profil Mahasiswa</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                            $no =1;
                            foreach ($profil_mahasiswa as $p) : ?>

                            <tr>
                                <td width="20px" style="text-align: center;"><?php echo $no++ ?></td>
                                <td><?= $p->nim ?></td>
                                <td ><?= $p->nama ?></td>
                                <td><?= $p->jenis_kelamin ?></td>
                                <td ><?= $p->agama ?></td>
                                <td style="text-align: center;"><?= $p->tgl_lahir ?></td>
                                <center>
                                <td> <?php echo anchor('profil_mahasiswa/detail/'.$p->id_mahasiswa, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>' ) ?> <?php echo anchor('profil_mahasiswa/edit/'.$p->id_mahasiswa, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?> <?php echo anchor('profil_mahasiswa/delete/'.$p->id_mahasiswa, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                                </center>
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

</div>  