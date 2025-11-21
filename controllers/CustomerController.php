<?php
class CustomersController{
    private $customerModel;
    public function __construct()
    {
        $this->customerModel = new CustomersModel();
    }
    
        public function listCustomers()
    {
        $customers = $this->customerModel->getAllCustomers();
        require_once './views/customers/list.php';
    }
    public function viewCustomer($id)
    {
        $customer = $this->customerModel->getCustomerById($id);
        if ($customer) {
            require_once './views/customers/view.php';
        } else {
            echo "Customer not found.";
        }
    }
    public function createCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->customerModel->createCustomer($name, $email, $phone);
            header('Location: index.php?controller=customer&action=listCustomers');
            exit();
        } else {
            require_once './views/customers/create.php';
        }
    }
    public function updateCustomer($id)
    {
        $customer = $this->customerModel->getCustomerById($id);
        if (!$customer) {
            echo "Customer not found.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->customerModel->updateCustomer($id, $name, $email, $phone);
            header('Location: index.php?controller=customer&action=listCustomers');
            exit();
        } else {
            require_once './views/customers/edit.php';
        }
    }
    public function deleteCustomer($id)
    {
        $id = intval($id);
        if ($id > 0) {
            $this->customerModel->deleteCustomer($id);
        }
        header('Location: index.php?controller=customer&action=listCustomers');
        exit();
    }
}