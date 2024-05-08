<?php
require_once __DIR__. '/../Model/Customers.php';

//
class CustomerController {
    private $customerModel; // properti privat yang menyimpan instance dari kelas Customers

    public function __construct() {
        $this->customerModel = new Customers(); // membuat instance baru dari kelas Customers dan menetapkannya ke properti $customerModel
    }

    public function getAllCustomers() {
        $customers = $this->customerModel->getAllCustomers(); // mengambil semua pelanggan dari database
        return $customers; // mengembalikan array objek pelanggan
    }

    public function getCustomerById($customerId) {
        $customer = $this->customerModel->getCustomerById($customerId); // mengambil satu pelanggan dari database
        return $customer; // mengembalikan satu objek pelanggan
    }

    public function addCustomer($data) {
        $this->customerModel->addCustomer($data); // menambahkan pelanggan baru ke database
        return "Customer berhasil ditambahkan"; // mengembalikan pesan sukses
    }

    public function updateCustomer($customerId, $data) {
        $this->customerModel->updateCustomer($customerId, $data); // memperbarui pelanggan yang sudah ada di database
        return "Customer berhasil diperbarui"; // mengembalikan pesan sukses
    }

    public function deleteCustomer($customerId) {
        $this->customerModel->deleteCustomer($customerId); // menghapus pelanggan dari database
        return "Customer berhasil dihapus"; // mengembalikan pesan sukses
    }
}
?>