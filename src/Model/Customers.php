<?php
require_once __DIR__ . '/../../config/database.php';

class Customers {
    private $pdo;

    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    public function getAllCustomers() {
        $stmt = $this->pdo->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomerById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

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

    public function deleteCustomer($id) {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $id]);
    }
}