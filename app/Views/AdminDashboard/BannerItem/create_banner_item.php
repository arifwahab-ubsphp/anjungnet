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
                                <h3>Add New Item</h3>
                                <form action="<?= base_url('admin-dashboard/banner-item-store') ?>" method="POST">
                                    <div class="form-group">
                                        <label for="id_anj_banner">ID Anjung Banner</label>
                                        <input class="form-control" type="text" name="id_anj_banner" id="id_anj_banner"
                                            value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="approved" name="approved"
                                            value="1">
                                        <label class="form-check-label" for="approved">Approved</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="published" name="published"
                                            value="1">
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <a href="<?= base_url('admin-dashboard/banner') ?>"
                                        class="btn btn-secondary">Back</a>
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