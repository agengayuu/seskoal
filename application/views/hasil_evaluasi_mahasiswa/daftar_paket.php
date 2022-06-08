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
        <table class="table table-bordered" width="100%" cellspacing="0">
                    <?php foreach($mhs as $m): ?>
                        <tbody>
                            <tr>
                                <th width="200">Nama</th>
                                <td><?= $m->nama; ?></td>      
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td><?= $m->nim; ?></td>      
                            </tr>
                    <?php endforeach; ?>
                        </tbody>
                </table>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Nama Paket</th>
                            <th>Benar</th>
                            <th>Salah</th>
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
                            <td><?= $p->nama_mata_kuliah ?></td>
                            <td><?= $p->nama_paket_evaluasi ?></td>
                            <td>
	                                    <?php
	                                    if($p->benar == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $p->benar;
	                                    }
	                                    ?>
	                                </td>                                
	                                <td>
	                                    <?php
	                                    if($p->salah == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $p->salah ;
	                                    }
	                                    ?>
	                                </td>
	                                <td>
	                                    <?php
	                                    if($p->nilai == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $p->nilai;
	                                    }
	                                    ?>
	                                </td>
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