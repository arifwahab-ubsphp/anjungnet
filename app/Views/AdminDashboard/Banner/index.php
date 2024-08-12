<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
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
                                    <h3>Banner List</h3>
                                    <a href="<?= base_url() ?>admin-dashboard/create" class="btn btn-primary">Create</a>
                                </div>
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Published Items</th>
                                            <th>Unpublished Items</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $counter = 1;

                                        foreach ($banner as $row) : ?>
                                        <?php
                                            $publishedCount = 0;
                                            $unpublishedCount = 0;
                                            foreach ($bannerItem as $item) {
                                                if ($item->id_anj_banner == $row->id) {
                                                    if ($item->item_publish == "1") {
                                                        $publishedCount++;
                                                    } else {
                                                        $unpublishedCount++;
                                                    }
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $row->banner_title ?></td>
                                            <td><?= $row->banner_description ?></td>
                                            <td><?= $publishedCount ?></td>
                                            <td><?= $unpublishedCount ?></td>
                                            <td>
                                                <a href="<?= base_url('admin-dashboard/banner-item/' . $row->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="Go to Sub Level">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/banner/edit/' . $row->id) ?>"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/banner/delete/' . $row->id) ?>"
                                                    class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirmDelete()">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 

                                        $counter++;
                                        endforeach; 

                                        ?>
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