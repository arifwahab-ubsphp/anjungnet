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
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Main File Group</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="table1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bil.</th>
                                            <th>Folder Name</th>
                                            <th>Uploaded File</th>
                                            <th>Folder Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($parentList as $key => $value) : ?>
                                        <?php if (is_null($value->parent) && $value->status_file != 0) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->nama_file ?></td>
                                            <td>
                                                <?php if ($value->jenis_file != 'Upload') : ?>
                                                -
                                                <?php endif; ?>
                                                <?= $value->uploaded_file ?>
                                            </td>
                                            <td>
                                                <?php if ($value->jenis_file != 'Upload') : ?>
                                                <i class="bx bx-folder"></i> <?= $value->jenis_file ?>
                                                <?php endif; ?>
                                                <!-- <?= $value->jenis_file ?> -->
                                            </td>
                                            <td>
                                                <?php if ($value->jenis_file != 'Upload') : ?>
                                                <a href="<?= base_url('admin-dashboard/resource-file-item/' . $value->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="Go to Sub Folder">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
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

<script>
function showHideFields() {
    var jenisFile = document.getElementById('jenis-file').value;
    var uploadField = document.getElementById('additional-upload-field');

    uploadField.style.display = 'none';

    if (jenisFile === 'Upload') {
        uploadField.style.display = 'block';
    }
}

function setFilePath(filePath) {
    // Handle the file path, e.g., update an input field or display the file path
    document.getElementById('file-path-input').value = filePath;
}
</script>

<?= $this->endSection() ?>