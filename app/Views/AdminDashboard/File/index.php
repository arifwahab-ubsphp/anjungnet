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
                        <div class="container mb-4">
                            <form action="<?= base_url('admin-dashboard/file-store') ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama-file" class="form-label">Folder Name</label>
                                            <input type="text" class="form-control" id="nama-file" name="nama-file"
                                                placeholder="Enter Folder Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenis-file" class="form-label">Folder Type</label>
                                            <select class="form-select" id="jenis-file" name="jenis-file"
                                                aria-label="Default select example" onchange="showHideFields()">
                                                <!-- <option value="">Silakan Pilih..</option> -->
                                                <option selected value="Folder">Folder</option>
                                                <!-- <option value="Upload">Upload</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-upload-field" style="display: none;">
                                        <div class="mb-3">
                                            <label for="upload-option" class="form-label">Upload Option</label>
                                            <select class="form-select" id="upload-option" name="upload-option">
                                                <option value="">Select Upload Option..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status-file" class="form-label">Status Folder</label>
                                            <select class="form-select" id="status-file" name="status-file"
                                                aria-label="Default select example">
                                                <option value="">Choose Status..</option>
                                                <option value="1">Activated</option>
                                                <option value="0">Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Folder Name</th>
                                            <th>Uploaded File</th>
                                            <th>Folder Type</th>
                                            <th>Activated</th>
                                            <th>Total Item</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach ($parentList as $key => $value) : ?>
                                        <?php if (is_null($value->parent)) : ?>
                                        <tr>
                                            <td><?= $count ?></td>
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
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-switch form-switch-md">
                                                    <input class="form-check-input" type="checkbox" name="status"
                                                        onchange="toggleStatus(this, '<?= base_url('admin-dashboard/file/toggle-status/' . $value->id) ?>')"
                                                        <?= $value->status_file == 1 ? 'checked' : '' ?>>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $countChild = array_filter($parentList, function($item) use ($value) {
                                                    return $item->parent == $value->id;
                                                });
                                                echo count($countChild);?>
                                            </td>
                                            <td>
                                                <?php if ($value->jenis_file != 'Upload') : ?>
                                                <a href="<?= base_url('admin-dashboard/file-item/' . $value->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="Go to Sub Folder">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('admin-dashboard/banner/edit/') . $value->id ?>"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/file/delete/') . $value->id ?>"
                                                    class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirmDelete()">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                     $count++;  
                                     endif; ?>
                                        <?php
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
</script>

<script>
function toggleStatus(checkbox, baseUrl) {
    var status = checkbox.checked ? 1 : 0;
    location.href = baseUrl + '/' + status;
}
</script>

<?= $this->endSection() ?>