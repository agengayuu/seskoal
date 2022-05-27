<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Dosen
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan') ?>
    <!-- <?php echo form_open_multipart('dosen/adminsimpan'); ?> -->

    <?php echo anchor('dosen/admintambah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Dosen</button>') ?>
    <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#exampleModal"> Import CSV</button>
    

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dosen</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width = "5px" >No</th>
                            <th>NID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th style="text-align:center ">Aksi</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        foreach ($dosen as $d) : ?>

                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?= $d->nip ?></td>
                            <td><?= $d->gelar_depan ?> <?= $d->nama ?> <?= $d->gelar_belakang ?> </td>
                            <td><?= $d->email ?></td>
                            
                            <td> 
                                <center>
                                <?php echo anchor('dosen/admindetail/'.$d->id_dosen, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>' ) ?> 
                                <?php echo anchor('dosen/adminedit/'.$d->id_dosen, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>' ) ?>
                                <a onclick="return confirm('Apa anda yakin menghapus data ini?')"
                                     href="<?= base_url('dosen/adminhapus/').$d->id_dosen ?>"
                                     class="btn btn-sm btn-danger">
                                     <i class="fa fa-trash"></i></a>
                                </center>
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

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

        <div class="modal-content">
        <form action="<?php echo base_url('dosen/importcsv'); ?>" class="horizontal-form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background-color:#3f6096;">
            <h5 class="modal-title" id="exampleModalLabel"><font color="white">Form import data mahasiswa via File CSV</font></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Upload File CSV</label>
                        <input type="file" name="filecsv" id="filecsv" class="form-control">
                    </div>
                </div>
            </div>
            <HR>
                <br>
                contoh file csv bisa klik <a target="_blank" href="<?php echo base_url('assets/dosen.csv'); ?>">disini</a>					
                <br/>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="import" class="btn btn-primary">Import</button>
        </div>
        </form>
        </div>
  </div>
  
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
</script>