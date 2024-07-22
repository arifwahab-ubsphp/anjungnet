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
                                    <h3>SSO Applications</h3>
                                    <a href="<?= base_url() ?>admin-dashboard/sso/create" class="btn btn-primary">Create
                                        New Application</a>
                                </div>
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Login URL</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach ($ssoList as $row) : ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->app_name ?></td>
                                            <td><?= $row->login_url ?></td>
                                            <td>
                                                <a href="<?= base_url('admin-dashboard/sso/edit/' . $row->id) ?>"
                                                    class="btn btn-primary btn-sm" title="Edit Application">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/sso/delete/' . $row->id) ?>"
                                                    class="btn btn-danger btn-sm" title="Delete Application">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/sso/attribute/' . $row->id) ?>"
                                                    class="btn btn-warning btn-sm" title="Application Attributes">
                                                    <i class="bx bx-cog"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/sso/login/' . $row->id) ?>"
                                                    class="btn btn-success btn-sm" title="Login" target="_blank">
                                                    <i class="bx bx-log-in"></i>
                                                </a>

                                            </td>
                                        </tr>
                                        <?php 
                                        $count++; endforeach; ?>
                                    </tbody>
                                </table>

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