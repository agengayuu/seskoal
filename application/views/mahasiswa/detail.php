<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Detail Mahasiswa 
        </div>
    </div>

    <div class="card-header bg-white">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-horizontal form-bordered">
                        <div class="form-group row">
                        <?php foreach($detail as $dt) : ?>
                            <div class="col-md-2">
                                <?php if($dt->foto!= null) { ?>
                                    <img src="<?=base_url('./assets/uploads/'.$dt->foto) ?>" class="img-fluid" alt="avatar" style="width: 200px">
                                <?php } ?>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">NIM</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->nim; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->nama; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Angkatan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->angkatan; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->tgl_lahir; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tahun Masuk</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->tahun_masuk; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tahun Akademik</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->tahun_akademik; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Jabatan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->jabatan; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->email; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">No Telpon</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->no_tlp; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Diklat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->nama_diklat; ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php echo anchor('mahasiswa', '<div class="btn btn-sm btn-danger"> Kembali
            </div>'); ?>
        </div>
    </div>
</div>