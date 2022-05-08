<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> Matakuliah Dosen
        </div>
    </div>
    
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matakuliah Dosen</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <!-- <th>Nama Diklat</th> -->
                                    <th>Mata Kuliah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($matakuliah as $mk) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <!-- <td><?= $mk['nama_diklat'] ?></td> -->
                                        <td><?= $mk['nama_mata_kuliah'] ?></td>    
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