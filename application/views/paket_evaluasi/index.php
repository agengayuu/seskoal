<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            Paket Evaluasi
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('paket_evaluasi/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Paket Evaluasi</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Paket Evaluasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Paket Evaluasi</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no =  1;
                                foreach ($paket_evaluasi as $pe) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $pe->nama_paket_evaluasi ?></td>
                                    <td width="20px"> <?php echo anchor('paket_evaluasi/update/'.$pe->id_paket_evaluasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>&nbsp;
                                    <?php echo anchor('paket_evaluasi/delete/'.$pe->id_paket_evaluasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
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