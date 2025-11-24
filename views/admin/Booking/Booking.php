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
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <th>Mã Booking</th>
                    <th>Tên Khách hàng</th>
                    <th>Tên Tour</th>
                    <th>Ngày đặt</th>
                    <th>Số người</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
           
            <tbody>
                <tr></tr>
                    <td><?php echo $booking['id_booking']; ?></td>
                    <td><?php echo $booking['ten_khachhang']; ?></td>
                    <td><?php echo $booking['ten_tour']; ?></td>
                    <td><?php echo $booking['ngay_dat']; ?></td>
                    <td><?php echo $booking['so_nguoi']; ?></td>
                    <td><?php echo number_format($booking['tong_tien'], 0, ',', '.'); ?> VND</td>
                    <td>
                        <?php 
                            switch ($booking['trang_thai']) {
                                case 'Chờ xác nhận':
                                    echo '<span class="badge bg-warning text-dark">Chờ xác nhận</span>';
                                    break;
                                case 'Đã xác nhận':
                                    echo '<span class="badge bg-success">Đã xác nhận</span>';
                                    break;
                                case 'Đã hủy':
                                    echo '<span class="badge bg-danger">Đã hủy</span>';
                                    break;
                                default:
                                    echo '<span class="badge bg-secondary">Không xác định</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Sửa</a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                    </td>
                
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require './views/admin/Master.php'; // Gọi layout chính
?>