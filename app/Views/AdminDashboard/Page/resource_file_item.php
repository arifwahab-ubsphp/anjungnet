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
                                <li class="breadcrumb-item"><a href="<?= base_url('admin-dashboard/resource') ?>">Folder
                                        Group</a>
                                </li>
                                <?php if (!empty($breadcrumbs)): ?>
                                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                                <li class="breadcrumb-item <?= end($breadcrumbs) === $breadcrumb ? 'active' : '' ?>"
                                    aria-current="page">
                                    <?= end($breadcrumbs) === $breadcrumb ? $breadcrumb->nama_file : '<a href="' . base_url('admin-dashboard/resource-file-item/' . $breadcrumb->id) . '">' . $breadcrumb->nama_file . '</a>' ?>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ol>
                        </nav>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                Folder (<?= $singleList->nama_file; ?>)</a></h3>
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
                                    <tbody id="data-menu-aras1">
                                        <?php 
                                        $encrypter = \Config\Services::encrypter();

                                        foreach ($allList as $key => $value) : 
                                        ?>
                                        <?php if ($value->status_file != 0) : ?>
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
                                                <button type="button" class="btn btn-primary copy-button"
                                                    data-filepath="<?= $filePath ?>"
                                                    style="width: 100px; height: 40px; font-size: 12px;">
                                                    Copy URL
                                                </button>

                                                <label for="file-<?= $value->id ?>"></label>
                                                <?php elseif ($value->jenis_file != 'Upload') : ?>
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
document.addEventListener('DOMContentLoaded', function() {
    // Function to copy text to clipboard
    function copyToClipboard(text) {
        var cleanedText = text.replace(/^https?:\/\//, '');
        navigator.clipboard.writeText(cleanedText).then(() => {
            // alert('File path copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy text: ', err);
        });
    }

    // Attach click event listeners to Copy buttons
    document.querySelectorAll('.copy-button').forEach(button => {
        button.addEventListener('click', function() {
            const filePath = this.getAttribute('data-filepath');
            copyToClipboard(filePath);

            // Close the window after copying
            setTimeout(() => {
                window.close();
            }, 100); // 100ms delay
        });
    });
});
</script>





<?= $this->endSection() ?>