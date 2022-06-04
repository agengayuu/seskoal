<title><?= $title ;?></title>

<?php
date_default_timezone_set('Asia/Jakarta');
?>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Daftar Jadwal Tes Evaluasi</span>
        </div>
    </div>

    <?php echo anchor('jadwal_mahasiswa_evaluasi/getselesaites', '<button class="btn btn-sm btn-success mb-3">Daftar Selesai Tes</button>') ?>
    <?php echo anchor('jadwal_mahasiswa_evaluasi/getdaftarmatkul', '<button class="btn btn-sm btn-success mb-3">Daftar Mata Kuliah</button>') ?>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h3 class="box-title"><?php 
            function tanggal_indonesia($tanggal){
                $bulan = array (
                    1 =>   	'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                    );
                
                    $var = explode('-', $tanggal);
                
                    return $var[2] . ' ' . $bulan[ (int)$var[1] ] . ' ' . $var[0];
                    // var 0 = tanggal
                    // var 1 = bulan
                    // var 2 = tahun
                }
        echo tanggal_indonesia(date('Y-m-d')) ?> | <span id="clock"></span></h3>
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Tes Evaluasi</h6>
        </div>

            <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paket Evaluasi</th>
                                        <th>Mata Kuliah</th>
                                        <th>Waktu Ujian</th>
                                        <th>Waktu Selesai</th>
                                        <th>Durasi</th>
                                        <th>Status</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($mulai as $mhs) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?php echo $mhs->nama_paket_evaluasi; ?></td>
                                            <td><?php echo $mhs->nama_mata_kuliah; ?></td>
                                            <td><?= Date('d-m-Y H:i:s', strtotime($mhs->waktu_evaluasi_mulai)); ?></td>
                                            <td><?= Date('d-m-Y H:i:s', strtotime($mhs->waktu_evaluasi_selesai)); ?></td>
                                            <td><?php echo $mhs->durasi_ujian; ?> Menit</td>
                                            <td>
                                            <?php 
                                                $time = (Date('d-m-Y H:i:s'));
                                                $mulai = (Date('d-m-Y H:i:s', strtotime($mhs->waktu_evaluasi_mulai)));
                                                $selesai = (Date('d-m-Y H:i:s', strtotime($mhs->waktu_evaluasi_selesai)));
                                            ?>
                                                <?php if ($mhs->status_ujian == 0) {
                                                    echo "<span> Belum Mulai Ujian </span>";
                                                    } else if ($mhs->status_ujian == 1) {
                                                        if ($mhs->status_ujian == 1) {
                                                            if ($time >= $mulai && $time <= $selesai) {
                                                                echo "<a href='" . 'evaluasi_test/soal/' . "$mhs->id_paket_evaluasi' class='btn btn-xs btn-success';'>Mulai Ujian</a>";
                                                            } elseif ($time > $selesai) {
                                                                echo "Waktu Habis";
                                                            } elseif ($time < $mulai) {
                                                                echo "Tunggu Waktu Ujian";
                                                            }
                                                        }
                                                    }
                                                ?>
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
        </div>
    </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
</div>

<script>
    setInterval(customClock, 500);
    
    function customClock() {
        var time = new Date();
        var hrs = checkTime(time.getHours());
        var min = checkTime(time.getMinutes());
        var sec = checkTime(time.getSeconds());
        document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;  
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);

</script>