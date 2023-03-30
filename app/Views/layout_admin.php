<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url() ?>/assets/images/fav.png" type="image/png" />
    <!--plugins-->
    <link href="<?= base_url() ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= base_url() ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/header-colors.css" />
    <link rel="stylesheet" type="text/css" id="mce-u0" referrerpolicy="origin" href="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.7-133/skins/ui/oxide/skin.min.css">
    <title><?= $title ?> | Dabalulik</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?= base_url() ?>/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Dabalulik</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Pengguna</li>
                <li>
                    <a href="<?= base_url('admin/user') ?>">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">Admin</div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/pakar') ?>">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">Pakar</div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/petani') ?>">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">Petani</div>
                    </a>
                </li>
                <li class="menu-label">Sistem Pakar</li>
                <li>
                    <a href="<?= base_url('admin/penyakit') ?>">
                        <div class="parent-icon"><i class="bx bx-bug-alt"></i>
                        </div>
                        <div class="menu-title">Penyakit</div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/gejala') ?>">
                        <div class="parent-icon"><i class="bx bx-bug"></i>
                        </div>
                        <div class="menu-title">Gejala</div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/diagnosa') ?>">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Data Diagnosa</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <!-- <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span> -->

                            <h4 class="logo-text">Sistem Pakar Diagnosa Penyakit Buncis</h4>

                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a> -->
                                    <div class="header-notifications-list"> </div>
                                    <!-- <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a> -->
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a> -->
                                    <div class="header-message-list"></div>
                                    <!-- <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url() ?>/assets/images/logo-icon.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?= session('user')->user_email ?></p>
                                <p class="designattion mb-0">Admin</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <form action="<?= base_url('auth/logout') ?>" method="post">
                                    <button class="dropdown-item" type="submit"><i class='bx bx-log-out-circle'></i><span>Logout</span></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <?= $this->renderSection('content'); ?>
            <!--end page content -->
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <!--app JS-->
    <?= $this->renderSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="<?= base_url() ?>/assets/js/app.js"></script>



</body>

</html>