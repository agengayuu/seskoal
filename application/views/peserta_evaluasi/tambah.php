<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Tambah Mahasiswa Evaluasi
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>
    
    <form action="">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Pilih Diklat </label>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name='id_diklat' id='id_diklat'>
                            <option value='0' disabled="" selected>--- Pilih Mata Diklat ---</option>
                            <?php foreach ($diklat as $d) { ?>
                            <option value="<?php echo $d->nama_diklat; ?>"><?php echo $d->nama_diklat; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-flat" title="Pilih Diklat">Pilih Diklat</button>
                    </div>
                </div>
            </div>     
        </div>


    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa Evaluasi</h6>
        </div>

        
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label"> Mata Kuliah <i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <select class="select2 form-control" name='id_mata_kuliah' id='id_mata_kuliah' required>
                            <option value='0' disabled="" selected>--- Pilih Mata Kuliah ---</option>
                            <?php foreach ($matakuliah as $mk) { ?>
                            <option value="<?php echo $mk->nama_mata_kuliah; ?>"><?php echo $mk->nama_mata_kuliah; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Tanggal Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_ujian" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Jam Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="time" name="jam_ujian" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 ml-4 col-form-label">Durasi Ujian<i style="color:red">*</i></label>
                    <div class="col-sm-9">
                        <input type="text" name="durasi_ujian" placeholder="Masukkan lama waktu ujian dalam menit" class="form-control" required>
                    </div>
                </div>
            </div>     

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Diklat</th>
                            <th>Pilih Semua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php 
                        $no =  1;
                        foreach ($ujian as $u) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $u->kode_mata_kuliah ?></td>
                            <td><?= $u->nama_mata_kuliah ?></td>
                            <td>
                            <?= $u->pertanyaan ?>
                            <ol type="A">
                                <li>
                                    <?php if ('A'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->a;
                                        echo "</b>";
                                    } else {
                                        echo $u->a;
                                    }
                                        ?>                                                                
                                </li>
                                <li>
                                    <?php if ('B'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->b;
                                        echo "</b>";
                                    } else {
                                        echo $u->b;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('C'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->c;
                                        echo "</b>";
                                    } else {
                                        echo $u->c;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('D'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->d;
                                        echo "</b>";
                                    } else {
                                        echo $u->d;
                                    }
                                        ?>    
                                </li>
                                <li>
                                    <?php if ('E'== $u->kunci_jawaban) {
                                        echo "<b>";
                                        echo $u->e;
                                        echo "</b>";
                                    } else {
                                        echo $u->e;
                                    }
                                        ?>    
                                </li>
                            </ol>
                            </td>
                            <td><?= $u->kunci_jawaban ?></td>
                            
                            <td>
                                 <?php echo anchor('soal_evaluasi_ujian/edit/'.$u->id_soal_evaluasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                 <?php echo anchor('soal_evaluasi_ujian/delete/'.$u->id_soal_evaluasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>' ) ?>
                            </td>
                            
                        </tr>
                                <?php
                            endforeach
                            ?> -->
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mb-4 mt-4">Simpan</button>
            <button type="button" value="Cancel" class="btn btn-danger mb-4 mt-4" onclick="history.back()">Batal</button>
        </div>
    </div>
    </form>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>