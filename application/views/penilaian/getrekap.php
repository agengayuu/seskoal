
<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
           Rekapitulasi 
        </div>
    </div>


    <?php echo $this->session->flashdata('pesan') ?>

     
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rekapitulasi mahasiswa</h6>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama Mahasiswa</th>
                            <th>Angkatan</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =  1;
                        foreach ($mhs as $m) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?= $m->nim ?></td>
                                <td><?= $m->nama ?></td>
                                <td><?= $m->angkatan ?></td>
                                <td><?= $m->tahun_masuk ?></td>

                                <td> <?php echo anchor('penilaian/rekap/' . $m->nim, '<div class="btn btn-sm btn-warning"><i class="fa fa-print"></i></div>') ?>
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