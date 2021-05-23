<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title ?></title>

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
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/src/plugins/cropperjs/dist/cropper.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable') ?>/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable') ?>/dataTables.bootstrap4.min.css">


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

<body>
    <!-- loding start -->
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <script src="<?= base_url('tamplate') ?>/animasi/lottie-player.js"></script>
            <lottie-player src="<?= base_url('tamplate') ?>/animasi/file/43887-secure-payments.json" mode="" background="" speed="1" style="width: 400px; height: 400px;" hover loop autoplay></lottie-player>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                tunggu ya saya carikan...
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <?= session()->getFlashdata('pesan') ?>
                <?php endif; ?>
            </div>
        </div>
    </div> -->
    <!-- loding end -->

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>

        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url('assets/profile/' . $user['image']) ?>" alt="">
                        </span>
                        <span class="user-name"><?= $user['nama'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?= base_url('home/password') ?>"><i class="dw dw-browser2"></i> Setting Password</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <div class="github-link">
                <a href="https://github.com/ringga-dev" target="_blank"><img src="<?= base_url('tamplate/admin') ?>/vendors/images/github.svg" alt=""></a>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>
    <!-- menu start -->
    <?= $this->renderSection('menu'); ?>
    <!-- menu end -->

    <div class="mobile-menu-overlay"></div>


    <!-- conten start -->
    <?= $this->renderSection('conten'); ?>
    <!-- conten end -->

    <!-- js -->
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/core.js"></script>
    <!-- datatables -->
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/process.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/src/plugins/datatables/js/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/datatable') ?>/buttons.colVis.min.js"></script>
    <script src="<?= base_url('assets/datatable') ?>/jszip.min.js"></script>

    <!-- Datatable Setting js -->
    <script src="<?= base_url('tamplate/admin') ?>/vendors/scripts/datatable-setting.js"></script>
    <script src="<?= base_url('tamplate/saya.js') ?>"></script>



</body>

</body>

</html>