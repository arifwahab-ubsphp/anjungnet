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
                                <?php if (session()->has('status')): ?>
                                <div class="alert alert-success">
                                    <?= session('status') ?>
                                </div>
                                <?php elseif (session()->has('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session('error') ?>
                                </div>
                                <?php endif; ?>
                                <?php if (session()->has('validation')): ?>
                                <div class="alert alert-danger">
                                    <?= session('validation')->listErrors() ?>
                                </div>
                                <?php endif; ?>
                                <form action="<?= base_url('admin-dashboard/banner-item-store') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="id_anj_banner" id="id_anj_banner"
                                            value="<?= set_value('id_anj_banner', $bannerId->id) ?>" hidden>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="<?= set_value('title') ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description"
                                            name="description"><?= set_value('description') ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input" id="image" name="image"
                                                    accept="image/*" required>
                                            </div>
                                        </div>
                                        <small>*Only image file is allowed</small>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <label for="publish_start_date" class="form-label">Display Start
                                                Date</label>
                                            <input type="date" class="form-control" id="publish_start_date"
                                                name="publish_start_date"
                                                value="<?= set_value('publish_start_date') ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="publish_end_date" class="form-label">Display End Date</label>
                                            <input type="date" class="form-control" id="publish_end_date"
                                                name="publish_end_date" value="<?= set_value('publish_end_date') ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="approved" name="approved"
                                            value="1" <?= set_value('approved') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="approved">Approved</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="published" name="published"
                                            value="1" <?= set_value('published') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="<?= base_url('admin-dashboard/banner') ?>"
                                            class="btn btn-secondary ms-2">Back</a>
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