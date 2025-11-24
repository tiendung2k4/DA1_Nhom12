<?php
$title = $title ?? "Sửa Tour";
$current_page = $current_page ?? "tour";
$tour = $tour ?? [];
$danhMuc = $danhMuc ?? [];

ob_start();
?>

<h1 class="mt-4">Sửa Tour #<?= $tour['id_tour'] ?? '' ?></h1>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">Cập nhật thất bại!</div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-edit me-1"></i> Chỉnh sửa thông tin tour
    </div>
    <div class="card-body">
        <form action="index.php?act=xuly-sua-tour" method="POST">
            <input type="hidden" name="id_tour" value="<?= $tour['id_tour'] ?? '' ?>">

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tên tour <span class="text-danger">*</span></label>
                        <input type="text" name="ten_tour" class="form-control" 
                               value="<?= htmlspecialchars($tour['ten_tour'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá tour (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" name="gia" class="form-control" 
                               value="<?= $tour['gia'] ?? '' ?>" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Danh mục tour <span class="text-danger">*</span></label>
                        <select name="id_danhmuc" class="form-select" required>
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($danhMuc as $dm): ?>
                                <option value="<?= $dm['id_danhmuc'] ?>" 
                                    <?= ($tour['id_danhmuc'] ?? '') == $dm['id_danhmuc'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($dm['ten_danhmuc']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Ngày khởi hành <span class="text-danger">*</span></label>
                        <input type="date" name="ngay_khoi_hanh" class="form-control" 
                               value="<?= $tour['ngay_khoi_hanh'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                        <input type="date" name="ngay_ket_thuc" class="form-control" 
                               value="<?= $tour['ngay_ket_thuc'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả tour</label>
                        <textarea name="mo_ta" rows="4" class="form-control"><?= htmlspecialchars($tour['mo_ta'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Cập Nhật Tour
                </button>
                <a href="index.php?act=tour" class="btn btn-secondary btn-lg">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'views/admin/Master.php';
?>