<?php
// public/index.php
session_start();
require_once 'commons/env.php';
require_once 'commons/function.php';

// Lấy action
$act = $_GET['act'] ?? '/';

match ($act) {
    '/'     => require_once 'views/admin/Tour.php',
    'tour'  => require_once 'views/admin/Tour.php',
    'booking' => require_once 'views/admin/Booking.php',
    'huongdanvien' => require_once 'views/admin/HDV.php',
    'khachhang' => require_once 'views/admin/KhachHang.php',
    'phong' => require_once 'views/admin/Phong.php',

    default => die("404 - Trang không tồn tại"),
};