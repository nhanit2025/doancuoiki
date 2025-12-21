-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2025 lúc 11:43 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `aw_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `adname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ad_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `adname`, `password`, `ad_status`) VALUES
(1, 'admin', 'admin@112\r\n', 0),
(2, 'hanguyen', '123@', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_category`, `name`, `thutu`) VALUES
(8, 'Polo', 1),
(9, 'Áo Phông', 2),
(10, 'Váy', 3),
(11, 'Sơmi', 4),
(12, 'Quần', 5),
(13, 'Áo Khoác', 6),
(14, 'Mũ', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(12,2) NOT NULL,
  `status` enum('Đang xử lí','Đang giao','Hoàn tất','Hủy') NOT NULL DEFAULT 'Đang xử lí',
  `payment_method` varchar(50) DEFAULT 'COD',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(250) NOT NULL,
  `code_product` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `name_product`, `code_product`, `price`, `quantity`, `description`, `id_category`) VALUES
(13, 'POLO | Sọc ngang | Đỏ', 'P01', '200000', 20, 'Phong cách: Tươi sáng & năng động\r\n\r\nÁo polo tay ngắn có cổ với họa tiết sọc ngang màu sắc tươi vui.', 8),
(19, 'SƠ MI | Cộc tay trơn | Nâu', 'S01', '200000', 15, 'CHẤT LIỆU: Vải chéo 100% cotton\r\n\r\nSản phẩm: Áo sơ mi ngắn tay\r\n\r\nMàu sắc: Nâu đậm', 11),
(20, 'JACKET | Zip', 'J01', '500000', 20, 'Phong cách thường ngày: Thời trang sành điệu\r\n\r\nÁo khoác có khóa kéo được làm từ vải cotton twill.', 13),
(21, 'VÁY | Jeans', 'V001', '500000', 23, 'Chất liệu: Jeans\r\nSize: FreeSize', 10),
(22, 'Quần Kaki', 'Q01', '200000', 34, 'Chất liêu: Kaki\r\n Size: 49-55kg', 12),
(23, 'Áo Phông| Home', 'A001', '200000', 34, 'Chất liệu cotton\r\nOversize', 9),
(24, 'Áo Phông| AW', 'A002', '200000', 50, 'Chất liệu cotton\r\nOversize\r\nChữ ALWALsWONDER', 9),
(25, 'Mũ Lưỡi Trai', 'M01', '100000', 20, 'Chất liệu Jeans thoáng mát', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `id_image` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`id_image`, `id_product`, `image`) VALUES
(1, 13, '1766125999_PoloRed.webp'),
(2, 13, '1766125999_PoloRed1.webp'),
(3, 13, '1766125999_PoloRedsize.webp'),
(22, 19, '1766312904_somin1.webp'),
(23, 19, '1766312904_somin2.webp'),
(24, 19, '1766312904_sominin4.webp'),
(25, 20, '1766313145_jacketn1.webp'),
(26, 20, '1766313145_jacketn2.webp'),
(27, 20, '1766313145_jacketnin4.webp'),
(28, 21, '1766313307_vayj1.webp'),
(29, 21, '1766313307_vayj2.webp'),
(30, 21, '1766313307_vayjin4.jpg'),
(31, 22, '1766313389_quanb1.webp'),
(32, 22, '1766313389_quanb2.webp'),
(33, 22, '1766313389_quanbin4.webp'),
(34, 23, '1766313488_ptrangh1.webp'),
(35, 23, '1766313488_ptrangh2.webp'),
(36, 23, '1766313488_ptranghin4.webp'),
(37, 24, '1766313655_tee0.webp'),
(38, 24, '1766313655_tee1.webp'),
(39, 24, '1766313655_teein4.jpg'),
(40, 25, '1766313774_mux1.webp'),
(41, 25, '1766313774_mux2.webp'),
(42, 25, '1766313774_muxin4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name_user`, `email`, `u_password`, `phone`, `address`) VALUES
(4, 'hanguyen', 'User3@gmail.com', '123@', '34342435434', 'Đà Nẵng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_products_categories` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_orders` (`id_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD CONSTRAINT `tbl_product_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
