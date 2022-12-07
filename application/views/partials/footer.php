<!-- Footer -->
    <?php
        if($this->session->userdata('role') != 'admin'){?>
            <footer class="sticky-footer" style="background-color:lightgray">
        <?php }else{?>
            <footer class="sticky-footer">
        <?php }?>
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="font-size:20px">Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url()?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url()?>assets/js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url()?>assets/js/demo/datatables-demo.js"></script>

    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if($this->session->flashdata('sukses')){?>
    <script>
        const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('sukses') ?>'
			})
		</script>
    <?php } ?>

    <?php if($this->session->flashdata('gagal')){?>
    <script>
        const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'error',
				title: '<?= $this->session->flashdata('gagal') ?>'
			})
		</script>
    <?php } ?>
    </script>


</body>

</html>