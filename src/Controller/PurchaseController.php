<?php
require_once __DIR__. '/../Model/Purchases.php';

class PurchaseController {
    private $purchaseModel; // properti privat yang menyimpan instance dari kelas Purchases

    public function __construct() {
        $this->purchaseModel = new Purchases(); // membuat instance baru dari kelas Purchases dan menetapkannya ke properti $purchaseModel
    }

    public function getAllPurchases() {
        $purchases = $this->purchaseModel->getAllPurchases(); // mengambil semua data pembelian dari database
        return $purchases; // mengembalikan array objek pembelian
    }

    public function getPurchaseById($purchaseId) {
        $purchase = $this->purchaseModel->getPurchaseById($purchaseId); // mengambil data pembelian berdasarkan ID dari database
        return $purchase; // mengembalikan objek pembelian
    }

    public function addPurchase($data) {
        $this->purchaseModel->addPurchase($data); // menambahkan data pembelian baru ke database
        return "Pembelian berhasil ditambahkan"; // mengembalikan pesan sukses
    }

    public function updatePurchase($purchaseId, $data) {
        $this->purchaseModel->updatePurchase($purchaseId, $data); // memperbarui data pembelian di database
        return "Pembelian berhasil diperbarui"; // mengembalikan pesan sukses
    }

    public function deletePurchase($purchaseId) {
        $this->purchaseModel->deletePurchase($purchaseId); // menghapus data pembelian dari database
        return "Pembelian berhasil dihapus"; // mengembalikan pesan sukses
    }
}
?>