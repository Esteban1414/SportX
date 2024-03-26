-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 05:24:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sportx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log_orders`
--

CREATE TABLE `activity_log_orders` (
  `id_log_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activity_log_orders`
--

INSERT INTO `activity_log_orders` (`id_log_order`, `id_user`, `id_order`, `action`, `ip_address`, `date`) VALUES
(52, 1, 47, 'Added Order', '::1', '2023-11-20 16:35:05'),
(53, 1, 48, 'Added Order', '::1', '2023-11-20 17:19:31'),
(54, 1, 49, 'Added Order', '::1', '2023-11-20 17:20:13'),
(55, 1, 49, 'Received Order', '::1', '2023-11-20 17:21:09'),
(56, 1, 50, 'Added Order', '::1', '2023-11-20 20:59:41'),
(57, 1, 51, 'Added Order', '::1', '2023-11-20 21:08:11'),
(58, 1, 52, 'Added Order', '::1', '2023-11-21 02:29:14'),
(59, 1, 47, 'Received Order', '::1', '2023-11-21 05:03:07'),
(60, 1, 48, 'Received Order', '::1', '2023-11-21 05:04:09'),
(61, 1, 51, 'Denied Order', '::1', '2023-11-21 05:13:02'),
(62, 1, 53, 'Added Order', '::1', '2023-11-21 06:25:19'),
(63, 1, 50, 'Received Order', '::1', '2023-11-21 06:30:10'),
(64, 1, 54, 'Added Order', '::1', '2023-11-21 06:31:20'),
(65, 1, 54, 'Denied Order', '::1', '2023-11-21 06:31:56'),
(66, 1, 55, 'Added Order', '::1', '2023-11-21 06:33:11'),
(67, 1, 55, 'Received Order', '::1', '2023-11-21 06:34:31'),
(68, 1, 56, 'Added Order', '::1', '2023-11-21 07:35:56'),
(69, 1, 56, 'Denied Order', '192.168.1.125', '2023-11-21 07:36:55'),
(70, 1, 57, 'Added Order', '192.168.1.125', '2023-11-21 07:51:57'),
(71, 1, 58, 'Added Order', '192.168.1.125', '2023-11-21 07:53:01'),
(72, 1, 59, 'Added Order', '192.168.1.125', '2023-11-21 08:05:07'),
(73, 1, 60, 'Added Order', '192.168.1.125', '2023-11-21 08:09:20'),
(74, 1, 61, 'Added Order', '192.168.1.125', '2023-11-21 08:14:08'),
(75, 1, 62, 'Added Order', '192.168.1.125', '2023-11-21 08:14:44'),
(76, 1, 63, 'Added Order', '192.168.1.125', '2023-11-21 08:15:57'),
(77, 1, 64, 'Added Order', '192.168.1.125', '2023-11-21 08:17:19'),
(78, 1, 65, 'Added Order', '192.168.1.125', '2023-11-21 08:18:08'),
(79, 1, 66, 'Added Order', '192.168.1.125', '2023-11-21 08:18:48'),
(80, 1, 67, 'Added Order', '192.168.1.125', '2023-11-21 08:19:25'),
(81, 1, 68, 'Added Order', '192.168.1.125', '2023-11-21 08:20:04'),
(82, 1, 69, 'Added Order', '192.168.1.125', '2023-11-21 08:21:52'),
(83, 1, 70, 'Added Order', '192.168.1.125', '2023-11-21 08:22:16'),
(84, 1, 71, 'Added Order', '192.168.1.125', '2023-11-21 08:22:45'),
(85, 1, 72, 'Added Order', '192.168.3.99', '2023-11-21 13:48:39'),
(86, 1, 73, 'Added Order', '192.168.3.99', '2023-11-21 14:15:09'),
(87, 1, 52, 'Denied Order', '192.168.3.99', '2023-11-21 14:16:28'),
(88, 1, 74, 'Added Order', '192.168.3.99', '2023-11-21 14:26:15'),
(89, 1, 74, 'Received Order', '192.168.3.99', '2023-11-21 14:26:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log_products`
--

