<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
           Daftar Mata Kuliah
        </div>
</div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mata Kuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Nama Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach ($getmatkul as $m) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $m->nama_mata_kuliah ?></td>
                            <td><?= $m->nama ?></td>
                            <td>
                            <center>
                                <?php echo anchor('hasil_evaluasi_mahasiswa/daftarpaket/'.$m->id_mata_kuliah, '<div class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-right"></i></div>' ) ?>
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