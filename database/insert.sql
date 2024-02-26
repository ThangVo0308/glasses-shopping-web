INSERT INTO `categories` (`name`) VALUES
('Gọng kính'),
('Kính mát');

INSERT INTO `discounts` (`name`, `discount_percent`, `start_day`, `end_day`) VALUES
('Khai Xuân', 15, '2024-01-01', '2024-01-31'),
('Chào Hè', 20, '2024-06-01', '2024-08-31'),
('Sale to cuối năm ', 50, '2024-10-01', '2024-12-31');

INSERT INTO `roles` (`name`) VALUES
('employee'),
('manager'),
('customer'),
('admin');

INSERT INTO `products` (`name`, `category_id`, `image`, `gender`, `price`, `description`, `status`) VALUES
('moriyama', 1, 'moriyama.webp', 1, 2980000, 'Vuông-Chữ Nhật', 'active'),
('Graph Belle', 1, 'Graph Belle.webp', 0, 2580000, 'Đa giác', 'active'),
('AIR FIT', 1, 'AIR FIT.webp', 1, 2780000, 'Chữ Nhật', 'active'),
('OWNDAYS', 2, 'OWNDAYS.webp', 2, 1980000, 'Vuông-Chữ Nhật', 'active'),
('AIR Ultem', 1, 'AIR Ultem.webp', 2, 2350000, 'Vuông', 'active'),
('John Dillinger', 1, 'John Dillinger.webp', 2, 2700000, 'Tròn', 'active'),
('OWNDAYS SNAP', 2, 'OWNDAYS SNAP.webp', 2, 2780000, 'Vuông', 'active'),
('SKY', 2, 'sky.webp', 0, 1980000, 'Bầu dục', 'active'),
('Model', 1, 'Model.webp', 1, 2590000, 'Nhựa dẻo Thép không rỉ', 'active'),
('UFO', 1, 'UFO.webp', 2, 2600000, 'Vuông-Chữ nhật', 'active'),
('NICHE', 1, 'NICHE.webp', 0, 3500000, 'Nhựa trong', 'active'),
('White', 1, 'White.webp', 2, 1500000, 'Tròn', 'active'),
('Teen', 1, 'Teen.webp', 2, 1450000, 'Tròn', 'active'),
('lillybell', 1, 'lillybell.webp', 0, 2450000, 'Vuông-Chữ nhật', 'active'),
('lilly', 1, 'lilly.webp', 1, 1450000, 'Đa giác', 'active'),
('Sun', 2, 'Sun.webp', 0, 1980000, 'Đa giác', 'active'),
('Monday', 2, 'Monday.webp', '0', 2980000, 'Mắt mèo', 'active'),
('Cute', 2, 'Cute.webp', 0, 2980000, 'Vuông-Chữ nhật', 'active'),
('Junni', 2, 'Junni.webp', 1, 1880000, 'Vuông-Chữ nhật', 'active'),
('BlackPink', 2, 'BlackPink.webp', 0, 1780000, 'Bầu dục', 'active');

