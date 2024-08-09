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
                                <h3>Add New Single Sign On</h3>
                                <form action="<?= base_url('admin-dashboard/sso-store') ?>" method="POST">
                                    <div class="form-group">
                                        <label for="app_name">App Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="app_name" name="app_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">Form Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="form_name" name="form_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_url">Login URL <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="login_url" name="login_url"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_action_url">Login Action URL <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="login_action_url"
                                            name="login_action_url" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="submit_type">Submit Type <span class="text-danger">*</span></label>
                                        <select class="form-select" id="submit_type" name="submit_type" required>
                                            <option value="">Select Submit Type</option>
                                            <option value="1">POST</option>
                                            <option value="0">GET</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="app_status">App Status <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="app_status"
                                                name="app_status" required>
                                            <label class="form-check-label" for="app_status">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" id="app_status"
                                                name="app_status">
                                            <label class="form-check-label" for="app_status">Inactive</label>
                                        </div>
                                        <small class="form-text text-muted">Disable/Enabled Applications</small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="login_view">Upload Login View <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="login_view" name="login_view"
                                            onchange="parseFile(event)" required>
                                        <small class="form-text text-muted">Please upload your login view here</small>
                                    </div>
                                    <div class="form-group mt-3">

                                        <div id="inputTable" style="display: none;">
                                            <div class="form-group">

                                                <label style="color: red;"><strong>*Reminder: Please double-check the
                                                        attribute names for
                                                        accuracy.</strong></label>
                                            </div>
                                            <table class="table-bordered">
                                                <thead style="background-color: #e5e5e5;">
                                                    <tr>
                                                        <th style="width: 15%;">Name</th>
                                                        <th style="width: 10%;">Password</th>
                                                        <th style="width: 10%;">Submit Button</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="inputTableBody">
                                                    <tr>
                                                        <td>
                                                            <input type="text" id="name_input" name="name_input">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="password_input"
                                                                name="password_input">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="submit_button_input"
                                                                name="submit_button_input">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- Hidden inputs to store the parsed values -->



                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="<?= base_url('admin-dashboard/sso') ?>"
                                            class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('layouts/footer') ?>
</div>

<script>
function parseFile(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        const content = e.target.result;
        const parser = new DOMParser();
        const doc = parser.parseFromString(content, 'text/html');

        // Select all input and button elements
        const inputs = doc.querySelectorAll('input');
        const buttons = doc.querySelectorAll('button');
        const buttonInputs = doc.querySelectorAll('input[type="button"]');

        let nameInput = '';
        let passwordInput = '';
        let submitButtonInput = '';
        let processedCount = 0;

        function processElement(element) {
            if (processedCount >= 3) return; // Stop after processing 3 items

            const name = element.getAttribute('name');
            if (name && !name.toLowerCase().includes('csrf')) { // Ignore 'csrf' related names
                if (!nameInput) {
                    nameInput = name;
                } else if (!passwordInput) {
                    passwordInput = name;
                } else if (!submitButtonInput) {
                    submitButtonInput = name;
                }
                processedCount++;
            }
        }

        // Process all input elements and buttons
        inputs.forEach(processElement);
        buttons.forEach(processElement);
        buttonInputs.forEach(processElement);

        // Debugging: Check the values before setting
        // console.log('Name Input:', nameInput);
        // console.log('Password Input:', passwordInput);
        // console.log('Submit Button Input:', submitButtonInput);

        // Assign values to input fields
        document.getElementById('name_input').value = nameInput || '';
        document.getElementById('password_input').value = passwordInput || '';
        document.getElementById('submit_button_input').value = submitButtonInput || 'No submit button found';

        // Show the input table
        document.getElementById('inputTable').style.display = 'table';
    };
    reader.readAsText(file);
}
</script>

<?= $this->endSection() ?>