<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2nd Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">


    <style>
    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .btn-bd-primary {
        --bd-violet-bg: rgb(81, 177, 103);
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: rgb(81, 177, 103);
        --bs-btn-hover-border-color: rgb(81, 177, 103);
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: rgb(81, 177, 103);
        --bs-btn-active-border-color: rgb(81, 177, 103);
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    .head-banner {
        background-image: url('<?php echo base_url("assets/images/banner_front.png") ?>');
        background-size: cover;
        /* This makes sure the image covers the entire div */
        background-position: bottom;
        /* This centers the image */
        background-repeat: no-repeat;
        /* This prevents the image from repeating */
        width: 100%;
        /* Ensure the div takes full width */
        height: 150px;
        /* Set a fixed height or adjust as needed */
    }


    .ribbon-carousel {
        position: relative;
        /* Ensure the parent element has a positioning context */
    }

    .ribbon-carousel::before {
        position: absolute;
        content: '';
        background: #283593;
        height: 23px;
        width: 28px;
        /* top: 2rem; */
        top: 1.3rem;
        /* left: 0.2rem; */
        left: -0.8rem;
        transform: rotate(45deg);
        z-index: 0;
        /* Place it behind the card */
    }

    .ribbon-carousel::after {
        position: absolute;
        content: 'Info Grafik';
        /* top: 15px; */
        top: 3px;
        height: 28px;
        /* left: -1px; */
        left: -17px;
        padding: 2px 4px 4px 4px;
        width: 8rem;
        background: #3949ab;
        color: white;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        box-shadow: 4px 4px 15px rgba(26, 35, 126, 0.2);
        z-index: 2;
        /* Place it above the card content */
    }

    .scrollable-container {
        border: 1px solid #ccc;
        border-radius: 4px;
        /* Add border */
        /* max-height: 300px; */
        /* max-height: 550px; */
        max-height: 440px;
        /* Adjust height as needed */
        overflow-y: auto;
        /* Enable vertical scrolling */
        /* padding-bottom: 60px; */
        /* Space for button */
    }

    .scroll-button {
        height: 50px;
        /* Adjust button height as needed */
        left: 0;
        line-height: 50px;
        /* Center text vertically */
    }

    .scrollable-container::-webkit-scrollbar {
        width: 6px;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 3px;
    }

    .header-color {
        background-color: rgb(81, 177, 103);
        border: 0;

    }

    .custom-card-group .card {
        border: none;
        border-radius: 8px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100px;
        height: 80px;
    }

    .custom-card-group .card-body {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1em;
        color: #fff;
        padding: 15px;
        /* Adjusted padding */
    }

    .custom-card-group .card .fa {
        margin-right: 10px;
    }

    .header-panel {
        background-color: #f8f9fa;
        /* Light background color */
    }

    .text-dark {
        color: #343a40 !important;
        /* Dark text color */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .fab {
        transition: color 0.3s ease;
    }

    .fab:hover {
        color: rgb(81, 177, 103);
        /* Change icon color on hover */
    }

    .button-setting-logout .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        background-image: linear-gradient(to bottom, #007bff, #0056b3);
        /* Gradient for primary button */
        /* padding: 8px 20px; */
        padding: 0.25rem 0.5rem;
    }

    .button-setting-logout .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        background-image: linear-gradient(to bottom, #dc3545, #bd2130);
        /* Gradient for danger button */
        padding: 0.25rem 0.5rem;
        /* padding: 8px 20px; */
    }

    .button-setting-logout .btn-primary:hover,
    .btn-danger:hover {
        filter: brightness(90%);
        /* Slightly darken button on hover */
    }

    /* Custom button styles */
    .button-container .btn {
        font-size: 14px;
        text-align: center;
        padding: 10px 0;
        border-radius: 5px;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    /* Button hover effect */
    .button-container .btn:hover {
        background-color: #0056b3;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .announce-mobile {
        display: none;
    }

    @media (max-width: 576px) {

        .ribbon-carousel::before,
        .ribbon-carousel::after {
            display: none;
        }

        .main-content .card .card-body {
            padding: 0;
            font-size: 5px;
        }

        .announce-mobile {
            display: inline;
            padding-left: 20px;
        }

        .main-content .card .card-body .carousel-inner .carousel-item img {
            max-height: 500px;
        }
    }

    .offcanvas {
        z-index: 1045;
        /* Adjust if needed to ensure stacking order */
    }

    /* Increase z-index for each additional offcanvas */
    .offcanvas-container .offcanvas:nth-child(2) {
        z-index: 1047;
    }

    .offcanvas-container .offcanvas:nth-child(3) {
        z-index: 1048;
    }

    .custom-card {
        width: 100%;
        min-height: 100px;
        /* Adjust this value based on your desired card height */
    }

    .custom-card .card-body {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        height: 100%;
    }
    </style>
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>
    <!-- <img style="max-height:380px" class="d-block w-100" -->

    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-12 col-lg-12 head-banner d-none d-sm-block"> -->
            <div class="col-12 col-lg-12 d-none d-sm-block p-0">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo base_url('/assets/images/banner_front.png') ?>" class="d-block w-100"
                                style=" min-height:150px; max-height:150px" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col header-panel header-color text-dark p-2 d-flex justify-content-between align-items-center">
                <div class="ms-4">
                    <a href="https://www.instagram.com" target="_blank" class="text-dark me-3">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="https://www.facebook.com" target="_blank" class="text-dark me-3">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://www.youtube.com" target="_blank" class="text-dark me-3">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </div>
                <div class="ms-auto me-4 d-flex align-items-center button-setting-logout">
                    <!-- Notification Bell -->
                    <div class="dropdown me-3 position-relative">
                        <a href="#" class="text-dark" id="notificationDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-bell fa-lg"></i>
                            <span style="font-size: 0.7em; padding: 0.2em 0.4em; border-radius: 0.5rem;"
                                class="badge bg-danger rounded-pill position-absolute top-0 end-0 translate-middle badge-sm">3</span>

                            <!-- Replace 3 with dynamic count -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0 scrollable-container"
                            aria-labelledby="notificationDropdown" style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item" href="#">Notification 121312123123123123121312</a></li>
                            <li><a class="dropdown-item" href="#">Notification 2</a></li>
                            <li><a class="dropdown-item" href="#">Notification 3</a></li>
                            <li><a class="dropdown-item" href="#">Notification 1</a></li>
                            <li><a class="dropdown-item" href="#">Notification 2</a></li>
                            <li><a class="dropdown-item" href="#">Notification 3</a></li>
                            <li><a class="dropdown-item" href="#">Notification 1</a></li>
                            <li><a class="dropdown-item" href="#">Notification 2</a></li>
                            <li><a class="dropdown-item" href="#">Notification 3</a></li>
                            <!-- Add more notifications here -->
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="<?php echo base_url() ?>login/logout" class="btn btn-sm btn-danger btn-xs">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                        <a href="<?php echo base_url() ?>admin-dashboard" class="btn btn-sm btn-primary btn-xs">
                            <i class="fas fa-cog me-1"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- <div class="col-md-3 col-lg-3 p-2"> -->
            <div class="col-md-12 col-lg-3">
                <div class="card border-0 text-center">
                    <!-- <div class="card-body mt-md-5"> -->
                    <div class="card-body mt-md-4 p-md-0 p-0">
                        <!-- <h4>Selamat Datang,</h4> -->
                        <!-- <div class="row border-bottom border-top mb-3 mb-md-3 mt-2"> -->
                        <div class="row mb-3 mb-md-3 mt-2">
                            <div class="media d-flex align-items-center mb-3 mt-3">


                                <?php 
                                    
                                    $gambar ="";
                                    foreach($foto as $row):
                                    $gambar = $row->Gambar;
                                    endforeach;
                                ?>

                                <?php 

                                if($gambar<>"" || is_null($gambar)){
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($gambar).'" class="rounded-circle img-fluid ms-4" style="width: 55px; height: 55px;"
                                    alt="Profile Icon"/>';
                                }else{

                                    echo '<img src="https://png.pngtree.com/png-vector/20220807/ourmid/pngtree-man-avatar-wearing-gray-suit-png-image_6102786.png"
                                    class="rounded-circle img-fluid ms-4" style="width: 50px; height: 50px;"
                                    alt="Profile Icon">';
                                }

                                ?>





                                <!-- <img src="https://png.pngtree.com/png-vector/20220807/ourmid/pngtree-man-avatar-wearing-gray-suit-png-image_6102786.png"
                                    class="rounded-circle img-fluid ms-4" style="width: 50px; height: 50px;"
                                    alt="Profile Icon"> -->
                                <div class="media-body">

                                    <?php 
                                    
                                    foreach($userlist as $row):
                                    $nama = $row->Nama;
                                    $pusat = $row->NPusat;
                                    $nok = $row->NoK;
                                    endforeach;
                                    
                                    ?>
                                    <p class="card-text ms-4"><?= $nama; ?> (<?= $nok; ?>)</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-block d-lg-none">
                            <h4 class="border-bottom mb-3">Quick Access</h4>
                            <div class="container">
                                <div class="row">
                                    <?php foreach ($parentList as $menu): ?>
                                    <div class="col-6 col-md-3 col-lg-3 mb-3 d-flex align-items-stretch">
                                        <div class="card custom-card"
                                            style="background-color: <?php echo esc($menu->warna_menu); ?>; color: white;">
                                            <div class="card-body">
                                                <i class="fas fa-users"></i>
                                                <?php if ($menu->jenis_menu == 'SSO'): ?>
                                                <a href="<?php echo base_url('admin-dashboard/sso/login/' . $menu->url_menu); ?>"
                                                    target="_blank" style="color: white;">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php elseif ($menu->jenis_menu != 'SSO' && $menu->jenis_menu != 'Menu'): ?>
                                                <a href="<?php echo esc($menu->url_menu); ?>" target="_blank"
                                                    style="color: white;">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php else: ?>
                                                <a href="#" style="color: white;" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvas<?php echo $menu->id; ?>"
                                                    aria-controls="offcanvas<?php echo $menu->id; ?>">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                        </div>
                        <!-- <div class="col-6 col-md-4 col-lg-6 mb-2 d-flex align-items-stretch">
                                <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasMain" aria-controls="offcanvasMain">HIM</button>
                            </div> -->
                        <div class="row button-container">
                            <?php foreach ($leftMenuList as $menu): ?>
                            <?php if ($menu->jenis_menu == 'SSO'): ?>
                            <div class="col-6 col-md-4 col-lg-6 mb-2 d-flex align-items-stretch">
                                <a href="<?php echo base_url('admin-dashboard/sso/login/' . $menu->url_menu); ?>"
                                    target="_blank" class="btn btn-primary w-100">
                                    <?php echo esc($menu->nama_menu); ?>
                                </a>
                            </div>
                            <?php elseif ($menu->jenis_menu != 'SSO' && $menu->jenis_menu != 'Menu'): ?>
                            <div class="col-6 col-md-4 col-lg-6 mb-2 d-flex align-items-stretch">
                                <a href="<?php echo esc($menu->url_menu); ?>" target="_blank"
                                    class="btn btn-primary w-100">
                                    <?php echo esc($menu->nama_menu); ?>
                                </a>
                            </div>
                            <?php else: ?>
                            <div class="col-6 col-md-4 col-lg-6 mb-2 d-flex align-items-stretch">
                                <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas<?php echo $menu->id; ?>"
                                    aria-controls="offcanvas<?php echo $menu->id; ?>">
                                    <?php echo esc($menu->nama_menu); ?>
                                </button>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 main-content p-md-3">
                <div class="card border-0">
                    <div class="card-body p-md-0">
                        <h3 class="border-bottom mb-3 d-none d-lg-block mt-3">Quick Access</h3>
                        <div class="row d-none d-lg-flex">

                            <div class="container">
                                <div class="row">
                                    <?php foreach ($parentList as $menu): ?>
                                    <div class="col-6 col-md-3 col-lg-3 mb-3 d-flex align-items-stretch">
                                        <div class="card custom-card"
                                            style="background-color: <?php echo esc($menu->warna_menu); ?>; color: white;">
                                            <div class="card-body">
                                                <i class="fas fa-users"></i>
                                                <?php if ($menu->jenis_menu == 'SSO'): ?>
                                                <a href="<?php echo base_url('admin-dashboard/sso/login/' . $menu->url_menu); ?>"
                                                    target="_blank" style="color: white;">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php elseif ($menu->jenis_menu != 'SSO' && $menu->jenis_menu != 'Menu'): ?>
                                                <a href="<?php echo esc($menu->url_menu); ?>" target="_blank"
                                                    style="color: white;">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php else: ?>
                                                <a href="#" style="color: white;" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvas<?php echo $menu->id; ?>"
                                                    aria-controls="offcanvas<?php echo $menu->id; ?>">
                                                    <?php echo esc($menu->nama_menu); ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                        </div>

                        <div class="row mx-1">
                            <div class="card text-left ribbon-carousel p-0 card-carousel-slide border-0">
                                <img class="card-img-top" src="holder.js/100px180/" alt="">
                                <div class="card-body p-0">
                                    <h3 class="announce-mobile">Info Grafik</h3>
                                    <div id="carouselExample-cf"
                                        class="carousel carousel-dark slide carousel-fade mt-2 mt-md-4"
                                        data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img style="max-height:380px" class="d-block w-100 h-100"
                                                    src="https://anjungnet2.mardi.gov.my/index/modules_resources/images_contents/0dc9707ca0100d0703fed8911f744901.png"
                                                    alt="First slide" />
                                                <div class="carousel-caption d-none d-md-block">
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img style="max-height:380px" class="d-block w-100"
                                                    src="https://anjungnet2.mardi.gov.my/index/modules_resources/images_contents/bf6c31bb44e378cf19001cc679c715c3.png"
                                                    alt="Second slide" />
                                                <div class="carousel-caption d-none d-md-block">
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img style="max-height:380px" class="d-block w-100"
                                                    src="https://anjungnet2.mardi.gov.my/index/modules_resources/images_contents/9cb7ac402776d38659ee2f0531bcb207.jpg"
                                                    alt="Third slide" />
                                                <div class="carousel-caption d-none d-md-block">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExample-cf" role="button"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExample-cf" role="button"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-3 mt-3 announcement">
                <h3 class="border-bottom card-title ms-2 mb-3 mt-3"></i>Terkini</h3>
                <div class="scrollable-container position-relative d-block w-100 h-100">
                    <!-- Announcement Card 1 -->
                    <div class="card announcement-card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Announcement Title 1</h4>
                            <p class="card-text">This is the first announcement text. It should
                                contain
                                relevant information for the audience.</p>
                        </div>
                    </div>
                    <!-- Announcement Card 2 -->
                    <div class="card announcement-card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Announcement Title 2</h4>
                            <p class="card-text">This is the second announcement text. It should
                                contain
                                relevant information for the audience.</p>
                        </div>
                    </div>
                    <!-- Announcement Card 3 -->
                    <div class="card announcement-card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Announcement Title 3</h4>
                            <p class="card-text">This is the third announcement text. It should
                                contain
                                relevant information for the audience.</p>
                        </div>
                    </div>
                    <div class="card announcement-card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Announcement Title 4</h4>
                            <p class="card-text">This is the third announcement text. It should
                                contain
                                relevant information for the audience.</p>
                        </div>
                    </div>
                    <div class="card announcement-card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Announcement Title 4</h4>
                            <p class="card-text">This is the third announcement text. It should
                                contain
                                relevant information for the audience.</p>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary bottom-0">Pengumuman Seterusnya</button>
                </div>
            </div>
        </div>
        <!-- <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"> -->
        <div class="dropdown position-fixed bottom-0 start-1 mb-3 me-3 bd-mode-toggle">
            <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
                type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                        aria-pressed="false">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#sun-fill"></use>
                        </svg>
                        Light
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                        aria-pressed="false">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#moon-stars-fill"></use>
                        </svg>
                        Dark
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active"
                        data-bs-theme-value="auto" aria-pressed="true">
                        <svg class="bi me-2 opacity-50" width="1em" height="1em">
                            <use href="#circle-half"></use>
                        </svg>
                        Auto
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>

        <?php
        // Initialize an empty array to hold all menus and their children
        $allMenus = [];

        // Function to recursively add menus and their children
        function addMenuWithChildren(&$allMenus, $menu, $menuChildren) {
            // Add the current menu to the array
            $allMenus[] = $menu;

            // If the menu has children, add them recursively
            if (!empty($menu->childrenn)) {
                foreach ($menu->childrenn as $childMenu) {
                    addMenuWithChildren($allMenus, $childMenu, $menuChildren);
                }
            }
        }

        // Combine parent menus, left menus, and child menus
        $allMenus = array_merge($parentList, $leftMenuList);

        // Iterate over each menu and include their children if available
        foreach ($allMenus as $menu) {
            if (isset($menuChildren[$menu->id])) {
                foreach ($menuChildren[$menu->id] as $childMenu) {
                    addMenuWithChildren($allMenus, $childMenu, $menuChildren);
                }
            }
        }
        ?>

        <?php foreach ($allMenus as $menu): ?>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvas<?php echo $menu->id; ?>" aria-labelledby="offcanvas<?php echo $menu->id; ?>Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvas<?php echo $menu->id; ?>Label">
                    <?php echo esc($menu->nama_menu); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php if (!empty($menu->breadcrumbPath)): ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-numbered">
                        <?php foreach ($menu->breadcrumbPath as $index => $breadcrumb): ?>
                        <li class="breadcrumb-item">
                            <button class="btn btn-link" type="button" data-custom-toggle="tooltip"
                                data-bs-placement="top" title="<?php echo esc($breadcrumb->nama_menu); ?>"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvas<?php echo $breadcrumb->id; ?>"
                                aria-controls="offcanvas<?php echo $breadcrumb->id; ?>">
                                <?php echo ($index + 1) . '.'; ?>
                            </button>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </nav>
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <?php if (isset($menuChildren[$menu->id]) && count($menuChildren[$menu->id]) > 0): ?>
                        <div class="row">
                            <?php foreach ($menuChildren[$menu->id] as $childMenu): ?>
                            <div class="col-6 mb-3">
                                <?php if ($childMenu->jenis_menu == 'SSO'): ?>
                                <a href="<?php echo base_url('admin-dashboard/sso/login/' . $childMenu->url_menu); ?>"
                                    target="_blank" class="btn btn-danger w-100"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </a>
                                <?php elseif ($childMenu->jenis_menu != 'SSO' && $childMenu->jenis_menu != 'Menu'): ?>
                                <a href="<?php echo esc($childMenu->url_menu); ?>" target="_blank"
                                    class="btn btn-primary w-100"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </a>
                                <?php else: ?>
                                <button class="btn btn-warning w-100" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas<?php echo $childMenu->id; ?>"
                                    aria-controls="offcanvas<?php echo $childMenu->id; ?>"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </button>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <!-- <p>No child menus available.</p> -->
                        <?php endif; ?>

                        <?php if (!empty($menu->childrenn)): ?>
                        <div class="row">
                            <?php foreach ($menu->childrenn as $childMenu): ?>
                            <div class="col-6 mb-3">
                                <?php if ($childMenu->jenis_menu == 'SSO'): ?>
                                <a href="<?php echo base_url('admin-dashboard/sso/login/' . $childMenu->url_menu); ?>"
                                    target="_blank" class="btn btn-danger w-100"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </a>
                                <?php elseif ($childMenu->jenis_menu != 'SSO' && $childMenu->jenis_menu != 'Menu'): ?>
                                <a href="<?php echo esc($childMenu->url_menu); ?>" target="_blank"
                                    class="btn btn-primary w-100"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </a>
                                <?php else: ?>
                                <button class="btn btn-warning w-100" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas<?php echo $childMenu->id; ?>"
                                    aria-controls="offcanvas<?php echo $childMenu->id; ?>"
                                    style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <?php echo esc($childMenu->nama_menu); ?>
                                </button>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <!-- <p>No child menus available.</p> -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


        <!-- Placeholder for Additional Offcanvas -->
        <div id="offcanvasContainer"></div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const storedTheme = localStorage.getItem('theme');
        const body = document.body;
        const themeToggles = document.querySelectorAll('[data-bs-theme-value]');
        const themeIcon = document.querySelector('.theme-icon-active use');
        const themeText = document.getElementById('bd-theme-text');
        const themeToggleDropdown = document.getElementById('bd-theme');

        function setTheme(theme) {
            body.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);

            themeToggles.forEach(toggle => {
                toggle.setAttribute('aria-pressed', toggle.getAttribute('data-bs-theme-value') ===
                    theme);
                toggle.classList.toggle('active', toggle.getAttribute('data-bs-theme-value') ===
                    theme);
            });

            switch (theme) {
                case 'dark':
                    themeIcon.setAttribute('href', '#moon-stars-fill');
                    themeText.innerText = 'Dark mode';
                    break;
                case 'light':
                    themeIcon.setAttribute('href', '#sun-fill');
                    themeText.innerText = 'Light mode';
                    break;
                default:
                    themeIcon.setAttribute('href', '#circle-half');
                    themeText.innerText = 'Auto mode';
                    break;
            }
        }

        themeToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                setTheme(this.getAttribute('data-bs-theme-value'));
            });
        });

        setTheme(storedTheme || 'auto');
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bs-toggle="offcanvas"]').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-bs-target').substring(1);
                const offcanvas = document.getElementById(targetId);


            });
        });
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-custom-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
    </script>
</body>
</html>