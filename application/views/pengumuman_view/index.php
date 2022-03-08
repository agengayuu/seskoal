



<title><?= $title ;?></title>

<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
            <h4>Pengumuman</h4>
        </div>
    </div>
    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no =1;
                                foreach ($pengumuman as $md) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $md->nama_diklat ?>
                                        <td><?= $md->nama_diklat ?>
                                        
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-search"></i> Detail
                                        </button>
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
        </div>
    </div>

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Detail Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 text-bold">
                        Judul <span class="float-right">:</span>
                    </div>
                    <div class="col-md-9">
                        Yuk Vaksinasi Booster Covid-19 di lingkungan IPB University
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-bold">
                        Tanggal <span class="float-right">:</span>
                    </div>
                    <div class="col-md-9">
                        16 Februari 2022
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-bold">
                        Pengumuman <span class="float-right">:</span>
                    </div>
                    <div class="col-md-9">
                        <p><strong>[Vaksinasi Booster IPB University]</strong></p>
                        <p>Vaksinasi Booster Covid-19 bagi Pegawai &amp; keluarga inti, Mahasiswa dan Alumni IPB akan diselenggarakan pada:</p>
                        <p>Kamis, 17 Februari 2022<br>Pukul 08.00 – 15.00 WIB<br>di Graha Widya Wisuda, Kampus IPB Dramaga</p>
                        <p>Tautan pendaftaran: <a href="https://ipb.link/pendaftaranvaksinasiboosteripb">https://ipb.link/pendaftaranvaksinasiboosteripb</a></p>
                        <p>Unduh form skrining:<br><a href="https://ipb.link/form-skrining-booster">https://ipb.link/form-skrining-booster</a></p>
                        <p>&nbsp;</p>
                        <p>Demikian informasi ini disampaikan. Atas kerjasamanya diucapkan terima kasih.</p>
                        <p>Hormat kami,<br>Panitia Vaksinasi <br>IPB University</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>