INSERT INTO `users` (`username`, `password`, `email`, `name`, `phone`, `gender`, `image`, `role_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
('Huy1234', '1111', 'Huy2003@gmail.com', 'Thiệu Huy', '1234567890', 1, null, 1, '123 Trần Hưng Đạo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:06'),
('Trieu222', '2222', 'Trieu22@gmail.com', 'Ngọc Triều', '0987654321', 1, null, 2, '456 Đồng Khởi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:18'),
('TuanAnh333', '3333', 'Tuananh33@gmail.com', 'Tuấn Anh', '0937971799', 1, null, 1, '51 Ngô Quyền', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:29'),
('Thang444', '4444', 'ThangVo44@email.com', 'Thắng', '9876543210', 1, null, 4, '246 Nguyễn Trãi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:10'),
('Cuong555', '5555', 'QuocCuong55@email.com', 'Quốc Cường', '096543219', 1, null, 3, '357 Hòa Hảo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:18'),
('Nghiem666', '6666', 'nghiem66@gmail.com', 'Nghiêm', '937971788', 0, null, 3, '66 An Dương Vương', 'active', '2024-02-24 14:43:55', '2024-02-24 14:48:28'),
('Toan777', '7777', 'Toan77@gmail.com', 'Toàn', '937975398', 0, null, 3, '77 Nguyễn Chí Thanh', 'active', '2024-02-24 14:44:57', '2024-02-24 14:48:41'),
('Han88', '8888', 'Han88@gmail.com', 'Hân', '937275398', 0, null, 1, '88 Hòa Bình', 'active', '2024-02-24 14:45:44', '2024-02-24 14:49:00'),
('Tram99', '9999', 'Tram99@gmail.com', 'Ngọc Trâm', '797275398', 0, null, 3, '99 Tân Phước', 'active', '2024-02-24 14:46:51', '2024-02-24 14:49:11'),
('Trinh10', '1010', 'Trinh10@gmail.com', 'Ngọc Trinh', '797575398', 0, null, 3, '10 Trần Cung', 'active', '2024-02-24 14:47:39', '2024-02-24 14:49:21'),
('Hai11', 'hai111', 'Hai11@gmail.com', 'Hải', '798651423', 1, null, 3, '11 Tân Kỳ Tân Quý', 'active', '2024-02-26 06:33:00', '2024-02-26 06:33:43'),
('Cong12', '1212', 'Cong12@gmail.com', 'Thái Công', '998877669', 1, null, 3, '12 Hai Bà Trưng', 'active', '2024-02-26 06:33:00', '2024-02-26 06:33:52'),
('Hung13', '1313', 'Hung13@gmail.com', 'Hùng', '543219876', 1, null, 3, '13 Phong Phú', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:05'),
('Kiet14', '1414', 'Kiet14@gmail.com', 'Tuấn Kiệt', '708776762', 1, null, 3, '14 Trần Quý', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:14'),
('Tai15', '1515', 'Tai15@gmail.com', 'Thành Tài', '909597799', 1, null, 3, '15 Nguyễn Kim', 'active', '2024-02-26 06:33:00', '2024-02-26 06:34:24');

INSERT INTO `imports` (`user_id`, `import_date`, `total_price`) VALUES
(2, '2024-02-25', 14900000),
(2, '2024-02-25', 12900000),
(2, '2024-02-25', 13900000),
(2, '2024-02-25', 11880000),
(2, '2024-02-26', 23500000),
(2, '2024-02-26', 10800000),
(2, '2024-02-26', 13900000),
(2, '2024-02-27', 9900000),
(2, '2024-02-27', 15540000),
(2, '2024-02-27', 13000000),
(2, '2024-02-28', 17500000),
(2, '2024-02-28', 7500000),
(2, '2024-02-29', 7250000),
(2, '2024-02-29', 12250000),
(2, '2024-02-29', 7250000),
(2, '2024-03-01', 9900000),
(2, '2024-03-01', 14900000),
(2, '2024-03-01', 14900000),
(2, '2024-03-02', 9400000),
(2, '2024-03-02', 8900000);

INSERT INTO `import_items` (`import_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 5, 1490000),
(2, 2, 5, 1290000),
(3, 3, 5, 1390000),
(4, 4, 6, 1188000),
(5, 5, 10, 23500000),
(6, 6, 4, 10800000),
(7, 7, 5, 13900000),
(8, 8, 5, 9900000),
(9, 9, 5, 15540000),
(10, 10, 5, 13000000),
(11, 11, 5, 17500000),
(12, 12, 5, 7500000),
(13, 13, 5, 7250000),
(14, 14, 5, 12250000),
(15, 15, 5, 7250000),
(16, 16, 5, 9900000),
(17, 17, 5, 14900000),
(18, 18, 5, 14900000),
(19, 19, 5, 9400000),
(20, 20, 5, 8900000);

INSERT INTO `orders` (`user_id`, `order_date`, `total_price`) VALUES
(7, '2024-02-26 15:20:24', 2580000),
(9, '2024-02-26 16:24:37', 1980000),
(8, '2024-02-27 09:21:09', 2590000),
(10, '2024-02-27 11:34:16', 7000000),
(14, '2024-02-28 14:37:06', 4350000),
(13, '2024-02-28 16:29:06', 5960000);

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 2, 1, 2580000),
(2, 4, 1, 1980000),
(3, 9, 1, 2590000),
(4, 11, 2, 7000000),
(5, 13, 3, 1450000),
(6, 1, 2, 2980000);

INSERT INTO `payment_methods` (`method_name`) VALUES
('Tiền mặt'),
('Chuyển khoản');

INSERT INTO `payments` (`order_id`, `method_id`, `payment_date`, `total_price`) VALUES
(1, 1, '2024-02-26 15:21:31', 2580000),
(2, 1, '2024-02-26 16:25:31', 1980000),
(3, 2, '2024-02-27 09:21:31', 2590000),
(4, 2, '2024-02-27 11:35:31', 7000000),
(5, 1, '2024-02-28 14:37:31', 4350000),
(6, 2, '2024-02-28 16:29:31', 5960000);

INSERT INTO `points` (`user_id`, `transaction_date`, `points_earned`, `points_used`) VALUES
(7, '2024-02-26 15:21:31', 258, 0),
(9, '2024-02-26 16:25:31', 198, 0),
(8, '2024-02-27 09:21:31', 259, 0),
(10, '2024-02-27 11:35:31', 700, 0),
(14, '2024-02-28 14:37:31', 435, 0),
(13, '2024-02-28 16:29:31', 596, 0);

INSERT INTO `discount_items` (`category_id`, `discount_id`) VALUES
(1, 1),
(1, 3),
(1, 2),
(2, 2),
(2, 1),
(2, 3);
