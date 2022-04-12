<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Berita
        </div>
    </div>


    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('berita/tambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Berita</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th>link</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($berita as $b) : ?>
                            <tr>
                                <td style="text-align: center"><?php echo $no++ ?></td>
                                <td><?= $b->judul_berita ?></td>
                                <td><?= $b->isi?></td>
                                <td><?= $b->dokumen?></td>
                                <td><?= $b->link?></td>
                                <td style="text-align: center"><?= date('d-m-Y',strtotime($b->created_at)); ?></td>
                                <center>
                                </td>
                                    <td style="text-align: center"> <?php echo anchor('berita/edit/' . $b->id_berita, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                                    <?php echo anchor('berita/hapus/' . $b->id_berita, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                                </center>
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