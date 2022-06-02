<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
        Data Mata kuliah
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>
<!-- <?php echo anchor('master_soal_admin/getpaket', '<button class="btn btn-sm btn-success mb-3"></i> Daftar Paket Soal</button>') ?> -->
    <!-- <?php echo anchor('soal_evaluasi_ujian/matakuliah', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-eye"></i> Data Mata Kuliah</button>') ?> -->

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Mata kuliah</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =  1;
                        foreach ($matkul as $mk) : ?>
                        <!-- <input type="text" name="id_mata_kuliah" value="<?php echo $mk->id_mata_kuliah ?>"> -->
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $mk->nama_mata_kuliah ?></td>
                            <td>
                                 <?php echo anchor('master_soal_admin/getallsoal/'.$mk->id_mata_kuliah, '<div class="btn btn-sm btn-primary">Semua soal </i></div>' ) ?> 
                                 <?php echo anchor('master_soal_admin/getpaket/'.$mk->id_mata_kuliah,'<button class="btn btn-sm btn-success ">Paket soal</button>') ?> </td>
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