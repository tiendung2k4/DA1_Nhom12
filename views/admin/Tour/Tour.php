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
        <a href="?act=createTour" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Tour
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover">
            <thead>
                <?php foreach ($danhSachTour as $tour): ?>
                <tr>
                    <th>Mã Tour</th>
                    <th>Tên Tour</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Ngày khởi hành</th>
                    <th>Ngày kết thúc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
           
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($tour['id_tour']) ?></td>
                    <td><?= htmlspecialchars($tour['ten_tour']) ?></td>
                    <td><?= htmlspecialchars($tour['gia']) ?></td>
                    <td><?= htmlspecialchars($tour['mo_ta']) ?></td>
                    <td><?= date('d/m/Y', strtotime($tour['ngay_khoi_hanh'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($tour['ngay_ket_thuc'])) ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
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
require './views/admin/Master.php';
?>