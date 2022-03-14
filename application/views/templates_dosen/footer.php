</div>
</div>
</div> 
<!-- Footer -->
<footer class="sticky-footer bg-primary">
    <div class="container my-auto">
        <div class="copyright text-center text-white my-auto">
            <span>Copyright &copy; 2022 Academic Information Management System - SESKOAL, All Right Reserved</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>js/demo/datatables-demo.js"></script>

<script>
    $(function() {
        $('.form-check-input').on('click', function() {

            const idmenu = $(this).data('menu');
            const idgrup = $(this).data('role');
            console.log(idmenu, idgrup)

            $.ajax({
                url: "<?= base_url('hak_akses/ganti_akses'); ?>",
                type: 'post',
                data: {
                    id_menu: idmenu,
                    id_grup_user: idgrup

                },
                success: function() {
                    document.location.href = "<?= base_url('hak_akses/akses/'); ?>" + idgrup;

                }
            });

        });

    })
</script>


</body>

</html>