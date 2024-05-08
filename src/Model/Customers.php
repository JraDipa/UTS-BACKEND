<?php
require_once __DIR__. '/../../config/database.php';

class Customers {
    // Properti privat $pdo adalah instance dari PDO yang terhubung ke database
    private $pdo;

    // Metode konstruktor menginisialisasi properti $pdo dengan memanggil fungsi connectToDatabase()
    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    // Metode getAllCustomers() mengambil semua catatan pelanggan dari tabel customers dan mengembalikannya sebagai array asosiatif
    public function getAllCustomers() {
        $stmt = $this->pdo->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metode getCustomerById($id) mengambil catatan pelanggan tunggal berdasarkan $id yang disediakan dan mengembalikannya sebagai array asosiatif
    public function getCustomerById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Metode addCustomer($data) memasukkan catatan pelanggan baru ke dalam tabel customers menggunakan data yang disediakan dalam array $data
    public function addCustomer($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO customers 
            (first_name, last_name, gender, email, phone_number, address, education, occupation, date_of_birth, monthly_income, credit_score, marital_status) 
            VALUES 
            (:first_name, :last_name, :gender, :email, :phone_number, :address, :education, :occupation, :date_of_birth, :monthly_income, :credit_score, :marital_status)
        ");

        $stmt->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'education' => $data['education'],
            'occupation' => $data['occupation'],
            'date_of_birth' => $data['date_of_birth'],
            'monthly_income' => $data['monthly_income'],
            'credit_score' => $data['credit_score'],
            'marital_status' => $data['marital_status'],
        ]);
    }

    // Metode updateCustomer($id, $data) memperbarui catatan pelanggan yang ada di tabel customers dengan data yang disediakan dalam array $data untuk pelanggan dengan $id yang disediakan
    public function updateCustomer($id, $data) {
        $stmt = $this->pdo->prepare("
            UPDATE customers SET 
            first_name = :first_name, 
            last_name = :last_name, 
            gender = :gender, 
            email = :email, 
            phone_number = :phone_number, 
            address = :address, 
            education = :education, 
            occupation = :occupation, 
            date_of_birth = :date_of_birth, 
            monthly_income = :monthly_income, 
            credit_score = :credit_score, 
            marital_status = :marital_status 
            WHERE customer_id = :id
        ");

        $stmt->execute([
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'education' => $data['education'],
            'occupation' => $data['occupation'],
            'date_of_birth' => $data['date_of_birth'],
            'monthly_income' => $data['monthly_income'],
            'credit_score' => $data['credit_score'],
            'marital_status' => $data['marital_status'],
        ]);
    }

    // Metode deleteCustomer($id) menghapus catatan pelanggan dari tabel customers berdasarkan $id yang disediakan
    public function deleteCustomer($id) {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $id]);
    }
}