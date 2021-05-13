<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <!-- 
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet" />
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css" />
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" /> -->
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
                        <!-- Bagian Lihat -->
                        <li class="sidebar-title">Main Menu</li>

                        <li class="sidebar-item active">
                            <a href="#" class="sidebar-link">
                                <i data-feather="file" width="20"></i>
                                <span>Registrasi Perawatan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="user" width="20"></i>
                                <span>Data Dokter</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="users" width="20"></i>
                                <span>Data Pasien</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="briefcase" width="20"></i>
                                <span>Data Obat</span>
                            </a>
                        </li>

                        <!-- Bagian Input -->
                        <li class="sidebar-title">Forms Input</li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="file-text" width="20"></i>
                                <span>Form Registrasi Perawatan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="file-text" width="20"></i>
                                <span>Form Dokter</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="file-text" width="20"></i>
                                <span>Form Pasien</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i data-feather="file-text" width="20"></i>
                                <span>Form Obat</span>
                            </a>
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
                                    <img src="/images/avatar/1.jpg" alt="" srcset="" />
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

            <div class="main-content container-fluid">
                <section class="section">
                    <div class="row">
                        <div class="card">
                            <?= $this->renderSection('content'); ?>
                        </div>
                    </div>
                </section>
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