CREATE TABLE `activity_log_products` (
  `id_log_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activity_log_products`
--

INSERT INTO `activity_log_products` (`id_log_product`, `id_user`, `id_product`, `action`, `ip_address`, `date`) VALUES
(52, 1, 2, 'Modified Product', '::1', '2023-11-19 00:16:32'),
(66, 1, 384, 'Added Product', '::1', '2023-11-21 06:02:09'),
(67, 1, 2, 'Modified Product', '::1', '2023-11-21 14:27:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `categories` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`categories`) VALUES
('Baseball'),
('Basketball'),
('Football'),
('Soccer'),
('Swimming'),
('Tennis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `code`
--

CREATE TABLE `code` (
  `id_code` int(11) NOT NULL,
  `code` int(6) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `code`
--

INSERT INTO `code` (`id_code`, `code`, `id_user`) VALUES
(20, 973227, 1),
(21, 213392, 1),
(22, 958151, 1),
(23, 980125, 1),
(24, 329006, 1),
(25, 345673, 1),
(26, 509017, 1),
(30, 216241, 80),
(31, 480204, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `id_provider`) VALUES
(47, 1, 1),
(48, 1, 1),
(49, 1, 1),
(50, 1, 1),
(51, 1, 1),
(52, 1, 1),
(53, 1, 1),
(54, 1, 1),
(55, 1, 1),
(56, 1, 1),
(57, 1, 1),
(58, 1, 1),
(59, 1, 1),
(60, 1, 1),
(61, 1, 1),
(62, 1, 1),
(63, 1, 1),
(64, 1, 1),
(65, 1, 1),
(66, 1, 1),
(67, 1, 1),
(68, 1, 1),
(69, 1, 1),
(70, 1, 1),
(71, 1, 1),
(72, 1, 1),
(73, 1, 1),
(74, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `id_permission` int(11) NOT NULL,
  `access_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permission`
--

INSERT INTO `permission` (`id_permission`, `access_level`) VALUES
(1, 'Total'),
(2, 'High'),
(3, 'Medium'),
(4, 'Low');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(15) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `section` varchar(1) DEFAULT NULL,
  `mark` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(25) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `provider_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `date`, `category`, `product_type`, `section`, `mark`, `name`, `description`, `size`, `stock`, `price`, `image`, `provider_key`) VALUES
(1, '2023-11-21 06:34:31', 'Baseball', 'Bats', 'A', 'Easton', 'easton adv hype', 'bat color negro con punta roja', NULL, 26, 1230, 'copia_bat2-2.webp', 6),
(2, '2023-11-21 14:27:03', 'Baseball', 'Accessories', NULL, 'Wilson', 'wilson a setecientos', 'guante de baseball color beig', '', 14, 564, 'copia_guante-1-.webp', 6),
(3, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'nike', 'mlb atlanta braves', 'camisa de color gris', 'm-xl', 75, 1669, 'copia_jersey-bsb12x2-.webp', 6),
(4, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'nike', 'MLB St. Louis Cardinals (Paul Goldschmidt)', 'camisa color azul cielo', 'm-xl', 65, 1669, 'copia_jerser-bsb22x2.webp', 6),
(5, '2023-10-15 01:26:28', 'Baseball', 'Footwear', 'W', 'nike', 'nike vapor ultrafly four', 'calzado color rojo', '26-30', 36, 2456, 'copia_calzado-bsb1-_1.webp', 6),
(6, '2023-10-14 21:36:09', 'Baseball', 'Bats', 'A', 'easton', 'Bat Beisbol Easton Speed', 'bat de aluminio azul', NULL, 55, 2356, 'copia_batA2F.webp', 6),
(7, '2023-10-14 21:36:11', 'Baseball', 'Bats', 'A', 'kr', 'Bat De Madera Maple Kr3', 'bat de madera ', NULL, 33, 1799, 'copia_batA3F.webp', 6),
(8, '2023-10-14 21:36:14', 'Baseball', 'Bats', 'A', 'comax', 'bat madera comax', 'bat de madera', NULL, 11, 718, 'copia_batA4F.webp', 6),
(9, '2023-10-14 21:36:17', 'Baseball', 'Bats', 'A', 'easton', 'bat sfot bol easton hammer', 'bat de aluminio militar gris', NULL, 16, 1596, 'copia_batA5F.webp', 6),
(10, '2023-10-15 00:44:50', 'Baseball', 'Bats', 'K', 'Louisville slugger', 'Bat De Beisbol Infantil Louisville Atlas', 'bat de aluminio color naranja', NULL, 61, 999, 'copia_batN2F.webp', 6),
(11, '2023-10-15 00:44:50', 'Baseball', 'Bats', 'K', 'franklin', 'bat infantil Franklin Venom', 'bat de aluminio y peso ligero', NULL, 13, 890, 'copia_batN3F.webp', 6),
(12, '2023-10-15 00:44:50', 'Baseball', 'Bats', 'K', 'rawlings', 'Rawlings Bat De Béisbol', 'bat de madera color negro', NULL, 12, 1119, 'copia_batN4F.webp', 6),
(13, '2023-10-15 00:44:50', 'Baseball', 'Bats', 'K', 'rawlings', 'Bat De Béisbol Machine Usa', 'bat de aluminio color azul', NULL, 30, 2499, 'copia_batN5F.webp', 6),
(14, '2023-10-15 00:44:50', 'Baseball', 'Bats', 'K', 'rawlings', 'rawlings bat beisbol tball', 'bat de aluminio con diseño para niño', NULL, 37, 1359, 'copia_batN6F.webp', 6),
(15, '2023-10-15 01:26:28', 'Baseball', 'Footwear', 'W', 'mizuno', 'zapato mizuno domain', 'zapato de baseball negro', '26-30', 46, 4996, 'copia_zapbsb2H.webp', 6),
(16, '2023-10-15 01:26:34', 'Baseball', 'Footwear', 'M', 'mizuno', 'zapato beisbol mizuno spike', 'zapato para baseball negro', '28.5-30', 68, 3200, 'copia_zapbsb3H.webp', 6),
(17, '2023-10-15 01:26:34', 'Baseball', 'Footwear', 'M', 'under armour', 'Under Armour Leadoff', 'zapato de baseball de goma color rojo con blanco', '24.5-33', 89, 1133, 'copia_zapbsb4H.webp', 6),
(18, '2023-10-15 01:26:34', 'Baseball', 'Footwear', 'M', 'new balance', 'New Balance Fresh Foam vsix', 'zapato de baseball color negro', '25-33', 21, 1988, 'copia_zapbsb5H.webp', 6),
(19, '2023-10-15 01:26:34', 'Baseball', 'Footwear', 'M', 'Under armour', 'Zapatos Softbol Mujer Under Armour Glyde', 'zapato de baseball color negro', '23-30', 12, 2750, 'copia_zapbsb1M.webp', 6),
(20, '2023-10-15 01:26:34', 'Baseball', 'Footwear', 'M', 'mizuno', 'Mizuno Sweep five', 'zapato de baseball color blanco con rosa', '23-30', 36, 4850, 'copia_zapbsb2M.webp', 6),
(21, '2023-10-15 01:26:28', 'Baseball', 'Footwear', 'W', 'adidas', 'Adidas Purehustle', 'zapato de baseball color blanco con gris', '22-30', 23, 1341, 'copia_zapbsb3M.webp', 6),
(22, '2023-10-15 01:26:28', 'Baseball', 'Footwear', 'W', 'adidas', 'Adidas Womens Purehustle two', 'zapato de baseball color blanco con gris', '22-30', 32, 1528, 'copia_zapbsb4M.webp', 6),
(23, '2023-10-15 01:26:28', 'Baseball', 'Footwear', 'W', 'adidas', 'adidas Icon V Bounce TPU', 'zapato de baseball color azul con blanco', '22-30', 24, 1787, 'copia_zapbsb5M.webp', 6),
(24, '2023-10-15 00:44:50', 'Baseball', 'Footwear', 'K', 'new balance', 'New balance goma moldeada', 'zapato de baseball color negro', '22-30', 15, 1059, 'copia_zapbsbN1.webp', 6),
(25, '2023-10-15 00:44:50', 'Baseball', 'Footwear', 'K', 'adidas', 'Adidas Unisex-Child Purehustle', 'zapato de baseball color blanco', '22-30', 15, 2068, 'copia_zapbsbN2.webp', 6),
(26, '2023-10-15 00:44:50', 'Baseball', 'Footwear', 'K', 'adidas', 'Adidas icon seven', 'zapato de baseball color blanco', '23-25', 21, 2052, 'copia_zapbsbN3.webp', 6),
(27, '2023-11-20 18:28:59', 'Baseball', 'Footwear', 'K', 'under armour', 'Under Armour Leadoff mid black', 'zapato de baseball color negro', '21-24.5', 24, 881, 'copia_zapbsbN4.webp', 6),
(28, '2023-11-20 18:29:02', 'Baseball', 'Footwear', 'K', 'under armour', 'Under Armour Leadoff mid red', 'zapato de baseball color rojo con blanco', '16', 24, 839, 'copia_zapbsbN5.webp', 6),
(29, '2023-10-14 21:37:28', 'Baseball', 'Accessories', NULL, 'franklin sports', 'franklin sports Field Master Midnight Series', 'guante de beisbol negro', NULL, 13, 708, 'copia_gua2.webp', 6),
(30, '2023-10-14 21:37:36', 'Baseball', 'Accessories', NULL, 'franklin sports', 'franklin sports campo master series', 'guante de beisbol multicolor', NULL, 31, 643, 'copia_gua3.webp', 6),
(31, '2023-10-14 21:37:38', 'Baseball', 'Accessories', NULL, 'rawlings', 'Rawlings RSB', 'guante de beisbol color negro con gris', NULL, 36, 1450, 'copia_gua4.webp', 6),
(32, '2023-10-14 21:37:41', 'Baseball', 'Accessories', NULL, 'Wilson', 'guante wilson vseis', 'guante de beisbol color negro con gris', NULL, 36, 1531, 'copia_gua5.webp', 6),
(33, '2023-11-20 18:05:36', 'Baseball', 'Jerseys', 'W', 'generica', 'Jersey Casaca Yankees', 'jersey de beisbol negra con blanco', 'L', 42, 399, 'copia_jersH3.webp', 6),
(34, '2023-11-20 18:05:11', 'Baseball', 'Jerseys', 'W', 'generica', 'Jersey Casaca Baseball Yankees', 'jersey de beisbol negra con blanco', 's-l', 13, 499, 'copia_jersH4.webp', 6),
(35, '2023-11-20 18:05:20', 'Baseball', 'Jerseys', 'W', 'generica', 'Jersey Casaca Baseball Dodgers ', 'jersey de beisboblanco con azul', 's-l', 28, 438, 'copia_jersH5.webp', 6),
(36, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'generica', 'Jersey Casaca Beisbol Yankees Ny Rosa', 'jersey de beisbol rosada', 's', 28, 410, 'copia_jersM1.webp', 6),
(37, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'generica', 'Jersey Casaca Beisbol Dodgers Ny Rosa ', 'jersey de beisbol rosada', 'L', 46, 1900, 'copia_jersM2.webp', 6),
(38, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'freecustom', 'playera de béisbol personalizada', 'jersey de beisbol rosada con rayas blancas', 'm-L', 56, 272, 'copia_jersM3.webp', 6),
(39, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'babyhealthy', 'babyhealthy playera de béisbol para mujer', 'jersey de beisbol negra con rayas blancas', 'm-L', 79, 442, 'copia_jersM4.webp', 6),
(40, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'hat and beyond', 'Hat and Beyond Camiseta de béisbol', 'jersey de beisbol negra con rayas blancas', 'm-L', 16, 454, 'copia_jersM5.webp', 6),
(41, '2023-10-15 01:26:28', 'Baseball', 'Jerseys', 'W', 'babyhealthy', ' playera deportiva de béisbol para niños y niñas', 'jersey de beisbol color blanco con rayas negras', 's-m', 24, 381, 'copia_jersK1.webp', 6),
(42, '2023-10-15 00:44:50', 'Baseball', 'Jerseys', 'K', 'el siglo', 'camisola baseball venados Mazatlan', 'jersey de beisbol color negra', 's-m', 38, 499, 'copia_jersK2.webp', 6),
(43, '2023-10-15 00:44:50', 'Baseball', 'Jerseys', 'K', 'beis', 'Jersey casaca beisbol mexico mundial', 'jersey de beisbol color roja', 's-m', 48, 500, 'copia_jersK3.webp', 6),
(44, '2023-10-15 00:44:50', 'Baseball', 'Jerseys', 'K', 'beis', 'Jersey casaca New York Tankees bordada', 'jersey de beisbol color blanco', 's-m', 53, 570, 'copia_jersK4.webp', 6),
(45, '2023-10-15 00:44:50', 'Baseball', 'Jerseys', 'K', 'beis', 'Jersey casaca Los Angeles Dodgers bordada', 'jersey de beisbol color azul', 's-m', 59, 579, 'copia_jersK5.webp', 6),
(46, '2023-10-15 02:26:15', 'Basketball', 'Footwear', 'M', 'Nike', 'LeBron NXXT Gen', 'tennis para basquetbol color negro', '25.5-28', 13, 2999, 'copia_calzado-bsk1.webp', 4),
(47, '2023-10-15 02:26:18', 'Basketball', 'Footwear', 'M', 'Nike', 'Nike precision six', 'tennis color rojo con negro', '26.5-30', 15, 1499, 'copia_calzado-bsk2-_2.webp', 4),
(48, '2023-10-15 02:26:21', 'Basketball', 'Footwear', 'M', 'Nike', 'freak five', 'tennis color blanco con negro', '25.5-32', 24, 3199, 'copia_calzado-bsk3-2.webp', 4),
(50, '2023-10-11 12:16:38', 'Tennis', 'Rackets', 'A', 'aero', 'babolat pure', 'raqueta amarilla', NULL, 130, 5200, 'copia_tenis_adult_racket1.webp', 3),
(51, '2023-10-11 12:16:38', 'Tennis', 'Rackets', 'A', 'wilson', 'intrigue', 'raqueta rosada', NULL, 134, 4500, 'copia_tenis_adult_racket2.webp', 3),
(52, '2023-10-11 12:16:38', 'Tennis', 'Rackets', 'A', 'wilson', 'essence', 'raqueta celeste', NULL, 45, 4500, 'copia_tenis_adult_racket3.webp', 3),
(53, '2023-10-11 12:16:38', 'Tennis', 'Rackets', 'A', 'wilson', 'blue', 'raqueta azul', NULL, 98, 4330, 'copia_tenis_adult_racket4.webp', 3),
(54, '2023-10-11 12:16:38', 'Tennis', 'Rackets', 'A', 'wilson', 'purple', 'raqueta morada', NULL, 120, 2890, 'copia_tenis_adult_racket5.webp', 3),
(55, '2023-10-15 02:23:05', 'Tennis', 'Rackets', 'K', 'wilson', 'junior', 'raqueta roja', NULL, 45, 800, 'copia_tenis_kids_racket1.webp', 3),
(56, '2023-10-15 02:23:05', 'Tennis', 'Rackets', 'K', 'wilson', 'dreil', 'raqueta azul', NULL, 34, 1233, 'copia_tenis_kids_racket2.webp', 3),
(57, '2023-10-15 02:23:05', 'Tennis', 'Rackets', 'K', 'puma', 'lima', 'raqueta amarilla', NULL, 56, 1300, 'copia_tenis_kids_racket3.webp', 3),
(58, '2023-10-15 02:23:05', 'Tennis', 'Rackets', 'K', 'wilson', 'balote', 'raqueta azul', NULL, 45, 3456, 'copia_tenis_adult_racket1.webp', 3),
(59, '2023-10-15 02:23:05', 'Tennis', 'Rackets', 'K', 'aero', 'frito', 'raqueta rosa', NULL, 23, 3456, 'copia_tenis_kids_racket1.webp', 3),
(60, '2023-10-11 12:16:38', 'Tennis', 'Balls', NULL, 'er', 'tenis ball', 'pelota para tenis', NULL, 56, 2345, 'copia_tenis_balls1.webp', 3),
(61, '2023-10-11 12:16:38', 'Tennis', 'Balls', NULL, 'head tour', 'head eb', 'pelota para tenis', NULL, 45, 120, 'copia_tenis_ball2.webp', 3),
(62, '2023-10-11 12:16:38', 'Tennis', 'Balls', NULL, 'penn', 'tournament', 'pelota de torneo', NULL, 34, 1300, 'copia_tenis_ball3.webp', 3),
(63, '2023-10-11 12:16:38', 'Tennis', 'Balls', NULL, 'dunlop', 'dunlop one', 'pelota de tenis 1', NULL, 56, 234, 'copia_tenis_ball4.webp', 3),
(64, '2023-10-11 12:16:38', 'Tennis', 'Balls', NULL, 'head', 'head ball', 'pelota de tenis', NULL, 1290, 58, 'copia_tenis_ball5.webp', 3),
(65, '2023-11-20 18:30:13', 'Tennis', 'Footwear', 'M', 'lacoste', 'aglt orange', 'tenis naranjas ', '25-28', 234, 2456, 'copia_tenis_man_footwear1.webp', 3),
(66, '2023-10-15 02:23:24', 'Tennis', 'Footwear', 'M', 'asics', 'court', 'tenis azules', '26-28.5', 45, 4532, 'copia_tenis_man_footwear2.webp', 3),
(67, '2023-10-15 02:23:24', 'Tennis', 'Footwear', 'M', 'babolat', 'jet tere', 'tenis grises', '25-27.5', 56, 3456, 'copia_tenis_man_footwear3.webp', 3),
(68, '2023-11-20 18:29:58', 'Tennis', 'Footwear', 'M', 'lacoste', 'aglt green', 'tenis verdes', '25-28', 234, 4566, 'copia_tenis_man_footwear4.webp', 3),
(69, '2023-10-15 02:23:24', 'Tennis', 'Footwear', 'M', 'yonex', 'eclipsion', 'tenis negros', '25-27.5', 234, 2345, 'copia_tenis_man_footwear5.webp', 3),
(70, '2023-10-15 02:23:15', 'Tennis', 'Footwear', 'W', 'asics', 'resolution', 'tenis celestes y rosa', '23-26', 54, 3421, 'copia_tenis_woman_footwear1.webp', 3),
(71, '2023-10-15 02:23:15', 'Tennis', 'Footwear', 'W', 'baBOLAT', 'JET MATCH', 'tenis AZULES', '23-25.5', 67, 2134, 'copia_tenis_woman_footwear2.webp', 3),
(72, '2023-10-15 02:23:15', 'Tennis', 'Footwear', 'W', 'BABOLAT', 'SENSA BLACK', 'TENIS NEGROS', '25-27.5', 34, 3456, 'copia_tenis_woman_footwear3.webp', 3),
(73, '2023-11-20 18:34:27', 'Tennis', 'Footwear', 'W', 'asics', 'SPEED asics', 'TENIS CON CINTAS AMARILLAS', '23-25', 45, 2345, 'copia_tenis_woman_footwear4.webp', 3),
(74, '2023-10-15 02:23:15', 'Tennis', 'Footwear', 'W', 'YONEX', 'ECPLISION', 'TENIS NEGROS CON ROJO', '23-26', 67, 3456, 'copia_tenis_woman_footwear5.webp', 3),
(75, '2023-10-15 02:23:24', 'Tennis', 'Footwear', 'M', 'wilson', 'kaos', 'TENIS NEGROS CON ROJO', '15-22', 98, 1234, 'copia_tenis_kids_footwear1.webp', 3),
(76, '2023-10-15 02:23:05', 'Tennis', 'Footwear', 'K', 'tiernelle', 'transpirable', 'tenis blancos', '16-23', 45, 800, 'copia_tenis_kids_footwear2.webp', 3),
(77, '2023-10-15 02:23:05', 'Tennis', 'Footwear', 'K', 'qijgs', 'teniwear', 'tenis negros', '16-24.5', 87, 678, 'copia_tenis_kids_footwear3.webp', 3),
(78, '2023-10-15 02:23:05', 'Tennis', 'Footwear', 'K', 'disney', 'buddy', 'tenis de buddy', '18-22.5', 67, 890, 'copia_tenis_kids_footwear4.webp', 3),
(79, '2023-10-15 02:23:05', 'Tennis', 'Footwear', 'K', 'charly', 'modelxt', 'tenis blancos', '18-23', 132, 987, 'copia_tenis_kids_footwear5.webp', 3),
(80, '2023-10-11 12:16:38', 'Tennis', 'Accessories', NULL, 'babolat', 'damp', 'antivibrador', '', 567, 234, 'copia_tenis_accesories1.webp', 3),
(81, '2023-10-11 12:16:38', 'Tennis', 'Accessories', NULL, 'luxilon', 'alu power', 'cuerda de tenis', NULL, 1234, 456, 'copia_tenis_accesories2.webp', 3),
(82, '2023-10-11 12:16:38', 'Tennis', 'Accessories', NULL, 'babolat', 'syntek pro', 'grip para tenis', NULL, 234, 345, 'copia_tenis_accesories3.webp', 3),
(83, '2023-10-11 12:16:38', 'Tennis', 'Accessories', NULL, 'tecnifibre', 'contact pro', 'overgrip para tenis', NULL, 546, 234, 'copia_tenis_accesories4.webp', 3),
(84, '2023-10-11 12:16:38', 'Tennis', 'Accessories', NULL, 'head', 'babolat cest', 'canasta de pelotas', NULL, 24, 5678, 'copia_tenis_accesories5.webp', 3),
(85, '2023-11-20 18:29:37', 'Tennis', 'Clothes', 'M', 'asics', 'match blue', 'camisa azul', '36-48', 67, 1290, 'copia_tenis_man_clothes1.webp', 3),
(86, '2023-10-15 02:23:24', 'Tennis', 'Clothes', 'M', 'asics', 'match', 'short para tenis', '32-35', 453, 1235, 'copia_tenis_man_clothes2.webp', 3),
(87, '2023-11-20 18:06:10', 'Tennis', 'Clothes', 'M', 'asics', 'tennis calcetx', 'calcetas para tenis', '25-28', 564, 234, 'copia_tenis_man_clothes3.webp', 3),
(88, '2023-10-15 02:23:24', 'Tennis', 'Clothes', 'M', 'asics', 'calcetx', 'calcetas negras', '25-28', 564, 234, 'copia_tenis_man_clothes4.webp', 3),
(89, '2023-10-15 02:23:24', 'Tennis', 'Clothes', 'M', 'hydrogen', 'tshirt', 'playera blanca', '32-38', 56, 2345, 'copia_tenis_man_clothes5.webp', 3),
(90, '2023-10-15 02:23:15', 'Tennis', 'Clothes', 'W', 'hydrogen', 'london', 'playera blanca', '28-32', 56, 1234, 'copia_tenis_women_clothes1.webp', 3),
(91, '2023-10-15 02:23:15', 'Tennis', 'Clothes', 'W', 'hydrogen', 'tech rosa', 'short rosado', '25-28', 567, 234, 'copia_tenis_women_clothes2.webp', 3),
(92, '2023-10-15 02:23:15', 'Tennis', 'Clothes', 'W', 'hydrogen', 'tech negro', 'short negro', '32-33', 786, 345, 'copia_tenis_women_clothes3.webp', 3),
(93, '2023-10-15 02:23:15', 'Tennis', 'Clothes', 'W', 'hydrogen', 'spray amarilla', 'camisa amarilla', '29-33', 456, 234, 'copia_tenis_women_clothes4.webp', 3),
(94, '2023-10-15 02:23:15', 'Tennis', 'Clothes', 'W', 'hydrogen', 'spray morado', 'camisa morada', '29-33', 456, 234, 'copia_tenis_women_clothes5.webp', 3),
(95, '2023-11-20 18:30:57', 'Tennis', 'Clothes', 'K', 'adidas', 'polo light blue', 'camisa celeste', '24-27', 4521, 1200, 'copia_tenis_kids_clothes1.webp', 3),
(96, '2023-10-15 02:23:05', 'Tennis', 'Clothes', 'K', 'adidas', 'franja', 'short negro', '24-26', 456, 432, 'copia_tenis_kids_clothes2.webp', 3),
(97, '2023-11-20 18:06:21', 'Tennis', 'Clothes', 'K', 'adidas', 'tennis club', 'playera roja', '22-24', 764, 456, 'copia_tenis_kids_clothes3.webp', 3),
(98, '2023-10-15 02:23:05', 'Tennis', 'Clothes', 'K', 'adidas', 'club', 'playera negra', '23-25', 234, 564, 'copia_tenis_kids_clothes4.webp', 3),
(99, '2023-10-15 02:23:05', 'Tennis', 'Clothes', 'K', 'adidas', 'polo', 'camisa para tenis', '22-26', 654, 237, 'copia_tenis_kids_clothes5.webp', 3),
(101, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'riddell', 'mini Speed thow black', 'Mini Speed Throw', '', 15, 399, 'copia_casco.webp', 1),
(102, '2023-11-20 18:31:20', 'Football', 'Footwear', 'M', 'Under Armour', 'Spotlight Franchise 2.0 RM Under', 'Tachones Cleats ', '11', 10, 400, 'copia_TacosAmeric.webp', 1),
(104, '2023-10-15 02:23:24', 'Football', 'Footwear', 'M', 'Under Armour', 'Spotlight Franchise 3.0', 'UNDER ARMOUR ', '9', 4, 698, 'copia_TacosAmeric2.webp', 1),
(109, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'OEM', 'boodun', 'antideslizante ', '', 4, 200, 'copia_GuantesAmerican.webp', 1),
(110, '2023-10-13 18:56:08', 'Football', 'Balls', NULL, 'Wilsom', 'NFL', 'Balon Americano Nfl ', '', 37, 345, 'copia_balonAmeric.webp', 1),
(112, '2023-10-13 18:55:17', 'Soccer', 'Balls', NULL, 'Nike', ' FJ5547-342', 'Nike Maestro Verde', '', 3, 439, 'copia_balonSoccer.webp', 2),
(113, '2023-10-13 18:55:17', 'Soccer', 'Balls', NULL, 'Nike', 'DX4611', 'Barcelona Strike', '', 7, 600, 'copia_balonSoccer2.webp', 2),
(117, '2023-11-20 18:34:37', 'Football', 'Protections', 'K', 'Riddell', 'Speed Riddell', 'Nfl Mini Helmet', NULL, 25, 369, 'copia_casconiño.webp', 1),
(118, '2023-10-15 02:23:05', 'Football', 'Footwear', 'K', 'Generica', 'Verde', 'Futbol Rápido', '4', 20, 589, 'copia_tacosNiño.webp', 1),
(119, '2023-10-15 02:23:05', 'Football', 'Footwear', 'K', 'Under Armour', 'Spotight Franchise', 'Cleats Americano', '4', 9, 699, 'copia_tacosNiño2.webp', 1),
(120, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'Champro', 'Air tech', 'chaleco protector', '', 3, 300, 'copia_OIP.webp', 1),
(121, '2023-10-15 02:23:05', 'Football', 'Protections', 'K', 'cutters', 'lineman', 'negro/blanco', '', 1, 229, 'copia_guantesNiños.webp', 1),
(122, '2023-10-17 07:51:48', 'Soccer', 'Footwear', 'K', 'Nike', 'DJ5959-600', 'Tenis Fútbol jr', '5', 6, 670, 'copia_soccer-woman-2.webp', 2),
(124, '2023-10-16 02:06:32', 'Soccer', 'Accessories', NULL, 'Nike', 'FJ4864-011', 'Soccer gloves', '', 13, 350, 'copia_guantesFucho.webp', 2),
(125, '2023-10-16 02:06:49', 'Soccer', 'Accessories', NULL, 'Buffon', 'Xaguar Afi Goliat', 'Soccer gloves', '', 23, 219, 'copia_guantesFucho2.webp', 2),
(126, '2023-10-16 02:09:41', 'Soccer', 'Accessories', NULL, 'Buffon / AD Sport', 'Afi Xaguar Goliat', 'Non-rod soccer gloves', '', 14, 350, 'copia_guantesFucho3.webp', 2),
(127, '2023-10-15 02:23:15', 'Football', 'Footwear', 'W', 'Generica', 'americanotachos', 'Impermeables', '6', 21, 300, 'copia_mujerAmerican.webp', 1),
(128, '2023-10-15 02:23:15', 'Football', 'Footwear', 'W', 'Generica', 'TENISNICE air zoom', 'Multitacos', '7', 17, 325, 'copia_mujerAmerican2.webp', 1),
(129, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'Under Armour', 'concha', 'Barbiquejo Para Casco', '7', 8, 125, 'copia_barbiMujer.webp', 1),
(130, '2023-10-15 02:23:15', 'Football', 'Footwear', 'W', 'SUYISYLIFE', 'SUYISYLIFE', 'Púas Largas Y Cortas', '6', 12, 799, 'copia_mujerAmerican3.webp', 1),
(131, '2023-10-15 02:23:15', 'Football', 'Jerseys', 'W', 'Yazbek', 'Ravens', 'Sudadera Ravens', 'm', 3, 979, 'copia_sudaMuj.webp', 1),
(132, '2023-10-15 02:23:24', 'Football', 'Footwear', 'M', 'Generica', 'football shoes', 'Tacos americano', '4', 10, 849, 'copia_mujerAmerican4.webp', 1),
(133, '2023-10-15 02:23:24', 'Football', 'Footwear', 'M', 'Generica', 'EAS21ZQXH ', 'Caña Alta, Antideslizantes', '12', 21, 979, 'copia_homberTacos2.webp', 1),
(134, '2023-10-15 02:23:24', 'Football', 'Footwear', 'M', 'Under Armour', 'highligth', 'Football americano', '10', 1, 1299, 'copia_homberTacos.webp', 1),
(135, '2023-11-20 18:09:17', 'Football', 'Footwear', 'M', 'Under Armour', 'Spotlight Franchise 2.0', 'Zapato Cleats', '8', 3, 1499, 'copia_homberTacos3.webp', 1),
(136, '2023-11-20 18:09:10', 'Football', 'Footwear', 'M', 'Under Armour', 'Spotlight Franchise 1.0', 'Zapato Cleats', '10', 6, 1399, 'copia_mujerAmerican.webp', 1),
(137, '2023-11-20 18:09:32', 'Football', 'Footwear', 'M', 'Under Armour', 'Spotlight Franchise 3.0 RM', 'Zapato Cleats', '10', 6, 1398, 'copia_homberTacos4.webp', 1),
(139, '2023-10-15 02:23:05', 'Football', 'Footwear', 'K', 'Under Armour', 'Spotlight Franchise 2.0 RM', 'Zapato Cleats', '4', 16, 1200, 'copia_tacosNiño3.webp', 1),
(140, '2023-11-20 18:10:28', 'Football', 'Footwear', 'K', 'Under Armour', 'hammer mid RM kid 1.0', 'Zapato Cleats', '6', 7, 1600, 'copia_tacosNiño4.webp', 1),
(141, '2023-11-20 18:10:21', 'Football', 'Footwear', 'K', 'Under Armour', 'hammer mid RM kid', 'Zapato Cleats', '6', 4, 1359, 'copia_tacosNiño5.webp', 1),
(142, '2023-10-15 02:23:15', 'Football', 'Footwear', 'W', 'Under Armour', 'Highlight Franchise', 'Zapato Cleats', '5', 11, 1700, 'copia_mujerAmerican5.webp', 1),
(143, '2023-10-15 02:23:05', 'Football', 'Footwear', 'K', 'Generica', 'bv0366', 'Tachones Futbol', '4', 6, 799, 'copia_tacosNiño6.webp', 1),
(144, '2023-10-15 02:23:24', 'Football', 'Footwear', 'M', 'Generica', 'Tachones Futbol', 'Tachones Futbol', '11', 13, 689, 'copia_homberTacos5.webp', 1),
(145, '2023-10-15 02:23:24', 'Soccer', 'Footwear', 'M', 'Binbinniao', 'zapatos de soccer', 'Botas De Fútbol', '9', 6, 595, 'copia_soccerH2.webp', 2),
(146, '2023-11-20 18:11:04', 'Soccer', 'Footwear', 'M', 'Binbinniao', 'tacos de soccer', 'Impermeables Antideslizantes', '8', 20, 591, 'copia_soccerH3.webp', 2),
(147, '2023-11-20 18:11:11', 'Soccer', 'Footwear', 'M', 'Binbinniao', 'tacos soccer', 'Suela Antideslizante ', '10', 17, 628, 'copia_soccerH4.webp', 2),
(148, '2023-11-20 18:11:23', 'Soccer', 'Footwear', 'M', 'Binbinniao', 'tacos caucho', ' Suela De Caucho', '12', 23, 603, 'copia_soccerH5.webp', 2),
(149, '2023-10-17 06:36:44', 'Soccer', 'Footwear', 'K', 'Generica', 'TENISNICE futbol', 'Suela Antideslizante', '7', 19, 799, 'copia_soccer-kids-4.webp', 2),
(150, '2023-11-20 18:11:36', 'Soccer', 'Footwear', 'K', 'Binbinniao', 'tacos antideslizante', 'Suela Antideslizante', '4', 16, 793, 'copia_soccer-kids-2.webp', 2),
(151, '2023-10-17 07:51:13', 'Soccer', 'Footwear', 'K', 'Nike', 'DD9473', 'Nike Phantom', '5', 19, 1489, 'copia_shopping.webp', 2),
(152, '2023-11-20 18:31:42', 'Soccer', 'Footwear', 'K', 'Nike', ' DJ5631-040 Nike', 'Nike Zoom Mercurial', '6', 9, 1899, 'copia_soccer-kids-5.webp', 2),
(153, '2023-10-17 06:38:31', 'Soccer', 'Footwear', 'W', 'Binbinniao', ' DJ5631-040', 'Zapatos de soccer', '7', 9, 611, 'copia_soccer-woman-3.webp', 2),
(155, '2023-11-20 18:11:45', 'Soccer', 'Footwear', 'W', 'Binbinniao', 'tacos soccer chimpunes', 'Chimpunes De Fútbol', '6', 13, 899, 'copia_soccer-woman-5.webp', 2),
(156, '2023-11-20 18:12:05', 'Soccer', 'Footwear', 'W', 'Binbinniao', 'tacos soccer antideslizantes', ' Antideslizantes', '6', 19, 1000, 'copia_soccer-woman-4.webp', 2),
(158, '2023-11-20 18:12:29', 'Soccer', 'Footwear', 'W', 'Generica', 'tacos generica antideslizantes', 'Antideslizantes', '6', 13, 648, 'copia_soccer-woman-2.webp', 2),
(159, '2023-11-20 18:12:19', 'Soccer', 'Footwear', 'W', 'Generica', 'tacos generica', 'Antideslizantes', '5', 10, 548, 'copia_soccer-woman-1.webp', 2),
(160, '2023-10-13 18:56:08', 'Football', 'Balls', NULL, 'voit', '76199.0', 'Enduro Professional', NULL, 12, 265, 'copia_copia_balonAmeric.webp', 1),
(161, '2023-10-13 18:56:08', 'Football', 'Balls', NULL, 'Wilson', 'Touchdown', 'Wilson Touchdown', NULL, 16, 359, 'copia_bolonAmeric4.webp', 1),
(162, '2023-11-20 18:12:36', 'Football', 'Balls', NULL, 'Wilson', 'The Duke Metallic Gold', 'Gold Metallic', NULL, 2, 643, 'copia_bolonAmeric5.webp', 1),
(163, '2023-11-20 18:12:43', 'Football', 'Balls', NULL, 'Wilson', 'The Duke Metallic Synthetic', 'TDJ GST Synthetic', NULL, 20, 460, 'copia_bolonAmeric6.webp', 1),
(164, '2023-10-13 18:55:17', 'Soccer', 'Balls', NULL, 'Nike', 'FB2894-101', 'Nike Academy', NULL, 13, 700, 'copia_bolonsoccer2.webp', 2),
(165, '2023-11-20 18:12:51', 'Soccer', 'Balls', NULL, 'Azteca', 'Azteca Model', 'Aztec Model', NULL, 6, 299, 'copia_bolonsoccer4.webp', 2),
(166, '2023-11-20 18:12:56', 'Soccer', 'Balls', NULL, 'Azteca', 'Azteca Ball ', 'Aztec Model', '', 5, 299, 'copia_bolonsoccer5.webp', 2),
(167, '2023-10-15 02:23:24', 'Football', 'Jerseys', 'M', 'Team Apparel', 'Steelers', 'Pittsburgh Steelers', 'l', 32, 530, 'copia_JerseyHomb.webp', 1),
(168, '2023-10-15 02:23:24', 'Football', 'Jerseys', 'M', 'UNAM', 'pUMAS UNAM', 'Steelers', 'm', 15, 379, 'copia_JerseyHomb2.webp', 1),
(169, '2023-10-15 02:23:24', 'Football', 'Jerseys', 'M', 'NK', 'EAGLES', 'Superbowl Lvii', 's', 20, 1799, 'copia_JerseyHomb3.webp', 1),
(170, '2023-10-15 02:23:24', 'Football', 'Jerseys', 'M', 'Mitchell and Ness', 'Chicago Bears', 'Chicago Bears ', 'xl', 2, 3499, 'copia_JerseyHomb4.webp', 1),
(171, '2023-10-15 02:23:24', 'Football', 'Jerseys', 'M', 'Mitchell and Ness', 'Indianapolis Colts', 'Indianapolis Colts', 'm', 9, 3499, 'copia_JerseyHomb5.webp', 1),
(172, '2023-11-20 18:13:03', 'Football', 'Jerseys', 'W', 'Mitchell and Ness', '49ers SF', 'San Francisco ', 's', 7, 2399, 'copia_JerseyMuj.webp', 1),
(173, '2023-11-20 18:31:58', 'Football', 'Jerseys', 'W', 'Mitchell and Ness', '49ers Mitchell', 'San Francisco', 'm', 1, 3500, 'copia_JerseyMuj2.webp', 1),
(174, '2023-10-15 02:23:15', 'Football', 'Jerseys', 'W', 'Mitchell and Ness', 'Oakland Raiders', 'Bo Jackson 88', 'l', 3, 3500, 'copia_JerseyMuj3.webp', 1),
(175, '2023-11-20 18:33:28', 'Football', 'Jerseys', 'K', 'NFL', 'Baltimore Ravens jersey NFL', 'BUCCANEERS', 'l', 12, 4499, 'copia_conjuntoNiño.webp', 1),
(176, '2023-11-20 18:33:55', 'Football', 'Jerseys', 'K', 'NFL', 'Cincinnati Bengals jersey NFL', 'Cincinnati Bengals', 's', 24, 4999, 'copia_conjuntoNiño3.webp', 1),
(177, '2023-11-20 18:32:45', 'Football', 'Jerseys', 'K', 'NFL', 'Miami Dolphins NFL K jersey', 'Miami Dolphins', 'l', 27, 4999, 'copia_conjuntoNiño2.webp', 1),
(178, '2023-11-20 18:32:04', 'Football', 'Jerseys', 'K', 'NFL', '49ers NFL K', ' San Francisco', 'm', 22, 4999, 'copia_conjuntoNiño4.webp', 1),
(179, '2023-11-20 18:33:04', 'Football', 'Jerseys', 'K', 'NFL', 'New York Giants jersey NFL ', 'New York Giants', 's', 11, 4999, 'copia_conjuntoNiño5.webp', 1),
(180, '2023-10-15 02:23:05', 'Football', 'Jerseys', 'K', 'NFL', 'New York Jets', 'New York Jets', 'xl', 9, 4999, 'copia_conjuntoNiño6.webp', 1),
(181, '2023-11-20 18:13:21', 'Football', 'Bottoms', 'M', 'NFL', 'New York Jets NFL', 'New York Jets', 'xl', 9, 4999, 'copia_conjuntoNiño6.webp', 1),
(182, '2023-11-20 18:33:39', 'Football', 'Bottoms', 'M', 'NFL', 'Baltimore Ravens bottom NFL', 'BUCCANEERS', 'l', 12, 4999, 'copia_conjuntoNiño.webp', 1),
(183, '2023-11-20 18:32:11', 'Football', 'Bottoms', 'K', 'NFL', '49ers NFL K SF', 'San Francisco', 'm', 22, 4999, 'copia_conjuntoNiño4.webp', 1),
(184, '2023-11-20 18:34:01', 'Football', 'Bottoms', 'K', 'NFL', 'Cincinnati Bengals bottom NFL', 'Cincinnati Bengals', 'S', 24, 4999, 'copia_conjuntoNiño3.webp', 1),
(185, '2023-11-20 18:32:40', 'Football', 'Bottoms', 'K', 'NFL', 'Miami Dolphins NFL K Bottom', 'Miami Dolphins', 'l', 27, 4999, 'copia_conjuntoNiño2.webp', 1),
(186, '2023-11-20 18:33:13', 'Football', 'Bottoms', 'K', 'NFL', 'New York Giants bottom NFL', 'New York Giants', 'xl', 11, 4999, 'copia_conjuntoNiño5.webp', 1),
(187, '2023-10-15 02:23:24', 'Football', 'Bottoms', 'M', 'Nike', 'DC9142', 'Winter Warrior', 'xl', 13, 679, 'copia_BottHombre.webp', 1),
(188, '2023-10-15 02:23:24', 'Football', 'Bottoms', 'M', 'Nike', 'BV2679', ' Sportswear', 'm', 20, 1299, 'copia_BottHombre2.webp', 1),
(189, '2023-10-15 02:23:24', 'Football', 'Bottoms', 'M', 'Nike', '50484742405', 'Plush', 'm', 20, 1299, 'copia_BottHombre3.webp', 1),
(190, '2023-10-15 02:23:24', 'Football', 'Bottoms', 'M', 'nike', 'Sportswear De Hombre', 'Sportswear De Hombre', 'm', 16, 499, 'copia_BottHombre4.webp', 1),
(191, '2023-10-15 02:23:24', 'Football', 'Bottoms', 'M', 'nike', 'DQ4202-011', ' Fleece', 's', 3, 499, 'copia_BottHombre6.webp', 1),
(192, '2023-10-15 02:23:15', 'Football', 'Bottoms', 'W', 'Nike', 'FB5488-615', 'Leggings', 'S', 21, 1250, 'copia_BottMujer.webp', 1),
(193, '2023-11-20 18:13:38', 'Football', 'Bottoms', 'W', 'Nike', 'DM7769', 'Swoosh Run', 'l', 4, 1000, 'copia_BottMujer2.webp', 1),
(194, '2023-10-15 02:23:15', 'Football', 'Bottoms', 'W', 'Nike', 'DM7767', 'DM7767', 'xl', 11, 1549, 'copia_BottMujer3.webp', 1),
(195, '2023-10-15 02:23:15', 'Football', 'Bottoms', 'W', 'Nike', 'DM7274', 'Nike Dri-fit', 's', 3, 1234, 'copia_BottMujer4.webp', 1),
(196, '2023-10-15 02:23:15', 'Football', 'Bottoms', 'W', 'Nike', 'DX0211', 'Nike Pro', 'm', 11, 779, 'copia_BottMujer5.webp', 1),
(197, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'Riddell', 'San Francisco', 'Salute To Service', 'm', 21, 467, 'copia_casco2.webp', 1),
(198, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'Riddell', 'Cincinnati Bengals', 'Alt22 Bengals', 'm', 3, 345, 'copia_casco3.webp', 1),
(199, '2023-10-13 18:56:08', 'Football', 'Protections', 'A', 'Riddell', 'Mini Speed ALT22', 'Dallas Cowboys', 'm', 23, 569, 'copia_casco4.webp', 1),
(200, '2023-11-20 18:34:52', 'Football', 'Protections', 'A', 'Riddell', 'Riddell A', 'Riddell', 'm', 5, 799, 'copia_casco5.webp', 1),
(201, '2023-11-20 18:14:05', 'Football', 'Protections', 'A', 'UrielMXshop', 'Football nonskid', 'Nonskid', 'm', 6, 339, 'copia_guante1.webp', 1),
(202, '2023-11-20 18:14:01', 'Football', 'Protections', 'A', 'UrielMXshop', 'Proct nonskid', 'Nonskid', 'm', 13, 259, 'copia_guante2.webp', 1),
(203, '2023-10-15 02:23:05', 'Football', 'Protections', 'K', 'Riddell', 'Pocket Size', 'Seattle Seahawks', NULL, 24, 890, 'copia_cascoNi.webp', 1),
(204, '2023-10-15 02:23:05', 'Football', 'Protections', 'K', 'SCHUTT', 'F7 Collegiate', 'Seattle Seahawks', NULL, 13, 1239, 'copia_cascoNi2.webp', 1),
(205, '2023-11-20 18:34:57', 'Football', 'Protections', 'K', 'Riddell', 'Riddell K', 'Classic Icon ', NULL, 20, 1300, 'copia_D_NQ_NP_2X_604429-MLM49476740073_032022-F.webp', 1),
(206, '2023-10-15 02:23:05', 'Football', 'Protections', 'K', 'generic', 'Helmet protector', 'Ultralight', NULL, 25, 256, 'copia_cascoNi3.webp', 1),
(207, '2023-10-15 02:23:05', 'Football', 'Protections', 'K', 'seibertron', '2.0', ' Seibertron 2.0', NULL, 22, 1345, 'copia_ganNi.webp', 1),
(208, '2023-11-20 18:14:40', 'Soccer', 'Jerseys', 'M', 'Nike', 'Pumas jersey', 'Nike Dri-fit', 'l', 2, 1457, 'copia_man-4-j.webp', 2),
(209, '2023-11-20 18:14:22', 'Soccer', 'Jerseys', 'M', 'Nike', 'Pumas Atletico ', 'Atletico Madrid', 'xl', 11, 1499, 'copia_man-5.webp', 2),
(210, '2023-10-17 08:00:22', 'Soccer', 'Jerseys', 'M', 'Nike', 'Barcelona', ' Barca', 'Dri-fit', 8, 22, 'copia_man-7-j.webp', 2),
(211, '2023-11-20 18:16:08', 'Soccer', 'Jerseys', 'M', 'Nike', 'Liverpool M', 'Dri-fit', 'm', 7, 1499, 'copia_man-2-j.webp', 2),
(212, '2023-11-20 18:16:12', 'Soccer', 'Jerseys', 'M', 'Nike', 'Liverpool Visitor M', 'Dri-fit', 'm', 4, 1499, 'copia_man-6-j.webp', 2),
(214, '2023-10-17 07:56:52', 'Soccer', 'Jerseys', 'W', 'Nike', 'Academy', 'Dri-fit', 'm', 5, 479, 'copia_kids-3.webp', 2),
(216, '2023-10-17 06:30:32', 'Soccer', 'Jerseys', 'W', 'Nike', 'América', 'Dri-fit', 'm', 1, 1900, 'copia_woman-4.webp', 2),
(217, '2023-11-20 18:15:02', 'Soccer', 'Jerseys', 'W', 'Nike', 'América W', 'Dri-fit', 'l', 12, 1000, 'copia_woman-3.webp', 2),
(218, '2023-11-20 18:15:13', 'Soccer', 'Jerseys', 'W', 'Nike', 'Pumas W', 'Dri-fit', 's', 7, 1900, 'copia_woman-2.webp', 2),
(219, '2023-11-20 18:15:19', 'Soccer', 'Jerseys', 'W', 'Nike', 'Pumas jersey W', 'Strike', 's', 14, 630, 'copia_woman-1.webp', 2),
(220, '2023-11-20 18:15:30', 'Soccer', 'Jerseys', 'K', 'Nike', 'Nike France Jersey', ' Dri-fit', 'm', 7, 1049, 'copia_man-5.webp', 2),
(221, '2023-11-20 18:15:58', 'Soccer', 'Jerseys', 'K', 'Nike', 'Francia jersey', 'Local 2022 ', 'm', 9, 1049, 'copia_man-2-j.webp', 2),
(222, '2023-11-20 18:16:03', 'Soccer', 'Jerseys', 'K', 'Nike', 'América K', 'Dri-fit', 'l', 3, 1599, 'copia_kids-3.webp', 2),
(223, '2023-11-20 18:16:27', 'Soccer', 'Jerseys', 'K', 'Nike', 'Liverpool jersey K', 'Dri-fit', 's', 11, 1599, 'copia_kids-2.webp', 2),
(224, '2023-10-17 06:34:07', 'Soccer', 'Jerseys', 'K', 'Nike', 'Academy23', 'Dri-fit', 'xs', 22, 449, 'copia_kids-1.webp', 2),
(225, '2023-11-20 18:16:33', 'Soccer', 'Bottoms', 'M', 'Nike', 'DV9740-4512', 'Dri-fit', 'l', 1, 1049, 'copia_AtFucHombre.webp', 2),
(226, '2023-11-20 18:16:36', 'Soccer', 'Bottoms', 'M', 'Nike', 'DV9740-4513', 'DV9740-451', 'xl', 4, 1299, 'copia_AtFucHombre2.webp', 2),
(227, '2023-11-20 18:16:41', 'Soccer', 'Bottoms', 'M', 'Nike', 'DV9740-454', 'Dri-fit', 'm', 8, 1049, 'copia_AtFucHombre3.webp', 2),
(228, '2023-10-15 02:23:24', 'Soccer', 'Bottoms', 'M', 'Nike', 'DX0613-410', 'Nike Club', 'l', 22, 1599, 'copia_AtFucHombre4.webp', 2),
(229, '2023-10-15 02:23:24', 'Soccer', 'Bottoms', 'M', 'Nike', 'DX3679-410', 'Dri-fit', 's', 14, 1019, 'copia_AtFucHombre5.webp', 2),
(231, '2023-10-15 02:23:15', 'Soccer', 'Bottoms', 'W', 'Nike', 'CJ2661-010', 'Sportswear', 'm', 23, 799, 'copia_atFucMuj.webp', 2),
(232, '2023-10-15 02:23:15', 'Soccer', 'Bottoms', 'W', 'Nike', 'DX0128', ' Dri-fit', 's', 2, 1259, 'copia_atFucMuj2.webp', 2),
(233, '2023-10-15 02:23:15', 'Soccer', 'Bottoms', 'W', 'Nike', 'DQ6360-010', ' Dri-fit', 'l', 7, 1000, 'copia_atFucMuj3.webp', 2),
(234, '2023-11-20 18:16:52', 'Soccer', 'Bottoms', 'W', 'Nike', 'DQ6360-011', ' Dri-fit', 'xl', 13, 890, 'copia_atFucMuj4.webp', 2),
(235, '2023-10-15 02:23:15', 'Soccer', 'Bottoms', 'W', 'Nike', 'DV7222', ' Dri-fit', 's', 1, 1290, 'copia_atFucMuj5.webp', 2),
(236, '2023-10-15 02:23:05', 'Soccer', 'Bottoms', 'K', 'Nike', 'DM8218', ' Dri-fit', 'm', 7, 1101, 'copia_ab.webp', 2),
(237, '2023-10-15 02:23:05', 'Soccer', 'Bottoms', 'K', 'Nike', 'DM8086', ' Dri-fit', 'm', 7, 1000, 'copia_ab2.webp', 2),
(238, '2023-10-15 02:23:05', 'Soccer', 'Bottoms', 'K', 'Nike', 'DJ8749', ' Dri-fit', 'm', 12, 1489, 'copia_ab3.webp', 2),
(239, '2023-10-15 02:23:05', 'Soccer', 'Bottoms', 'K', 'Nike', 'FD1236-412', ' Dri-fit', 'm', 4, 1500, 'copia_ab4.webp', 2),
(240, '2023-10-15 02:23:05', 'Soccer', 'Bottoms', 'K', 'Nike', 'DV3118', ' Dri-fit', 'l', 17, 749, 'copia_ab5.webp', 2),
(242, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'A', 'yyyyyyyyyyyyyyyyy', 'a', 'a', NULL, 12, 12, 'copia_copia_sudaMuj.webp', 5),
(243, '2023-10-15 02:17:53', 'Basketball', 'Footwear', 'M', 'nike', 'LeBron NXXT Gen x Faze Clan', 'calzado de basquetbol color negro con rojo y blanco', '24-25.5', 122, 2399, 'copia_calH4.webp', 4),
(244, '2023-10-15 02:17:56', 'Basketball', 'Footwear', 'M', 'nike', 'nike fly.by mid 3', 'calzado de basquetbol color blanco con azul', '25.5-30', 12, 1349, 'copia_calH5.webp', 4),
(245, '2023-10-15 02:17:59', 'Basketball', 'Footwear', 'W', 'nike', 'nike elevate 3', 'calzado de basquetbol color rosa con blanco', '25-32', 30, 1679, 'copia_calM1.webp', 4),
(246, '2023-10-15 02:18:01', 'Basketball', 'Footwear', 'W', 'nike', 'nike fly.by 3', 'calzado de basquetbol color negro con blanco', '25-30.5', 372, 1799, 'copia_calM2.webp', 4),
(247, '2023-10-15 02:18:04', 'Basketball', 'Footwear', 'W', 'nike', 'giannis immortality 3 \"nigeria x greece\"', 'calzado de basquetbol color azul con blanco ', '25-27.5', 236, 2299, 'copia_calM3.webp', 4),
(248, '2023-10-15 02:18:06', 'Basketball', 'Footwear', 'W', 'nike', 'LeBron XX x Mimi Plange \"Ceremony\"', 'calzado de basquetbol color blanco con naranja', '25-32', 23, 6119, 'copia_calM4.webp', 4),
(249, '2023-10-15 02:18:09', 'Basketball', 'Footwear', 'W', 'nike', 'Nike G.T. Hustle 2', 'calzado de basquetbol color negro con rosa', '25-32', 235, 4299, 'copia_calM5.webp', 4),
(250, '2023-10-15 02:18:11', 'Basketball', 'Footwear', 'K', 'nike', 'Tatum 1 \"Old School\"', 'calzado de basquetbol color negro ', '22.5-25', 213, 1649, 'copia_calK1.webp', 4),
(251, '2023-11-20 18:35:11', 'Basketball', 'Footwear', 'K', 'nike', 'LeBron Witness 7 SE Nike K', 'calzado de basquetbol color rojo con naranja', '22.5-25', 26, 1799, 'copia_calK2.webp', 4),
(252, '2023-10-15 02:18:20', 'Basketball', 'Footwear', 'K', 'nike', 'Nike Team Hustle D 11', 'calzado de basquetbol color blanco con negro', '16.5-20', 268, 1304, 'copia_calK3.webp', 4),
(253, '2023-11-20 18:35:38', 'Basketball', 'Footwear', 'K', 'nike', 'LeBron Witness 10 SE Nike K ', 'calzado de basquetbol color rojo con naranja', '16.5-17', 123, 1899, 'copia_calK4.webp', 4),
(254, '2023-10-15 02:18:26', 'Basketball', 'Footwear', 'K', 'nike', 'LeBron Witness 7', 'calzado de basquetbol color rojo con blanco', '23.5', 19, 2199, 'copia_calK5.webp', 4),
(255, '2023-10-15 02:18:28', 'Basketball', 'Accessories', NULL, 'generica', 'Banda Deportiva Cabeza headband', 'headband con logo de la nba', NULL, 222, 219, 'copia_accsbsk1.webp', 4),
(256, '2023-10-15 02:19:47', 'Basketball', 'Accessories', NULL, 'nike', 'nike dri-fit-diadema con lazo para la cabeza', 'diadema con lazo para la cabeza color blanco con negro', NULL, 112, 175, 'copia_accsbsk2.webp', 4),
(257, '2023-10-15 02:19:50', 'Basketball', 'Accessories', NULL, 'adidas', 'Adidas Tenis Tie II Banda para Cabello', 'banda para cabello color negra', NULL, 125, 567, 'copia_accsbsk3.webp', 4),
(258, '2023-10-15 02:19:52', 'Basketball', 'Accessories', NULL, 'ozgyool', 'Rodillera para Deporte para Deportes al Aire Libre', 'par de rodilleras color engras', NULL, 12, 169, 'copia_accsbsk4.webp', 4),
(259, '2023-10-15 02:19:54', 'Basketball', 'Accessories', NULL, 'seasky', 'Bolsa Transporte Balón deportivo baloncesto', 'bolsa para balón de baloncesto', NULL, 33, 259, 'copia_accsbsk5.webp', 4),
(260, '2023-10-15 02:19:59', 'Basketball', 'Jerseys', 'M', 'Nike', 'New York Knicks Icon Edition 2022/23', 'Blue and orange basketball jersey', 'XS-XL', 24, 2335, 'copia_basket_man_1.webp', 4),
(261, '2023-10-15 02:20:02', 'Basketball', 'Jerseys', 'M', 'Nike', 'Chicago Bulls Icon Edition 2022/23', 'Red basketball jersey', 'XS-XL', 15, 2299, 'copia_basket_man_2.webp', 4),
(262, '2023-10-15 02:20:05', 'Basketball', 'Jerseys', 'M', 'Nike', 'Los Angeles Lakers Association Edition 2022/23', 'White basketball jersey', 'XS-XL', 30, 1599, 'copia_basket_man_3.webp', 4),
(263, '2023-10-15 02:20:08', 'Basketball', 'Jerseys', 'M', 'Nike', 'Milwaukee Bucks Statement Edition', 'Black basketball jersey', 'm-xl', 11, 1784, 'copia_basket_man_4.webp', 4),
(264, '2023-10-15 02:20:10', 'Basketball', 'Jerseys', 'M', 'Nike', 'Los Angeles Lakers Statement Edition', 'Purple basketball jersey', 'm-xl', 15, 2599, 'copia_basket_man_5.webp', 4),
(265, '2023-11-20 18:35:54', 'Basketball', 'Jerseys', 'W', 'Laifu', 'Customized jersey Laifu white', 'White and pink basketball jersey', 'm-xl', 20, 359, 'copia_basket_woman_1.webp', 4),
(266, '2023-11-20 18:36:08', 'Basketball', 'Jerseys', 'W', 'Laifu', 'Customized jersey Laifu multicolored', 'Multicolored basketball jersey', 'M-XL', 13, 359, 'copia_basket_woman_2.webp', 4),
(267, '2023-11-20 18:36:34', 'Basketball', 'Jerseys', 'W', 'Adidas', 'ADIDAS REVERSIBLE PRACTICE JERSEY BW', 'Black and white basketball jersey', 'M-XL', 13, 799, 'copia_basket_woman_3.webp', 4),
(268, '2023-11-20 18:36:16', 'Basketball', 'Jerseys', 'W', 'Laifu', 'Customized jersey Laifu BW', 'Black and white basketball jersey', 'M-XL', 15, 359, 'copia_basket_woman_4.webp', 4),
(269, '2023-11-20 18:36:39', 'Basketball', 'Jerseys', 'W', 'Adidas', 'ADIDAS REVERSIBLE PRACTICE JERSEY red', 'Red basketball jersey', 'M-XL', 20, 659, 'copia_basket_woman_5.webp', 4),
(270, '2023-10-15 02:20:28', 'Basketball', 'Jerseys', 'K', 'Generic', 'kobe bryant black jersey ', 'Black jersey Kobe\'s Edition', 'CH-XXL', 35, 359, 'copia_basket_kid_1.webp', 4),
(271, '2023-10-15 02:20:32', 'Basketball', 'Jerseys', 'K', 'Caiyoo', 'Space Jam Jordan Jersey', 'Tune Squad Jordan Jersey', 'CH-XXL', 15, 359, 'copia_basket_kid_2.webp', 4),
(272, '2023-10-15 02:20:34', 'Basketball', 'Jerseys', 'K', 'Zhwoop', 'Bulls  Jordan Jersey', 'Bulls basketball jersey with Jordan\'s number', 'CH-XXL', 23, 429, 'copia_basket_kid_3.webp', 4),
(273, '2023-10-15 02:20:37', 'Basketball', 'Jerseys', 'K', 'Zhwoop', 'Bugs Bunny Tune Squad Jersey Space Jam', 'Black basketball jersey with blue and orange', 'CH-XL', 7, 359, 'copia_basket_kid_4.webp', 4),
(274, '2023-10-15 02:20:41', 'Basketball', 'Jerseys', 'K', 'OTHERCRAZY', 'Space Jam Michael Jordan Tune Squad', 'Alternate Blue Jersey', 'CH-XL', 11, 329, 'copia_basket_kid_5.webp', 4),
(275, '2023-10-15 02:20:44', 'Basketball', 'Bottoms', 'M', 'Nike', 'Nike Icon', 'Red basketball shorts', 'S-L', 25, 199, 'copia_basket_bottom_man1.webp', 4),
(276, '2023-10-15 02:20:48', 'Basketball', 'Bottoms', 'M', 'Nike', 'NIKE DRI-FIT DNA', 'Black basketball shorts', 'S-l', 20, 250, 'copia_basket_bottom_man2.webp', 4),
(277, '2023-10-15 02:20:51', 'Basketball', 'Bottoms', 'M', 'Nike', 'NIKE DRI-FIT DNA+', 'White basketball shorts', 'S', 6, 399, 'copia_basket_bottom_man3.webp', 4),
(278, '2023-10-15 02:20:54', 'Basketball', 'Bottoms', 'M', 'Nike', 'BOSTON CELTICS COURTSIDE', 'Black and Green basketball shorts', 'S-L', 18, 250, 'copia_basket_bottom_man4.webp', 4),
(279, '2023-10-15 02:20:56', 'Basketball', 'Bottoms', 'M', 'Nike', 'NIKE STARTING 5', 'Black basketball shorts', 'S-L', 24, 150, 'copia_basket_bottom_man5.webp', 4),
(280, '2023-10-15 02:21:02', 'Basketball', 'Bottoms', 'W', 'Nike', 'NIKE SportX Shorts', 'White basketball shorts', 'XS-XL', 24, 199, 'copia_basket_bottom_woman1.webp', 4),
(281, '2023-10-15 02:21:05', 'Basketball', 'Bottoms', 'W', 'Nike', 'NIKE FLY CROSSSOVER', 'White basketball shorts', 'XS-XL', 24, 229, 'copia_basket_bottom_woman2.webp', 4),
(282, '2023-10-15 02:21:09', 'Basketball', 'Bottoms', 'W', 'Nike', 'Nike Sabrina Shorts', 'Pink basketball shorts', 'XS-XL', 24, 499, 'copia_basket_bottom_woman3.webp', 4),
(283, '2023-10-15 02:21:13', 'Basketball', 'Bottoms', 'W', 'Nike', 'Nike Tempo', 'Black basketball shorts with white', 'XS-XL', 30, 499, 'copia_basket_bottom_woman4.webp', 4),
(284, '2023-10-15 02:21:16', 'Basketball', 'Bottoms', 'W', 'Nike', 'NIKE DRI-FIT REPEL', 'white basketball shorts ', 'XS-XL', 25, 499, 'copia_basket_bottom_woman5.webp', 4),
(285, '2023-10-15 02:21:19', 'Basketball', 'Bottoms', 'K', 'Nike', 'NIKE Multi', 'Black basketball shorts ', 'XS-m', 16, 99, 'copia_basket_bottom_kid1.webp', 4),
(286, '2023-10-15 02:21:22', 'Basketball', 'Bottoms', 'K', 'Nike', 'NIKE DRI-FIT TROPHY23', 'Black basketball shorts ', 'XS-m', 13, 99, 'copia_basket_bottom_kid2.webp', 4),
(287, '2023-10-16 03:37:40', 'Basketball', 'Jerseys', 'M', 'Nike', 'NIKE FRI-FIT', 'Black basketball shorts ', 'XS-m', 13, 99, 'copia_basket_kid_4.webp', 4),
(288, '2023-10-15 02:21:28', 'Basketball', 'Bottoms', 'K', 'Nike', 'NIKE FRI-FUIT MULTI+', 'Black basketball shorts ', 'XS-m', 15, 159, 'copia_basket_bottom_kid5.webp', 4),
(289, '2023-10-15 02:21:31', 'Basketball', 'Balls', NULL, 'SPALDING', 'BALON SPALDING BASIC BLACK', 'Black basketball', 'XS-m', 21, 199, 'copia_basket_balls_1.webp', 4),
(290, '2023-10-15 02:21:34', 'Basketball', 'Balls', NULL, 'SPALDING', 'SPALDING ALL CONFERENCE INDOOR', 'Brown Basketball', NULL, 23, 239, 'copia_basket_balls_2.webp', 4),
(291, '2023-10-15 02:21:37', 'Basketball', 'Balls', NULL, 'MOLTEN', 'MOLTEN BASQUETBOL BGG5X', 'Orange Basketball', NULL, 17, 179, 'copia_basket_balls_3.webp', 4),
(292, '2023-10-15 02:21:41', 'Basketball', 'Balls', NULL, 'SPORTS', 'Official Basketball', 'Orange basketball', NULL, 10, 150, 'copia_basket_balls_5.webp', 4),
(293, '2023-11-20 18:36:52', 'Swimming', 'Footwear', 'M', 'Voit', 'vafw Voit', 'fsw', '29-33', 256, 1100, 'copia_Swimming_Footwear_Adults_Man1.webp', 5),
(294, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'M', 'breeze', 'bafw', 'fsw', '30-33', 125, 1256, 'copia_Swimming_Footwear_Adults_Man2.webp', 5),
(295, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'M', 'cressi', 'caft', 'fsw', '31-33', 268, 1400, 'copia_Swimming_Footwear_Adults_Man3.webp', 5),
(296, '2023-11-20 18:39:38', 'Swimming', 'Footwear', 'M', 'voit', 'vafw M ', 'fsw', '27-29', 245, 1678, 'copia_Swimming_Footwear_Adults_Man4.webp', 5),
(297, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'M', 'arena', 'aafw', 'fsw', '27-29', 245, 1567, 'copia_Swimming_Footwear_Adults_Woman1.webp', 5),
(298, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'W', 'voit', 'vamfw', 'fsw', '26-29', 143, 1678, 'copia_Swimming_Footwear_Adults_Woman2.webp', 5),
(299, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'W', 'cressi', 'cawfw', 'fsw', '26-29', 143, 1678, 'copia_Swimming_Footwear_Adults_Woman3.webp', 5),
(300, '2023-11-20 18:28:02', 'Swimming', 'Footwear', 'W', 'mares', 'mawfw mares', 'fsw', '26-29', 167, 1567, 'copia_Swimming_Footwear_Adults_Woman4.webp', 5),
(301, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'W', 'cressi', 'mawfw', 'fsw', '26-29', 334, 1346, 'copia_Swimming_Footwear_Adults_Woman5.webp', 5),
(302, '2023-11-20 18:37:09', 'Swimming', 'Footwear', 'W', 'mares', 'kfw mares', 'fsw', '26-29', 45, 1245, 'copia_Swimming_Footwear_Adults_Woman1.webp', 5),
(303, '2023-11-20 18:37:12', 'Swimming', 'Footwear', 'K', 'arena', 'kfw arena', 'fsw', '24-26', 142, 1567, 'copia_Swimming_Footwear_Kids1.webp', 5),
(304, '2023-11-20 18:37:23', 'Swimming', 'Footwear', 'K', 'escualo', 'ekfw escualo', 'fsw', '24-26', 167, 1245, 'copia_Swimming_Footwear_Kids2.webp', 5),
(305, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'K', 'tir', 'tkfw', 'fsw', '24-27', 234, 1567, 'copia_Swimming_Footwear_Kids4.webp', 5),
(306, '2023-11-20 18:37:18', 'Swimming', 'Footwear', 'K', 'arena', 'ekfw arena', 'fsw', '24-27', 178, 1245, 'copia_Swimming_Footwear_Kids3.webp', 5),
(307, '2023-10-15 22:53:27', 'Swimming', 'Footwear', 'K', 'arena', 'speedo', 'skfw', '23-27', 178, 1597, 'copia_Swimming_Footwear_Kids5.webp', 5),
(308, '2023-11-20 18:37:55', 'Swimming', 'Googles', 'A', 'arena', 'aag arena ', 'fsw', '23-27', 234, 1500, 'copia_Swimming_Googles_Adults1.webp', 5),
(309, '2023-11-20 18:38:10', 'Swimming', 'Googles', 'A', 'cressi', 'cag cressi', 'fsw', '23-27', 195, 1256, 'copia_Swimming_Googles_Adults2.webp', 5),
(310, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'A', 'cressi', 'cag', 'fsw', NULL, 256, 1700, 'copia_Swimming_Googles_Adults3.webp', 5),
(311, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'A', 'arena', 'aag', 'fsw', NULL, 256, 1300, 'copia_Swimming_Googles_Adults4.webp', 5),
(312, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'A', 'speedo', 'sag', 'fsw', NULL, 237, 1600, 'copia_Swimming_Googles_Adults5.webp', 5),
(313, '2023-11-20 18:37:37', 'Swimming', 'Googles', 'K', 'speedo', 'akg speedo', 'fsw', NULL, 144, 1466, 'copia_Swimming_Googles_Kids1.webp', 5),
(314, '2023-11-20 18:27:49', 'Swimming', 'Googles', 'K', 'arena', 'akwg arena', 'fsw', NULL, 155, 1244, 'copia_Swimming_Googles_Kids2.webp', 5),
(315, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'K', 'arena', 'akwg', 'fsw', NULL, 63, 1345, 'copia_Swimming_Googles_Kids3.webp', 5),
(316, '2023-11-20 18:37:41', 'Swimming', 'Googles', 'K', 'mares', 'akg mares', 'fsw', NULL, 124, 1453, 'copia_Swimming_Googles_Kids4.webp', 5),
(317, '2023-10-15 22:53:27', 'Swimming', 'Googles', 'K', 'cressi', 'akjrg', 'fsw', NULL, 125, 1455, 'copia_Swimming_Googles_Kids5.webp', 5),
(318, '2023-10-15 22:53:27', 'Swimming', 'Accessories', NULL, 'swf', 'swft', 'fsw', NULL, 256, 500, 'copia_Swimming_Accesories1.webp', 5),
(319, '2023-10-15 22:53:27', 'Swimming', 'Accessories', NULL, 'arena', 'ata', 'fsw', NULL, 432, 600, 'copia_Swimming_Accesories2.webp', 5),
(320, '2023-10-15 22:53:27', 'Swimming', 'Accessories', NULL, 'speedo', 'sta', 'fsw', NULL, 245, 700, 'copia_Swimming_Accesories3.webp', 5),
(321, '2023-10-15 22:53:27', 'Swimming', 'Accessories', NULL, 'escualo', 'ant', 'fsw', NULL, 456, 890, 'copia_Swimming_Accesories4.webp', 5),
(322, '2023-10-15 22:53:27', 'Swimming', 'Accessories', NULL, 'arena', 'easc', 'fsw', NULL, 234, 678, 'copia_Swimming_Accesories5.webp', 5),
(323, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'M', 'escualo', 'emms', 'fsw', '32-35', 567, 1500, 'copia_Swimming_Swimsuit_Adult_Man1.webp', 5),
(324, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'M', 'speedo', 'smss', 'fsw', '32-35', 254, 1700, 'copia_Swimming_Swimsuit_Adult_Man2.webp', 5),
(325, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'M', 'nasjac', 'nmms', 'fsw', '32-35', 258, 1467, 'copia_Swimming_Swimsuit_Adult_Man3.webp', 5),
(326, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'M', 'hydros', 'hmss', 'fsw', '32-35', 258, 1256, 'copia_Swimming_Swimsuit_Adult_Man4.webp', 5),
(327, '2023-11-20 18:27:34', 'Swimming', 'Swimsuit', 'M', 'aquazone', 'awss fsw', 'fsw', '33-36', 167, 1652, 'copia_Swimming_Swimsuit_Adult_Man5.webp', 5),
(328, '2023-11-20 18:27:27', 'Swimming', 'Swimsuit', 'W', 'hydros', 'awss hydro', 'fsw', '32-33', 125, 1785, 'copia_Swimming_Swimsuit_Adult_Woman1.webp', 5),
(329, '2023-11-20 18:27:05', 'Swimming', 'Swimsuit', 'W', 'aquazone', 'awss aqua', 'fsw', '32-33', 125, 1785, 'copia_Swimming_Swimsuit_Adult_Woman2.webp', 5),
(330, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'W', 'best', 'bwss', 'fsw', '33-34', 165, 1676, 'copia_Swimming_Swimsuit_Adult_Woman3.webp', 5),
(331, '2023-11-20 18:27:11', 'Swimming', 'Swimsuit', 'W', 'arena', 'awss arena', 'fsw', '32-35', 123, 1789, 'copia_Swimming_Swimsuit_Adult_Woman4.webp', 5),
(332, '2023-10-15 22:53:27', 'Swimming', 'Swimsuit', 'W', 'general', 'gkss', 'fsw', '30-33', 265, 1256, 'copia_Swimming_Swimsuit_Adult_Woman5.webp', 5),
(333, '2023-11-20 18:26:58', 'Swimming', 'Swimsuit', 'K', 'sport', 'skss sport', 'fsw', '25-27.5', 123, 1456, 'copia_Swimming_Swimsuit_Kids1.webp', 5),
(334, '2023-11-20 18:26:54', 'Swimming', 'Swimsuit', 'K', 'speedo', 'skss speedo', 'fsw', '25-27.5', 165, 1254, 'copia_Swimming_Swimsuit_Kids2.webp', 5),
(335, '2023-11-20 18:26:50', 'Swimming', 'Swimsuit', 'K', 'arena', 'akss arena', 'fsw', '23-26', 256, 1647, 'copia_Swimming_Swimsuit_Kids3.webp', 5),
(336, '2023-11-20 18:40:04', 'Swimming', 'Swimsuit', 'K', 'voit', 'vafw K', 'fsw', '22-27', 156, 1432, 'copia_Swimming_Swimsuit_Kids4.webp', 5),
(337, '2023-11-20 18:38:57', 'Swimming', 'Swimsuit', 'K', 'breezee', 'bafw breezee', 'fsw', '24-27', 261, 1253, 'copia_Swimming_Swimsuit_Kids5.webp', 5),
(338, '2023-10-16 01:35:28', 'Soccer', 'Accessories', NULL, 'ETRAVEL', 'Rebounder net', 'Rebound net, 62 x 62 cm', NULL, 40, 1359, 'copia_accesoccer5.webp', 2),
(339, '2023-10-16 02:00:47', 'Soccer', 'Accessories', NULL, 'Intrepid', 'Intrepid ball bag', 'Soccer ball bag  for 8 balls', NULL, 22, 210, 'copia_accesoccer3.webp', 2);
INSERT INTO `products` (`id_product`, `date`, `category`, `product_type`, `section`, `mark`, `name`, `description`, `size`, `stock`, `price`, `image`, `provider_key`) VALUES
(340, '2023-11-20 18:38:35', 'Soccer', 'Accessories', NULL, 'Nike', 'Training Cones Soccer', 'Pack of 10 training cones', NULL, 25, 349, 'copia_accesoccer.webp', 2),
(341, '2023-10-16 03:22:28', 'Football', 'Accessories', NULL, 'Public Sports', 'Sports Flag Football Belt', 'Waist Football bands', '', 14, 259, 'copia_accesAmericano.webp', 1),
(342, '2023-10-16 03:22:32', 'Football', 'Accessories', NULL, 'Generic', 'Quickfreeze', 'Knee Protection', '', 16, 200, 'copia_accesAmericano3.webp', 1),
(343, '2023-10-16 03:22:36', 'Football', 'Accessories', NULL, 'Nerias', 'Nerias Belt and buckle', 'Flag Belt for American Football Flag Nerias', NULL, 11, 159, 'copia_accesAmericano5.webp', 1),
(344, '2023-10-16 03:22:39', 'Football', 'Accessories', NULL, 'GoSports', 'Football Holder stick', 'Universal Metal Support Stand', NULL, 9, 359, 'copia_accesAmericano2.webp', 1),
(345, '2023-11-20 18:38:39', 'Football', 'Accessories', NULL, 'Nike', 'Training Cones Football', 'Pack of 10 training cones', '', 24, 349, 'copia_accesAmericano4.webp', 1),
(346, '2023-11-20 18:26:40', 'Baseball', 'Bottoms', 'M', 'RAWLINGS', 'Man Baseball pants white M', 'White Baseball Pants', 'CH-2XL', 16, 704, 'copia_baseball_bottom_man_1.webp', 6),
(347, '2023-11-20 18:26:35', 'Baseball', 'Bottoms', 'M', 'UNDER ARMOUR', 'Man Baseball pants grey M', 'Gray/Black Baseball Pants', 'CH-g', 10, 630, 'copia_baseball_bottom_man_2.webp', 6),
(348, '2023-11-20 18:26:29', 'Baseball', 'Bottoms', 'M', 'RAWLINGS', 'Man Baseball pants graphite M', 'Graphite Baseball Pants', 'm-L', 12, 559, 'copia_baseball_bottom_man_3.webp', 6),
(349, '2023-11-20 18:26:21', 'Baseball', 'Bottoms', 'M', 'RAWLINGS', 'Man Baseball pants Raw black', 'Black Baseball Pants', 'CH-2XL', 5, 359, 'copia_baseball_bottom_man_4.webp', 6),
(350, '2023-11-20 18:26:15', 'Baseball', 'Bottoms', 'M', 'RAWLINGS', 'Man Baseball pants Raw M', 'Gray/Royal Blue Baseball Pants', 'CH-XL', 8, 599, 'copia_baseball_bottom_man_5.webp', 6),
(351, '2023-11-20 18:26:05', 'Baseball', 'Bottoms', 'W', 'ALLESON AHTLETIC', 'Woman Baseball pants Alle black', 'Black basketball shorts ', 'XS-XL', 18, 559, 'copia_baseball_bottom_woman_1.webp', 6),
(352, '2023-11-20 18:25:43', 'Baseball', 'Bottoms', 'W', 'RAWLINGS', 'Woman Baseball pants Raw grey W', 'Gray basketball shorts ', 'CH-G', 14, 559, 'copia_baseball_bottom_woman_2.webp', 6),
(353, '2023-11-20 18:25:34', 'Baseball', 'Bottoms', 'W', 'RAWLINGS', 'Woman Baseball pants black W', 'Black basketball shorts ', 'CH-G', 9, 700, 'copia_baseball_bottom_woman_3.webp', 6),
(354, '2023-11-20 18:25:29', 'Baseball', 'Bottoms', 'W', 'RAWLINGS', 'Woman Baseball pants grey W', 'Gray basketball shorts ', 'XS-XL', 16, 559, 'copia_baseball_bottom_woman_4.webp', 6),
(355, '2023-11-20 18:25:23', 'Baseball', 'Bottoms', 'W', 'ALLESON AHTLETIC', 'Woman Baseball pants blue W', 'Blue basketball shorts ', 'M-XL', 8, 400, 'copia_baseball_bottom_woman_5.webp', 6),
(356, '2023-11-20 18:25:10', 'Baseball', 'Bottoms', 'K', 'UNDER ARMOUR', 'Kid Baseball pants aluminum K', 'Aluminum Baseball Pants', 'M-XL', 10, 400, 'copia_baseball_bottom_kid_2.webp', 6),
(357, '2023-11-20 18:25:01', 'Baseball', 'Bottoms', 'K', 'UNDER ARMOUR', 'Kid Baseball pants black K', 'Black Baseball Pants', 'M-XL', 13, 400, 'copia_baseball_bottom_kid_3.webp', 6),
(358, '2023-11-20 18:24:55', 'Baseball', 'Bottoms', 'K', 'RAWLINGS', 'Kid Baseball pants Raw white', 'White Baseball Pants', 'XS-XL', 20, 299, 'copia_baseball_bottom_kid_4.webp', 6),
(359, '2023-11-20 18:24:46', 'Baseball', 'Bottoms', 'K', 'RAWLINGS', 'Kid Baseball pants grey K', 'Gray Baseball Pants', 'XS-XL', 19, 249, 'copia_baseball_bottom_kid_5.webp', 6),
(360, '2023-11-20 18:24:41', 'Baseball', 'Bottoms', 'K', 'UNDER ARMOUR', 'Kid Baseball pants white K', 'White Baseball Pants', 'S-L', 12, 479, 'copia_baseball_bottom_kid_1.webp', 6),
(361, '2023-11-20 18:24:31', 'Soccer', 'Jerseys', 'M', 'Nike', 'Barcelona jersey M', 'Playera Barca', 'S', 8, 1900, 'copia_man-1.webp', 1),
(384, '2023-11-21 06:02:09', 'Baseball', 'Accessories', NULL, 'ppppp', 'pppp', 'pppp', NULL, 5, 5000, 'copia_battleship.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_orders`
--

CREATE TABLE `product_orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_orders`
--

INSERT INTO `product_orders` (`id_order`, `id_product`, `quantity`, `status`, `date`) VALUES
(47, 1, 1, 2, '2023-11-21 05:03:07'),
(48, 1, 5, 2, '2023-11-21 05:04:09'),
(50, 1, 5, 2, '2023-11-21 06:30:10'),
(51, 153, 5, 0, '2023-11-21 05:13:02'),
(52, 153, 5, 0, '2023-11-21 14:16:28'),
(53, 112, 5, 1, '2023-11-21 06:25:19'),
(54, 1, 5, 0, '2023-11-21 06:31:56'),
(55, 1, 5, 2, '2023-11-21 06:34:31'),
(56, 1, 5, 0, '2023-11-21 07:36:55'),
(57, 153, 5, 1, '2023-11-21 07:51:57'),
(58, 212, 5, 1, '2023-11-21 07:53:01'),
(59, 152, 5, 1, '2023-11-21 08:05:07'),
(60, 152, 5, 1, '2023-11-21 08:09:20'),
(61, 26, 5, 1, '2023-11-21 08:14:08'),
(62, 26, 5, 1, '2023-11-21 08:14:44'),
(63, 26, 5, 1, '2023-11-21 08:15:57'),
(64, 23, 5, 1, '2023-11-21 08:17:19'),
(65, 23, 5, 1, '2023-11-21 08:18:08'),
(66, 308, 5, 1, '2023-11-21 08:18:48'),
(67, 263, 5, 1, '2023-11-21 08:19:25'),
(68, 263, 5, 1, '2023-11-21 08:20:04'),
(69, 283, 5, 1, '2023-11-21 08:21:52'),
(70, 283, 5, 1, '2023-11-21 08:22:16'),
(71, 283, 5, 1, '2023-11-21 08:22:45'),
(72, 112, 5, 1, '2023-11-21 13:48:39'),
(73, 152, 5, 1, '2023-11-21 14:15:09'),
(74, 2, 16, 2, '2023-11-21 14:26:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `provider_key` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `phone_number` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`provider_key`, `name`, `lastname`, `email`, `domicile`, `phone_number`) VALUES
(1, 'Esteban Daniel', 'Mancilla Lozoya', 'emancillalozoya@gmail.com', 'Av. Dolores Hidalgo', 3141008325),
(2, 'Hector Daniel', 'Martinez Figueroa', 'hmartinez10@ucol.mx', 'barrio 5', 3141669964),
(3, 'Diego Danae', 'Gomez Heredia', 'dgomez6@ucol.mx', 'La joya 2', 3141438346),
(4, 'Leonardo Daniel', 'Guerrero Gonzalez', 'dgonzalez5@ucol.mx', 'Av. Dolores Hidalgo', 3141399474),
(5, 'Marco Antonio', 'Garcia Gamez', 'marco5@ucol.mx', 'Barrio 4', 3143574448),
(6, 'Fernando', 'Uribe Trujillo', 'fernando6@ucol.mx', 'Barrio 5', 3141642765),
(18, 'x', 'x', 'emancillalozoya@gmail.co', 'zzz', 1555555544);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`role_name`) VALUES
('Administrator'),
('Editor'),
('User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `section` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`section`) VALUES
('A'),
('K'),
('M'),
('W');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `types` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`types`) VALUES
('Accessories'),
('Balls'),
('Bats'),
('Bottoms'),
('Clothes'),
('Footwear'),
('Googles'),
('Jerseys'),
('Protections'),
('Rackets'),
('Swimsuit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `employee_key` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_birthdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `access_level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `registration_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `employee_key`, `name`, `lastname`, `user_birthdate`, `password`, `email`, `phone_number`, `role_name`, `access_level`, `status`, `registration_date`, `image`) VALUES
(1, 20231030, 'Esteban Daniel', 'Mancilla Lozoya', '2004-02-14', '$2y$10$Rg4I9CooKtYEKvmzVSoUVuRGscNYnag9nTfLGMYx.6YwHGqXqSRGu', 'emancilla5@ucol.mx', 3141008320, 'Administrator', 1, 1, '2023-11-01', 'user_profile_cali.webp'),
(54, 20236229, 'Hector Daniel', 'Martinez Figueroa', '2004-01-03', '$2y$10$EE8ofQ5Isy/pnC4Pm3Ksl.SCLsI56bUNsJgKtTmx/MHU4fsR8lSCm', 'hmartinez10@ucol.mx', 3141477897, 'Editor', 2, 1, '2023-11-02', 'default.webp'),
(55, 20234049, 'Diego Danae', 'Gomez Heredia', '2004-04-17', '$2y$10$e050m/ZYcSiLu.ha0aJLyObuMpWItGEf10Z4DfIfMHu7oW/SYVOW.', 'dgomez41@ucol.mx', 3143461246, 'Editor', 3, 1, '2023-11-10', 'default.webp'),
(56, 20233187, 'Fernando', 'Uribe Trujillo', '2001-05-30', '$2y$10$U6cKtteS4gxT1FELtL73B.ASB39BnvdRDf3hOOfUCMJxWa1gwBaR2', 'feruribe@ucol.mx', 3144787973, 'User', 4, 1, '2023-11-06', 'default.webp'),
(57, 20233812, 'Marco Antonio', 'Garcia Gamez', '2000-08-30', '$2y$10$hmVeETYF.WIY.Ek/u31lv.7RS2rVIcncouUzvG4JKXBbsK6F8mnYu', 'marco6@ucol.mx', 3148987245, 'User', 4, 0, '2023-11-03', 'default.webp'),
(58, 20234849, 'Leonardo Daniel', 'Guerrero Gonzalez', '2000-06-20', '$2y$10$29z9O2ntyw9gAuqzqUU.DOtJaYzkm0Lxf85tpirbhg1uik3rSt5lG', 'dgonzalez5@ucol.mx', 3141399474, 'User', 4, 1, '2023-11-20', 'default.webp'),
(80, 20235127, 'Esteban Daniel', 'Mancilla Lozoya', '2004-02-14', '$2y$10$1abmRFJfMjEXgd8Imtr.Tu4KMI9ZIVYJtC/iZAFkQbpHET40eltBu', 'emancillalozoya@gmail.com', 3141414165, 'User', 4, 1, '2023-11-21', 'default.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log_orders`
--
ALTER TABLE `activity_log_orders`
  ADD PRIMARY KEY (`id_log_order`),
  ADD KEY `fk_user_action_order` (`id_user`) USING BTREE,
  ADD KEY `fk_affected_order` (`id_order`);

--
-- Indices de la tabla `activity_log_products`
--
ALTER TABLE `activity_log_products`
  ADD PRIMARY KEY (`id_log_product`),
  ADD KEY `fk_user_action_product` (`id_user`) USING BTREE,
  ADD KEY `fk_affected_product` (`id_product`) USING BTREE;

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categories`);

--
-- Indices de la tabla `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id_code`),
  ADD UNIQUE KEY `unique_code` (`code`) USING BTREE,
  ADD KEY `fk_user_code` (`id_user`) USING BTREE;

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_id_provider` (`id_provider`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_category` (`category`),
  ADD KEY `fk_prod_type` (`product_type`),
  ADD KEY `fk_provider_key` (`provider_key`),
  ADD KEY `fk_section` (`section`);

--
-- Indices de la tabla `product_orders`
--
ALTER TABLE `product_orders`
  ADD KEY `fk_id_order` (`id_order`),
  ADD KEY `fk_id_product` (`id_product`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_key`),
  ADD UNIQUE KEY `unique_provider_email` (`email`),
  ADD UNIQUE KEY `unique_provider_phone_number` (`phone_number`) USING BTREE;

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_name`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`types`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `unique_email` (`email`) USING BTREE,
  ADD UNIQUE KEY `unique_employee_key` (`employee_key`) USING BTREE,
  ADD UNIQUE KEY `unique_phone_number` (`phone_number`) USING BTREE,
  ADD KEY `fk_permission` (`access_level`) USING BTREE,
  ADD KEY `fk_role_name` (`role_name`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_log_orders`
--
ALTER TABLE `activity_log_orders`
  MODIFY `id_log_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `activity_log_products`
--
ALTER TABLE `activity_log_products`
  MODIFY `id_log_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `code`
--
ALTER TABLE `code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `provider_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity_log_orders`
--
ALTER TABLE `activity_log_orders`
  ADD CONSTRAINT `fk_affected_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_action_product` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `activity_log_products`
--
ALTER TABLE `activity_log_products`
  ADD CONSTRAINT `fk_affected_object` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_action` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `fk_user_code` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_provider` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`provider_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `category` (`categories`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_type` FOREIGN KEY (`product_type`) REFERENCES `type` (`types`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_provider_key` FOREIGN KEY (`provider_key`) REFERENCES `providers` (`provider_key`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section`) REFERENCES `section` (`section`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `fk_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_permissions` FOREIGN KEY (`access_level`) REFERENCES `permission` (`id_permission`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_name`) REFERENCES `role` (`role_name`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
