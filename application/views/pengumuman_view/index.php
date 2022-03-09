



<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Pengumuman
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Judul Pengumuman</th>
                            <th>Id Pengumuman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach ($pengumuman as $pa) : ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td><?= $pa->tgl_pembuatan ?></td>
                            <td><?= $pa->judul_pengumuman ?></td>
                            <td><?= $pa->id_pengumuman ?></td>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-info" onclick="detail()" data-toggle="modal" data-target="#detailModal">
                                    <i class="fas fa-search"></i> Detail
                                </button>
                            </td>
                            <td >
                                <input type="text" name="idpengumuman" id="idpengumuman" value="<?= $pa->id_pengumuman; ?>" >
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

    <!-- Modal -->
    <?php $no = 1;
    foreach ($pengumuman as $pgm) : $no++;?>
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Detail Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('pengumuman_view/detail') ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="id_pengumuman" id="id_pengumuman" value="<?= $pgm->id_pengumuman; ?>" >
                        <div class="col-md-3 text-bold">
                            Judul <span class="float-right">: </span>
                        </div>
                        <div class="col-md-9" value="<?php echo $pgm->judul_pengumuman;?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-bold">
                            Tanggal <span class="float-right">:</span>
                        </div>
                        <div class="col-md-9" value="<?php echo $pgm->tgl_pembuatan;?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-bold">
                            Pengumuman <span class="float-right">:</span>
                        </div>
                        <div class="col-md-9" value="<?php echo $pgm->isi_pengumuman;?>">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </form>
            
        </div>
    </div>
    <?php endforeach ?>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    function detail() {
        var id_detail = document.getElementById("idpengumuman").value;  
        console.log(id_detail)
    }
</script>