<?php 
class UsersController{
    private $UserModel;
    public function __construct()
    {
         $this->UserModel = new UsersModel();
    }
    public function listUsers()
    {
        $users = $this->UserModel->getAllUsers();
        require_once './views/users/list.php';
    }
    public function viewUser($id)
    {
        $user = $this->UserModel-> findUser($id);
        if ($user) {
            require_once './views/users/view.php';
        } else {
            echo "User not found.";
        }
    }
    public function createUser()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $err= [];
            if(empty($_POST['username'])) {
                $err['username'] = "Username không được để trống";
            }
            if(empty($_POST['password'])) {
                $err['password'] = "Password không được để trống";
            }
            if(empty($_POST['role'])) {
                $err['role'] = "Role không được để trống";
            }
            if(empty($_POST['name'])) {
                $err['name'] = "Name không được để trống";
            }
            if(empty($_POST['email'])) {
                $err['email'] = "Email không được để trống";
            }
            if(empty($_POST['phone'])) {
                $err['phone'] = "Phone không được để trống";
            }
            if(strlen($_POST['password']) < 6) {
                $err['password'] = "Password phải có ít nhất 6 ký tự";
            }
            if(strlen($_POST['phone']) != 10) {
                $err['phone'] = "Phone phải có đúng 10 số";
            }
            if(strlen($_POST['username']) < 6) {
                $err['username'] = "Username phải có ít nhất 6 ký tự";
            }
            if(strlen($_POST['name']) < 2) {
                $err['name'] = "Name phải có ít nhất 3 ký tự";
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Email không đúng định dạng";
            }
            if(!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
                $err['phone'] = "Phone không đúng định dạng";
            }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->UserModel->username = $_POST['username'];
            $this->UserModel->password = $_POST['password'];
            $this->UserModel->role = $_POST['role'];
            $this->UserModel->name = $_POST['name'];
            $this->UserModel->email = $_POST['email'];
            $this->UserModel->phone = $_POST['phone'];
            $this->UserModel->createUser();
            if($this->UserModel->createUser()) {
                echo "<script>alert('Tạo user thành công'); window.location.href='index.php?controller=users&action=listUsers';</script>";
                exit();
            } else {
                $error = "Lỗi khi tạo user.";
            }
            exit();
        } else {
            require_once './views/users/create.php';
        }
    }
    }
    public function updateUser  ($id)
    {
        $user = $this->UserModel->findUser($id);
        if (!$user) {
            echo "User not found.";
            return;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $err= [];
            if(empty($_POST['username'])) {
                $err['username'] = "Username không được để trống";
            }
            if(empty($_POST['role'])) {
                $err['role'] = "Role không được để trống";
            }
            if(empty($_POST['name'])) {
                $err['name'] = "Name không được để trống";
            }
            if(empty($_POST['email'])) {
                $err['email'] = "Email không được để trống";
            }
            if(empty($_POST['phone'])) {
                $err['phone'] = "Phone không được để trống";
            }
            if(strlen($_POST['phone']) != 10) {
                $err['phone'] = "Phone phải có đúng 10 số";
            }
            if(strlen($_POST['username']) < 6) {
                $err['username'] = "Username phải có ít nhất 6 ký tự";
            }
            if(strlen($_POST['name']) < 2) {
                $err['name'] = "Name phải có ít nhất 3 ký tự";
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Email không đúng định dạng";
            }
            if(!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
                $err['phone'] = "Phone không đúng định dạng";
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->UserModel->user_id = $id;
            $this->UserModel->username = $_POST['username'];
            $this->UserModel->password = $_POST['password'];
            $this->UserModel->role = $_POST['role'];
            $this->UserModel->name = $_POST['name'];
            $this->UserModel->email = $_POST['email'];
            $this->UserModel->phone = $_POST['phone'];
            $this->UserModel->updateUser();
            header('Location: index.php?controller=users&action=listUsers');
            exit();
        } else {
            require_once './views/users/edit.php';
        }
    }
    public function deleteUser($id)
    {
        $id = $_GET['id'] || null;
        if($id){
            $this->UserModel->deleteUser($id);
        }
        header('Location: index.php?controller=users&action=listUsers');
        exit();
    }
}