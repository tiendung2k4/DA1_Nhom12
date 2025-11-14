<?php
// views/admin/HDV.php
$title = "Quản lí hướng dẫn viên";
$current_page = "hdv";

ob_start();
?>


    <h1 class="mt-4">Quản lí Hướng dẫn viên</h1>
    


<!-- 4 CARD THỐNG KÊ -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng HDV</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">45</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Đang hoạt động</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">38</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Đang dẫn tour</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">12</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">Nghỉ phép</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">7</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- BẢNG DANH SÁCH HƯỚNG DẪN VIÊN -->
<div class="card mb-4">
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-user-tie me-1"></i>
            Danh sách Hướng dẫn viên
        </div>
        <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Hướng dẫn viên
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <tr>
                    <th>Mã HDV</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Ngôn ngữ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>HDV001</td>
                    <td>Trần Văn Minh</td>
                    <td>0901234567</td>
                    <td>minh.tv@gmail.com</td>
                    <td>Tiếng Việt, Tiếng Anh</td>
                    <td><span class="badge bg-success">Đang hoạt động</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>HDV002</td>
                    <td>Nguyễn Thị Lan</td>
                    <td>0912345678</td>
                    <td>lan.nt@gmail.com</td>
                    <td>Tiếng Việt, Tiếng Nhật</td>
                    <td><span class="badge bg-warning">Đang dẫn tour</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>HDV003</td>
                    <td>Lê Hoàng Nam</td>
                    <td>0923456789</td>
                    <td>nam.lh@gmail.com</td>
                    <td>Tiếng Việt, Tiếng Hàn</td>
                    <td><span class="badge bg-success">Đang hoạt động</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>HDV004</td>
                    <td>Phạm Thị Hồng</td>
                    <td>0934567890</td>
                    <td>hong.pt@gmail.com</td>
                    <td>Tiếng Việt</td>
                    <td><span class="badge bg-secondary">Nghỉ phép</span></td>
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