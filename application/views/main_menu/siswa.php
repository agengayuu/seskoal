     <!-- Modal
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">MAHASISWA</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">MAHASISWA</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">MAHASISWA</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">MAHASISWA</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>
                     </div>
                     <hr>

                     <div class="row">
                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">INPUT NILAI</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">JADWAL</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">RUANGAN</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>

                         <div class="col-md-3 text-info text-center">
                             <a href="<?php echo base_url() ?>">
                                 <p class="nav-link small text-info">MAHASISWA</p>
                             </a>
                             <i class="fas fa-3x fa-user-graduate"></i>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div> -->

     <!-- <h3>
         <center>Selamat Datang Mahasiswa di Aplikasi Akademik SESKOAL</center>
     </h3> -->
    

     <!-- Informasi -->


     <section class="content">
         <div class="container-fluid">
             <div class="card mb-4 py-0 border-left-primary">
                 <div class="card-body">
                     <h3>Beranda</h3>
                     Informasi Umum Akademik dan Kemahasiswaan
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-9">
                     <div class="card">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-10">
                                     <h5 class="card-title" style="font-weight: bolder;">Informasi/Pengumuman</h5>
                                 </div>
                                 <div class="col-2">
                                     <a href="<?php echo base_url('pengumuman_view') ?>" class="btn btn-primary btn-icon-split btn-sm">Lihat Semua</a>
                                 </div>
                             </div>
                             <?php foreach($pengumuman as $peng) { ?>
                             <label>Tanggal <?= $peng-> tgl_pembuatan; ?></label>
                             <h5 class="card-title" style="font-weight:bold; color:blue;" ><?= $peng->judul_pengumuman; ?></h5>
                             <p class="card-text"><?= $peng->isi_pengumuman?>
                             </p>
                             <?php } ?>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Jadwal</h5>
                             <?php foreach($jadwal as $jad) { ?>
                             <p class="card-text"><?= $jad->tanggal; ?></p>
                             <div class="card mb-2">
                                 <div class="card-body">
                                     <div class="tw-mt-5 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4">
                                         <div>
                                             <h6 class="font-14px tw-font-bold tw-truncate">Laporan Akhir</h6>
                                         </div>
                                         <div>
                                             <h6 class="tw-text-base tw-text-sp-muted-text mb-3">
                                                 <span class="font-14px tw-inline-block tw-mr-3"> INF399 | P<span>A2</span> </span>
                                                 <span class="font-14px tw-inline-block tw-text-xs tw-px-4 tw-py-1 tw-bg-sp-muted-text tw-text-white tw-rounded-xl">
                                                     P
                                                 </span>
                                             </h6>
                                         </div>
                                         <div>
                                             <div class="tw-flex tw-items-center tw-mb-2">
                                                 <h6 class="font-14px tw-text-sp-muted-text"><?= $jad->nama_diklat; ?></h6>
                                             </div>
                                             <div class="tw-flex tw-items-center tw-mb-2">
                                                 <div class="bg-icon_oclock tw-mr-2"></div>
                                                 <h6 class="font-14px tw-text-sp-muted-text">
                                                 <?= $jad->waktu; ?>
                                                 </h6>
                                             </div>
                                             <div class="tw-flex tw-items-center">
                                                 <h6 class="font-14px tw-text-sp-muted-text"><?= $jad->nama_ruang; ?></h6>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <?php }?>
                             <center>
                                 <a href="#" class="btn btn-primary btn-icon-split btn-sm">Lihat Semua Jadwal</a>
                             </center>
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