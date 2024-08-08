<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog MARDI</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        /* background-color: #f4f4f4; */
        /* color: #333; */
        padding-top: 20px;
        background-image: linear-gradient(157.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(135deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(112.5deg, rgb(137, 227, 173) 0%, rgb(137, 227, 173) 16%, rgb(115, 184, 148) 16%, rgb(115, 184, 148) 20%, rgb(135, 188, 174) 20%, rgb(135, 188, 174) 32%, rgb(171, 248, 193) 32%, rgb(171, 248, 193) 38%, rgb(175, 187, 198) 38%, rgb(175, 187, 198) 48%, rgb(195, 210, 203) 48%, rgb(195, 210, 203) 51%, rgb(215, 232, 207) 51%, rgb(215, 232, 207) 59%, rgb(181, 201, 195) 59%, rgb(181, 201, 195) 100%), linear-gradient(90deg, rgb(143, 143, 143), rgb(38, 71, 34));
        background-blend-mode: overlay, overlay, overlay, normal;
        background-size: cover;
        /* object-fit: cover; */
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;

    }

    .container {
        max-width: 1000px;
        min-height: calc(100vh - 40px);
        margin: auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .blog-title {
        font-size: 2.5em;
        margin-bottom: 20px;
        font-weight: bold;
        font-family: 'Merriweather', serif;
    }

    .blog-meta {
        font-size: 0.9em;
        color: #000;
        margin-bottom: 20px;
    }

    .blog-content {
        position: relative;
        padding: 20px;
        margin: 20px 0;
        background-color: #f9f9f9;
        /* Green gradient */
        border-left: 5px solid #2ecc71;
        /* Bright border color */
        border-radius: 8px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
        font-size: 1.1em;
        /* Slightly larger font size for better readability */
        line-height: 1.8;
        /* Improved line spacing for readability */
        max-width: 100%;
        overflow-wrap: break-word;
    }

    .blog-content h2,
    .blog-content h3 {
        color: #333;
        /* Darker color for subheadings */
        font-weight: bold;
        /* Bold for headings */
    }

    .blog-content p {
        color: #000;
        /* Darker text color for better readability */
    }

    .blog-content a {
        color: #007bff;
        /* Link color */
        text-decoration: underline;
        /* Underline links */
    }

    .blog-content a:hover {
        color: #0056b3;
        /* Darker link color on hover */
        text-decoration: none;
        /* Remove underline on hover */
    }

    .blog-content ul,
    .blog-content ol {
        margin: 20px 0;
        padding-left: 20px;
        /* Add padding for list items */
    }

    .blog-content blockquote {
        background-image: linear-gradient(to right, #00ff71, #00ff00);
        background-repeat: no-repeat;
        background-position: 0 50%;
        background-size: 10px 100%;
        padding-left: 15px;
        /* Matching border color for blockquotes */
        padding: 10px 20px;
        background-color: #f1f1f1;
        /* Light background for blockquotes */
        font-style: italic;
        /* Italic text */
        margin: 20px 0;
    }

    .main-content {
        min-height: 300px;
        position: relative;
        padding: 20px;
        background-image: url('<?php echo base_url('assets/images/mardi.png') ?>');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        background-size: calc(0.5 * 100%);
        background-size: 25%;
        /* opacity: 0.5; */
        z-index: 1;
    }

    .blog-content::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        opacity: 0.7;
        z-index: -1;
    }

    .social-share {
        text-align: center;
        margin-top: 30px;
    }

    .social-share a {
        font-size: 1.5em;
        margin: 0 10px;
        color: #000;
        text-decoration: none;
    }

    .social-share a:hover {
        color: green;
    }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1 class="blog-title"><?= esc($blog->page_title) ?></h1>

        <div class="blog-meta">
            <i class="fas fa-calendar-alt"></i> Published on: <?= date('F j, Y', strtotime($blog->page_publish)) ?>
            <br>
            Created by:
        </div>
        <div class="main-content">
            <div class="blog-content main-content">
                <?= $blog->page_content ?>
            </div>

        </div>

        <div class="social-share">
            <p>Share this article:</p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank"><i
                    class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=<?= esc($blog->page_title) ?>"
                target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= current_url() ?>&title=<?= esc($blog->page_title) ?>"
                target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>

</body>
</html>