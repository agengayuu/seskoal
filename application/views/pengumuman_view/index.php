<title><?= $title; ?></title>

<div class="container-fluid">
    <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body">
            Pengumuman
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!--table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Judul Pengumuman</th>
                            <th>Aksi</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengumuman as $pa) : ?>
                            <tr>
                                <td style="text-align: center"><?php echo $no++ ?></td>
                                <td><?= date('d-m-Y', strtotime($pa->tgl_pembuatan)) ?></td>
                                <td><?= $pa->judul_pengumuman ?></td>
                                <td style="text-align: center">
                                    <button id="detail" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-detail" data-idpengumuman="<?= $pa->id_pengumuman ?>" data-judulpengumuman="<?= $pa->judul_pengumuman ?>" data-tglpembuatan="<?= $pa->tgl_pembuatan ?>" data-isipengumuman="<?= $pa->isi_pengumuman ?>">
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

    <!-- Modal -->
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Detail Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var idpengumuman = $(this).data('idpengumuman');
            var judulpengumuman = $(this).data('judulpengumuman');
            var tglpembuatan = $(this).data('tglpembuatan');
            var isipengumuman = $(this).data('isipengumuman');
            // if(id)
            $('#id_pengumuman').text(idpengumuman);
            $('#judul_pengumuman').text(judulpengumuman);
            $('#tgl_pembuatan').text(tglpembuatan);
            $('#isi_pengumuman').text(isipengumuman);
            console.log(idpengumuman);
        })

        $('#modal-detail').on('show.bs.modal', function(event) {
            var judulpengumuman = $(event.relatedTarget).data('judulpengumuman');
            var tglpembuatan = $(event.relatedTarget).data('tglpembuatan');
            var isipengumuman = $(event.relatedTarget).data('isipengumuman');
            $(this).find(".modal-body").html('');
            $(this).find(".modal-body").html(`
            <div class="modal-body table-responsive">
                <table class="tabel no margin">
                    <tbody>
                        <tr>
                            <th>Judul Pengumuman</th>
                            <td>:</td>
                            <td><span id="judul_pengumuman">${judulpengumuman}</span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td><span id="tgl_pembuatan">${tglpembuatan}</span></td>
                        </tr>
                        <tr>
                            <th>Isi Pengumuman</th>
                            <td>:</td>
                            <td><span id="isi_pengumuman">${isipengumuman}></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            `);
        });
    })
</script>