<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            Copyright ©
            <script>
            document.write(new Date().getFullYear());
            </script>
            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Institut Penyelidikan Dan
                Kemajuan Pertanian Malaysia</a>
            | IM01
        </div>
        <div>
            <a href="#" class="footer-link me-4" target="_blank"><small>MODIFIED BY:</small></a>
            <a href="#" target="_blank" class="footer-link me-4"><small>MOHD ARIF/FARIS ZAIDI/MUHAMMAD
                    HAMIZAN</small></a>
        </div>
    </div>
</footer>

<script>
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