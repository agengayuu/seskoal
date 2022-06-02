<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
           Daftar Hasil Tes Evaluasi
        </div>
</div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Tes Evaluasi</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Nilai</th>
                            <th>Mutu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach ($getpaket as $p) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $p->nama_paket_evaluasi ?></td>
                            <td><?= $p->nilai ?></td>
                            <td><?= $p->mutu ?></td>
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