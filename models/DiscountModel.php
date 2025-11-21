<?php
class DiscountModel extends BaseModel {
    public $code;
    public $description;
    public $discount_type;
    public $value;
    public $start_date;
    public $end_date;
    public $tour_id;
    public $status;
    public function getAllDiscount(){
        $sql = "SELECT d.*, t.name as tour_name FROM discounts d LEFT JOIN tours t ON d.tour_id = t.id
        ORDER BY d.id DESC";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findDiscount($id)
{
    $sql = "SELECT * FROM discounts WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function createDiscount($data){
        $sql = "INSERT INTO discounts (code, description, discount_type, value, start_date, end_date, tour_id, status)
                VALUES (:code, :description, :discount_type, :value, :start_date, :end_date, :tour_id, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':code', $data['code']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':discount_type', $data['discount_type']);
        $stmt->bindParam(':value', $data['value']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':tour_id', $data['tour_id']);
        $stmt->bindParam(':status', $data['status']);
        return $stmt->execute();
    }
    public function updateDiscount($id, $data){
        $sql = "UPDATE discounts SET code = :code, description = :description, discount_type = :discount_type,
                value = :value, start_date = :start_date, end_date = :end_date, tour_id = :tour_id, status = :status
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':code', $data['code']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':discount_type', $data['discount_type']);
        $stmt->bindParam(':value', $data['value']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':tour_id', $data['tour_id']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteDiscount($id){
        try {
            $sql = "DELETE FROM discounts WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
        
            error_log("loi $id: " . $e->getMessage());
            return false;
        }
    }
}