<?php
// master.php
$title = $title ?? 'Trang quản trị';
$current_page = $current_page ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin - <?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="./public/CSS/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">ADMIN</a>
        <!-- Sidebar Toggle-->

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link <?= $current_page === 'tour' ? 'active' : '' ?>" href="index.php?act=tour">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lí Tour
                        </a>

                        <a class="nav-link <?= $current_page === 'booking' ? 'active' : '' ?>"
                            href="index.php?act=booking">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                            Quản lí Booking
                        </a>

                        <a class="nav-link <?= $current_page === 'huongdanvien' ? 'active' : '' ?>"
                            href="index.php?act=huongdanvien">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Quản lí hướng dẫn viên
                        </a>

                        <a class="nav-link <?= $current_page === 'khachhang' ? 'active' : '' ?>"
                            href="index.php?act=khachhang">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Quản lí khách hàng
                        </a>


                        <a class="nav-link <?= $current_page === 'phong' ? 'active' : '' ?>" href="index.php?act=phong">
                            <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                            Quản lí đặt phòng
                        </a>

                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <!-- Nội dung chính từ trang con -->
                    <?= $content ?? '<div class="alert alert-info">Chưa có nội dung.</div>' ?>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © NHÓM 12 - 2025</div>
                    </div>
                </div>
            </footer>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="./public/JS/scripts.js"></script>
</body>

</html>