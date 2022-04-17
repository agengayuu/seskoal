<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
         Master Soal
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- <?php echo anchor('master_soal/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Master Soal</button>') ?> -->
    <!-- <?php echo anchor('master_soal_admin/matakuliah', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-eye"></i> Data Mata Kuliah</button>') ?> -->

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Soal</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Pilihan A</th>
                            <th>Pilihan B</th>
                            <th>Pilihan C</th>
                            <th>Pilihan D</th>
                            <th>Pilihan E</th>
                            <!-- <th width="10%">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =  1;
                        foreach ($soal as $so) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $so->pertanyaan ?></td>
                            <td><?= $so->a ?></td>
                            <td><?= $so->b ?></td>
                            <td><?= $so->c?></td>
                            <td><?= $so->d ?></td>
                            <td><?= $so->e ?></td>
                            <!-- <td>
                                 <?php echo anchor('master_soal_admin/getmahasiswa/'.$so->id_soal_evaluasi, '<div class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-right"></i></div>' ) ?>  -->
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