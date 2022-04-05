<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
        <i class="fas fa-plus fa-sm"></i> Master Soal
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('master_soal/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Master Soal</button>') ?>
    <!-- <?php echo anchor('soal_evaluasi_ujian/matakuliah', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-eye"></i> Data Mata Kuliah</button>') ?> -->

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
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>Soal </th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =  1;
                        foreach ($soal as $so) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $so->kode_mata_kuliah ?></td>
                            <td><?= $so->nama_mata_kuliah ?></td>
                            <td>
                            <?= $so->pertanyaan ?>
                            <ol type="A">
                                <li>
                                    <?php if ('A'== $so->kunci_jawaban) {
                                        echo "<b>";
                                        echo $so->a;
                                        echo "</b>";
                                    } else {
                                        echo $so->a;
                                    }
                                        ?>                                                                
                                </li>
                                <li>
                                    <?php if ('B'== $so->kunci_jawaban) {
                                        echo "<b>";
                                        echo $so->b;
                                        echo "</b>";
                                    } else {
                                        echo $so->b;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('C'== $so->kunci_jawaban) {
                                        echo "<b>";
                                        echo $so->c;
                                        echo "</b>";
                                    } else {
                                        echo $so->c;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('D'== $so->kunci_jawaban) {
                                        echo "<b>";
                                        echo $so->d;
                                        echo "</b>";
                                    } else {
                                        echo $so->d;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('E'== $so->kunci_jawaban) {
                                        echo "<b>";
                                        echo $so->e;
                                        echo "</b>";
                                    } else {
                                        echo $so->e;
                                    }
                                        ?>    
                                </li>
                            </ol>
                            </td>
                            <td><?= $so->kunci_jawaban ?></td>
                            
                            <td>
                                 <?php echo anchor('master_soal/edit/'.$so->id_master_soal, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                 <?php echo anchor('master_soal/delete/'.$so->id_master_soal, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>