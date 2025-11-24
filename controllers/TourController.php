<?php
// có class chứa các function thực thi xử lý logic 
class TourController
{
    public $modelTour;

    public function __construct()
    {
        $this->modelTour = new TourModel();
    }

    public function Home()
    {
        $danhSachTour = $this->modelTour->getAllTour();

        require  './views/admin/Tour/Tour.php';
    }
    // public function createTour()
    // {
    //     $categories = $this->modelTour->getAllCategories();

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Xử lý dữ liệu từ form
    //         $tourName = $_POST['tour_name'] ?? '';
    //         $description = $_POST['description'] ?? '';
    //         $price = $_POST['price'] ?? '';
    //         $categoryId = $_POST['category_id'] ?? '';
    //         $status = $_POST['status'] ?? '';

    //         // Xử lý upload ảnh
    //         $imagePath = '';
    //         if (isset($_FILES['tour_images']) && $_FILES['tour_images']['error'] === UPLOAD_ERR_OK) {
    //             $uploadDir = 'uploads/tours/';
    //             if (!is_dir($uploadDir)) {
    //                 mkdir($uploadDir, 0777, true);
    //             }
    //             $imagePath = $uploadDir . basename($_FILES['tour_images']['name']);
    //             move_uploaded_file($_FILES['tour_images']['tmp_name'], $imagePath);
    //         }

    //         // Lưu tour vào database
    //         $this->modelTour->createTour($tourName, $description, $price, $categoryId, $status, $imagePath);

    //         $success = "Thêm tour thành công!";
    //     }

    //     require './views/admin/Tour/Create.php';
    // }

    public function themTour() {
        $danhMuc = $this->modelTour->getAllCategories();
        $title = "Thêm Tour Mới";
        $current_page = "tour";
        include 'views/admin/Tour/Create.php';
    }

    // Xử lý form thêm tour
    public function xuLyThemTour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_tour'       => $_POST['ten_tour'],
                'mo_ta'          => $_POST['mo_ta'],
                'gia'            => $_POST['gia'],
                'ngay_khoi_hanh' => $_POST['ngay_khoi_hanh'],
                'ngay_ket_thuc'  => $_POST['ngay_ket_thuc'],
                'id_danhmuc'     => $_POST['id_danhmuc']
            ];

            if ($this->modelTour->themTour($data)) {
                header("Location: index.php?act=tour&msg=Thêm+tour+thành+công!");
            } else {
                header("Location: index.php?act=them-tour&error=Thêm+thất+bại!");
            }
            exit;
        }
    }

    // controllers/ProductController.php (thêm vào)

    // Hiển thị form sửa tour
    public function suaTour() {
        $id = $_GET['id'] ?? 0;
        if ($id <= 0) {
            header("Location: index.php?act=tour&msg=ID+không+hợp+lệ");
            exit;
        }

        $tour = $this->modelTour->getTourById($id);
        if (!$tour) {
            header("Location: index.php?act=tour&msg=Tour+không+tồn+tại");
            exit;
        }

        $danhMuc = $this->modelTour->getAllCategories();

        $title = "Sửa Tour: " . $tour['ten_tour'];
        $current_page = "tour";

        include 'views/admin/Tour/Edit.php';
    }

    // Xử lý cập nhật tour
    public function xuLySuaTour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_tour'        => $_POST['id_tour'],
                'ten_tour'       => $_POST['ten_tour'],
                'mo_ta'          => $_POST['mo_ta'],
                'gia'            => $_POST['gia'],
                'ngay_khoi_hanh' => $_POST['ngay_khoi_hanh'],
                'ngay_ket_thuc'  => $_POST['ngay_ket_thuc'],
                'id_danhmuc'     => $_POST['id_danhmuc']
            ];

            if ($this->modelTour->capNhatTour($data)) {
                header("Location: index.php?act=tour&msg=Cập+nhật+thành+công!");
            } else {
                header("Location: index.php?act=sua-tour&id={$data['id_tour']}&error=Cập+nhật+thất+bại!");
            }
            exit;
        }
    }

public function xoaTour() {
    $id = $_GET['id'] ?? 0;
    if ($id <= 0) {
        header("Location: index.php?act=tour&msg=ID+không+hợp+lệ");
        exit;
    }

    if ($this->modelTour->xoaTour($id)) {
        header("Location: index.php?act=tour&msg=Xóa+tour+thành+công!");
    } else {
        header("Location: index.php?act=tour&msg=Không+thể+xóa+tour+này.+Tour+đã+có+booking+hoặc+lịch+trình.");
    }
    exit;
}
}