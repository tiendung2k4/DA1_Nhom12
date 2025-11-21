<?php
class TourController {
    private $toursModel;
    private $categoryModel;

    public function __construct()
    {
        $this->toursModel = new ToursModel();
        $this->categoryModel = new CategoryModel();
    }
    public function listTours()
    {
        $tours = $this->toursModel->getAllTours();
        require_once './views/tours/list.php';
    }   
    public function searchTour()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keyword = $_POST['keyword'];
            $tours = $this->toursModel->searchTours($keyword);
            require_once './views/tours/search_results.php';
        } else {
            header('Location: index.php?controller=tour&action=listTours');
            exit();
        }
    }
    public function createTours()
    {
        $categories = $this->categoryModel->getAllCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $err = [];
            if (empty($_POST['tour_name'])) {
                $err['tour_name'] = "Tour name không được để trống";
            }
            if (empty($_POST['price'])) {
                $err['price'] = "Price không được để trống";
            }
            if (empty($_FILES['tour_image']['name'])) {
                $err['tour_image'] = "Tour image không được để trống";
            }
            if(empty($_POST['price'] || !is_numeric($_POST['price']) || $_POST['price'] <= 0)) {
                $err['price'] = "Price phải là số dương";
            }
            if(empty($err)){
                $this->toursModel->tour_name = $_POST['tour_name'];
                $this->toursModel->category_id = $_POST['category_id'];
                $this->toursModel->price = $_POST['price'];
                $this->toursModel->description = $_POST['description'];
                $this->toursModel->tour_image = $_FILES['tour_image']['name'];
                if($_FILES['tour_image']['name']) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["tour_image"]["name"]);
                    move_uploaded_file($_FILES["tour_image"]["tmp_name"], $target_file);
                }
                if($this->toursModel->createTour($_POST['tour_name'], $_POST['description'], $_POST['price'], $_POST['category_id'], $_FILES['tour_image']['name'], 1)) {
                echo "<script>
                        alert('Thêm tour thành công!');
                        window.location.href='?action=admin-listTours';
                    </script>";
                    exit();
                } else {
                    $err['general'] = "Tạo tour thất bại, vui lòng thử lại.";
                }   
            }
        }
        require_once './views/tours/create.php';
    }
    public function updateTour($id)
    {
        $categories = $this->categoryModel->getAllCategories();
        $tour = $this->toursModel->getTourById($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $err = [];
            if (empty($_POST['tour_name'])) {
                $err['tour_name'] = "Tour name không được để trống";
            }
            if (empty($_POST['price'])) {
                $err['price'] = "Price không được để trống";
            }
            if(empty($_POST['price'] || !is_numeric($_POST['price']) || $_POST['price'] <= 0)) {
                $err['price'] = "Price phải là số dương";
            }
            if(empty($err)){
                $this->toursModel->tour_name = $_POST['tour_name'];
                $this->toursModel->category_id = $_POST['category_id'];
                $this->toursModel->price = $_POST['price'];
                $this->toursModel->description = $_POST['description'];
                if(!empty($_FILES['tour_image']['name'])) {
                    $this->toursModel->tour_image = $_FILES['tour_image']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["tour_image"]["name"]);
                    move_uploaded_file($_FILES["tour_image"]["tmp_name"], $target_file);
                } else {
                    $this->toursModel->tour_image = $tour['tour_image'];
                }
                if($this->toursModel->updateTour( $id, $_POST['tour_name'], $_POST['description'], $_POST['price'], $_POST['category_id'], $this->toursModel->tour_image, 1)) {
                echo "<script>
                        alert('Cập nhật tour thành công!');
                        window.location.href='?action=admin-listTours';
                    </script>";
                    exit();
                } else {
                    $err['general'] = "Cập nhật tour thất bại, vui lòng thử lại.";
                }   
            }
    }
    require_once './views/tours/edit.php';
}
    public function deleteTour($id)
    {
        if($id){
            if($this->toursModel->deleteTour($id)) {
                echo "<script>
                        alert('Xoá tour thành công!');
                        window.location.href='?action=admin-listTours';
                    </script>";
                    exit();
            } else {
                echo "<script>
                        alert('Xoá tour thất bại, vui lòng thử lại.');
                        window.location.href='?action=admin-listTours';
                    </script>";
                    exit();
            }
        }
    }
}