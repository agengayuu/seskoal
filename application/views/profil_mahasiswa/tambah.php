<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Data Diri
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="mb-4 ml-4 mt-4 mr-4">
                    <form action="<?php echo base_url('profil_mahasiswa/admintambah') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama<i style="color:red">*</i></label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" id="nama" required>
                            <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">NIM<i style="color:red">*</i></label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" id="nim" required>
                            <?php echo form_error('nim', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir<i style="color:red">*</i></label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" required>
                            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir<i style="color:red">*</i></label>
                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir" required>
                            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="radio-group">
                            <label for="">Jenis Kelamin<i style="color:red">*</i></label>
                            <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" required>
                            <label class="form-check-label">Laki Laki</label>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>Foto<i style="color:red">*</i></label>
                            <input type="file" name="foto" class="form-control" accept="image/png, image/gif, image/jpeg" required>
                            <?php echo form_error('foto', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Agama<i style="color:red">*</i></label>
                            <div class="form-group">
                                <select class="form-control" name="agama" id="agama" required>
                                    <option style="display:none" value="">--- Pilih Agama ---</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Katholik</option>
                                    <option>Konghucu</option>
                                </select>
                                <?php echo form_error('agama', '<div class="text-danger small ml-3"></div>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Diklat<i style="color:red">*</i></label>
                            <select class="form-control" name='id_diklat' id='id_diklat' required>
                                <option value="" style="display:none;">-- Pilih Diklat --</option>
                                <?php foreach ($diklat as $val) { ?>
                                    <option value="<?php echo $val->id_diklat ?>"><?php echo $val->nama_diklat ?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('id_diklat', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Angkatan<i style="color:red">*</i></label>
                            <input type="text" name="angkatan" class="form-control" placeholder="Masukkan Angkatan" id="angkatan" required>
                            <?php echo form_error('angkatan', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Akademik<i style="color:red">*</i></label>
                            <select class="form-control" name='id_akademik' id='id_akademik' required>
                                <option value="" style="display:none;">-- Pilih Tahun Diklat --</option>
                                <?php foreach ($tahunakademik as $val) { ?>
                                    <option value="<?php echo $val->id_akademik ?>"><?php echo $val->tahun_akademik ?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('id_akademik', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan<i style="color:red">*</i></label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan" id="jabatan" required>
                            <?php echo form_error('jabatan', '<div class="text-danger small ml-3"></div>') ?>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Alamat</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Orangtua</a>
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
                                                                                    <label for="" class="col-sm-3 col-form-label">Kewarganegaraan<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="Masukkan Kewarganegaraan" id="kewarganegaraan" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">NIK<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" id="nik" required>
                                                                                    </div>
                                                                                    <?php echo form_error('nik', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">NPWP<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="npwp" class="form-control" placeholder="Masukkan NPWP" id="npwp" required>
                                                                                    </div>
                                                                                    <?php echo form_error('nik', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Jalan<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="jalan" class="form-control" placeholder="Masukkan Jalan" id="jalan" required>
                                                                                    </div>
                                                                                    <?php echo form_error('jalan', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Dusun<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="dusun" class="form-control" placeholder="Masukkan Dusun" id="dusun" required>
                                                                                    </div>
                                                                                    <?php echo form_error('dusun', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">RT<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" id="rt" required>
                                                                                    </div>
                                                                                    <?php echo form_error('rt', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">RW<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" id="rw" required>
                                                                                    </div>
                                                                                    <?php echo form_error('rw', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kelurahan<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kelurahan" class="form-control" placeholder="Masukkan Kelurahan" id="kelurahan" required>
                                                                                    </div>
                                                                                    <?php echo form_error('kelurahan', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kecamatan<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" id="kecamatan" required>
                                                                                    </div>
                                                                                    <?php echo form_error('kecamatan', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kode Pos<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos" id="kode_pos" required>
                                                                                    </div>
                                                                                    <?php echo form_error('kode_pos', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Telepon<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="no_tlp" class="form-control" placeholder="Masukkan Telepon" id="no_tlp" required>
                                                                                    </div>
                                                                                    <?php echo form_error('no_telp', '<div class="text-danger small ml-3"></div>') ?>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Email<i style="color:red">*</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" id="email" required>
                                                                                    </div>
                                                                                    <?php echo form_error('email', '<div class="text-danger small ml-3"></div>') ?>
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
                                                                                <label for="" class="col-sm-3 col-form-label">NIK<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nik_ortu[]" class="form-control" placeholder="Masukkan NIK" id="nik" required>
                                                                                </div>
                                                                                <?php echo form_error('nik', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Nama<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nama_ortu[]" class="form-control" placeholder="Masukkan Nama" id="nama" required>
                                                                                </div>
                                                                                <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="tempat_lahir_ortu[]" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" required>
                                                                                </div>
                                                                                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="date" name="tgl_lahir_ortu[]" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir" required>
                                                                                </div>
                                                                                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pekerjaan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pekerjaan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pekerjaan ---</option>
                                                                                        <option>Pegawai Negeri Sipil</option>
                                                                                        <option>Pegawai Swasta</option>
                                                                                        <option>TNI/Polri</option>
                                                                                        <option>Wirausaha</option>
                                                                                        <option>Lainnya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pendidikan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pendidikan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pendidikan ---</option>
                                                                                        <option>SD/Sederajat</option>
                                                                                        <option>SMP/Sederajat</option>
                                                                                        <option>SMA/Sederajat</option>
                                                                                        <option>S1</option>
                                                                                        <option>S2</option>
                                                                                        <option>S3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Penghasilan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="penghasilan_ortu[]" id="penghasilan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Penghasilan ---</option>
                                                                                        <option>Kurang dari 3 juta</option>
                                                                                        <option>3 juta - 5 juta</option>
                                                                                        <option>5 juta - 10 juta</option>
                                                                                        <option>Lebih dari 10 juta</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-md-3 mt-4">
                                                                                    <h6 style="font-weight:bold;">IBU</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">NIK<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nik_ortu[]" class="form-control" placeholder="Masukkan NIK" id="nik" required>
                                                                                </div>
                                                                                <?php echo form_error('nik', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Nama<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nama_ortu[]" class="form-control" placeholder="Masukkan Nama" id="nama" required>
                                                                                </div>
                                                                                <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="tempat_lahir_ortu[]" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" required>
                                                                                </div>
                                                                                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="date" name="tgl_lahir_ortu[]" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir" required>
                                                                                </div>
                                                                                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pekerjaan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pekerjaan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pekerjaan ---</option>
                                                                                        <option>Pegawai Negeri Sipil</option>
                                                                                        <option>Pegawai Swasta</option>
                                                                                        <option>TNI/Polri</option>
                                                                                        <option>Wirausaha</option>
                                                                                        <option>Lainnya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pendidikan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pendidikan_ortu[]" id="pendidikan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pendidikan ---</option>
                                                                                        <option>SD/Sederajat</option>
                                                                                        <option>SMP/Sederajat</option>
                                                                                        <option>SMA/Sederajat</option>
                                                                                        <option>S1</option>
                                                                                        <option>S2</option>
                                                                                        <option>S3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Penghasilan<i style="color:red">*</i></label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="penghasilan_ortu[]" id="penghasilan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Penghasilan ---</option>
                                                                                        <option>Kurang dari 3 juta</option>
                                                                                        <option>3 juta - 5 juta</option>
                                                                                        <option>5 juta - 10 juta</option>
                                                                                        <option>Lebih dari 10 juta</option>
                                                                                    </select>
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
                            <button type="submit" class="btn btn-primary mt-3 mb-4">Simpan</button>
                            <button type="button" value="Cancel" class="btn btn-danger mt-3 mb-4" onclick=self.history.back()>Batal</button>
                    </form>
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