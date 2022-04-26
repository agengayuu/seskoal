<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Data Diri
        </div>
    </div>

    <?php echo form_open_multipart('profil_mahasiswa_akses/update'); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                        </div> -->
                        <div class="card-body">
                <!-- <form action="<?php echo base_url('profil_mahasiswa_akses/detail') ?>"> -->
                    <input type="hidden" name="id_mahasiswa" value="<?php echo ($datadiri->id_mahasiswa) ? $datadiri->id_mahasiswa : '' ?>">
                    <div class="mb-4 ml-4 mr-4" >
                        <div class="form-group">
                            <label for="">NIM</i></label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" id="nim" value="<?php echo ($datadiri->nim) ? $datadiri->nim : '' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama<i style="color:red">*</i></label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" id="nama" value="<?php echo ($datadiri->nama) ? $datadiri->nama : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" value="<?php echo ($datadiri->tempat_lahir) ? $datadiri->tempat_lahir : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir" value="<?php echo ($datadiri->tgl_lahir) ? $datadiri->tgl_lahir : '' ?>">
                        </div>
                        <div class="radio-group">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" <?php echo ($datadiri->jenis_kelamin == 'Laki-Laki') ? 'checked' : '' ?>>
                            <label class="form-check-label">Laki Laki</label>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php echo ($datadiri->jenis_kelamin == 'Perempuan') ? 'checked' : '' ?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>Foto<i style="color:red"></i></label>
                            <div class="form-group">
                                <?php if ($datadiri->foto != null) { ?>
                                    <img src="<?= base_url('/assets/uploads/' . $datadiri->foto) ?>" class="img-fluid" alt="avatar" style="width: 200px">
                                <?php } ?>
                                <input type="file" name="foto" class="form-control" accept="image/*" value="">
                                <input type="hidden" name="foto_hidden" value="<?= ($datadiri->foto != '') ? $datadiri->foto : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <div class="form-group">
                                <select class="form-control" name="agama" id="agama">
                                    <option style="display:none" value="">--- Pilih Agama ---</option>
                                    <option value="Islam" <?php echo ($datadiri->agama == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                    <option value="Protestan" <?php echo ($datadiri->agama == 'Protestan') ? 'selected' : '' ?>>Protestan</option>
                                    <option value="Katolik" <?php echo ($datadiri->agama == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                    <option value="Hindu" <?php echo ($datadiri->agama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                    <option value="Buddha" <?php echo ($datadiri->agama == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                                    <option value="Konghucu" <?php echo ($datadiri->agama == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                                </select>
                                <?php echo form_error('agama', '<div class="text-danger small ml-3"></div>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Diklat</label>
                            <select class="form-control" name='id_diklat' id='id_diklat'>
                                <option value="" style="display:none;">-- Pilih Diklat --</option>
                                <?php foreach($diklat as $val){ ?>
                                    <option value="<?php echo $val->id_diklat ?>" <?php echo ($datadiri->id_diklat == $val->id_diklat) ? 'selected' : '' ?>><?php echo $val->nama_diklat ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Angkatan</label>
                            <input type="text" name="angkatan" class="form-control" placeholder="Masukkan Angkatan" id="angkatan" value="<?php echo ($datadiri->angkatan) ? $datadiri->angkatan : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Akademik</label>
                            <select class="form-control" name='id_akademik' id='id_akademik' value="<?php echo ($datadiri->id_akademik) ? $datadiri->tgl_lahir : '' ?>" >
                                <option value="" style="display:none;">-- Pilih Tahun Diklat --</option>
                                <?php foreach($tahunakademik as $val){ ?>
                                    <option value="<?php echo $val->id_akademik ?>" <?php echo ($datadiri->id_akademik == $val->id_akademik) ? 'selected' : '' ?>><?php echo $val->tahun_akademik ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" id="jabatan" value="<?php echo ($datadiri->jabatan) ? $datadiri->jabatan : '' ?>">
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
                                                                                    <label for="" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="Masukkan Kewarganegaraan" id="kewarganegaraan" value="<?php echo ($datadiri->kewarganegaraan) ? $datadiri->kewarganegaraan : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" id="nik" value="<?php echo ($datadiri->nik) ? $datadiri->nik : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">NPWP</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="npwp" class="form-control" placeholder="Masukkan NPWP" id="npwp" value="<?php echo ($datadiri->npwp) ? $datadiri->npwp : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Jalan</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="jalan" class="form-control" placeholder="Masukkan Jalan" id="jalan" value="<?php echo ($datadiri->jalan) ? $datadiri->jalan : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Dusun</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="dusun" class="form-control" placeholder="Masukkan Dusun" id="dusun"value="<?php echo ($datadiri->dusun) ? $datadiri->dusun : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">RT</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" id="rt" value="<?php echo ($datadiri->rt) ? $datadiri->rt : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">RW</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" id="rw" value="<?php echo ($datadiri->rw) ? $datadiri->rw : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kelurahan</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kelurahan" class="form-control" placeholder="Masukkan Kelurahan" id="kelurahan" value="<?php echo ($datadiri->kelurahan) ? $datadiri->kelurahan : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kecamatan</i></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" id="kecamatan" value="<?php echo ($datadiri->kecamatan) ? $datadiri->kecamatan : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Kode Pos</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos" id="kode_pos" value="<?php echo ($datadiri->kode_pos) ? $datadiri->kode_pos : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Telepon</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" name="no_tlp" class="form-control" placeholder="Masukkan Telepon" id="no_tlp" value="<?php echo ($datadiri->no_tlp) ? $datadiri->no_tlp : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">Email</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" id="email" value="<?php echo ($datadiri->email) ? $datadiri->email : '' ?>">
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
                                                                                <label for="" class="col-sm-3 col-form-label">NIK </label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nik_ortu[]" class="form-control" placeholder="Masukkan NIK" id="nik"  value="<?php echo ($ayah != '') ? $ayah->nik_ortu :''?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nama_ortu[]" class="form-control" placeholder="Masukkan Nama" id="nama"  value="<?php echo ($ayah != '') ? $ayah->nama_ortu : '' ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="tempat_lahir_ortu[]" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir"  value="<?php echo ($ayah != '') ? $ayah->tempat_lahir_ortu : '' ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="date" name="tgl_lahir_ortu[]" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir"  value="<?php echo ($ayah != '') ? $ayah->tgl_lahir_ortu : '' ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pekerjaan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pekerjaan ---</option>
                                                                                        <option value="Pegawai Negeri Sipil" <?php echo ($ayah != '') ? (($ayah->pekerjaan_ortu == 'Pegawai Negeri Sipil') ? 'selected' : '' ): '' ?>>Pegawai Negeri Sipil</option>
                                                                                        <option value="Pegawai Swasta" <?php echo ($ayah != '') ? (($ayah->pekerjaan_ortu == 'Pegawai Swasta') ? 'selected' : ''): '' ?>>Pegawai Swasta</option>
                                                                                        <option value="TNI/POLRI" <?php echo ($ayah != '') ? (($ayah->pekerjaan_ortu == 'TNI/POLRI') ? 'selected' : ''): '' ?>>TNI/POLRI</option>
                                                                                        <option value="Wirausaha" <?php echo ($ayah != '') ? (($ayah->pekerjaan_ortu == 'Wirausaha') ? 'selected' : ''): '' ?>>Wirausaha</option>
                                                                                        <option value="Lainnya" <?php echo ($ayah != '') ? (($ayah->pekerjaan_ortu == 'Lainnya') ? 'selected' : ''): '' ?>>Lainnya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pendidikan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pendidikan ---</option>
                                                                                        <option value="SD/Sederajat" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'SD/Sederajat') ? 'selected' : '' ): ''?>>SD/Sederajat</option>
                                                                                        <option value="SMP/Sederajat" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'SMP/Sederajat') ? 'selected' : '' ): '' ?>>SMP/Sederajat</option>
                                                                                        <option value="SMA/Sederajat" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'SMA/Sederajat') ? 'selected' : '' ): ''?>>SMA/Sederajat</option>
                                                                                        <option value="Strata 1/S1" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'Strata 1/S1') ? 'selected' : '' ): ''?>>Strata 1/S1</option>
                                                                                        <option value="Strata 1/S2" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'Strata 2/S2') ? 'selected' : '' ): ''?>>Strata 2/S2</option>
                                                                                        <option value="Strata 1/S3" <?php echo ($ayah != '') ? (($ayah->pendidikan_ortu == 'Strata 3/S3') ? 'selected' : ''): '' ?>>Strata 3/S3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Penghasilan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="penghasilan_ortu[]" id="penghasilan"required>
                                                                                        <option value="" style="display:none;">--- Pilih Penghasilan ---</option>
                                                                                        <option value="Kurang dari 3 juta" <?php echo ($ayah != '') ? ( ($ayah->penghasilan_ortu == 'Kurang dari 3 juta') ? 'selected' : '' ): '' ?>>Kurang Dari 3 juta</option>
                                                                                        <option value="3 juta - 5 juta" <?php echo ($ayah != '') ? ( ($ayah->penghasilan_ortu == '3 juta - 5 juta') ? 'selected' : '' ): ''?>>3 juta - 5 juta</option>
                                                                                        <option value="5 juta - 10 juta" <?php echo ($ayah != '') ? ( ($ayah->penghasilan_ortu == '5 juta - 10 juta') ? 'selected' : '' ): ''?>>5 juta - 10 juta</option>
                                                                                        <option value="Lebih dari 10 juta" <?php echo ($ayah != '') ? ( ($ayah->penghasilan_ortu == 'Lebih dari 10 juta') ? 'selected' : '' ): ''?>>Lebih Dari 10 juta</option>
                                                                                    </select>
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
                                                                                    <input type="text" name="nik_ortu[]" class="form-control" placeholder="Masukkan NIK" id="nik" value="<?php echo ($ibu != '') ? $ibu->nik_ortu : '' ?>" required>
                                                                                </div>
                                                                                <?php echo form_error('nik', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="nama_ortu[]" class="form-control" placeholder="Masukkan Nama" id="nama" value="<?php echo ($ibu != '') ? $ibu->nama_ortu : '' ?>" required>
                                                                                </div>
                                                                                <?php echo form_error('nama', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="tempat_lahir_ortu[]" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" value="<?php echo ($ibu != '') ? $ibu->tempat_lahir_ortu : '' ?>" required>
                                                                                </div>
                                                                                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="date" name="tgl_lahir_ortu[]" class="form-control" placeholder="Masukkan Tanggal Lahir" id="tgl_lahir" value="<?php echo ($ibu != '') ? $ibu->tgl_lahir_ortu : '' ?>" required>
                                                                                </div>
                                                                                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3"></div>') ?>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pekerjaan_ortu[]" id="pekerjaan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pekerjaan ---</option>
                                                                                        <option value="Pegawai Negeri Sipil" <?php echo ($ibu != '') ? ( ($ibu->pekerjaan_ortu == 'Pegawai Negeri Sipil') ? 'selected' : ''): '' ?>>Pegawai Negeri Sipil</option>
                                                                                        <option value="Pegawai Swasta" <?php echo ($ibu != '') ? ( ($ibu->pekerjaan_ortu == 'Pegawai Swasta') ? 'selected' : '' ): '' ?>>Pegawai Swasta</option>
                                                                                        <option value="TNI/POLRI" <?php echo ($ibu != '') ? ( ($ibu->pekerjaan_ortu == 'TNI/POLRI') ? 'selected' : '' ): '' ?>>TNI/POLRI</option>
                                                                                        <option value="Wirausaha" <?php echo ($ibu != '') ? ( ($ibu->pekerjaan_ortu == 'Wirausaha') ? 'selected' : '' ): '' ?>>Wirausaha</option>
                                                                                        <option value="Lainnya" <?php echo ($ibu != '') ? ( ($ibu->pekerjaan_ortu == 'Lainnya') ? 'selected' : '' ): '' ?>>Lainnya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="pendidikan_ortu[]" id="pendidikan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Pendidikan ---</option>
                                                                                        <option value="SD/Sederajat" <?php echo ($ibu != '') ? ( ($ibu->pendidikan_ortu == 'SD/Sederajat') ? 'selected' : '' ): ''?>>SD/Sederajat</option>
                                                                                        <option value="SMP/Sederajat" <?php echo ($ibu != '') ? (($ibu->pendidikan_ortu == 'SMP/Sederajat') ? 'selected' : '' ): ''?>>SMP/Sederajat</option>
                                                                                        <option value="SMA/Sederajat" <?php echo ($ibu != '') ? (($ibu->pendidikan_ortu == 'SMA/Sederajat') ? 'selected' : ''): '' ?>>SMA/Sederajat</option>
                                                                                        <option value="Strata 1/S1" <?php echo ($ibu != '') ? (($ibu->pendidikan_ortu == 'Strata 1/S1') ? 'selected' : '' ): ''?>>Strata 1/S1</option>
                                                                                        <option value="Strata 2/S2" <?php echo ($ibu != '') ? (($ibu->pendidikan_ortu == 'Strata 2/S2') ? 'selected' : ''): '' ?>>Strata 2/S2</option>
                                                                                        <option value="Strata 3/S3" <?php echo ($ibu != '') ? (($ibu->pendidikan_ortu == 'Strata 3/S3') ? 'selected' : ''): '' ?>>Strata 3/S3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="" class="col-sm-3 col-form-label">Penghasilan</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="penghasilan_ortu[]" id="penghasilan" required>
                                                                                        <option value="" style="display:none;">--- Pilih Penghasilan ---</option>
                                                                                        <option value="Kurang dari 3 juta" <?php echo ($ibu != '') ? (($ibu->penghasilan_ortu == 'Kurang dari 3 juta') ? 'selected' : '' ): '' ?>>Kurang Dari 3 juta</option>
                                                                                        <option value="3 juta - 5 juta" <?php echo ($ibu != '') ? ( ($ibu->penghasilan_ortu == '3 juta - 5 juta') ? 'selected' : '' ): ''?>>3 juta - 5 juta</option>
                                                                                        <option value="5 juta - 10 juta" <?php echo ($ibu != '') ? (($ibu->penghasilan_ortu == '5 juta - 10 juta') ? 'selected' : '' ): '' ?>>5 juta - 10 juta</option>
                                                                                        <option value="Lebih dari 10 juta" <?php echo ($ibu != '') ? (($ibu->penghasilan_ortu == 'Lebih dari 10 juta') ? 'selected' : '' ): ''?>>Lebih Dari 10 juta</option>
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
                            <button type="button" value="Cancel" class="btn btn-danger mt-3 mb-4" onclick=self.history.back()>Kembali</button>
                    </div>
                <!-- </form> -->
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
<?php form_close(); ?> 
</div>