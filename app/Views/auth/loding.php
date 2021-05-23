<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Loding App</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('tamplate/admin') ?>/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('tamplate/admin') ?>/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('tamplate/admin') ?>/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">

    <!-- loding start -->
    <div class="pre-loader">
        <div class="pre-loader-box">
            <script src="<?= base_url('tamplate') ?>/animasi/lottie-player.js"></script>
            <lottie-player src="<?= base_url('tamplate') ?>/animasi/file/43887-secure-payments.json" mode="" background="" speed="1" style="width: 400px; height: 400px;" hover loop autoplay></lottie-player>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                <?= $loding_text ?>...!!!
            </div>
        </div>
    </div>
    <!-- loding end -->

    <!-- js -->
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/core.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/process.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/layout-settings.js"></script>

    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="<?= base_url('tamplate/saya.js') ?>"></script>
</body>

</html>