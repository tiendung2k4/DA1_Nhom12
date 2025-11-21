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
    public function createTour()
    {
        $categories = $this->modelTour->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý dữ liệu từ form
            $tourName = $_POST['tour_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $categoryId = $_POST['category_id'] ?? '';
            $status = $_POST['status'] ?? '';

            // Xử lý upload ảnh
            $imagePath = '';
            if (isset($_FILES['tour_images']) && $_FILES['tour_images']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/tours/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $imagePath = $uploadDir . basename($_FILES['tour_images']['name']);
                move_uploaded_file($_FILES['tour_images']['tmp_name'], $imagePath);
            }

            // Lưu tour vào database
            $this->modelTour->createTour($tourName, $description, $price, $categoryId, $status, $imagePath);

            $success = "Thêm tour thành công!";
        }

        require './views/admin/Tour/Create.php';
    }
}