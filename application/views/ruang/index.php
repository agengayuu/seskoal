<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Ruangan
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('ruang/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Ruangan</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ruangan</h6>
        </div>

        <div class="card-body">
                <div class="table-responsive">                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Ruang ID</th>  -->
                                        <th>Nama Ruang</th>
                                        <th>Jenis Ruang</th>
                                        <th>Kapasitas</th>
                                        <th>Lantai</th>
                                        <th>Keterangan</th>
                                        <th style="text-align:center"width="15%" >Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($ruang as $rgn) : ?>
                                            <tr>
                                                <td width="20px"><?php echo $no++ ?></td>
                                                <!-- <td><?php echo $rgn->id_ruang ?></td> -->
                                                <td><?php echo $rgn->nama_ruang ?></td>
                                                <td><?php echo $rgn->nama_jenis_ruang ?></td>
                                                <td><?php echo $rgn->kapasitas ?></td>
                                                <td><?php echo $rgn->lantai ?></td>
                                                <td><?php echo $rgn->keterangan ?></td>
                                                <td style="text-align:center" width="20px"> <?php echo anchor('ruang/edit/'.$rgn->id_ruang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                                <?php echo anchor('ruang/delete/'.$rgn->id_ruang, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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