<?php
require_once __DIR__. '/../../config/database.php';

class Purchases {
    // Properti private yang menyimpan koneksi database
    private $pdo;

    // Konstruktor yang menghubungkan ke database saat instance kelas dibuat
    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    // Mengambil semua rekaman dari tabel purchases
    public function getAllPurchases() {
        // Menyiapkan query SELECT *
        $stmt = $this->pdo->query("SELECT * FROM purchases");

        // Mengambil semua hasil sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil rekaman tunggal dari tabel purchases berdasarkan purchase_id
    public function getPurchaseById($id) {
        // Menyiapkan query SELECT * dengan klausa WHERE yang memfilter oleh purchase_id
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE purchase_id = :id");

        // Menjalankan query dengan $id sebagai parameter
        $stmt->execute(['id' => $id]);

        // Mengambil hasil sebagai array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan rekaman baru ke tabel purchases
    public function addPurchase($data) {
        // Menyiapkan query INSERT INTO dengan placeholder untuk nilai kolom
        $stmt = $this->pdo->prepare("
            INSERT INTO purchases 
            (supplier, last_visited, return_status, warranty, purchase_date, return_policy, feedback, order_id) 
            VALUES 
            (:supplier, :last_visited, :return_status, :warranty, :purchase_date, :return_policy, :feedback, :order_id)
        ");

        // Menjalankan query dengan array $data yang harus berisi nilai untuk kolom
        $stmt->execute($data);
    }

    // Memperbarui rekaman yang ada di tabel purchases
    public function updatePurchase($id, $data) {
        // Menyiapkan query UPDATE dengan placeholder untuk nilai kolom dan klausa WHERE yang memfilter oleh purchase_id
        $stmt = $this->pdo->prepare("
            UPDATE purchases SET 
            supplier = :supplier, 
            last_visited = :last_visited, 
            return_status = :return_status, 
            warranty = :warranty, 
            purchase_date = :purchase_date, 
            return_policy = :return_policy, 
            feedback = :feedback, 
            order_id = :order_id 
            WHERE purchase_id = :id
        ");

        // Menjalankan query dengan $id dan array $data yang harus berisi nilai yang diperbarui untuk kolom
        $stmt->execute(array_merge(['id' => $id], $data));
    }

    // Menghapus rekaman dari tabel purchases berdasarkan purchase_id
    public function deletePurchase($id) {
        // Menyiapkan query DELETE dengan klausa WHERE yang memfilter oleh purchase_id
        $stmt = $this->pdo->prepare("DELETE FROM purchases WHERE purchase_id = :id");

        // Menjalankan query dengan $id sebagai parameter
        $stmt->execute(['id' => $id]);
    }
}