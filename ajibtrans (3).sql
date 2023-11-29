-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 08:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajibtrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `judul`, `keterangan`, `foto`, `harga`, `slug`, `id_kategori`, `tanggal`, `username`, `status`) VALUES
(1, 'Raize', 'Toyota Raize tersedia dalam pilihan mesin Bensin di Indonesia SUV baru dari Toyota hadir dalam 12 varian. Bicara soal spesifikasi mesin Toyota Raize, ini ditenagai dua pilihan mesin Bensin berkapasitas 998 cc. Raize tersedia dengan transmisi Manual and CVT tergantung variannya. Raize adalah SUV 5 seater dengan panjang 4030 mm, lebar 1710 mm, wheelbase 2525 mm. serta ground clearance 200 mm.', '20230929182751.jpg', '400.000', 'Raize', '1', '2023-09-29', 'Rippky', 'Sedang Digunakan'),
(2, 'Alphard', 'Toyota Alphard adalah MPV premium berukuran besar yang diproduksi oleh Toyota Motor Corporation sejak tahun 2002. Tujuan utama Toyota membuat Alphard adalah untuk bersaing dengan Honda Elysion dan Nissan Elgrand. Toyota Alphard pada awalnya dibuat untuk pasar domestik Jepang, tetapi juga dijual di beberapa negara Asia lainnya, termasuk di Indonesia. Toyota Alphard termasuk mobil keluarga premium untuk kalangan menengah keatas dengan design dan kenyamanan mewah. Mobil ini dilengkapi dengan suplay bahan bakar yang mampu mengefisiensikan pemakain bahan bakar, sehingga mobil ini irit bahan bakar. Mobil ini juga memilki sistem keselamatan dan keamanan, dimana sistem ini sangat berguna sekali bila terjadi sesuatu yang tidak diinginkan', '20231003165822.jpg', '2.500.000', 'Alphard', '3', '2023-10-03', 'Rippky', 'Ready'),
(3, 'Pickup', 'Mobil pikap atau umumnya disebut juga mobil bak terbuka atau mobil losbak (pickup truck) adalah kendaraan penyeberangan laut yang memiliki kabin tertutup dan bak terbuka di belakang untuk membawa barang bawaan atau kargo.Kendaraan ini biasanya digunakan untuk keperluan memancing ikan atau dan biasa digunakan untuk pekerjaan-pekerjaan yang memerlukan antar jemput barang atau muatan.', '20231010180948.jpg', '250.000', 'Pickup', '4', '2023-10-10', 'Rippky', 'Sedang Digunakan'),
(4, 'Elf', 'Isuzu Elf atau Isuzu N-Series adalah adalah kendaraan komersial berupa truk ringan dan bus mikro yang diproduksi oleh Isuzu Motors. Elf sangat popular di Jepang, Indonesia, Australia, dan negara-negara berkembang. Kompetitor Elf antara lain adalah Fuso Canter, Nissan Atlas, Toyota Dyna dan Hino Dutro.', '20231017163642.jpg', '1.000.000', 'Elf', '5', '2023-10-17', 'Rippky', 'Sedang Digunakan'),
(5, 'Avanza', 'Toyota Avanza adalah mobil berjenis kendaraan multi-guna (MPV) yang dikembangkan oleh Daihatsu dan dipasarkan oleh Toyota dan Daihatsu, utamanya dijual dengan layout kursi tiga baris. Generasi pertama mobil ini diluncurkan pada tanggal 11 Desember 2003 dan mulai diproduksi sejak Januari 2004.', '20231027181913.jpg', '250.000', 'Avanza', '3', '2023-10-27', 'Rippky', 'Sedang Digunakan'),
(6, 'Agya', 'Toyota All New Agya 2023 hadir dengan beragam pembaruan, mulai dari ekterior, interior dan beragam fitur-fitur terbaru lainnya. Yang paling membedakan dengan versi terdahulunya, saat ini salah satu tipe agya yaitu agya gr sport tidak masuk kedalam kategori mobil LCGC. Berbeda dengan 2 tipe lainnya yaitu tipe E dan G.', '20231027182122.jpg', '250.000', 'Agya', '1', '2023-10-27', 'Rippky', 'Ready'),
(7, 'Pickup Box', 'Buat pebisnis ekspedisi baru, mobil pick up bisa menjadi pilihan utama, dari segi harga lebih murah dibandingkan jenis sebelumnya. Ukurannya memang masih sangat standar dan tergolong kecil. Panjangnya 3,4 meter, lebar 1,4 meter, dan tinggi 1,24 meter, bisa dipakai untuk memuat barang jenis apapun. Selama pengemasannya bagus dan tidak masalah, jika ditumpuk dengan barang lainnya.', '20231027182916.jpg', '300.000', 'Pickup-Box', '4', '2023-10-27', 'Rippky', 'Ready'),
(8, 'Brio', 'Honda Brio diluncurkan di Indonesia pada bulan Agustus 2012, dengan harga ketika peluncuran berkisar antara 149-170 juta rupiah.Saat itu, Honda Brio didatangkan secara CBU dari Thailand dengan mesin 1.300cc dan tersedia dalam 2 tipe yaitu S dan E.', '20231027183156.jpg', '250.000', 'Brio', '1', '2023-10-27', 'Rippky', 'Sedang Digunakan'),
(9, 'Hiace Commuter', 'New Hiace Commuter yang akan membantu Anda memanjakan penumpang dengan kenyamanan serta keamanan yang efisien. \r\nKabin yang luas sanggup memuat hingga 16 penumpang, sekaligus memberikan pengalaman berkendara yang lebih menyenangkan. Integrated air blower tersedia di setiap baris tempat duduk, yang pastinya membuat perjalanan jadi lebih nyaman.', '20231111060811.jpg', '1.000.000', 'Hiace-Commuter', '5', '2023-11-11', 'Rippky', 'Ready'),
(13, 'Innova Reborn', 'Toyota Innova Reborn sendiri terdiri dari tiga tipe yaitu tipe G yang merupakan level paling buncit, lalu tipe V di kelas menengah, dan tipe Q yang merupakan versi premium. Ini belum termasuk tipe Venturer yang digadang-gadang sebagai varian paling elite Toyota Innova sejauh ini.', '20231111103154.jpg', '450.000', 'Innova-Reborn', '3', '2023-11-11', 'Rippky', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id_caraousel` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id_caraousel`, `judul`, `foto`) VALUES
(22, 'Caraousel 1', '20231122141628.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(5) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`) VALUES
(2, '20231005231145.jpg'),
(3, '20231005231203.jpg'),
(5, '20231122064118.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `keterangan`, `tanggal`, `foto`) VALUES
(3, 'Stok Unit Mobil', 'Stok mobil hari ini guys!', '2023-10-03', '20231003181743.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Mobil Kecil'),
(3, 'Mobil Besar'),
(4, 'Pick Up'),
(5, 'Elf');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(5) NOT NULL,
  `judul_website` varchar(200) NOT NULL,
  `profile_website` text NOT NULL,
  `waktu_buka` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_wa` varchar(50) NOT NULL,
  `tiktok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `judul_website`, `profile_website`, `waktu_buka`, `instagram`, `facebook`, `email`, `alamat`, `no_wa`, `tiktok`) VALUES
(1, 'AjibTrans', 'Ajib Transport adalah jasa persewaan mobil terlengkap di Solo Raya yang memiliki ijin resmi, melayani perjalanan dalam dan luar kota. Armada lengkap, baru, berkualitas, nyaman serta bersih. Kami memiliki SDM driver yang handal dan professional.', 'Buka setiap hari, 24 jam', 'https://instagram.com/ajibtrans', 'https://facebook.com/ajibtrans', 'ajibtrans@gmail.com', 'Krajan RT 01/04, Bulakrejo, Kabupaten Sukoharjo, Jawa Tengah', '082313007775', 'https://tiktok.com/@ajibtrans');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(3, 'AjibTrans', 'Ajibtrans', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id_caraousel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
