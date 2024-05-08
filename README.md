# UTS BACK-END WEB DEVELOPMENT

- Nama : Anak Agung Ngurah Bajra Dipa Narotama
- NIM : 230010037

### Project ini dirancang dengan struktur direktori yang terorganisir, terdiri dari tiga direktori utama yaitu config, public, dan src. Setiap direktori memiliki peran spesifik dalam arsitektur aplikasi:

### 1. Direktori config

- `database.php`: File yang berfungsi untuk menghubungkan semua file ke database sql

### 2. Direktori public

- `index.php`: Tampilan utama dari program CRUD & MVC. Tempat menerima request HTTPsebelum diteruskan ke bagian Controller

### 3. Direktori src

#### 3.1. Sub-direktori Controller

- `CustomerController.php`: Bertugas mengatur operasi CRUD untuk data pelanggan.
- `PurchaseController.php`: Mengelola operasi CRUD untuk transaksi pembelian.
- `SalesController.php`: Menangani operasi CRUD untuk data penjualan.

Semua controller ini dirancang untuk menerima dan memproses permintaan HTTP sesuai dengan fungsi yang ditentukan.

#### 3.2. Sub-direktori Model

- `Customers.php`: Bertanggung jawab atas eksekusi query terkait data pelanggan, berdasarkan instruksi dari `CustomerController.php`.
- `Purchases.php`: Melaksanakan query untuk data pembelian, menerima arahan dari `PurchaseController.php`.
- `Sales.php`: Menjalankan query yang berkaitan dengan data penjualan, sesuai dengan perintah dari `SalesController.php`.

## REFLEKSI DIRI

Salah satu tantangan terbesar adalah mengkoordinasikan Controllers dan Model agar tidak terdapat kesalahan saat proses berlangsung.

Konfigurasi Git push, pull, dan merge juga salah satu kendala saya tetapi setelah dicoba berulang kali, saya sudah mulai terbiasa dengan penggunaan Git ini.

Project ini merupakan hal yang baru bagi saya, saya merasa kesulitan untuk mengerti, tetapi setelah dipelajari lebih lanjut saya mulai mengerti celah cara kerja dasarnya.

### Cara Mengatasi Tantangan

Untuk mengatasi tantangan membuat Controller dan Model, saya menghabiskan waktu untuk mempelajari vidio penjelasan mengenai CRUD & MVC di internet, saya menggunakan berbagai cara yang saya bisa pikirkan, serta bertanya kepada saudara saya yang emang sudah ahli dalam bidang ini.

### Kesimpulan

Ini termasuk pengalaman yang menurut saya paling menantang dan melelahkan. Walaupun begitu saya berhasil mengerjakan tugas ini, saya merasa bahwa saya sudah cukup memahami cara kerja CRUD & MVC. Saya juga merasa bahwa saya sudah cukup memahami cara kerja Controllers, Model, dan juga penggunaan Github.
