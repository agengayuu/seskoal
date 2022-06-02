<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
           <i class="fas fa-user"></i> Mahasiswa
        </div>
    </div>

    <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()"><i class="fas fa-arrow-left"></i> Kembali</button>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                        $no =  1;
                        foreach ($siswa as $s) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $s->nim ?></td>
                            <td><?= $s->nama ?></td>
                            <td><?= $s->jenis_kelamin ?></td>
                            <td><?= $s->agama ?></td>
                            <td><?= date('d-m-Y', strtotime($s->tgl_lahir)); ?></td>
                            
                            <td> <?php echo anchor('mahasiswa_d/detail/'.$s->nim, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Lihat Data</div>' ) ?>
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