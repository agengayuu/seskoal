<<!DOCTYPE html>
<html>
<head>
	<title>Cetak Hasil Evaluasi Mahasiswa </title>
</head>
<body>
	<div class="container">
		<div class="content-wrapper">
			<!-- <img src="<?php echo base_url() ?>assets/assets/images/seskoal.png" style="width: 65px; height: auto; position: absolute;"> -->
            <img src="assets/assets/images/seskoal.png" style="width: 100px; height: auto; position: absolute;">
        
	        <table style="width: 100%;">
	            <tr>
	                <td align="center">
	                    <span> SESKOAL <br> <b> SEKOLAH STAF DAN KOMANDO TNI ANGKATAN LAUT</b> <br> Jl. Ciledug Raya No.2, RW.4, Cipulir, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230</span>
	                    <hr>                    
	                </td>
	            </tr>
	        </table>
			<section class="content-header">
				<h3 align="center">Laporan Hasil Evaluasi</h3>
				<h5 align="left">Diklat : <?php echo $mhs['nama_diklat']; ?> </h5>
				<h5 align="left">Nama   : <?php echo $mhs['nama']; ?> </h5>
				<h5 align="left">NIM    : <?php echo $mhs['nim']; ?> </h5>
				<h5 align="left">Tahun akademik : <?php echo $mhs['tahun_akademik']; ?> </h5>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<table border="1" cellpadding="5px" cellspacing="0px" style="font-size:11;" width="100%">
							<thead align="center" style="background-color:#D3D3D3">
								<tr>
									<th width="1%">No</th>
		                            <th>Mata Kuliah</th>                                                                                                                                        
		                            <th>Benar</th>
		                            <th>Salah</th>
		                            <th>Nilai</th>
		                            <th>Mutu</th>
								</tr>
							</thead>
                            <?php
                            $no = 1;
                            foreach($rekap as $d){
                            ?>
							<tbody style="font-size:9;">
								<tr align="center">
									<td><?php echo $no++; ?></td>                              
	                                <!-- <td><?php echo $d->nama; ?></td>                                 -->
	                                <td><?php echo $d->nama_mata_kuliah; ?></td>                                                            
	                                <!-- <td><?php echo date('d-m-Y',strtotime($d->waktu_evaluasi_mulai)); ?> | <?php echo date('H:i:s',strtotime($d->waktu_evaluasi_mulai)); ?></td> -->
	                                <td>
	                                    <?php
	                                    if($d->benar == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $d->benar;
	                                    }
	                                    ?>
	                                </td>                                
	                                <td>
	                                    <?php
	                                    if($d->salah == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $d->salah ;
	                                    }
	                                    ?>
	                                </td>
	                                <td>
	                                    <?php
	                                    if($d->nilai == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
	                                    }else {
	                                        echo $d->nilai;
	                                    }
	                                    ?>
	                                </td>
									   <td><?php echo $d->mutu; ?></td>   
								</tr>
								<?php }	?>
							</tbody>							
						</table>						
					</div>
				</div>
			</section><br><br><br>
			<div align="center">
				<?php 
                date_default_timezone_set('Asia/Jakarta'); 
				$date = Date('d-m-Y' );
				$jam = Date('h:i:s');
				echo "Laporan dicetak pada tanggal $date Jam $jam"; 
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>