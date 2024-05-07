
<?php
require_once __DIR__ . '/../Model/Sales.php';

class SalesController {
    private $salesModel;

    public function __construct() {
        $this->salesModel = new Sales();
    }

    public function getAllSales() {
        $sales = $this->salesModel->getAllSales();
        return $sales;
    }

    public function getSalesById($saleId) {
        $sale = $this->salesModel->getSalesById($saleId);
        return $sale;
    }

    public function addSales($data) {
        $this->salesModel->addSales($data);
        return "Penjualan berhasil ditambahkan";
    }

    public function updateSales($saleId, $data) {
        $this->salesModel->updateSales($saleId, $data);
        return "Penjualan berhasil diperbarui";
    }

    public function deleteSales($saleId) {
        $this->salesModel->deleteSales($saleId);
        return "Penjualan berhasil dihapus";
    }
}
?>
