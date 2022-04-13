<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
           Daftar Mata Kuliah
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
                                        <label class="control-label col-md-8"><b>Tahun akademik</b> <b><?php echo ": ".$thn['tahun_akademik']; ?></b></label><br />
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo anchor('matakuliah/tambahdaftar', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Daftar Mata Kuliah</button>') ?>

    
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Kuliah</h6>
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
                                                    foreach ($daftarmatkul as $daf) : ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?= $daf->nama_mata_kuliah ?></td>
                                                    <td><?= $daf->nama ?></td>
                                                    <td> <?php echo anchor('matakuliah/daftaredit/'.$daf->id_daftar_matkul, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                                    <?php echo anchor('matakuliah/daftarhapus/'.$daf->id_daftar_matkul, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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