<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Sub Menu
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('menu/tambahsub', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Sub Menu</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Menu</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sub Menu</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th width="70px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        foreach ($submenu as $s) : ?>
                            <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $s->title?></td>
                            <td><?= $s->nama_menu?></td>
                            <td><?= $s->url?></td>
                            <td><?= $s->icon?></td>
                            <td><?= $s->is_active?></td>
                            <td width="20px"> <?php echo anchor('menu/subedit/'.$s->id_sub_menu, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                            <?php echo anchor('menu/subdelete/'.$s->id_sub_menu, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?></td>
                            </tr>
                                <?php
                            endforeach
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>






<!-- Modal -->
<div class="modal" id="newsubmenu" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsubmenu" >Tambah Sub Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>