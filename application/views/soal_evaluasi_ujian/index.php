<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Soal Evaluasi Ujian
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('soal_evaluasi_ujian/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Soal Evaluasi</button>') ?>
    <?php echo anchor('soal_evaluasi_ujian/matakuliah', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-eye"></i> Data Mata Kuliah</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Soal Evaluasi Ujian</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Soal Ujian</th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =  1;
                        foreach ($ujian as $u) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $u->id_mata_kuliah ?></td>
                            <td><?= $u->id_mata_kuliah ?></td>
                            <td>
                            <?= $u->pertanyaan ?>
                            <ol type="A">
                                <li>
                                    <?php if ('A'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->a;
                                        echo "</b>";
                                    } else {
                                        echo $u->a;
                                    }
                                        ?>                                                                
                                </li>
                                <li>
                                    <?php if ('B'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->b;
                                        echo "</b>";
                                    } else {
                                        echo $u->b;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('C'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->c;
                                        echo "</b>";
                                    } else {
                                        echo $u->c;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('D'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->d;
                                        echo "</b>";
                                    } else {
                                        echo $u->d;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('E'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->e;
                                        echo "</b>";
                                    } else {
                                        echo $u->e;
                                    }
                                        ?>    
                                </li>
                            </ol>
                            </td>
                            <td><?= $u->kunci_jawaban ?></td>
                            
                            <td>
                                 <?php echo anchor('soal_evaluasi_ujian/edit/'.$u->id_soal_evaluasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                 <?php echo anchor('soal_evaluasi_ujian/delete/'.$u->id_soal_evaluasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
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