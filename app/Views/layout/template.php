<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?> | MyHospital</title>

    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/app.css" />
</head>

<body>
    <div id="app">
        <!-- Bagian Navigasi -->
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <p class="sidebar-title">MyHospital</p>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Main Menu</li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i data-feather="activity" width="20"></i>
                                <span>Perawatan</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?= base_url('/perawatan'); ?>">Lihat Daftar Perawatan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/perawatan/create'); ?>">Tambah Registrasi Perawatan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i data-feather="user" width="20"></i>
                                <span>Dokter</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?= base_url('/dokter'); ?>">Lihat Daftar Dokter</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/dokter/create'); ?>">Tambah Data Dokter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i data-feather="users" width="20"></i>
                                <span>Pasien</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?= base_url('/pasien'); ?>">Lihat Daftar Pasien</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/pasien/create'); ?>">Tambah Data Pasien</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i data-feather="briefcase" width="20"></i>
                                <span>Obat</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="<?= base_url('/obat'); ?>">Lihat Daftar Obat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/obat/create'); ?>">Tambah Data Obat</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <button class="sidebar-toggler btn x">
                    <i data-feather="x"></i>
                </button>
            </div>
        </div>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="/images/avatar/2.jpg" alt="" />
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">
                                    Hi, Admin
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/logout"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <p class="text-center">
                        &copy; MyHospital 2021 by Clover
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!-- <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
    <script src="/js/feather-icons/feather.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/pages/dashboard.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>