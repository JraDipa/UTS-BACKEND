
<?php
require_once __DIR__ . '/../Model/Customers.php';

class CustomerController {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customers();
    }

    public function getAllCustomers() {
        $customers = $this->customerModel->getAllCustomers();
        return $customers;
    }

    public function getCustomerById($customerId) {
        $customer = $this->customerModel->getCustomerById($customerId);
        return $customer;
    }

    public function addCustomer($data) {
        $this->customerModel->addCustomer($data);
        return "Customer berhasil ditambahkan";
    }

    public function updateCustomer($customerId, $data) {
        $this->customerModel->updateCustomer($customerId, $data);
        return "Customer berhasil diperbarui";
    }

    public function deleteCustomer($customerId) {
        $this->customerModel->deleteCustomer($customerId);
        return "Customer berhasil dihapus";
    }
}
?>
