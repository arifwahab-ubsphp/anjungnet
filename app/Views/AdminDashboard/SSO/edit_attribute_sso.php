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
                                <h3>Edit Attribute Form Login</h3>
                                <form action="<?= base_url('admin-dashboard/sso/update-attribute/' . $sso->id) ?>"
                                    method="POST">
                                    <div class="form-group">
                                        <label for="att_name">Attribute for Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="<?= set_value('att_name', $sso->att_name) ?>" id="att_name"
                                            name="att_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_password">Attribute for Password <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="<?= set_value('att_password', $sso->att_password) ?>"
                                            id="att_password" name="att_password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="att_submit">Attribute for Submit Button</label>
                                        <input type="text" class="form-control"
                                            value="<?= set_value('att_submit', $sso->att_submit) ?>" id="att_submit"
                                            name="att_submit">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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