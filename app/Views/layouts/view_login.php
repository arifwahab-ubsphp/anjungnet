<!doctype html>
<html lang="en">

<head>
    <title>MARDI Anjungnet Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
    body {
        /* background: url('https://portal.mardi.gov.my/templates/yootheme/cache/7e/1500x500%20banner%20web%20mardi-08-7efed3f5.webp') no-repeat center center fixed; */
        /* background-image: linear-gradient(157.5deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(135deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(112.5deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(90deg, rgb(236, 151, 145), rgb(38, 71, 34)); */
        /* background-image: linear-gradient(157.5deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(135deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(112.5deg, rgb(95, 179, 127) 0%, rgb(95, 179, 127) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(235, 255, 212) 59%, rgb(235, 255, 212) 100%), linear-gradient(90deg, rgb(143, 143, 143), rgb(38, 71, 34)); */
        /* background-image: linear-gradient(157.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(255, 254, 254) 59%, rgb(255, 254, 254) 100%), linear-gradient(135deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(255, 254, 254) 59%, rgb(255, 254, 254) 100%), linear-gradient(112.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(255, 254, 254) 59%, rgb(255, 254, 254) 100%), linear-gradient(90deg, rgb(143, 143, 143), rgb(38, 71, 34)); */
        background-image: linear-gradient(157.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(135deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(112.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(90deg, rgb(143, 143, 143), rgb(38, 71, 34));
        background-blend-mode: overlay, overlay, overlay, normal;
        background-size: cover;
        /* object-fit: cover; */
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    .overlay {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 1000px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .content {
        display: flex;
        flex-direction: row;
        width: 100%;
    }

    .announcements,
    .login-form {
        flex: 1;
        padding: 20px;
    }

    .announcements {
        border-right: 1px solid #ccc;
    }

    .announcement-header {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .announcement-body {
        max-height: 300px;
        overflow-y: auto;
    }

    .announcement-card {
        margin-bottom: 10px;
    }

    .login-form legend {
        margin-top: 20px;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #007bff;
        color: #007bff;
    }

    .logo {
        position: absolute;
        top: -55px;
        /* Adjust as needed */
        z-index: 10;
        background: rgba(255, 255, 255, 0.9);
        padding: 3px;
        border-radius: 50%;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        max-height: 100px;
    }

    .top-icons {
        position: absolute;
        top: 10px;
        /* left: 10px; */
        right: 10px;
        display: flex;
        gap: 20px;
        background: rgba(255, 255, 255, 0.9);
        padding: 5px 10px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .top-icons a {
        color: #007bff;
        font-size: 20px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .top-icons a:hover {
        color: #0056b3;
    }

    /* footer {
        position: absolute;
        bottom: 20px;
        width: 100%;
        text-align: center;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icons a {
        color: #007bff;
        font-size: 24px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #0056b3;
    } */

    @media (max-width: 767.98px) {
        .announcements {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="top-icons">
        <a href="#faq" title="FAQ"><i class="fas fa-question-circle"></i></a>
        <a href="#hotline" title="Hotline"><i class="fas fa-phone"></i></a>
        <a href="#feedback" title="Feedback"><i class="fas fa-comments"></i></a>
    </div>

    <div class="overlay">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/en/0/00/Mardi-logo.svg" alt="MARDI Logo">
        </div>
        <div class="content">
            <div class="announcements">
                <h2 class="announcement-header">Announcements</h2>
                <div class="card">
                    <div class="card-body announcement-body">
                        <div class="card announcement-card">
                            <div class="card-body">
                                <p class="card-text">Welcome to the MARDI Anjungnet portal. Stay tuned for updates and
                                    announcements.</p>
                            </div>
                        </div>
                        <div class="card announcement-card">
                            <div class="card-body">
                                <p class="card-text">New research papers have been published. Check them out in the
                                    publications section.</p>
                            </div>
                        </div>
                        <div class="card announcement-card">
                            <div class="card-body">
                                <p class="card-text">Reminder: Upcoming webinar on agricultural innovations on June
                                    25th.</p>
                            </div>
                        </div>
                        <div class="card announcement-card">
                            <div class="card-body">
                                <p class="card-text">New research papers have been published. Check them out in the
                                    publications section.</p>
                            </div>
                        </div>
                        <div class="card announcement-card">
                            <div class="card-body">
                                <p class="card-text">Reminder: Upcoming webinar on agricultural innovations on June
                                    25th.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-form">
                <main class="form-signin">

                    <?php  
                    $this->request = \Config\Services::request();
                    if($this->request->getPost('btn_submit')):?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                    <?php endif ?>

                    <?php if(!empty($_SESSION['Mesej'])):?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['Mesej'];?>
                    </div>
                    <?php endif ?>

                    <?php echo form_open('login/loginauth',array('class'=>'form-horizontal','csrf_id' => 'my-id'))?>
                    <legend>ANJUNGNET</legend>

                    <div class="form-floating mb-3">
                        <input type="number" name="nokp" class="form-control" id="floatingInput"
                            placeholder="No. Kad Pengenalan" autofocus>
                        <label for="floatingInput">No. Kad Pengenalan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="katalaluan" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Kata Laluan</label>
                    </div>

                    <input class="w-100 btn btn-lg btn-primary" type="submit" name="btn_submit" value="Masuk">
                    <!-- <p class="mt-3 mb-3 text-muted text-center">&copy; 2017–2021 MARDI Anjungnet</p> -->

                    <?php echo form_close();?>

                </main>
            </div>
        </div>
    </div>

    <!-- <footer>
        <div class="social-icons">
            <a href="https://x.com" target="_blank" title="X"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://www.tiktok.com" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>