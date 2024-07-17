<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <?php 
                    if (session()->getFlashdata('status')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('status');
                        echo '</div>';
                    }
                ?>
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>Menu Item</h3>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#aras1">ARAS 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#aras2">ARAS 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#aras3">ARAS 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aras1">
                                        <div class="container mb-4">
                                            <form action="<?= base_url('admin-dashboard/menu-store') ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nama-menu" class="form-label">Nama Menu</label>
                                                            <input type="text" class="form-control" id="nama-menu"
                                                                name="nama-menu" placeholder="Masukan Nama Menu">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="url-menu" class="form-label">URL Menu</label>
                                                            <input type="text" class="form-control" id="url-menu"
                                                                name="url-menu" placeholder="Masukan URL Menu">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="susunan" class="form-label">Susunan</label>
                                                            <input type="text" class="form-control" id="susunan"
                                                                name="susunan" placeholder="Masukan Susunan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Nama Menu</th>
                                                            <th>URL Menu</th>
                                                            <th>Susunan</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-menu-aras1">
                                                        <?php foreach ($parentList as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= $value->nama_menu ?></td>
                                                            <td><?= $value->url_menu ?></td>
                                                            <td><?= $value->susunan ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="aras2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ar1-menu" class="form-label">Aras 1</label>
                                                    <select class="form-select" id="ar1-menu" name="ar1-menu">
                                                        <option selected>Select Aras 1 Menu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama-menu-2" class="form-label">Nama Menu</label>
                                                    <input type="text" class="form-control" id="nama-menu-2"
                                                        name="nama-menu-2" placeholder="Masukan Nama Menu">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="susunan-2" class="form-label">Susunan</label>
                                                    <input type="text" class="form-control" id="susunan-2"
                                                        name="susunan-2" placeholder="Masukan Susunan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Nama Menu</th>
                                                            <th>Susunan</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-menu-aras2">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="aras3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ar2-menu" class="form-label">Aras 2</label>
                                                    <select class="form-select" id="ar2-menu" name="ar2-menu">
                                                        <option selected>Select Aras 2 Menu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3"> <label for="nama-menu-3" class="form-label">Nama
                                                        Menu</label>
                                                    <input type="text" class="form-control" id="nama-menu-3"
                                                        name="nama-menu-3" placeholder="Masukan Nama Menu">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="url-menu" class="form-label">URL Menu</label>
                                                    <input type="text" class="form-control" id="url-menu"
                                                        name="url-menu" placeholder="Masukan URL Menu">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3"> <label for="susunan-3"
                                                        class="form-label">Susunan</label>
                                                    <input type="text" class="form-control" id="susunan-3"
                                                        name="susunan-3" placeholder="Masukan Susunan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Bil.</th>
                                                        <th>Nama Menu</th>
                                                        <th>Susunan</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-menu-aras3">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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