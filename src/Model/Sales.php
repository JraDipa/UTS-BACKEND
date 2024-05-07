
<?php
require_once __DIR__ . '/../../config/database.php';

class Sales {
    private $pdo;

    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    public function getAllSales() {
        $stmt = $this->pdo->query("SELECT * FROM sales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSales($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO sales 
            (product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id) 
            VALUES 
            (:product_name, :product_description, :gross_product_price, :tax_per_product, :quantity_purchased, :gross_revenue, :total_tax, :net_revenue, :product_category, :sku_number, :weight, :color, :size, :rating, :stock, :sales_rep, :address, :zipcode, :phone, :email, :loyalty_points, :customer_id, :country_id)
        ");

        $stmt->execute($data);
    }

    public function updateSales($id, $data) {
        $stmt = $this->pdo->prepare("
            UPDATE sales SET 
            product_name = :product_name, 
            product_description = :product_description, 
            gross_product_price = :gross_product_price, 
            tax_per_product = :tax_per_product, 
            quantity_purchased = :quantity_purchased, 
            gross_revenue = :gross_revenue, 
            total_tax = :total_tax, 
            net_revenue = :net_revenue, 
            product_category = :product_category, 
            sku_number = :sku_number, 
            weight = :weight, 
            color = :color, 
            size = :size, 
            rating = :rating, 
            stock = :stock, 
            sales_rep = :sales_rep, 
            address = :address, 
            zipcode = :zipcode, 
            phone = :phone, 
            email = :email, 
            loyalty_points = :loyalty_points, 
            customer_id = :customer_id, 
            country_id = :country_id 
            WHERE order_id = :id
        ");

        $stmt->execute(array_merge(['id' => $id], $data));
    }

    public function deleteSales($id) {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $id]);
    }
}
