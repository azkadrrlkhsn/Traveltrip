-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 02:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(20) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `total_bayar` decimal(15,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Menunggu Pembayaran',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_booking`, `flight_id`, `nama_pemesan`, `no_hp`, `email`, `nama_penumpang`, `total_bayar`, `status`, `created_at`) VALUES
(1, 'TRP-32666', 1, 'Azka', '09876543', 'azkadurrulkhisan@gmail.com', 'Azka', 1900000.00, 'Lunas', '2026-01-28 15:20:29'),
(2, 'TRP-63499', 2, 'Azka', '09876543', 'dudulreadyyyou@gmail.com', 'Azka', 1000000.00, 'Lunas', '2026-01-28 16:47:10'),
(3, 'TRP-15233', 4, 'Azka', '09876543', 'dudulreadyyyou@gmail.com', 'Azka', 925000.00, 'Lunas', '2026-01-28 19:01:06'),
(4, 'TRP-34064', 1, 'Azka', '09876543', 'dudulreadyyyou@gmail.com', 'Azka', 1900000.00, 'Lunas', '2026-01-28 20:04:34'),
(5, 'TRP-76370', 1, 'Azka', '08945537128', 'dudulreadyyyou@gmail.com', 'Azka', 1900000.00, 'Lunas', '2026-01-28 20:18:27'),
(6, 'TRP-20076', 1, 'Azka', '08945537128', 'dudulreadyyyou@gmail.com', 'Azka', 1900000.00, 'Lunas', '2026-01-28 20:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `penerbangan`
--

CREATE TABLE `penerbangan` (
  `id` int(11) NOT NULL,
  `maskapai` varchar(100) DEFAULT NULL,
  `kode_penerbangan` varchar(20) DEFAULT NULL,
  `asal_kota` varchar(50) DEFAULT NULL,
  `asal_kode` varchar(5) DEFAULT NULL,
  `tujuan_kota` varchar(50) DEFAULT NULL,
  `tujuan_kode` varchar(5) DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `jam_tiba` time DEFAULT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `logo_color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbangan`
--

INSERT INTO `penerbangan` (`id`, `maskapai`, `kode_penerbangan`, `asal_kota`, `asal_kode`, `tujuan_kota`, `tujuan_kode`, `jam_berangkat`, `jam_tiba`, `durasi`, `harga`, `logo_color`) VALUES
(1, 'Garuda Indonesia', 'GA-402', 'Jakarta', 'CGK', 'Bali', 'DPS', '08:00:00', '10:50:00', '1j 50m', 1850000.00, 'text-blue-800'),
(2, 'Lion Air', 'JT-303', 'Jakarta', 'CGK', 'Bali', 'DPS', '13:00:00', '15:50:00', '1j 50m', 950000.00, 'text-red-600'),
(3, 'Citilink', 'QG-771', 'Jakarta', 'CGK', 'Bali', 'DPS', '16:30:00', '19:20:00', '1j 50m', 1100000.00, 'text-green-600'),
(4, 'Super Air Jet', 'IU-998', 'Jakarta', 'CGK', 'Bali', 'DPS', '19:00:00', '21:50:00', '1j 50m', 875000.00, 'text-slate-500'),
(5, 'Lion Air', 'JT-555', 'Surabaya', 'SUB', 'Bali', 'DPS', '07:00:00', '08:00:00', '1j 0m', 550000.00, 'text-red-600'),
(6, 'AirAsia', 'QZ-202', 'Surabaya', 'SUB', 'Bali', 'DPS', '10:00:00', '11:00:00', '1j 0m', 600000.00, 'text-red-500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbangan`
--
ALTER TABLE `penerbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penerbangan`
--
ALTER TABLE `penerbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE tours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    discount_price DECIMAL(10,2),
    duration INT, -- dalam hari
    capacity INT, -- jumlah orang
    image_url VARCHAR(255),
    tags VARCHAR(255), -- contoh: 'hiking, rafting'
    type ENUM('tour', 'flight') DEFAULT 'tour'
);

CREATE TABLE destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    location VARCHAR(255),
    category VARCHAR(50), -- contoh: 'Beach', 'Mountain'
    image_url VARCHAR(255)
);

-- Masukkan Data Dummy agar langsung muncul di web
INSERT INTO tours (name, description, price, discount_price, duration, capacity, image_url, tags) VALUES
('Altai Mountains - Full Immersion', 'Pemandangan terbaik wilayah Altai dalam 2 minggu.', 140800, 120800, 14, 2, 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=600', 'rafting, hiking'),
('Adventures by Kamchatka', 'Mencari petualangan tanpa tenda di Kamchatka.', 98600, 84200, 7, 1, 'https://images.unsplash.com/photo-1516690553959-71a414d6b9b6?auto=format&fit=crop&w=600', 'hot springs, geysers'),
('Journey to Teriberka', 'Reboot di tepi Laut Barents yang menakjubkan.', 68800, 51700, 4, 1, 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=600', 'arctic tour, cruise');

INSERT INTO destinations (name, location, category, image_url) VALUES
('Parco Natural', 'South Tyrol', 'Beach', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300'),
('Maldives Resort', 'Maldives', 'Island', 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=300');