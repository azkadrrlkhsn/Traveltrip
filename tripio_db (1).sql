-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2026 pada 23.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.29

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
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2026-01-31 12:21:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `total_price` decimal(15,2) DEFAULT 0.00,
  `booking_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `proof_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `tour_id`, `user_name`, `user_email`, `quantity`, `total_price`, `booking_date`, `status`, `proof_image`) VALUES
(15, 2, 'Dudul Readyy 4You', 'dudulreadyyyou@gmail.com', 1, 84200.00, '2026-02-01 03:02:16', 'confirmed', '1769914936_0ce73b87a13e05090aae.jpg'),
(24, 1, 'Durrul', 'dudulreadyyyou@gmail.com', 1, 120800.00, '2026-02-02 13:33:39', 'pending', 'midtrans.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `location`, `category`, `image_url`) VALUES
(1, 'Parco Natural', 'South Tyrol', 'Beach', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300'),
(2, 'Maldives Resort', 'Maldives', 'Island', 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=300');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL DEFAULT 'Indonesia',
  `category` varchar(100) NOT NULL DEFAULT 'Wisata Alam',
  `description` text DEFAULT NULL,
  `facilities` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `type` enum('tour','flight') DEFAULT 'tour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tours`
--

INSERT INTO `tours` (`id`, `name`, `location`, `category`, `description`, `facilities`, `price`, `discount_price`, `duration`, `capacity`, `image_url`, `tags`, `type`) VALUES
(1, 'Altai Mountains - Full Immersion', 'Indonesia', 'Wisata Alam', 'Pemandangan terbaik wilayah Altai dalam 2 minggu.', NULL, 140800.00, 120800.00, 14, 2, 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=600', 'rafting, hiking', 'tour'),
(2, 'Adventures by Kamchatka', 'Indonesia', 'Wisata Alam', 'Mencari petualangan tanpa tenda di Kamchatka.', NULL, 98600.00, 84200.00, 7, 1, 'https://images.unsplash.com/photo-1516690553959-71a414d6b9b6?auto=format&fit=crop&w=600', 'hot springs, geysers', 'tour'),
(3, 'Journey to Teriberka', 'Indonesia', 'Wisata Alam', 'Reboot di tepi Laut Barents yang menakjubkan.', NULL, 68800.00, 51700.00, 4, 1, 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=600', 'arctic tour, cruise', 'tour');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `phone`, `address`, `picture`, `created_at`) VALUES
(1, '116821538742240901917', 'Durrul', 'dudulreadyyyou@gmail.com', '08976543234567', 'Bandung', 'https://lh3.googleusercontent.com/a/ACg8ocJE55f37drsB0FpCVsMWtpY02RKn8YOtwhyDdsMI0f5du1X2gI=s96-c', '2026-02-01 09:55:12'),
(2, '116785661183558185929', 'Azka Durrul', 'azkadurrul@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLNISFnrtZNR8jUDr5wbUN5tdDxBsQo0Uc9HcKqolAAefu2ag=s96-c', '2026-02-01 10:07:26'),
(3, '106516920309607736986', 'zakyea', 'zakyea24@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKDxCFsxwfKQ2jcI5fHPtANISDzvgVYVCjKaPjEikicxWnGgw=s96-c', '2026-02-01 17:03:05'),
(4, '109115260000585482427', 'Tripio', 'tripio.official@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJAxmYSm1ZWYCLT6Pdfo7llseU4WYT3qsoIMkqOHdw4_OKIrw=s96-c', '2026-02-02 17:44:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
