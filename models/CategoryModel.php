<?php 
class CategoryModel extends BaseModel
{
    public $category_id;
    public $category_name;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'categories';
    }
    public  function findCategory(){
        try {
            $sql = "SELECT * FROM categories WHERE category_id = :category_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':category_id' => $this->category_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null;
        }
    }
    public function getAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function getCategoryById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createCategory($name, $description)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (name, description) VALUES (:name, :description)");
        $stmt->execute(['name' => $name, 'description' => $description]);
    }

    public function updateCategory($id, $name, $description)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, description = :description WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}