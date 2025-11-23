<?php
// views/admin/HDV/HDV.php
$title       = "Quản lí hướng dẫn viên";
$current_page = "hdv";

ob_start();
?>

<h1 class="mt-4">Quản lí Hướng dẫn viên</h1>



<!-- BẢNG DANH SÁCH HƯỚNG DẪN VIÊN -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-user-tie me-1"></i>
            Danh sách Hướng dẫn viên
        </div>
        <a href="index.php?page=hdv_them" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm Hướng dẫn viên
        </a>
    </div>

    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th width="10%">Mã HDV</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tên đăng nhập</th>
                    <th width="12%">Trạng thái</th>
                    <th width="15%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $h): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($h['id_hdv'] ?? '') ?></strong></td>
                            <td><?= htmlspecialchars($h['ho_ten'] ?? '') ?></td>
                            <td><?= htmlspecialchars($h['sdt'] ?? '') ?></td>
                            <td><?= htmlspecialchars($h['email'] ?? '') ?></td>
                            <td><?= htmlspecialchars($h['dia_chi'] ?? '<em class="text-muted">Chưa cập nhật</em>') ?></td>
                            <td><?= htmlspecialchars($h['ten_dang_nhap'] ?? '<small class="text-muted">-</small>') ?></td>
                            <td class="text-center">
                                <?php if (!empty($h['trang_thai_taikhoan']) && $h['trang_thai_taikhoan'] == 1): ?>
                                    <span class="badge bg-success">Đang hoạt động</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Đã khóa</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?page=hdv_xem&id=<?= $h['id_hdv'] ?>" class="btn btn-sm btn-primary" title="Xem">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?page=hdv_sua&id=<?= $h['id_hdv'] ?>" class="btn btn-sm btn-warning" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?page=hdv_xoa&id=<?= $h['id_hdv'] ?>" 
                                   class="btn btn-sm btn-danger" title="Xóa"
                                   onclick="return confirm('Xóa HDV: <?= htmlspecialchars($h['ho_ten']) ?>?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                            Chưa có hướng dẫn viên nào trong hệ thống.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require './views/admin/Master.php'; // hoặc '../../../views/admin/Master.php' tùy cấu trúc của nhóm bạn
?>