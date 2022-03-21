<section class="content">
        <div class="container-fluid">
            <div class="card mb-4 py-0 border-left-primary">
                <div class="card-body">
                    <h3>Informasi Akademik</h3>
                    Informasi Umum Akademik dan Kemahasiswaan
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h5 class="card-title" style="font-weight: bolder;">Informasi/Pengumuman</h5>
                                </div>
                                <div class="col-2">
                                    <a href="<?php echo base_url('pengumuman_view') ?>" class="btn btn-info">Lihat Semua</a>
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
                <!-- <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal</h5>
                            <?php foreach ($jadwal as $key => $jad) { ?>
                                <?php
                                if ($key == 0) { ?>
                                    <p class="card-text"><?= $jad->tanggal; ?></p>
                                <?php }
                                if ($key != 0 && $jadwal[$key - 1]->tanggal != $jad->tanggal) { ?>
                                    <p class="card-text"><?= $jad->tanggal; ?></p>
                                <?php } ?>

                            <?php
                                $content = '<div class="card mb-2">
                                    <div class="card-body">
                                        <div class="tw-mt-5 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4">
                                            <div>
                                                <h6 class="font-14px tw-font-bold tw-truncate">' . $jad->nama_diklat . '</h6>
                                            </div>
                                            <div>
                                                <h6 class="tw-text-base tw-text-sp-muted-text mb-3">
                                                    <span class="font-14px tw-inline-block tw-mr-3">' . $jad->nama_mata_kuliah . ' | ' . $jad->nama_ruang . '
                                                        <span class="font-14px tw-inline-block tw-text-xs tw-px-4 tw-py-1 tw-bg-sp-muted-text tw-text-white tw-rounded-xl">
                                                        </span>
                                                </h6>
                                            </div>
                                            <div>
                                                <div class="tw-flex tw-items-center tw-mb-2">
                                                    <h6 class="font-14px tw-text-sp-muted-text">' . $jad->tanggal . '</h6>
                                                </div>
                                                <div class="tw-flex tw-items-center tw-mb-2">
                                                    <div class="bg-icon_oclock tw-mr-2"></div>
                                                    <h6 class="font-14px tw-text-sp-muted-text">
                                                        ' . $jad->waktu_mulai . ' - ' . $jad->waktu_selesai . '
                                                    </h6>
                                                </div>
                                                <div class="tw-flex tw-items-center">
                                                    <h6 class="font-14px tw-text-sp-muted-text">' . $jad->keterangan . '</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if ($key == 0) {
                                    echo $content;
                                }
                                if ($key != 0 && $jadwal[$key - 1]->tanggal != $jad->tanggal) {
                                    echo $content;
                                }
                            } ?>
                            <center>
                                <a href="<?php echo base_url('jadwal_kuliah_mahasiswa') ?>" class="btn btn-primary btn-icon-split btn-sm">Lihat Semua Jadwal</a>
                            </center>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <!-- end informasi -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>