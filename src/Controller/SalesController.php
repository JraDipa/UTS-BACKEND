<?php
require_once __DIR__. '/../Model/Sales.php';

// Kelas SalesController yang digunakan untuk mengelola data penjualan
class SalesController {
    private $salesModel; // properti privat yang menyimpan instance dari kelas Sales

    public function __construct() {
        $this->salesModel = new Sales(); // membuat instance baru dari kelas Sales dan menetapkannya ke properti $salesModel
    }

    // Metode untuk mengambil semua data penjualan
    public function getAllSales() {
        $sales = $this->salesModel->getAllSales(); // mengambil semua data penjualan dari database
        return $sales; // mengembalikan array objek penjualan
    }

    // Metode untuk mengambil data penjualan berdasarkan ID
    public function getSalesById($saleId) {
        $sale = $this->salesModel->getSalesById($saleId); // mengambil data penjualan berdasarkan ID dari database
        return $sale; // mengembalikan objek penjualan
    }

    // Metode untuk menambahkan data penjualan baru
    public function addSales($data) {
        $this->salesModel->addSales($data); // menambahkan data penjualan baru ke database
        return "Penjualan berhasil ditambahkan"; // mengembalikan pesan sukses
    }

    // Metode untuk memperbarui data penjualan
    public function updateSales($saleId, $data) {
        $this->salesModel->updateSales($saleId, $data); // memperbarui data penjualan di database
        return "Penjualan berhasil diperbarui"; // mengembalikan pesan sukses
    }

    // Metode untuk menghapus data penjualan
    public function deleteSales($saleId) {
        $this->salesModel->deleteSales($saleId); // menghapus data penjualan dari database
        return "Penjualan berhasil dihapus"; // mengembalikan pesan sukses
    }
}
?>