    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <!-- <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> -->

    <?= script_tag(base_url("assets/vendors/sneats/vendor/libs/jquery/jquery.js")) ?>
    <?= script_tag(base_url("assets/vendors/sneats/vendor/libs/popper/popper.js")) ?>
    <?= script_tag(base_url("assets/vendors/sneats/vendor/js/bootstrap.js")) ?>
    <?= script_tag(base_url("assets/vendors/sneats/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")) ?>

    <!-- <script src="../assets/vendor/js/menu.js"></script> -->
    <?= script_tag(base_url("assets/vendors/sneats/vendor/js/menu.js")) ?>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <!-- <script src="../assets/js/main.js"></script> -->
    <!-- <?= script_tag(base_url("assets/vendors/sneats/js/main.js")) ?> -->
    <!-- <?= script_tag(base_url("assets/vendors/datatables/jquery.js")) ?> -->
    <!-- <?= script_tag(base_url("assets/vendors/datatables/datatables.js")) ?>
    <?= script_tag(base_url("assets/vendors/datatables/datatables.min.js")) ?> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>


    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable({

    });


});
    </script>
    </body>
    </html>