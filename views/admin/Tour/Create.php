<?php
$title = $title ?? "Thêm Tour Mới";
$current_page = $current_page ?? "tour";
$danhMuc = $danhMuc ?? [];

ob_start();
?>

<h1 class="mt-4">Thêm Tour Mới</h1>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">Thêm tour thất bại!</div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i> Form thêm tour
    </div>
    <div class="card-body">
        <form action="index.php?act=xuly-them-tour" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tên tour <span class="text-danger">*</span></label>
                        <input type="text" name="ten_tour" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá tour (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" name="gia" class="form-control" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Danh mục tour <span class="text-danger">*</span></label>
                        <select name="id_danhmuc" class="form-select" required>
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($danhMuc as $dm): ?>
                                <option value="<?= $dm['id_danhmuc'] ?>"><?= htmlspecialchars($dm['ten_danhmuc']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Ngày khởi hành <span class="text-danger">*</span></label>
                        <input type="date" name="ngay_khoi_hanh" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                        <input type="date" name="ngay_ket_thuc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả tour</label>
                        <textarea name="mo_ta" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save"></i> Thêm Tour
                </button>
                <a href="index.php?act=tour" class="btn btn-secondary btn-lg">Quay lại</a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'views/admin/Master.php';
?>