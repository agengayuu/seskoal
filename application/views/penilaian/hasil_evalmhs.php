<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <span>Hasil Test Evaluasi</span>
        </div>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
   <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label class="control-label col-md-8"><b>Mata Kuliah</b> <b><?php echo ": ".$matakul->nama_mata_kuliah; ?></b></label><br   />
                                    </div>
                                </div>
                            </div>
                            
                           

                            <?php echo anchor('penilaian/print_all/' . $matakul->id_mata_kuliah, '<button class="btn btn-sm btn-info mb-3 " ><i class="fas fa-print"></i> Data Mata Kuliah</button>') ?>

                            <!--table -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Hasil Test Evaluasi</h6>
                                </div>

                                    <div class="card-body">
                                        <div class="table-responsive">                
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>Nim</th>
                                                                <th>Tanggal Ujian</th>
                                                                <th>Nilai</th>
                                                                <th>Mutu</th>
                                                                <th>Cetak</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $no=1;
                                                            foreach($hasil as $d) { ?>
                                                                <tr>
                                                                    <!-- <input type="hidden" name="id_mata_kuliah" value="<?php echo $matakul->id_mata_kuliah ?>"> -->
                                                                    <td><?php echo $no++; ?></td>                              
                                                                    <td><?php echo $d->nama; ?></td>   
                                                                    <td><?php echo $d->nim; ?></td>                                                                                     
                                                                    <td><?php echo $d->tanggal_ujian; ?></td>                                                                                     
                                                                    <td>
                                                                        <?php
                                                                        if($d->nilai == ''){
                                                                            echo "<span style='color:red'>Belum Ujian</span>";
                                                                        }else {
                                                                            echo $d->nilai;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <!-- Masih belum selesai nilai mutu nya -->
                                                                        <?php 
                                                                        if($d->nilai >= $nilai->batas_awal){
                                                                            echo $nilai->mutu;
                                                                        }elseif($d->nilai <= $nilai->batas_awal){
                                                                            echo $nilai->mutu;
                                                                        }elseif($d->nilai >= $nilai->batas_awal[2]){
                                                                            echo "C";
                                                                        } 
                                                                        ?>
                                                                    </td>                                                                                     
                                                                    <td>
                                                                        <?php
                                                                        if($d->nilai == ''){
                                                                            echo "<span style='color:red'>Belum Ujian</span>";
                                                                        }else {
                                                                            echo "<a href='".'penialian/cetak/'."$d->id_evaluasi class='btn btn-xs btn-success' title='Cetak Hasil Ujian' target='_blank'><span class='fa fa-print'></span></a>";;
                                                                            
                                                                        }
                                                                        ?>
                                                                    </td> 
                                                                </tr>
                                                            <?php } ?> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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