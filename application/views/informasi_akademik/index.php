<!-- informasi -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4 py-0 border-left-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h5 class="card-title" style="font-weight: bolder;">Informasi/Pengumuman</h5>
                            </div>
                            <div class="col-2">
                                <a href="<?php echo base_url('informasi_akademik/info') ?>" class="btn btn-info">Lihat Semua</a>
                            </div>
                        </div>
                        <?php foreach ($pengumuman as $peng) { ?>
                            <label>Tanggal <?= $peng->tgl_pembuatan; ?></label>
                            <h5 class="card-title" style="font-weight:bold; color:blue;"><?= $peng->judul_pengumuman; ?></h5>
                            <p class="card-text"><?= $peng->isi_pengumuman ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- end informasi -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>