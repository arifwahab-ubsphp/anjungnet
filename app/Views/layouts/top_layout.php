<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>ANJUNGNET 3.0</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/mardi.png') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <!-- <link rel="stylesheet" href="../assets/vendor/sneats/boxicons.css" /> -->
    <?= link_tag(base_url("assets/vendors/sneats/vendor/fonts/boxicons.css")) ?>


    <!-- Core CSS -->
    <!-- <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" /> -->
    <!-- <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" /> -->
    <?= link_tag(base_url("assets/vendors/sneats/vendor/css/core.css")) ?>
    <?= link_tag(base_url("assets/vendors/sneats/vendor/css/theme-default.css")) ?>
    <?= link_tag(base_url("assets/vendors/sneats/css/demo.css")) ?>


    <!-- Vendors CSS -->
    <!-- <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> -->
    <?= link_tag(base_url("assets/vendors/sneats/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")) ?>
    <!-- <?= link_tag(base_url("assets/vendors/datatables/datatables.css")) ?>
    <?= link_tag(base_url("assets/vendors/datatables/datatables.min.css")) ?> -->



    <!-- Page CSS -->

    <!-- Helpers -->
    <!-- <script src="../assets/vendor/js/helpers.js"></script> -->
    <?= script_tag(base_url("assets/vendors/sneats/vendor/js/helpers.js")) ?>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <!-- <script src="../assets/js/config.js"></script> -->
    <?= script_tag(base_url("assets/vendors/sneats/js/config.js")) ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <?= script_tag(base_url("assets/vendors/sneats/vendor/js/summernote-lite.min.js")) ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet" />





</head>