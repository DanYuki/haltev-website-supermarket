<?php
// Configuration (Match these to your config.php)
$servername = "localhost";
$username = "root";
$password = "root"; // Check if your password is empty "" or "root"
$dbname = "supermarket";

// 1. Create connection to MySQL Server (Not the DB yet)
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Initializing Database...\n";

// 2. Drop Database if it exists (Clean Slate)
$sql_drop = "DROP DATABASE IF EXISTS $dbname";
if ($conn->query($sql_drop) === TRUE) {
    echo "Existing database dropped.\n";
} else {
    echo "Error dropping database: " . $conn->error . "\n";
}

// 3. Create Database
$sql_create = "CREATE DATABASE $dbname";
if ($conn->query($sql_create) === TRUE) {
    echo "Database '$dbname' created successfully.\n";
} else {
    die("Error creating database: " . $conn->error);
}

// 4. Select the Database
$conn->select_db($dbname);

// 5. The SQL Dump (Pasted exactly as provided)
$sql_dump = <<<SQL

-- Table structure for table `produk`
CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `kategori` enum('makanan','sembako','buah','sayur','lainnya') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `produk`
INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `kategori`) VALUES
(56, 'Apel Fuji', 36000, 150, 'lainnya'),
(57, 'Jeruk Pontianak', 25500, 133, 'buah'),
(58, 'Pisang Cavendish', 17000, 47, 'buah'),
(59, 'Anggur Merah', 31500, 135, 'buah'),
(60, 'Mangga Harum Manis', 21000, 123, 'buah'),
(61, 'Melon Golden', 16000, 79, 'buah'),
(62, 'Semangka Merah', 26500, 83, 'buah'),
(63, 'Pepaya California', 19000, 103, 'buah'),
(64, 'Nanas Palembang', 29000, 54, 'buah'),
(65, 'Salak Pondoh', 23500, 45, 'buah'),
(66, 'Bayam Hijau', 11500, 132, 'sayur'),
(67, 'Kangkung Cabut', 17000, 142, 'sayur'),
(68, 'Wortel Berastagi', 18500, 110, 'sayur'),
(69, 'Tomat Segar', 6000, 148, 'sayur'),
(70, 'Kentang Dieng', 15000, 72, 'sayur'),
(71, 'Bawang Merah Brebes', 14000, 121, 'sayur'),
(72, 'Cabai Rawit Merah', 10500, 78, 'sayur'),
(73, 'Sawi Putih', 9000, 64, 'sayur'),
(74, 'Brokoli Segar', 13000, 111, 'sayur'),
(75, 'Terong Ungu', 7500, 24, 'sayur'),
(76, 'Roti Tawar Gandum', 10000, 105, 'makanan'),
(77, 'Susu UHT Cokelat 1L', 27000, 138, 'makanan'),
(78, 'Mie Instan Rasa Soto', 39500, 115, 'makanan'),
(79, 'Keripik Kentang Keju', 42500, 103, 'makanan'),
(80, 'Biskuit Regal', 30000, 88, 'makanan'),
(81, 'Sereal Jagung', 15500, 118, 'makanan'),
(82, 'Yogurt Plain 500ml', 21500, 128, 'makanan'),
(83, 'Kopi Bubuk Murni 250g', 18500, 141, 'makanan'),
(84, 'Teh Celup Kotak', 13500, 94, 'makanan'),
(85, 'Cokelat Batangan', 24500, 95, 'makanan'),
(86, 'Beras Premium 5kg', 125000, 100, 'sembako'),
(87, 'Gula Pasir 1kg', 14000, 139, 'sembako'),
(88, 'Minyak Goreng 2L', 38500, 58, 'sembako'),
(89, 'Tepung Terigu 1kg', 15500, 107, 'sembako'),
(90, 'Telur Ayam 1 Tray', 52500, 31, 'sembako'),
(91, 'Garam Beryodium', 13000, 145, 'sembako'),
(92, 'Kecap Manis Botol Besar', 41000, 122, 'sembako'),
(93, 'Saus Sambal Botol', 16500, 61, 'sembako'),
(94, 'Margarin 200g', 18000, 48, 'sembako'),
(95, 'Susu Kental Manis Kaleng', 24500, 119, 'sembako'),
(96, 'Deterjen Cair 800ml', 46500, 120, 'lainnya'),
(97, 'Sabun Mandi Batang', 21500, 134, 'lainnya'),
(98, 'Pasta Gigi Mint', 26500, 131, 'lainnya'),
(99, 'Tissue Wajah Box', 35000, 136, 'lainnya'),
(100, 'Pembersih Lantai 1L', 17500, 124, 'lainnya'),
(101, 'Shampo Anti Ketombe', 40500, 44, 'lainnya'),
(102, 'Sikat Gigi Pepsodent', 10500, 144, 'lainnya'),
(103, 'Pembalut Wanita', 32000, 93, 'lainnya'),
(104, 'Pengharum Ruangan', 23000, 108, 'lainnya'),
(105, 'Cat Rambut Hitam', 8500, 99, 'lainnya'),
(108, 'Test', 12000, 12, 'buah'),
(109, 'Test', 122121, 12, 'sembako'),
(110, 'Test', 1222, 12, 'makanan'),
(111, 'Test', 122, 122, 'makanan'),
(112, 'Test', 1221, 122, 'makanan'),
(114, 'Test', 2000, 30, 'makanan');

