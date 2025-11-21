<?php
class HotelModel extends BaseModel {
    public $name;
    public $address;
    public $rating;
    public $description;

    public function getAllHotels(){
        $sql = "SELECT * FROM hotels ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findHotel($id){
        $sql = "SELECT * FROM hotels WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createHotel($data){
        $sql = "INSERT INTO hotels (name, address, rating, description)
                VALUES (:name, :address, :rating, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':description', $data['description']);
        return $stmt->execute();
    }

    public function updateHotel($id, $data){
        $sql = "UPDATE hotels SET name = :name, address = :address, rating = :rating, description = :description
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteHotel($id){
        $sql = "DELETE FROM hotels WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}