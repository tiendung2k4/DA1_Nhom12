<?php
class AuthController {
    private $UserModel;

    public function __construct() {
        // Gọi session để đảm bảo dùng được $_SESSION
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Khởi tạo model
        $this->UserModel = new UsersModel(); // nếu model bạn tên là UsersModel
    }

    //  Đăng nhập 
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra thông tin user
            $user = $this->UserModel->checkLogin($username, $password);

            if ($user) {
                // Lưu thông tin session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Chuyển hướng
                header('Location: index.php');
                exit();
            } else {
                // Sai thông tin
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                require_once './views/login.php';
            }
        } else {
            require_once './views/login.php';
        }
    }

    //  Đăng xuất 
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>
