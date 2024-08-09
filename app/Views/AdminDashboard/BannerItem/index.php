<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>List of '<?= $bannerTitle ?>' Image Item</h3>
                                    <a href="<?= base_url('admin-dashboard/banner-item/create/' . $bannerId->id) ?>"
                                        class="btn btn-primary">Create</a>
                                </div>
                                <table class="table table-striped" style="width:100%" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Publish Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($bannerItem)): ?>
                                        <?php 
                                            $counter = 1;
                                            foreach ($bannerItem as $row) : ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $row->item_title ?></td>
                                            <td><?= $row->item_description ?></td>
                                            <td>
                                                <a href="<?= base_url('admin-dashboard/banner-item/edit/' . $row->id) ?>"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/banner-item/delete/' . $row->id) ?>"
                                                    class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-switch form-switch-md">
                                                    <input class="form-check-input" type="checkbox"
                                                        onchange="location.href='<?= base_url('admin-dashboard/banner-item/toggle-status/' . $row->id) ?>'"
                                                        <?= $row->item_publish == 1 ? 'checked' : '' ?>>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                            $counter++; endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5">No banner items found.</td>
                                        </tr>
                                        <?php endif; ?>

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