-- Table structure for table `staff`
CREATE TABLE `staff` (
  `id_staff` int NOT NULL,
  `nama_staff` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `gaji_pokok` int NOT NULL,
  `tgl_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `staff`
INSERT INTO `staff` (`id_staff`, `nama_staff`, `posisi`, `gaji_pokok`, `tgl_mulai`) VALUES
(1, 'Budi Santoso', 'Manajer', 8000000, '2020-01-15'),
(2, 'Siti Aisyah', 'Kasir Senior', 4500000, '2021-06-20'),
(3, 'Joko Susilo', 'Pramuniaga', 3800000, '2022-03-10'),
(4, 'Dewi Lestari', 'Admin Gudang', 4200000, '2023-01-05'),
(5, 'Ahmad Fauzi', 'Satpam', 3500000, '2024-02-01'),
(6, 'Test', 'test', 12221131, '2025-12-08');

-- Table structure for table `transaksi`
CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_produk` int DEFAULT NULL,
  `qty` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `transaksi`
INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `qty`) VALUES
(2, 66, 10), (3, 92, 20), (4, 56, 3), (5, 105, 1), (6, 72, 5), (7, 98, 2), (8, 60, 4), (9, 88, 1), (10, 56, 10),
(11, 100, 7), (12, 75, 3), (13, 99, 1), (14, 63, 6), (15, 85, 2), (16, 57, 5), (17, 104, 3), (18, 70, 9), (19, 95, 1),
(20, 61, 2), (21, 82, 4), (22, 58, 8), (23, 102, 1), (24, 77, 3), (25, 90, 5), (26, 64, 1), (27, 80, 2), (28, 59, 7),
(29, 103, 3), (30, 73, 1), (31, 96, 6), (32, 62, 4), (33, 89, 1), (34, 56, 2), (35, 101, 8), (36, 71, 3), (37, 97, 2),
(38, 65, 5), (39, 87, 1), (40, 57, 4), (41, 105, 9), (42, 78, 1), (43, 92, 3), (44, 60, 2), (45, 81, 7), (46, 58, 5),
(47, 104, 1), (48, 74, 3), (49, 91, 6), (50, 63, 2), (51, 83, 4), (52, 59, 10), (53, 100, 1), (54, 76, 5), (55, 94, 2),
(56, 66, 3), (57, 86, 1), (58, 56, 4), (59, 103, 7), (60, 79, 1), (61, 93, 3), (62, 67, 6), (63, 84, 2), (64, 57, 5),
(65, 102, 3), (66, 72, 9), (67, 95, 1), (68, 68, 2), (69, 80, 4), (70, 58, 8), (71, 101, 1), (72, 75, 3), (73, 98, 5),
(74, 69, 1), (75, 88, 2), (76, 59, 7), (77, 105, 3), (78, 70, 1), (79, 99, 6), (80, 61, 4), (81, 85, 1), (82, 56, 2),
(83, 104, 8), (84, 77, 3), (85, 90, 2), (86, 62, 5), (87, 87, 1), (88, 57, 4), (89, 103, 9), (90, 73, 1), (91, 96, 3),
(92, 64, 2), (93, 81, 7), (94, 58, 5), (95, 100, 1), (96, 71, 3), (97, 97, 6), (98, 65, 2), (99, 83, 4), (100, 59, 10),
(101, 102, 1), (102, 78, 5), (103, 94, 2);

-- Table structure for table `user`
CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Indexes for table `produk`
ALTER TABLE `produk` ADD PRIMARY KEY (`id_produk`);

-- Indexes for table `staff`
ALTER TABLE `staff` ADD PRIMARY KEY (`id_staff`);

-- Indexes for table `transaksi`
ALTER TABLE `transaksi` ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_produk` (`id_produk`);

-- Indexes for table `user`
ALTER TABLE `user` ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`);

-- AUTO_INCREMENT for table `produk`
ALTER TABLE `produk` MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

-- AUTO_INCREMENT for table `staff`
ALTER TABLE `staff` MODIFY `id_staff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT for table `transaksi`
ALTER TABLE `transaksi` MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

-- AUTO_INCREMENT for table `user`
ALTER TABLE `user` MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

-- Constraints for table `transaksi`
ALTER TABLE `transaksi` ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

SQL;

// 6. Execute Multi Query
if ($conn->multi_query($sql_dump)) {
    echo "Tables and data imported successfully!\n";
    // Cycle through results to clear buffer (Required for multi_query)
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
} else {
    echo "Error importing data: " . $conn->error . "\n";
}

$conn->close();
echo "Setup Complete!\n";
