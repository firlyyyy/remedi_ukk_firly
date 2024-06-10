-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk kasir
CREATE DATABASE IF NOT EXISTS `kasir` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kasir`;

-- membuang struktur untuk table kasir.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel kasir.barang: ~2 rows (lebih kurang)
INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `stok`) VALUES
	(4, 'roti', 2000.00, 10),
	(5, 'beras', 50000.00, 20);

-- membuang struktur untuk table kasir.detail_transaksi
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah_barang` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel kasir.detail_transaksi: ~0 rows (lebih kurang)

-- membuang struktur untuk table kasir.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel kasir.pelanggan: ~1 rows (lebih kurang)
INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `alamat`, `no_hp`, `email`) VALUES
	(1, 'joko', 'damanhuri', '111', 'joko@gmail.com');

-- membuang struktur untuk table kasir.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel kasir.transaksi: ~0 rows (lebih kurang)

-- membuang struktur untuk table kasir.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('kasir','admin') NOT NULL DEFAULT 'kasir',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel kasir.user: ~1 rows (lebih kurang)
INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
	(1, 'kasir', 'kasir123', 'kasir');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
