<?php
class ToursModel extends BaseModel {
    
    public $tour_id;
    public $tour_name;
    public $description;
    public $price;
    public $category_id;
    public $tour_image;
    public $status;
    public $category_name;

    public function getAllTours() {
        $sql = "SELECT t.*, c.category_name FROM tours t JOIN categories c ON t.category_id = c.category_id ORDER BY t.tour_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTourById($id) {
        $sql = "SELECT t.*, c.category_name FROM tours t JOIN categories c ON t.category_id = c.category_id WHERE t.tour_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function searchTours($keyword) {
        $sql = "SELECT t.*, c.category_name FROM tours t JOIN categories c ON t.category_id = c.category_id 
                WHERE t.tour_name LIKE :keyword OR c.category_name LIKE :keyword ORDER BY t.tour_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->execute([':keyword' => $likeKeyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findTour(){
            $sql = "SELECT t.*, c.category_name FROM tours t JOIN categories c ON t.category_id = c.category_id WHERE t.tour_id = :tour_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindParam(':tour_id', $this->tour_id);
            $stmt->execute([]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    public function createTour($tour_name, $description, $price, $category_id, $tour_image, $status) {
        $sql = "INSERT INTO tours (tour_name, description, price, category_id, tour_image, status) 
                VALUES (:tour_name, :description, :price, :category_id, :tour_image, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tour_name', $tour_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price); 
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':tour_image', $tour_image);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }
    public function updateTour($id, $tour_name, $description, $price, $category_id, $tour_image, $status) {
        $sql = "UPDATE tours SET tour_name = :tour_name, description = :description, price = :price, 
                category_id = :category_id, tour_image = :tour_image, status = :status WHERE tour_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tour_name', $tour_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price); 
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':tour_image', $tour_image);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function deleteTour($id) {
        $sql = "DELETE FROM tours WHERE tour_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
