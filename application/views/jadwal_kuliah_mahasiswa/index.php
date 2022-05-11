<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Jadwal Kuliah
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jadwal Kuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <?php foreach($tahunakademik as $ta): ?>
                        <tbody>
                            <tr>
                                <th width="200">Tahun Akademik</th>
                                <td><?= $ta['tahun_akademik']; ?></td>      
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><?= $ta['semester'] ?></td>      
                            </tr>
                    <?php endforeach; ?>
                        </tbody>
                </table>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <!-- <th>Nama Diklat</th> -->
                                    <th>Mata Kuliah</th>
                                    <th>Nama Dosen</th>
                                    <!-- <th width="50px">Kode</th> -->
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>JP ke</th>
                                    <th>Tema</th>
                                    <th>Ruangan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; 
                                foreach ($jadwal as $jdw) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <!-- <td><?= $jdw['nama_diklat'] ?></td> -->
                                        <td><?= $jdw['nama_mata_kuliah'] ?></td>
                                        <td><?= $jdw['nama'] ?></td>   
                                        <!-- <td><?= $jdw['tanggal'] ?></td> -->
                                        <td><?php $hari = $jdw['tanggal'];
                                            $ubah = date('l', strtotime($hari));

                                            switch ($ubah) {
                                            case "Sunday":
                                                echo "Minggu";
                                                break;
                                            case "Monday":
                                                echo "Senin";
                                                break;
                                            case "Tuesday":
                                                echo "Selasa";
                                                break;
                                            case "Wednesday":
                                                echo "Rabu";
                                                break;
                                            case "Thursday":
                                                echo "Kamis";
                                                break;
                                            case "Friday":
                                                echo "Jumat";
                                                break;
                                            case "Saturday":
                                                echo "Sabtu";
                                                break;
                                            }
                                        ?></td>
                                        <td><?= $jdw['waktu_mulai'] ?> - <?=  $jdw['waktu_selesai'] ?></td>
                                        <td><?= $jdw['jam_pelajaran_ke']?></td>
                                        <td><?= $jdw['tema'] ?></td>
                                        <td><?= $jdw['nama_ruang'] ?></td>
                                        <td><?= $jdw['keterangan']?></td>
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