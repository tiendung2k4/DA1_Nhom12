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
    public function createTour($tourName, $description, $price, $categoryId, $status, $imagePath)
    {
        $sql = "INSERT INTO tour (ten_tour, mo_ta, gia, id_category, trang_thai, anh_tour) 
                VALUES (:ten_tour, :mo_ta, :gia, :id_category, :trang_thai, :anh_tour)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_tour' => $tourName,
            ':mo_ta' => $description,
            ':gia' => $price,
            ':id_category' => $categoryId,
            ':trang_thai' => $status,
            ':anh_tour' => $imagePath
        ]);
    }
}