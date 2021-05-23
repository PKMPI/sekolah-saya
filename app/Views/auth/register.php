<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/src/plugins/jquery-steps/jquery.steps.css">
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

    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="<?= base_url('tamplate/admin') ?>/vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?= base_url('auth') ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url('tamplate/admin') ?>/vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="register-box bg-white box-shadow border-radius-10">
                        <div class="wizard-content">
                            <form class="m-2 p-2" action="<?= base_url() ?>/auth/save_user" method="POST">
                                <?= csrf_field() ?>
                                <div class="login-title">
                                    <h2 class="text-center text-primary m-2 p-2">Register To DeskApp</h2>
                                </div>

                                <div class="select-role">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn">
                                            <input type="radio" name="options" id="user">
                                            <div class="icon"><img src="<?= base_url('tamplate/admin') ?>/vendors/images/person.svg" class="svg" alt=""></div>
                                            <span>I'm</span>
                                            Employee
                                        </label>
                                    </div>
                                </div>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <!-- <div class="form-group row" hidden>
                                        <label class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= ($validation->hasError('email_user') ? 'is-invalid' : '') ?>" name="email_user" id="email_user" autofocus value="<?= old('email_user') ?>">
                                            <div class="invalid-feedback pl-3">
                                                <?= $validation->getError('email_user') ?>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email User</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control <?= ($validation->hasError('email_user') ? 'is-invalid' : '') ?>" name="email_user" id="email_user" autofocus value="<?= old('email_user') ?>">
                                            <div class="invalid-feedback pl-3">
                                                <?= $validation->getError('email_user') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nomor Pengenal</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= ($validation->hasError('no_pengenal') ? 'is-invalid' : '') ?>" name="no_pengenal" id="no_pengenal" autofocus value="<?= old('no_pengenal') ?>">
                                            <div class="invalid-feedback pl-3">
                                                <?= $validation->getError('no_pengenal') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password*</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control <?= ($validation->hasError('pass') ? 'is-invalid' : '') ?>" name="pass" id="pass" autofocus value="<?= old('pass') ?>">
                                            <div class="invalid-feedback pl-3">
                                                <?= $validation->getError('pass') ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" href="<?= base_url() ?>">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html Start -->
    <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="login.html" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html End -->
    <!-- js -->
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/core.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/process.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/steps-setting.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove()
            })
        }, 3000)
    </script>
</body>

</html>