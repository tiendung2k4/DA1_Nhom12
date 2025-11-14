<?php
class CustomersModel extends BaseModel {
    public $customer_id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function getAllCustomers() {
    $sql = "SELECT * FROM customers ORDER BY customer_id DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCustomerById($id) {
        $sql = "SELECT * FROM customers WHERE customer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createCustomer($name, $email, $phone , $address  =  null) {
        $sql = "INSERT INTO customers (name, email, phone, address) VALUES (:name, :email, :phone, :address)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address
        ]);
    }
    public function updateCustomer($id, $name, $email, $phone) {
        $sql = "UPDATE customers SET name = :name, email = :email, phone = :phone WHERE customer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone
        ]);
    }
    public function deleteCustomer($id) {
        $sql = "DELETE FROM customers WHERE customer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

}