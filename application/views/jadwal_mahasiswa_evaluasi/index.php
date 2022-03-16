<title><?= $title ;?></title>

<?php
date_default_timezone_set('Asia/Jakarta');
?>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Jadwal Test Evaluasi</span>
        </div>
    </div>


    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h3 class="box-title"><?php print Date('d F Y'); ?> | <span id="time"> </h3>
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Test Evaluasi</h6>
        </div>

            <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Mata Kuliah</th>
                                        <th>Waktu Ujian</th>
                                        <th>Durasi</th>
                                        <th>Status</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <tr>
                                            <td width="20px"><?php echo $no++ ?></td>
                                            <td><?php echo $mhs->kode_mata_kuliah; ?></td>
                                            <td><?php echo $mhs->nama_mata_kuliah; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($mhs->tanggal_ujian)); ?> | <?php echo date('H:i:s', strtotime($mhs->jam_ujian)); ?></td>
                                            <td><?php echo $mhs->durasi_ujian; ?> Menit</td>
                                            <td>
                                            <?php if ($mhs->status_ujian == 0) {
                                                    echo "<span> Belum Mulai Ujian </span>";
                                                } else if ($mhs->status_ujian == 2) {
                                                    echo "<span> Sudah Mengikuti Ujian </span>";
                                                } else if ($mhs->status_ujian == 1) {
                                                    if ($mhs->status_ujian == 1) {
                                                        if (Date('d-m-Y', strtotime($mhs->tanggal_ujian)) == Date('d-m-Y') && Date('H:i:s', strtotime($mhs->jam_ujian)) <= Date('H:i:s')) {
                                                            echo "<a href='" . 'evaluasi_test/soal/' . "$mhs->id_evaluasi' class='btn btn-xs btn-success';'>Mulai Ujian</a>";
                                                        } else if (Date('d-m-Y', strtotime($mhs->tanggal_ujian)) == Date('d-m-Y') && Date('H:i:s', strtotime($mhs->jam_ujian)) <= Date('H:i:s')) {
                                                            echo "Waktu Ujian Habis";
                                                        } else {
                                                            echo "Tuggu Waktu Ujian";
                                                        }
                                                    }
                                                }
                                                ?>

                                            </td>

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
    window.setTimeout("waktu()", 1000);

    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);

</script>