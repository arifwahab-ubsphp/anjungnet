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
                                    <h3>List of '<?= $bannerTitle ?>' Image Item</h3>
                                    <a href="<?= base_url('admin-dashboard/banner-item/create/' . $bannerId->id) ?>"
                                        class="btn btn-primary">Create</a>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($bannerItem)): ?>
                                        <?php foreach ($bannerItem as $row) : ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td><?= $row->item_title ?></td>
                                            <td><?= $row->item_description ?></td>
                                            <td>
                                                <!-- <a href="<?= base_url('admin-dashboard/banner/more/' . $row->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="More">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a> -->
                                                <a href="<?= base_url('admin-dashboard/banner-item/edit/' . $row->id) ?>"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/banner-item/delete/' . $row->id) ?>"
                                                    class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="4">No banner items found.</td>
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