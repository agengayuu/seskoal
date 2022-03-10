<div class="container-fluid">
    <h1 class="h3 ml-6 mb-2 text-black-800">Detail Mahasiswa</h1>
    <div class="card-header bg-white">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                        </div>
                        <div class="card-body">
                        <button type="button" value="Cancel" class="btn btn-danger mb-4" onclick="history.back()">Kembali</button>
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/assets/images/avatar.jpg" class="img-fluid" alt="avatar" style="width: 200px">
                            </div>
                        </div>
                    <h5 class="text-center card-title" style="font-weight:bold;">Metty Ken Mukrominatin</h5>
                    <div class="mb-4 ml-4 mr-4" >
                        <form>
                            <div class="form-group">
                                <label for="" style="font-weight:bold;">NIM</label>
                                <input type="text" class="form-control" id="nim">
                            </div>
                            <div class="form-group">
                                <label for="" style="font-weight:bold;">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="" style="font-weight:bold;">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir">
                            </div>
                            <div class="radio-group">
                                <label for="" style="font-weight:bold;">Jenis Kelamin</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                            <div class="form-group">
                                <label for="" style="font-weight:bold;">Agama</label>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value='0' selected>--- Pilih Agama ---</option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Hindu</option>
                                        <option>Budha</option>
                                        <option>Katholik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" style="font-weight:bold;">Diklat</label>
                                <select class="form-control" name='id_diklat' id='id_diklat'>
                                    <option value='0' selected>--- Pilih Diklat ---</option>
                                    <option value=''></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Alamat</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Orangtua</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Wali</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-panel active">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-horizontal form-bordered">
                                                            
                                                                <div class="form-group row">
                                                                    <div class="col-md-10">
                                                                        <form action="">
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="kewarganegaraan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="nik">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIM</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="nim">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Jalan</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="jalan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Dusun</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="dusun">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">RT</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="rt">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">RW</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="rw">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Kelurahan</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="kelurahan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Kecamatan</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="kecamatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Kode Pos</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="kode_pos">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Telepon</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="no_tlp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Email</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="email" class="form-control" id="email">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-panel active">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-horizontal form-bordered">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-3">
                                                                                <h6 style="font-weight:bold;">AYAH</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="nik">
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="tgl_lahir">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pekerjaan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pendidikan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Penghasilan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="penghasilan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-3 mt-4">
                                                                                <h6 style="font-weight:bold;">IBU</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="nik">
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="tgl_lahir">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pekerjaan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pendidikan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Penghasilan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="penghasilan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-panel active">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-horizontal form-bordered">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-3">
                                                                                <h6 style="font-weight:bold;">Wali</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="nik">
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="tgl_lahir">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pekerjaan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="pendidikan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">Penghasilan</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" id="penghasilan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>  