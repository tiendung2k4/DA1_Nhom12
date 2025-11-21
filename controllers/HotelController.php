<?php
class HotelController{
    private $hotelModel;
    function __construct()
    {
       $this->hotelModel = new HotelModel();
    }
    public function listHotels()
    {
        $hotels = $this->hotelModel->getAllHotels();
        require_once './views/hotel/list.php';
    }
    public function createHotel()
    {
        $err = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['rating']) || empty($_POST['description'])) {
                $err['empty'] = "Vui lòng nhập đầy đủ thông tin!";
            } else if (!is_numeric($_POST['rating']) || $_POST['rating'] <= 0) {
                $err['rating'] = "Rating phải là số dương!";
            }

            if (empty($err)) {
                $data = [
                    'name' => trim($_POST['name']),
                    'address' => trim($_POST['address']),
                    'rating' => (float)$_POST['rating'],
                    'description' => trim($_POST['description']),
                ];

                if ($this->hotelModel->createHotel($data)) {
                    echo "<script>alert('Thêm Hotel thành công!'); window.location='index.php?controller=hotel&action=listHotels'</script>";
                    exit();
                } else {
                    $err['general'] = "Tạo hotel thất bại, vui lòng thử lại.";
                }
            }
        }

        require_once './views/hotel/create.php';
    }
    public function updateHotel($id)
    {
        $hotel = $this->hotelModel->findHotel($id);
        if (!$hotel) {
            echo "Hotel not found.";
            return;
        }

        $err = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['rating']) || empty($_POST['description'])) {
                $err['empty'] = "Vui lòng nhập đầy đủ thông tin!";
            } else if (!is_numeric($_POST['rating']) || $_POST['rating'] <= 0) {
                $err['rating'] = "Rating phải là số dương!";
            }

            if (empty($err)) {
                $data = [
                    'name' => trim($_POST['name']),
                    'address' => trim($_POST['address']),
                    'rating' => (float)$_POST['rating'],
                    'description' => trim($_POST['description']),
                ];

                if ($this->hotelModel->updateHotel($id, $data)) {
                    echo "<script>alert('Cập nhật Hotel thành công!'); window.location='index.php?controller=hotel&action=listHotels'</script>";
                    exit();
                } else {
                    $err['general'] = "Cập nhật hotel thất bại, vui lòng thử lại.";
                }
            }
        }

        require_once './views/hotel/edit.php';
    }
    public function deleteHotel($id){
        if(isset($_Get['id'])){
            $id =$_GET['id'];
            $this->hotelModel->deleteHotel($id);
            header('Location: index.php?controller=hotel&action=listHotels');
            exit();
        }else{
            echo "Hotel not found.";
        }
    }

}