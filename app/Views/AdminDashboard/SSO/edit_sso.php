<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <?php if (session()->has('status')):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <?= session()->get('status') ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h3>Edit SSO</h3>
                                <form action="<?= base_url('admin-dashboard/sso/update/' . $sso->id) ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="app_name">App Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="<?= set_value('app_name', $sso->app_name) ?>" id="app_name"
                                                    name="app_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="form_name">Form Name</label>
                                                <input type="text" class="form-control"
                                                    value="<?= set_value('form_name', $sso->form_name) ?>"
                                                    id="form_name" name="form_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="login_url">Login URL</label>
                                                <input type="text" class="form-control"
                                                    value="<?= set_value('login_url', $sso->login_url) ?>"
                                                    id="login_url" name="login_url">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="login_action_url">Login Action URL</label>
                                                <input type="text" class="form-control"
                                                    value="<?= set_value('login_action_url', $sso->login_action_url) ?>"
                                                    id="login_action_url" name="login_action_url">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="submit_type">Submit Type <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" id="submit_type" name="submit_type"
                                                    required>
                                                    <option value="">Select Submit Type</option>
                                                    <option value="1" <?= $sso->submit_type == 1 ? 'selected' : '' ?>>
                                                        POST</option>
                                                    <option value="0" <?= $sso->submit_type == 0 ? 'selected' : '' ?>>
                                                        GET</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="app_status"
                                                    name="app_status" <?= $sso->app_status == 1 ? 'checked' : '' ?>
                                                    value="1">
                                                <label class="form-check-label" for="app_status">App Status</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                        <a href="<?= base_url('admin-dashboard/sso') ?>"
                                            class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
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