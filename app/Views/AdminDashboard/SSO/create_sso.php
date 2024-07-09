<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h3>Add New Single Sign On</h3>
                                <form action="<?= base_url('admin-dashboard/sso-store') ?>" method="POST">
                                    <div class="form-group">
                                        <label for="app_name">App Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="app_name" name="app_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">Form Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="form_name" name="form_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_url">Login URL <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="login_url" name="login_url"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_action_url">Login Action URL <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="login_action_url"
                                            name="login_action_url" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="submit_type">Submit Type <span class="text-danger">*</span></label>
                                        <select class="form-select" id="submit_type" name="submit_type" required>
                                            <option value="">Select Submit Type</option>
                                            <option value="1">POST</option>
                                            <option value="0">GET</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="app_status">App Status <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="app_status"
                                                name="app_status" required>
                                            <label class="form-check-label" for="app_status">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" id="app_status"
                                                name="app_status">
                                            <label class="form-check-label" for="app_status">Inactive</label>
                                        </div>
                                        <small class="form-text text-muted">Disable/Enabled Applications</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <a href="<?= base_url('admin-dashboard/sso') ?>" class="btn btn-secondary">Back</a>
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