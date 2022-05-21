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
                                   </div>
                                </div>
                            </div>
                            
                           
                           
                            <?php echo anchor('penilaian/print_all/' . $paket->id_paket_evaluasi,'<button class="btn btn-sm btn-info mb-3 " ><i class="fas fa-print"></i> Data Paket Evaluasi</button>') ?>
                                  
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
                                                                <th>Nilai</th>
                                                                <th>Mutu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $no=1;
                                                        foreach($hasil as $d) { ?>
                                                                <tr>
                                                                     <td><?php echo $no++; ?></td>                              
                                                                    <td><?php echo $d->nama; ?></td>   
                                                                    <td><?php echo $d->nim; ?></td>   
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
                                                                        <?php echo $d->mutu; ?>
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