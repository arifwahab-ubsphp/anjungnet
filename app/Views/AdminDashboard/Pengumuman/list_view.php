<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <style>
    .border-left-secondary {
        border-left: .25rem solid #858796 !important;
    }

    .border-left-primary {
        border-left: .25rem solid #4e73df !important
    }

    .border-left-success {
        border-left: .25rem solid #71dd37 !important
    }

    .border-left-danger {
        border-left: .25rem solid #ff3e1d !important
    }

    .border-left-warning {
        border-left: .25rem solid #ffab00 !important
    }

    .border-left-info {
        border-left: .25rem solid #03c3ec !important
    }
    </style>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-5 test-size">
                    <!-- Notification Messages -->
                    <?php if (session()->has('Mesej')) : ?>
                    <div class="alert alert-success">
                        <?= session('Mesej') ?>
                    </div>
                    <?php elseif (session()->has('error')) : ?>
                    <?php $errors = session('error'); ?>
                    <div class="alert alert-danger">
                        <?php if (is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                        <?php else : ?>
                        <?= esc($errors) ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Senarai Pengguna</h5>
                        <a href="<?= base_url('admin-dashboard/news_form') ?>" class="btn rounded-pill btn-primary">
                            <span class="tf-icons bx bxs-user-plus">Tambah Pengumuman</span>
                        </a>
                    </div>
                    <div class="card-body ">
                        <table id="example" class="table table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Pengumuman</th>
                                    <th>Keterangan</th>
                                    <th>Kategori Pengumuman</th>
                                    <!-- <th>Peranan</th> -->
                                    <th>Email Status</th>
                                    <th>Pengguna</th>
                                    <th>Tarikh Cipta</th>
                                    <th>Tarikh Kemaskini</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($news_list as $row) : ?>
                                <tr>
                                    <td><?= $row->pengumuman_nama ?></td>
                                    <td><?= $row->pengumuman_text ?></td>
                                    <td><?= $row->cat_news_name ?></td>
                                    <td style="text-align: center">
                                        <?php 
                      if (empty($row->pengumuman_mailstate) || $row->pengumuman_mailstate == "None"){ ?>
                                        <a href=""><i class="bx bx-mail-send me-1"></i></a>
                                        <?php }
                      else{ ?>
                                        <span><i class="bx bx-mail-send"
                                                style="font-size:2rem ; color:#71dd37"></i></span>
                                        <?php }                      
                      ?>
                                    </td>
                                    <td><?= $row->pengumuman_updateby ?></td>
                                    <td><?= $row->pengumuman_created ?></td>
                                    <td><?= $row->pengumuman_updated ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-show"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"
                                                        style="color:blue"></i> Edit</a>
                                                <a class="dropdown-item" href=""><i class="bx bx-trash me-1"
                                                        style="color:red"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>
    <!-- / Footer -->


</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>