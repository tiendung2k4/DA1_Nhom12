<?php
// views/admin/Tour.php
$title = "Quản lí Tour";
$current_page = "tour"; 
ob_start();
?>

    
   <h1 class="mt-4">Quản lí Tour</h1>

<div class="card mb-4">
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-calendar-check me-1"></i>
            Danh sách Tour
        </div>
        <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Tour
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <tr>
                    <th>Mã Tour</th>
                    <th>Tên Tour</th>
                    <th>Giá</th>
                    <th>Thời gian</th>
                    <th>Số chỗ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Mã Tour</th>
                    <th>Tên Tour</th>
                    <th>Giá</th>
                    <th>Thời gian</th>
                    <th>Số chỗ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>T001</td>
                    <td>Tour Hà Nội - Sapa</td>
                    <td>5.000.000đ</td>
                    <td>3 ngày 2 đêm</td>
                    <td>30</td>
                    <td><span class="badge bg-success">Đang mở bán</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>T002</td>
                    <td>Tour Đà Lạt</td>
                    <td>3.500.000đ</td>
                    <td>2 ngày 1 đêm</td>
                    <td>25</td>
                    <td><span class="badge bg-success">Đang mở bán</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>T003</td>
                    <td>Tour Phú Quốc</td>
                    <td>8.900.000đ</td>
                    <td>4 ngày 3 đêm</td>
                    <td>0</td>
                    <td><span class="badge bg-secondary">Hết chỗ</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>T004</td>
                    <td>Tour Nha Trang</td>
                    <td>4.200.000đ</td>
                    <td>3 ngày 2 đêm</td>
                    <td>15</td>
                    <td><span class="badge bg-warning">Sắp khởi hành</span></td>
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
            
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<?php
$content = ob_get_clean();
require 'Master.php';
?>