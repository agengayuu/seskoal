<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Hak Akses
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <h5>Role: <?= $role['nama']; ?></h5>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hak Akses</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th width="100px">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($menu as $m) : ?>
                            <tr>
                                <td width="20px"><?php echo $no ?></td>
                                <td><?= $m['nama_menu'] ?></td>
                                <td width="20px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= cek_akses($role['id_grup_user'], $m['id_menu']);  ?> data-role="<?= $role['id_grup_user']; ?>" data-menu="<?= $m['id_menu']; ?>">
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php
                        endforeach;
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