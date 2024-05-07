
<?php
require_once __DIR__ . '/../Model/Purchases.php';

class PurchaseController {
    private $purchaseModel;

    public function __construct() {
        $this->purchaseModel = new Purchases();
    }

    public function getAllPurchases() {
        $purchases = $this->purchaseModel->getAllPurchases();
        return $purchases;
    }

    public function getPurchaseById($purchaseId) {
        $purchase = $this->purchaseModel->getPurchaseById($purchaseId);
        return $purchase;
    }

    public function addPurchase($data) {
        $this->purchaseModel->addPurchase($data);
        return "Pembelian berhasil ditambahkan";
    }

    public function updatePurchase($purchaseId, $data) {
        $this->purchaseModel->updatePurchase($purchaseId, $data);
        return "Pembelian berhasil diperbarui";
    }

    public function deletePurchase($purchaseId) {
        $this->purchaseModel->deletePurchase($purchaseId);
        return "Pembelian berhasil dihapus";
    }
}
?>
