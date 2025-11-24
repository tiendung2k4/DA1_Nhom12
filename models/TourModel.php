<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class TourModel  
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTour()
    {
        $sql = "SELECT * FROM tour ORDER BY id_tour asc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategories()
    {
        $sql = "SELECT * FROM danhmuctour ORDER BY id_danhmuc DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function createTour($tourName, $description, $price, $categoryId, $status, $imagePath)
    // {
    //     $sql = "INSERT INTO tour (ten_tour, mo_ta, gia, id_category, trang_thai, anh_tour) 
    //             VALUES (:ten_tour, :mo_ta, :gia, :id_category, :trang_thai, :anh_tour)";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         ':ten_tour' => $tourName,
    //         ':mo_ta' => $description,
    //         ':gia' => $price,
    //         ':id_category' => $categoryId,
    //         ':trang_thai' => $status,
    //         ':anh_tour' => $imagePath
    //     ]);
    // }

    public function themTour($data) {
        $sql = "INSERT INTO tour 
                (ten_tour, mo_ta, gia, ngay_khoi_hanh, ngay_ket_thuc, id_danhmuc) 
                VALUES 
                (:ten_tour, :mo_ta, :gia, :ngay_khoi_hanh, :ngay_ket_thuc, :id_danhmuc)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten_tour'        => $data['ten_tour'],
            ':mo_ta'           => $data['mo_ta'],
            ':gia'             => $data['gia'],
            ':ngay_khoi_hanh'  => $data['ngay_khoi_hanh'],
            ':ngay_ket_thuc'   => $data['ngay_ket_thuc'],
            ':id_danhmuc'      => $data['id_danhmuc']
        ]);
    }

    public function getTourById($id) {
        $sql = "SELECT * FROM tour WHERE id_tour = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật tour
    public function capNhatTour($data) {
        $sql = "UPDATE tour SET 
                    ten_tour = :ten_tour,
                    mo_ta = :mo_ta,
                    gia = :gia,
                    ngay_khoi_hanh = :ngay_khoi_hanh,
                    ngay_ket_thuc = :ngay_ket_thuc,
                    id_danhmuc = :id_danhmuc
                WHERE id_tour = :id_tour";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id_tour'         => $data['id_tour'],
            ':ten_tour'        => $data['ten_tour'],
            ':mo_ta'           => $data['mo_ta'],
            ':gia'             => $data['gia'],
            ':ngay_khoi_hanh'  => $data['ngay_khoi_hanh'],
            ':ngay_ket_thuc'   => $data['ngay_ket_thuc'],
            ':id_danhmuc'      => $data['id_danhmuc']
        ]);
    }

public function xoaTour($id_tour) {
    // Kiểm tra xem tour có booking chưa
    $sql_check = "SELECT COUNT(*) FROM booking WHERE id_tour = :id";
    $stmt = $this->conn->prepare($sql_check);
    $stmt->execute([':id' => $id_tour]);
    $count_booking = $stmt->fetchColumn();

    if ($count_booking > 0) {
        return false; // Không cho xóa nếu có booking
    }

    // Kiểm tra có lịch trình chưa
    $sql_check2 = "SELECT COUNT(*) FROM lichtrinhtour WHERE id_tour = :id";
    $stmt = $this->conn->prepare($sql_check2);
    $stmt->execute([':id' => $id_tour]);
    if ($stmt->fetchColumn() > 0) {
        return false; // Không cho xóa nếu đã có lịch trình
    }

    // Xóa các liên kết điểm tham quan trước
    $sql_del_link = "DELETE FROM tour_diemthamquan WHERE id_tour = :id";
    $stmt = $this->conn->prepare($sql_del_link);
    $stmt->execute([':id' => $id_tour]);

    // Xóa tour
    $sql = "DELETE FROM tour WHERE id_tour = :id";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([':id' => $id_tour]);
}
}