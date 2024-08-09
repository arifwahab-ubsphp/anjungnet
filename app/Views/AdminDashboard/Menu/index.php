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
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Main Menu Group</h3>
                        </div>
                        <div class="container mb-4">
                            <form action="<?= base_url('admin-dashboard/menu-store') ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama-menu" class="form-label">Menu Name</label>
                                            <input type="text" class="form-control" id="nama-menu" name="nama-menu"
                                                placeholder="Enter Menu Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="perincian-menu" class="form-label">Menu Details</label>
                                            <input type="text" class="form-control" id="perincian-menu"
                                                name="perincian-menu" placeholder="Enter Menu Details">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenis-menu" class="form-label">Menu Type</label>
                                            <select class="form-select" id="jenis-menu" name="jenis-menu"
                                                aria-label="Default select example" onchange="showHideFields()">
                                                <option value="">Choose Menu Type..</option>
                                                <option value="Menu">Menu</option>
                                                <option value="Menu SSO">Menu SSO</option>
                                                <option value="SSO">SSO</option>
                                                <option value="Pages">Pages</option>
                                                <option value="Custom">Custom</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-sso-field" style="display: none;">
                                        <div class="mb-3">
                                            <label for="sso-option" class="form-label">SSO Option</label>
                                            <select class="form-select" id="sso-option" name="sso-option">
                                                <option value="">Select SSO Option..</option>
                                                <?php foreach ($ssoList as $sso) : ?>
                                                <option value="<?= $sso->id ?>"><?= $sso->app_name ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-pages-field" style="display: none;">
                                        <div class="mb-3">
                                            <label for="pages-input" class="form-label">Pages Input</label><br>
                                            <select class="form-select" id="pages-input" name="pages-input">
                                                <option disabled selected value="">Select Pages Blog Option..</option>
                                                <?php foreach ($pageList as $page) : ?>
                                                <option value="<?= base_url('admin-dashboard/blog/') . $page->id ?>">
                                                    <?= $page->page_title . ' (' . date('F j, Y', strtotime($page->page_publish)) . ')' ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="additional-custom-field" style="display: none;">
                                        <div class="mb-3">
                                            <label for="custom-input" class="form-label">Custom Input</label>
                                            <input type="text" class="form-control" id="custom-input"
                                                name="custom-input" placeholder="Masukan Custom Input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position-menu" class="form-label">Position Menu</label>
                                            <select class="form-select" id="position-menu" name="position-menu"
                                                aria-label="Default select example">
                                                <option value="">Choose Position..</option>
                                                <option value="Quick Access">Quick Access</option>
                                                <option value="Menu Kiri">Left Side Menu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="susunan" class="form-label">Sequence Menu List<span
                                                    data-toggle="tooltip"
                                                    title="This is the sequence order of how your menu will be displayed"
                                                    style="margin-left: 5px; cursor: pointer;">
                                                    ?
                                                </span></label>
                                            <input type="number" class="form-control" id="susunan" name="susunan"
                                                placeholder="ex; 1,2,3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="aras" class="form-label">Level</label>
                                            <input type="number" class="form-control" id="aras" name="aras" value="1"
                                                placeholder="Enter Level" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status-menu" class="form-label">Menu Status</label>
                                            <select class="form-select" id="status-menu" name="status-menu"
                                                aria-label="Default select example">
                                                <option value="">Choose Status..</option>
                                                <option value="1">Activated</option>
                                                <option value="0">Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="warna-menu" class="form-label">Warna Menu</label>
                                            <input type="color" class="form-control" id="warna-menu" name="warna-menu"
                                                value="#000000">
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
                                            <th>Bil.</th>
                                            <th>Menu Name</th>
                                            <th>URL Menu</th>
                                            <th>Position</th>
                                            <th>Menu Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($parentList as $key => $value) : ?>
                                        <?php if (is_null($value->parent)) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->nama_menu ?></td>
                                            <td><?= $value->url_menu ?></td>
                                            <td><?= $value->position_menu ?></td>
                                            <td><?= $value->jenis_menu ?></td>
                                            <td>
                                                <?php if ($value->jenis_menu != 'Pages' && $value->jenis_menu != 'Custom' && $value->jenis_menu != 'SSO') : ?>
                                                <a href="<?= base_url('admin-dashboard/menu-item/' . $value->id) ?>"
                                                    class="btn btn-secondary btn-sm" title="Go to Sub Level">
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
    var jenisMenu = document.getElementById('jenis-menu').value;
    var ssoField = document.getElementById('additional-sso-field');
    var pagesField = document.getElementById('additional-pages-field');
    var customField = document.getElementById('additional-custom-field');

    ssoField.style.display = 'none';
    pagesField.style.display = 'none';
    customField.style.display = 'none';

    if (jenisMenu === 'SSO') {
        ssoField.style.display = 'block';
    } else if (jenisMenu === 'Pages') {
        pagesField.style.display = 'block';
    } else if (jenisMenu === 'Custom') {
        customField.style.display = 'block';
    }
}
</script>

<script>
$(document).ready(function() {
    $('#pages-input').select2({
        placeholder: "Select Pages Blog Option..",
        allowClear: true,
        width: '450px'
    });
});
</script>


<?= $this->endSection() ?>