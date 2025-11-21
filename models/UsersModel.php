<?php
class UsersModel extends BaseModel {
    public $user_id;
    public $username;
    public $password;
    public $role;
    public $name;
    public $email;
    public $phone;

    // Lấy toàn bộ người dùng
    public function getAllUsers() {
        try {
            $sql = "SELECT * FROM users ORDER BY user_id DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    //  Tìm user theo ID
    public function findUser($id) {
        try {
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null;
        }
    }

    // Thêm user mới
    public function createUser() {
        try {
            // Mã hoá mật khẩu
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, role, name, email, phone)
                    VALUES (:username, :password, :role, :name, :email, :phone)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':username' => $this->username,
                ':password' => $hashedPassword,
                ':role' => $this->role,
                ':name' => $this->name,
                ':email' => $this->email,
                ':phone' => $this->phone
            ]);
        } catch (PDOException $e) {
            echo "Lỗi khi thêm user: " . $e->getMessage();
            return false;
        }
    }

    // Cập nhật user
    public function updateUser() {
        try {
            // Nếu mật khẩu có giá trị mới → mã hoá lại
            $hashedPassword = $this->password ? password_hash($this->password, PASSWORD_DEFAULT) : null;

            // Nếu không cập nhật password, giữ nguyên mật khẩu cũ
            if ($hashedPassword) {
                $sql = "UPDATE users SET 
                            username = :username,
                            password = :password,
                            role = :role,
                            name = :name,
                            email = :email,
                            phone = :phone
                        WHERE user_id = :user_id";
                $params = [
                    ':username' => $this->username,
                    ':password' => $hashedPassword,
                    ':role' => $this->role,
                    ':name' => $this->name,
                    ':email' => $this->email,
                    ':phone' => $this->phone,
                    ':user_id' => $this->user_id
                ];
            } else {
                $sql = "UPDATE users SET 
                            username = :username,
                            role = :role,
                            name = :name,
                            email = :email,
                            phone = :phone
                        WHERE user_id = :user_id";
                $params = [
                    ':username' => $this->username,
                    ':role' => $this->role,
                    ':name' => $this->name,
                    ':email' => $this->email,
                    ':phone' => $this->phone,
                    ':user_id' => $this->user_id
                ];
            }

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật user: " . $e->getMessage();
            return false;
        }
    }

    // Xóa user
    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            echo "Lỗi khi xóa user: " . $e->getMessage();
            return false;
        }
    }

    // Kiểm tra đăng nhập
    public function checkLogin($username, $password) {
        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra mật khẩu
            if ($user && password_verify($password, $user['password'])) {
                return $user; // Đăng nhập thành công
            }
            return false; // Sai username hoặc password
        } catch (PDOException $e) {
            echo "Lỗi đăng nhập: " . $e->getMessage();
            return false;
        }
    }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 8b1d46818613651509587ab7cdc54e6be59ce197
