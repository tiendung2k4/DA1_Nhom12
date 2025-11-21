
<?php
class CategoryController{
    private $categoryModel;
    public function __construct()
    {
       $this->categoryModel = new CategoryModel();
    }
    public function listCategories()
    {
        $categories = $this->categoryModel->getAllCategories();
        require_once './views/category/list.php';
    }
    public function viewCategory($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            require_once './views/category/view.php';
        } else {
            echo "Category not found.";
        }
    }
    public function createCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->categoryModel->createCategory($name, $description);
            header('Location: index.php?controller=category&action=listCategories');
            exit();
        } else {
            require_once './views/category/create.php';
        }
    }
    public function updateCategory  ($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if (!$category) {
            echo "Category not found.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->categoryModel->updateCategory($id, $name, $description);
            header('Location: index.php?controller=category&action=listCategories');
            exit();
        } else {
            require_once './views/category/edit.php';
        }
    }
    public function deleteCategory($id)
    {
        $id = intval($id);
        if ($id > 0) {
            $this->categoryModel->deleteCategory($id);
        }
        header('Location: index.php?controller=category&action=listCategories');
        exit();
    }
}               
