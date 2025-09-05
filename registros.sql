-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2025 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro_entradas`
--

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `piso_destino` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `nombre`, `rol`, `piso_destino`, `fecha`, `activo`) VALUES
(1, 'Pedro Ramirez', 'Escritores', 'Piso 2 - Edición', '2025-09-04', 1),
(2, 'Maria Hrnandez', 'Reporteros', 'Piso 4 - Imprenta', '2025-09-05', 1),
(3, 'Edgar', 'Ilustradores de libros', 'Piso 3 - Diseño', '2025-09-10', 1),
(4, 'Mariano', 'Impresores', 'Piso 4 - Imprenta', '2025-09-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
