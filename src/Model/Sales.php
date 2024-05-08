<?php
require_once __DIR__. '/../../config/database.php';

// Class Sales untuk mengurus data jualan
class Sales {
    // Buat property $pdo untuk menyimpan koneksi database
    private $pdo;

    // Constructor untuk inisialisasi koneksi database
    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    // Method untuk mendapatkan semua data jualan
    public function getAllSales() {
        // Buat prepared statement untuk query SELECT * FROM sales
        $stmt = $this->pdo->query("SELECT * FROM sales");
        // Kembalikan hasil query dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk mendapatkan data jualan berdasarkan ID
    public function getSalesById($id) {
        // Buat prepared statement untuk query SELECT * FROM sales WHERE order_id = :id
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = :id");
        // Bind nilai ID ke placeholder :id
        $stmt->execute(['id' => $id]);
        // Kembalikan satu baris data dalam bentuk array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method untuk menambah data jualan
    public function addSales($data) {
        // Buat prepared statement untuk query INSERT INTO sales
        $stmt = $this->pdo->prepare("
            INSERT INTO sales 
            (product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id) 
            VALUES 
            (:product_name, :product_description, :gross_product_price, :tax_per_product, :quantity_purchased, :gross_revenue, :total_tax, :net_revenue, :product_category, :sku_number, :weight, :color, :size, :rating, :stock, :sales_rep, :address, :zipcode, :phone, :email, :loyalty_points, :customer_id, :country_id)
        ");

        // Eksekusi query dengan data yang diberikan
        $stmt->execute($data);
    }

    // Method untuk mengubah data jualan
    public function updateSales($id, $data) {
        // Buat prepared statement untuk query UPDATE sales
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

        // Gabungkan data dengan ID dan eksekusi query
        $stmt->execute(array_merge(['id' => $id], $data));
    }

    // Method untuk menghapus data jualan
    public function deleteSales($id) {
        // Buat prepared statement untuk query DELETE FROM sales
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = :id");
        // Eksekusi query dengan ID yang diberikan
        $stmt->execute(['id' => $id]);
    }
}