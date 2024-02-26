-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 26, 2024 lúc 07:59 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `init`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Gọng kính'),
(2, 'Kính mát');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `start_day` date NOT NULL DEFAULT current_timestamp(),
  `end_day` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `discount_percent`, `start_day`, `end_day`) VALUES
(111, 'Khai Xuân', 15, '2024-01-01', '2024-01-31'),
(112, 'Chào Hè', 20, '2024-06-01', '2024-08-31'),
(113, 'Sale to cuối năm ', 50, '2024-10-01', '2024-12-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_items`
--

CREATE TABLE `discount_items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_items`
--

INSERT INTO `discount_items` (`id`, `category_id`, `discount_id`) VALUES
(1, 1, 111),
(2, 1, 112),
(3, 1, 113),
(4, 2, 111),
(5, 2, 112),
(6, 2, 113);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imports`
--

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `import_date` date NOT NULL DEFAULT current_timestamp(),
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `imports`
--

INSERT INTO `imports` (`id`, `user_id`, `import_date`, `total_price`) VALUES
(1, 2, '2024-02-25', 14900000),
(2, 2, '2024-02-25', 12900000),
(3, 2, '2024-02-25', 13900000),
(4, 2, '2024-02-25', 11880000),
(5, 2, '2024-02-26', 23500000),
(6, 2, '2024-02-26', 10800000),
(7, 2, '2024-02-26', 13900000),
(8, 2, '2024-02-27', 9900000),
(9, 2, '2024-02-27', 15540000),
(10, 2, '2024-02-27', 13000000),
(11, 2, '2024-02-28', 17500000),
(12, 2, '2024-02-28', 7500000),
(13, 2, '2024-02-29', 7250000),
(14, 2, '2024-02-29', 12250000),
(15, 2, '2024-02-29', 7250000),
(16, 2, '2024-03-01', 9900000),
(17, 2, '2024-03-01', 14900000),
(18, 2, '2024-03-01', 14900000),
(19, 2, '2024-03-02', 9400000),
(20, 2, '2024-03-02', 8900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_items`
--

CREATE TABLE `import_items` (
  `id` int(11) NOT NULL,
  `import_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `import_items`
--

INSERT INTO `import_items` (`id`, `import_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 5, 1490000),
(2, 2, 2, 5, 1290000),
(3, 3, 3, 5, 1390000),
(4, 4, 4, 6, 1188000),
(5, 5, 5, 10, 23500000),
(6, 6, 6, 4, 10800000),
(7, 7, 7, 5, 13900000),
(8, 8, 8, 5, 9900000),
(9, 9, 9, 5, 15540000),
(10, 10, 10, 5, 13000000),
(11, 11, 11, 5, 17500000),
(12, 12, 12, 5, 7500000),
(13, 13, 13, 5, 7250000),
(14, 14, 14, 5, 12250000),
(15, 15, 15, 5, 7250000),
(16, 16, 16, 5, 9900000),
(17, 17, 17, 5, 14900000),
(18, 18, 18, 5, 14900000),
(19, 19, 19, 5, 9400000),
(20, 20, 20, 5, 8900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_price`) VALUES
(1, 7, '2024-02-26 15:20:24', 2580000),
(2, 9, '2024-02-26 16:24:37', 1980000),
(3, 8, '2024-02-27 09:21:09', 2590000),
(4, 10, '2024-02-27 11:34:16', 7000000),
(5, 14, '2024-02-28 14:37:06', 4350000),
(6, 13, '2024-02-28 16:29:06', 5960000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, 2580000),
(2, 2, 4, 1, 1980000),
(3, 3, 9, 1, 2590000),
(4, 4, 11, 2, 7000000),
(5, 5, 13, 3, 1450000),
(6, 6, 1, 2, 2980000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `method_id` int(11) DEFAULT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `method_id`, `payment_date`, `total_price`) VALUES
(1, 1, 1, '2024-02-26 15:21:31', 2580000),
(2, 2, 1, '2024-02-26 16:25:31', 1980000),
(3, 3, 2, '2024-02-27 09:21:31', 2590000),
(4, 4, 2, '2024-02-27 11:35:31', 7000000),
(5, 5, 1, '2024-02-28 14:37:31', 4350000),
(6, 6, 2, '2024-02-28 16:29:31', 5960000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `method_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_name`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `points_used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `points`
--

INSERT INTO `points` (`id`, `user_id`, `transaction_date`, `points_earned`, `points_used`) VALUES
(1, 7, '2024-02-26 15:21:31', 258, 0),
(2, 9, '2024-02-26 16:25:31', 198, 0),
(3, 8, '2024-02-27 09:21:31', 259, 0),
(4, 10, '2024-02-27 11:35:31', 700, 0),
(5, 14, '2024-02-28 14:37:31', 435, 0),
(6, 13, '2024-02-28 16:29:31', 596, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `gender` varchar(11) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','soldout','banned') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `category_id`, `image`, `gender`, `price`, `description`, `status`) VALUES
(1, 'moriyama', 1, 'moriyama.webp', 'Men', 2980000, 'Vuông-Chữ Nhật', 'active'),
(2, 'Graph Belle', 1, 'Graph Belle.webp', 'Women', 2580000, 'Đa giác', 'active'),
(3, 'AIR FIT', 1, 'AIR FIT.webp', 'Men', 2780000, 'Chữ Nhật', 'active'),
(4, 'OWNDAYS', 2, 'OWNDAYS.webp', 'Both', 1980000, 'Vuông-Chữ Nhật', 'active'),
(5, 'AIR Ultem', 1, 'AIR Ultem.webp', 'Both', 2350000, 'Vuông', 'active'),
(6, 'John Dillinger', 1, 'John Dillinger.webp', 'Women', 2700000, 'Tròn', 'active'),
(7, 'OWNDAYS SNAP', 2, 'OWNDAYS SNAP.webp', 'Both', 2780000, 'Vuông', 'active'),
(8, 'SKY', 2, 'sky.webp', 'Women', 1980000, 'Bầu dục', 'active'),
(9, 'Model', 1, 'Model.webp', 'BOTH', 2590000, 'Nhựa dẻo Thép không rỉ', 'active'),
(10, 'UFO', 1, 'UFO.webp', 'BOTH', 2600000, 'Vuông-Chữ nhật', 'active'),
(11, 'NICHE', 1, 'NICHE.webp', 'Women', 3500000, 'Nhựa trong', 'active'),
(12, 'White', 1, 'White.webp', 'BOTH', 1500000, 'Tròn', 'active'),
(13, 'Teen', 1, 'Teen.webp', 'BOTH', 1450000, 'Tròn', 'active'),
(14, 'lillybell', 1, 'lillybell.webp', 'Women', 2450000, 'Vuông-Chữ nhật', 'active'),
(15, 'lilly', 1, 'lilly.webp', 'Men', 1450000, 'Đa giác', 'active'),
(16, 'Sun', 2, 'Sun.webp', 'Women', 1980000, 'Đa giác', 'active'),
(17, 'Monday', 2, 'Monday.webp', 'Women', 2980000, 'Mắt mèo', 'active'),
(18, 'Cute', 2, 'Cute.webp', 'Women', 2980000, 'Vuông-Chữ nhật', 'active'),
(19, 'Junni', 2, 'Junni.webp', 'Men', 1880000, 'Vuông-Chữ nhật', 'active'),
(20, 'BlackPink', 2, 'BlackPink.webp', 'Women', 1780000, 'Bầu dục', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` enum('admin','manager','employee','customer') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'employee'),
(2, 'manager'),
(3, 'customer'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `phone`, `gender`, `image`, `role_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Huy1234', '1111', 'Huy2003@gmail.com', 'Thiệu Huy', '1234567890', 'Male', '', 1, '123 Trần Hưng Đạo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:06'),
(2, 'Trieu222', '2222', 'Trieu22@gmail.com', 'Ngọc Triều', '0987654321', 'Male', '', 2, '456 Đồng Khởi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:18'),
(3, 'TuanAnh333', '3333', 'Tuananh33@gmail.com', 'Tuấn Anh', '0937971799', 'Male', '', 1, '51 Ngô Quyền', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:29'),
(4, 'Thang444', '4444', 'ThangVo44@email.com', 'Thắng', '9876543210', 'Male', '', 4, '246 Nguyễn Trãi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:10'),
(5, 'Cuong555', '5555', 'QuocCuong55@email.com', 'Quốc Cường', '096543219', 'Male', '', 3, '357 Hòa Hảo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:18'),
(6, 'Nghiem666', '6666', 'nghiem66@gmail.com', 'Nghiêm', '937971788', 'Male', '', 3, '66 An Dương Vương', 'active', '2024-02-24 14:43:55', '2024-02-24 14:48:28'),
(7, 'Toan777', '7777', 'Toan77@gmail.com', 'Toàn', '937975398', 'Male', '', 3, '77 Nguyễn Chí Thanh', 'active', '2024-02-24 14:44:57', '2024-02-24 14:48:41'),
(8, 'Han88', '8888', 'Han88@gmail.com', 'Hân', '937275398', 'Female', '', 1, '88 Hòa Bình', 'active', '2024-02-24 14:45:44', '2024-02-24 14:49:00'),
(9, 'Tram99', '9999', 'Tram99@gmail.com', 'Ngọc Trâm', '797275398', 'Female', '', 3, '99 Tân Phước', 'active', '2024-02-24 14:46:51', '2024-02-24 14:49:11'),
(10, 'Trinh10', '1010', 'Trinh10@gmail.com', 'Ngọc Trinh', '797575398', 'Female', '', 3, '10 Trần Cung', 'active', '2024-02-24 14:47:39', '2024-02-24 14:49:21'),
(11, 'Hai11', 'hai111', 'Hai11@gmail.com', 'Hải', '798651423', 'Male', '', 3, '11 Tân Kỳ Tân Quý', 'active', '2024-02-26 06:33:00', '2024-02-26 06:33:43'),
(12, 'Cong12', '1212', 'Cong12@gmail.com', 'Thái Công', '998877669', 'Male', '', 3, '12 Hai Bà Trưng', 'active', '2024-02-26 06:33:00', '2024-02-26 06:33:52'),
(13, 'Hung13', '1313', 'Hung13@gmail.com', 'Hùng', '543219876', 'Male', '', 3, '13 Phong Phú', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:05'),
(14, 'Kiet14', '1414', 'Kiet14@gmail.com', 'Tuấn Kiệt', '708776762', 'Male', '', 3, '14 Trần Quý', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:14'),
(15, 'Tai15', '1515', 'Tai15@gmail.com', 'Thành Tài', '909597799', 'Male', '', 3, '15 Nguyễn Kim', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discount_items`
--
ALTER TABLE `discount_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `import_items`
--
ALTER TABLE `import_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `import_id` (`import_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `method_id` (`method_id`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `discount_items`
--
ALTER TABLE `discount_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `import_items`
--
ALTER TABLE `import_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `discount_items`
--
ALTER TABLE `discount_items`
  ADD CONSTRAINT `discount_items_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`),
  ADD CONSTRAINT `discount_items_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `import_items`
--
ALTER TABLE `import_items`
  ADD CONSTRAINT `import_items_ibfk_1` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`),
  ADD CONSTRAINT `import_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`method_id`) REFERENCES `payment_methods` (`id`);

--
-- Các ràng buộc cho bảng `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
