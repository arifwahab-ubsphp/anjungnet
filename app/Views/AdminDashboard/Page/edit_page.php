<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h3>Edit Page</h3>
                                <form action="<?= base_url('admin-dashboard/page/update/'. $page->id) ?>" method="POST">
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="<?= set_value('title', $page->page_title) ?>" id="title" name="title"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control"
                                            value="<?= set_value('description', $page->page_description) ?>"
                                            id="description"
                                            name="description"><?= set_value('description', $page->page_description) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Page Content</label>
                                        <textarea name="content" id="summernote"
                                            value="<?= set_value('description', $page->page_content) ?>">
                                        <?= set_value('description', $page->page_content) ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input"
                                            value="<?= set_value('approved', $page->page_approve) ?>" id="approved"
                                            name="approved" <?= $page->page_approve == 1 ? 'checked' : '' ?> value="1">
                                        <label class="form-check-label" for="approved">Approved</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input"
                                            value="<?= set_value('published', $page->page_publish) ?>" id="published"
                                            name="published" <?= $page->page_publish == 1 ? 'checked' : '' ?> value="1">
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?= base_url('admin-dashboard/page') ?>" class="btn btn-secondary">Back</a>
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

    <script>
    function setFilePath(filePath) {
        console.log('Received file path:', filePath);
        window.filePath = filePath;
    }

    function insertFilePath() {
        var filePath = window.filePath;
        console.log('Inserting file path:', filePath);
        if (filePath) {
            var selectedText = $('#summernote').summernote('getSelectedText');
            console.log('Selected text:', selectedText);
            if (selectedText) {
                // Create the link HTML
                var linkHtml = `<a href="${filePath}" target="_blank">${selectedText}</a>`;

                // Get the current content and replace selected text with the new link
                $('#summernote').summernote('pasteHTML', linkHtml);
                window.filePath = ''; // Clear the file path after insertion
            }
        }
    }

    function browseResource() {
        // Open the resource window
        var resourceWindow = window.open('<?= base_url('admin-dashboard/resource/') ?>', 'ResourceWindow',
            'width=800,height=600');

        // Wait for the resource window to return a file path
        $(resourceWindow).on('beforeunload', function() {
            // Example of getting filePath from the resource window
            // Replace this part with actual logic to get filePath from the resource window

            if (resourceWindow.filePath) {
                setFilePath(resourceWindow.filePath); // Set the file path
                insertFilePath(); // Insert the file path into the selected text
            }
        });
    }

    $('#summernote').summernote({
        placeholder: 'Fill in your page content here',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']],
        ],

    });
    document.getElementById('browse-resource-btn').addEventListener('click', function() {
        // Open a new window with the specified URL and dimensions
        window.open('<?= base_url('admin-dashboard/resource/') ?>', 'ResourceWindow', 'width=800,height=600');
    });
    </script>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>