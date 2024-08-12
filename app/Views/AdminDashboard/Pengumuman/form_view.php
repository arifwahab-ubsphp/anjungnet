<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-5 test-size">

                    <!-- Notification Messages -->
                    <?php if (session()->has('Mesej')) : ?>
                    <div class="alert alert-success">
                        <?= session('Mesej') ?>
                    </div>
                    <?php elseif (session()->has('error')) : ?>
                    <?php $errors = session('error'); ?>
                    <div class="alert alert-danger">
                        <?php if (is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                        <?php else : ?>
                        <?= esc($errors) ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Pengumuman</h5>
                        <a href="<?= base_url('admin-dashboard/news_list') ?>"
                            class="btn rounded-pill btn-secondary"><span
                                class="tf-icons bx bx-left-arrow-circle"></span>&nbsp; Kembali</a>
                    </div>
                    <div class="row">
                        <!-- Basic Layout -->
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0"></h5>
                                    <small class="text-muted float-end"><span style="color:red">*</span> Wajib
                                        diisi</small>
                                </div>
                                <div class="card-body">
                                    <?= form_open_multipart("admin-dashboard/news_add", ['id' => 'newsForm']) ?>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Nama<b style="color:red">*</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="txt_namanews"
                                                name="txt_namanews" placeholder="Nama Pengumuman" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Message<b style="color:red">*</b></label>
                                        <div class="col-sm-10">
                                            <textarea id="txt_message" name="txt_message" class="form-control"
                                                placeholder="Maksimum 250 patah perkataan"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kategori Pengumuman<b
                                                style="color:red">*</b></label>
                                        <div class="col-sm-10">
                                            <select class="form-control form-select" name="cat_news" id="cat_news">
                                                <option value=""
                                                    <?php if (strcmp('', set_value('cat_news')) == 0) : echo 'selected'; endif; ?>>
                                                    Sila Pilih..</option>
                                                <?php
                                                foreach ($news_cat as $row) :
                                                    $cat_news_id = $row->cat_news_id;
                                                    $cat_news_name = $row->cat_news_name;
                                                    echo "<option value='{$cat_news_id}' ";
                                                    if (strcmp($cat_news_id, set_value('cat_news')) == 0) :
                                                        echo 'selected';
                                                    endif;
                                                    echo ">{$cat_news_name}</option>";
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="attachment-fields">
                                        <div class="row mb-3 attachment-field">
                                            <label class="col-sm-2 col-form-label">Lampiran 1</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="attachments[]" />
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button"
                                                    class="btn btn-outline-primary add-attachment-btn">Tambah
                                                    Lampiran</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="text-align: center; padding-bottom: 20px">
                            <button type="submit" id="btn_draf" name="btn_draf" class="btn rounded-pill btn-secondary"
                                value="btn_draf">Draf</button>
                            <button type="submit" id="btn_submit" name="btn_submit" class="btn rounded-pill btn-primary"
                                value="btn_submit">Simpan & Hantar Email</button>
                            <button type="button" id="btn_reset" name="btn_reset" class="btn rounded-pill btn-warning"
                                value="btn_reset">Reset</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                    <script>
                    let attachmentCount = 1;

                    document.querySelector('.add-attachment-btn').addEventListener('click', function() {
                        if (attachmentCount < 3) {
                            attachmentCount++;
                            const newField = document.createElement('div');
                            newField.classList.add('row', 'mb-3', 'attachment-field');
                            newField.innerHTML = `
                                    <label class="col-sm-2 col-form-label">Lampiran ${attachmentCount}</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="attachments[]" />
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-danger remove-attachment-btn">Buang Lampiran</button>
                                    </div>
                                `;
                            document.getElementById('attachment-fields').appendChild(newField);
                        }
                    });

                    document.getElementById('attachment-fields').addEventListener('click', function(event) {
                        if (event.target.classList.contains('remove-attachment-btn')) {
                            event.target.closest('.attachment-field').remove();
                            attachmentCount--;
                            updateLabels();
                        }
                    });

                    document.getElementById('btn_reset').addEventListener('click', function() {
                        document.getElementById('newsForm').reset();
                        document.querySelectorAll('.attachment-field').forEach((field, index) => {
                            if (index !== 0) field.remove();
                        });
                        attachmentCount = 1;
                        updateLabels();
                    });

                    function updateLabels() {
                        document.querySelectorAll('.attachment-field').forEach((field, index) => {
                            field.querySelector('label').textContent = `Lampiran ${index + 1}`;
                        });
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>
    <!-- / Footer -->

</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>