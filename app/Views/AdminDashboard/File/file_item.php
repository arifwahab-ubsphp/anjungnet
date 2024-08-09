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

                if (session()->getFlashdata('error')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session()->getFlashdata('error');
                    echo '</div>';
                }
                ?>

                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard/file') ?>">Folder
                                        Group</a>
                                </li>
                                <?php if (!empty($breadcrumbs)): ?>
                                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                                <li class="breadcrumb-item <?= end($breadcrumbs) === $breadcrumb ? 'active' : '' ?>"
                                    aria-current="page">
                                    <?= end($breadcrumbs) === $breadcrumb ? $breadcrumb->nama_file : '<a href="' . base_url('admin-dashboard/file-item/' . $breadcrumb->id) . '">' . $breadcrumb->nama_file . '</a>' ?>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ol>
                        </nav>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                Folder (<?= $singleList->nama_file; ?>)</a></h3>
                        </div>
                        <div class="container mb-4">
                            <form action="<?= base_url('admin-dashboard/file-item-store') ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenis-file" class="form-label">Folder Type</label>
                                            <select class="form-select" id="jenis-file" name="jenis-file"
                                                aria-label="Default select example" onchange="showHideFields()">
                                                <option value="">Choose Folder Type..</option>
                                                <option value="Folder">Folder</option>
                                                <option value="Upload">Upload</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-folder-field" style="display: none;">
                                        <!-- id parent -->
                                        <input type="hidden" class="form-control" id="id-file" name="id-file"
                                            value="<?= $singleList->id; ?>">
                                        <div class="mb-3">
                                            <label for="nama-file" class="form-label">Folder Name</label>
                                            <input type="text" class="form-control" id="nama-file" name="nama-file"
                                                placeholder="Enter Folder Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-upload-field" style="display: none;">
                                        <div class="mb-3">
                                            <label for="upload-option" class="form-label">Upload Option</label>
                                            <input type="file" class="form-control" id="upload-option"
                                                name="upload-option" accept=".pdf,.xls,.xlsx,.doc,.docx">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status-file" class="form-label">File Status</label>
                                            <select class="form-select" id="status-file" name="status-file"
                                                aria-label="Default select example">
                                                <option value="">Choose File Status..</option>
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
                                            <th>File Name</th>
                                            <th>Uploaded File</th>
                                            <th>File Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-menu-aras1">
                                        <?php 
                                        $encrypter = \Config\Services::encrypter();

                                        foreach ($allList as $key => $value) : 
                                        ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->nama_file ?></td>
                                            <td>
                                                <?php if ($value->jenis_file == 'Upload') : ?>
                                                <?php
                                                // Decrypt the filename
                                                $decryptedFileName = $encrypter->decrypt(base64_decode($value->uploaded_file));
                                                ?>
                                                <?= $decryptedFileName ?>
                                                <?php else : ?>
                                                Not Applicable
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value->jenis_file ?></td>
                                            <td>
                                                <?php if ($value->jenis_file == 'Upload') : ?>
                                                <?php
                                                // Decrypt the filename
                                                $decryptedFileName = $encrypter->decrypt(base64_decode($value->uploaded_file));
                                                $filePath = base_url('uploaded/' . $decryptedFileName);
                                                ?>
                                                <a href="<?= $filePath ?>" target="_blank"
                                                    class="btn btn-success btn-sm" title="Open in new tab">
                                                    <i class="bx bx-link-external"></i>
                                                </a>
                                                <?php elseif ($value->jenis_file != 'Upload') : ?>
                                                <a href="<?= base_url('admin-dashboard/file-item/' . $value->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="Go to Sub Folder">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('admin-dashboard/banner/edit/') . $value->id ?>"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin-dashboard/banner/delete/') . $value->id ?>"
                                                    class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
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
    var jenisMenu = document.getElementById('jenis-file').value;
    var uploadField = document.getElementById('additional-upload-field');
    var folderField = document.getElementById('additional-folder-field');

    uploadField.style.display = 'none';
    folderField.style.display = 'none';

    if (jenisMenu === 'Upload') {
        uploadField.style.display = 'block';
    } else if (jenisMenu === 'Folder') {
        folderField.style.display = 'block';
    }
}
</script>

<?= $this->endSection() ?>