-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 06, 2020 lúc 09:08 AM
-- Phiên bản máy phục vụ: 5.7.28-0ubuntu0.18.04.4
-- Phiên bản PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  `toppings` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `toppings`) VALUES
(3, 'ww', 766, 'dddddd'),
(4, 'manddi', 44, 'jdeee'),
(5, 'manddi', 44, 'jdeee'),
(6, 'gg', 444, 'dd'),
(7, 'dcfff', 2, 'xdd'),
(8, 'Ca', 44, 're'),
(9, 'cuong11', 2, 'xdd'),
(10, 'cuong11', 2, 'xdd'),
(11, 'cuong11', 2, 'xdd'),
(12, 'cuong11', 2, 'xdd'),
(13, 'cuong11', 2, 'xdd'),
(14, 'cuong11', 2, 'xdd'),
(15, 'cuong11', 2, 'xdd'),
(16, 'dd', 123, '213'),
(17, 'dd', 123, '213'),
(18, '1', 213, '212'),
(20, 'cumeo', 44, 'eeeee'),
(22, '12321asdasd', 123, '123adasda'),
(23, '12321asdasd', 123, '123adasda'),
(24, '12321asdasd', 123, '123adasda'),
(25, '12321asdasd', 123, '123adasda'),
(26, 'ggg', 4444, 'wwwwwwww'),
(28, 'tttttttttt', 6676, 'dhdhdh'),
(29, 'tttttttttt', 6676, 'dhdhdh'),
(30, 'tttttttttt', 6676, 'dhdhdh'),
(31, 'tttttttttt', 6676, 'dhdhdh'),
(35, 'rr', 444, 'd'),
(36, 'rr', 444, 'd'),
(37, 'rr', 444, 'd'),
(38, 'rr', 444, 'd'),
(39, 'rr', 444, 'd'),
(40, 'rr', 444, 'd'),
(41, 'rr', 444, 'd'),
(42, 'rr', 444, 'd'),
(43, 'nhan', 445, 'cafe, tu'),
(44, 'dddddddddddd', 66666, 'frrrrrrrrrrrr'),
(45, 'CanhChuoi', 333, 'muoi'),
(46, 'Royal Milk Tea', 5, 'Milk foam,white pearl'),
(47, 'Carot', 766, 'fff'),
(48, 'Khoai Mon', 44, 'rrrrrrr'),
(50, 'fff', 44444444, 'ff'),
(51, 'Royal Milk Tea', 56, 'Milk foam, white pearl'),
(52, 'Green Milk Tea', 4, 'pearl'),
(53, 'Oolong Milk Tea', 23, 'Pearl, milk foam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storeProducts`
--

CREATE TABLE `storeProducts` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `storeProducts`
--

INSERT INTO `storeProducts` (`id`, `shop_id`, `product_id`) VALUES
(11, 2, 35),
(12, 2, 36),
(13, 2, 37),
(14, 2, 38),
(15, 2, 39),
(16, 2, 40),
(17, 2, 41),
(18, 2, 42),
(21, 1, 45),
(23, 1, 47),
(24, 1, 48),
(26, 1, 50),
(28, 10, 51),
(29, 10, 52),
(30, 9, 53);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `name`) VALUES
(1, 'LeeTee'),
(2, 'Gongcha'),
(9, 'Tocotoco'),
(10, 'Ding Tea');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `storeProducts`
--
ALTER TABLE `storeProducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_p_sp` (`product_id`),
  ADD KEY `fk_s_sp` (`shop_id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT cho bảng `storeProducts`
--
ALTER TABLE `storeProducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `storeProducts`
--
ALTER TABLE `storeProducts`
  ADD CONSTRAINT `fk_p_sp` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s_sp` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp_s` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `storeProducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `storeProducts_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk_5` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk_6` FOREIGN KEY (`shop_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeProducts_ibfk_7` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
