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
        <input type="hidden" name="<?= esc($att_name) ?>" value="990811145963">
        <input type="hidden" name="<?= esc($att_password) ?>" value="mizan19379@MARDI">
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
    </script>
</body>
</html>