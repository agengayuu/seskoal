<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Pengumuman
        </div>
    </div>


    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('pengumuman/add', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pengumuman</button>') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Judul Pengumuman</th>
                            <th>Isi Pengumuman</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Dokumen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengumuman as $p) : ?>
                            <tr>
                                <td style="text-align: center"><?php echo $no++ ?></td>
                                <td><?= $p->judul_pengumuman ?></td>
                                <td><?= $p->isi_pengumuman ?></td>
                                <td style="text-align: center"><?= $p->tgl_pembuatan ?></td>
                                <center>
                                <td style="text-align: center"><?php echo anchor('pengumuman/download/'.$p->dokumen, '<div class="btn btn-sm btn-primary"><i class="fas fa-download"></i></div>') ?>
                                </td>
                                </center>
                                <td style = "text-align: center"><?php 
                                if( $p->status == 1 ){
                                    echo "Aktif";
                                }else{
                                    echo"Tidak Aktif"; }
                                     ?></td>
                                <center>
                                    <td style="text-align: center"> <?php echo anchor('pengumuman/edit/' . $p->id_pengumuman, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                                    <?php echo anchor('pengumuman/delete/' . $p->id_pengumuman, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
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