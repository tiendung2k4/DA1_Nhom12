<?php
// views/admin/booking.php
$title = "Quản lí Booking";
$current_page = "booking";

ob_start();
?>

<!-- TIÊU ĐỀ -->
<h1 class="mt-4">Quản lí Booking</h1>


<!-- THÔNG TIN TỔNG QUAN (TÙY CHỌN) -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng Booking</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">120</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Chờ xác nhận</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">15</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Đã xác nhận</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">95</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Đã hủy</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">10</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- BẢNG DANH SÁCH BOOKING -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-calendar-check me-1"></i>
            Danh sách Booking
        </div>
        <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Booking
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <tr>
                    <th>Mã Booking</th>
                    <th>Khách hàng</th>
                    <th>Tour</th>
                    <th>Ngày đặt</th>
                    <th>Số người</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
           
            <tbody>
                <tr>
                    <td>BK001</td>
                    <td>Nguyễn Văn A</td>
                    <td>Tour Sapa 3N2Đ</td>
                    <td>14/11/2025</td>
                    <td>2</td>
                    <td>10.000.000đ</td>
                    <td><span class="badge bg-success">Đã xác nhận</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" title="Xóa">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>BK002</td>
                    <td>Trần Thị B</td>
                    <td>Tour Đà Lạt</td>
                    <td>13/11/2025</td>
                    <td>1</td>
                    <td>3.500.000đ</td>
                    <td><span class="badge bg-warning">Chờ xác nhận</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>BK003</td>
                    <td>Lê Văn C</td>
                    <td>Tour Phú Quốc</td>
                    <td>12/11/2025</td>
                    <td>4</td>
                    <td>28.000.000đ</td>
                    <td><span class="badge bg-danger">Đã hủy</span></td>
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