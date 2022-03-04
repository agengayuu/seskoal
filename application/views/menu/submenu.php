<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Sub Menu
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('menu/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Sub Menu</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Menu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderes" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr  style="text-align: center;">
                            <th>No</th>
                            <th>Sub Menu</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                        </tr>
                        <?php
                        $no =1;
                        foreach ($submenu as $s) : ?>
                        
                        <tr  style="text-align: center;">
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $s->title?></td>
                            <td><?= $s->nama_menu?></td>
                            <td><?= $s->url?></td>
                            <td><?= $s->icon?></td>
                            <td><?= $s->is_active?></td>
                            <td width="20px"> <?php echo anchor('menu/subupdate/'.$s->id_sub_menu, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?></td>
                            <td width="20px"> <?php echo anchor('menu/subdelete/'.$s->id_sub_menu, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                        </tr>
                            <?php
                            endforeach;
                            ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>