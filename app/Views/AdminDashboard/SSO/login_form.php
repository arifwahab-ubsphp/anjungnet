<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSO Login</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .message {
        font-size: 1.5em;
    }
    </style>
</head>
<body>
    <div class="message">Redirecting...</div>

    <form action="<?= esc($login_action_url) ?>" method="post" id="loginForm">
        <input type="hidden" name="<?= esc($att_name) ?>" value="<?= esc(session('s_KP')) ?>">
        <input type="hidden" name="<?= esc($att_password) ?>" value="<?= esc(session('s_Password')) ?>">
        <?php if (isset($att_submit)): ?>
        <input type="hidden" name="<?= esc($att_submit) ?>" value="Login">
        <?php else: ?>
        <button type="submit" style="display: none;"></button>
        <?php endif; ?>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loginForm').submit();
    });

    // Disable right-click
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // Disable certain keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey || e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I') || (e.ctrlKey && e
                .shiftKey && e.key === 'J')) {
            e.preventDefault();
        }
    });
    </script>
</body>
</html>