<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
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
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h3>Edit Banner Item</h3>
                                <form action="<?= base_url('admin-dashboard/banner-item/update/'. $banner->id) ?>"
                                    method="POST">
                                    <h4 class="border-bottom">>> <?= $banner->item_title ?></h4>
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="<?= set_value('title', $banner->item_title) ?>" id="title"
                                            name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control"
                                            value="<?= set_value('description', $banner->item_description) ?>"
                                            id="description"
                                            name="description"><?= set_value('description', $banner->item_description) ?></textarea>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="hidden" name="approved" value="0">
                                        <input type="checkbox" class="form-check-input" value="1" id="approved"
                                            name="approved" <?= $banner->item_approve == 1 ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="approved">Approved</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="hidden" name="published" value="0">
                                        <input type="checkbox" class="form-check-input" value="1" id="published"
                                            name="published" <?= $banner->item_publish == 1 ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?= base_url('admin-dashboard/banner-item/'). $banner->id_anj_banner ?>"
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