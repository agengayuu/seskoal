<div class="container-fluid">
    <div class="card mb-4 py-0 border-left-primary">
        <div class="card-body">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Detail Dosen 
        </div>
    </div> 

    <?php foreach($detail as $dt) : ?>
        
    <div class="card-header bg-white"> 
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-horizontal form-bordered">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <?php if($dt->foto!= null) { ?>
                                    <img src="<?=base_url('./assets/uploads/'.$dt->foto) ?>" class="img-fluid" alt="avatar" style="width: 200px">
                                <?php } ?>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">NID</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->nip; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">NIK</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->nik; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">NPWP</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->npwp; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Kewarganegaraan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->kewarganegaraan; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->gelar_depan; ?>&nbsp;<?php echo $dt->nama; ?>&nbsp;<?php echo $dt->gelar_belakang; ?></label>
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
                                        <label for="">Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->tempat_lahir; ?></label>
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
                                        <label for="">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->jk; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Agama</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->agama; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Alamat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo $dt->alamat; ?></label>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php echo anchor('dosen', '<div class="btn btn-sm btn-danger"> Kembali
            </div>'); ?>
        </div>
    </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
</div>