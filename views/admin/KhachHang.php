<?php
// views/admin/khachhang.php
$title = "Quản lí Khách hàng";
$current_page = "khachhang";

ob_start();
?>

<h1 class="mt-4">Quản lí Khách hàng</h1>

<!-- 4 CARD THỐNG KÊ -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng khách hàng</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">1,248</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Đã đặt tour</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">892</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Chưa đặt tour</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">356</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">VIP</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">48</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- BẢNG DANH SÁCH KHÁCH HÀNG -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-users me-1"></i>
            Danh sách Khách hàng
        </div>
        <a href="index.php?act=khachhang&add=1" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Khách hàng
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Đã đặt</th>
                    <th>Loại KH</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>KH001</td>
                    <td>Nguyễn Văn An</td>
                    <td>0901234567</td>
                    <td>an.nv@gmail.com</td>
                    <td>5 tour</td>
                    <td><span class="badge bg-info">VIP</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>KH002</td>
                    <td>Trần Thị Bé</td>
                    <td>0912345678</td>
                    <td>be.tt@gmail.com</td>
                    <td>2 tour</td>
                    <td><span class="badge bg-success">Thường</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>KH003</td>
                    <td>Lê Văn Cường</td>
                    <td>0923456789</td>
                    <td>cuong.lv@gmail.com</td>
                    <td>0 tour</td>
                    <td><span class="badge bg-secondary">Mới</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>KH004</td>
                    <td>Phạm Thị Dung</td>
                    <td>0934567890</td>
                    <td>dung.pt@gmail.com</td>
                    <td>8 tour</td>
                    <td><span class="badge bg-info">VIP</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'Master.php'; // Gọi layout chính
?>