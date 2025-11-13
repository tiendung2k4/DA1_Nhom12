<?php
class CategoryController{
    private $CategoryModel;
    public function __construct()
    {
       $this->CategoryModel = new CategoryModel();
    }
    public function listCategories()
    {
        $categories = $this->CategoryModel->getAllCategories();
        require_once './views/category/list.php';
    }
    public function viewCategory($id)
    {
        $category = $this->CategoryModel->getCategoryById($id);
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
            $this->CategoryModel->createCategory($name, $description);
            header('Location: index.php?controller=category&action=listCategories');
            exit();
        } else {
            require_once './views/category/create.php';
        }
    }
    public function editCategory($id)
    {
        $category = $this->CategoryModel->getCategoryById($id);
        if (!$category) {
            echo "Category not found.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->CategoryModel->updateCategory($id, $name, $description);
            header('Location: index.php?controller=category&action=listCategories');
            exit();
        } else {
            require_once './views/category/edit.php';
        }
    }
    public function deleteCategory($id)
    {
        $this->CategoryModel->deleteCategory($id);
        header('Location: index.php?controller=category&action=listCategories');
        exit();
    }
}               
