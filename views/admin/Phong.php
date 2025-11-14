<?php
// views/admin/phong.php
$title = "Quản lí Đặt phòng";
$current_page = "phong";

ob_start();
?>

<h1 class="mt-4">Quản lí Đặt phòng</h1>

<!-- 4 CARD THỐNG KÊ -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng đặt phòng</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">1,156</a>
                <div class="small text-white">Right Arrow</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Đã xác nhận</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">892</a>
                <div class="small text-white">Right Arrow</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Chờ xác nhận</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">198</a>
                <div class="small text-white">Right Arrow</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Đã hủy</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">66</a>
                <div class="small text-white">Right Arrow</div>
            </div>
        </div>
    </div>
</div>

<!-- BẢNG DANH SÁCH ĐẶT PHÒNG -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-bed me-1"></i>
            Danh sách Đặt phòng
        </div>
        <a href="index.php?act=phong&add=1" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Đặt phòng
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <tr>
                    <th>Mã Đặt</th>
                    <th>Khách hàng</th>
                    <th>Phòng</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DP001</td>
                    <td>Nguyễn Văn An</td>
                    <td>Deluxe 101</td>
                    <td>15/11/2025</td>
                    <td>18/11/2025</td>
                    <td>4.500.000đ</td>
                    <td><span class="badge bg-success">Đã xác nhận</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" title="Hủy"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>DP002</td>
                    <td>Trần Thị Bé</td>
                    <td>Standard 205</td>
                    <td>16/11/2025</td>
                    <td>17/11/2025</td>
                    <td>1.800.000đ</td>
                    <td><span class="badge bg-warning">Chờ xác nhận</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>DP003</td>
                    <td>Lê Văn Cường</td>
                    <td>Suite 301</td>
                    <td>10/11/2025</td>
                    <td>13/11/2025</td>
                    <td>9.000.000đ</td>
                    <td><span class="badge bg-success">Đã xác nhận</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>DP004</td>
                    <td>Phạm Thị Dung</td>
                    <td>Standard 108</td>
                    <td>12/11/2025</td>
                    <td>14/11/2025</td>
                    <td>2.400.000đ</td>
                    <td><span class="badge bg-danger">Đã hủy</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
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