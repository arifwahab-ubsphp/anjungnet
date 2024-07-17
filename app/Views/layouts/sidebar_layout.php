<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo" align="center" style="height: 130px">
                <a href="index.html" class="app-brand-link"
                    style="display: block; margin-left: auto; margin-right: auto;">
                    <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2"></span> -->
                    <img src="<?php echo base_url('assets/images/mardi.png') ?>" style="width: 60%; height: 100%">
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <?php
                function isActive($uriSegment) {
                    $currentUrl = current_url();
                    return strpos($currentUrl, $uriSegment) !== false ? 'active' : '';
                }
                ?>


            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item <?= isActive('cards-basic.html'); ?>">
                    <a href="index.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <!-- Layouts -->
                <li class="menu-item <?= isActive('cards-basic.html'); ?>">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-user"></i>
                        <div data-i18n="Layouts">Pengguna</div>
                    </a>

                    <ul class="menu-sub <?= isActive('cards-basic.html'); ?>">
                        <li class="menu-item">
                            <a href="layouts-without-menu.html" class="menu-link">
                                <div data-i18n="Without menu">Senarai</div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Tetapan</span></li>
                <!-- Cards -->

                <li class="menu-item <?= isActive('admin-dashboard/menu'); ?>">
                    <a href="<?php echo base_url() ?>admin-dashboard/menu" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-menu-alt-left"></i>
                        <div data-i18n="Basic">Menu</div>
                    </a>
                </li>
                <li class="menu-item <?= isActive('cards-basic.html'); ?>">
                    <a href="cards-basic.html" class="menu-link">
                        <!-- <i class="menu-icon tf-icons bx bx-task"></i> -->
                        <i class='menu-icon tf-icons bx bxs-bell-ring'></i>
                        <div data-i18n="Basic">Pengumuman</div>
                    </a>
                </li>
                <li class="menu-item <?= isActive('admin-dashboard/banner'); ?>">
                    <a href="<?php echo base_url() ?>admin-dashboard/banner" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-image-add"></i>
                        <div data-i18n="Basic">Banner</div>
                    </a>
                </li>
                <li class="menu-item <?= isActive('admin-dashboard/sso'); ?>">
                    <a href="<?php echo base_url() ?>admin-dashboard/sso" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-lock-open'></i>
                        <div data-i18n="Basic">Single-Sign-On</div>
                    </a>
                </li>

                <!-- Misc -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
                <li class="menu-item">
                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="menu-link">
                        <i class="menu-icon tf-icons bx bx-support"></i>
                        <div data-i18n="Support">Panduan Penggunaan Sistem</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Documentation">Laporan</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <span><b>PENGUMUMAN DARI IM:</b></span><span style="color:red"> &nbsp Sistem Anjungnet v.3
                                Sedang Dalam Proses Pembangunan</span>
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo base_url('assets/images/mardi.png') ?>" alt
                                        class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?php echo base_url('assets/images/mardi.png') ?>" alt
                                                        class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">John Doe</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="d-flex align-items-center align-middle">
                                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                            <span class="flex-grow-1 align-middle">Billing</span>
                                            <span
                                                class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth-login-basic.html">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <?= $this->renderSection('content-wrapper') ?>
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->