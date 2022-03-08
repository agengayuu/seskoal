<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Jenis Ruangan
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('jenis_ruang/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jenis Ruangan</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Jenis Ruangan</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no =  1;
                                foreach ($jenis_ruang as $jr) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $jr->nama_jenis_ruang ?></td>
                                    <td width="20px"> <?php echo anchor('jenis_ruang/update/'.$jr->id_jenis_ruang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>&nbsp;
                                    <?php echo anchor('jenis_ruang/delete/'.$jr->id_jenis_ruang, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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