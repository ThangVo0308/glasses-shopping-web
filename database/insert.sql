INSERT INTO `categories` (`name`) VALUES
('Gọng kính'),
('Tròng kính'),
('Phụ kiện');

INSERT INTO `permission` (`name`) VALUES
('Thống kê'),
('Sản phẩm'),
('Đơn hàng'),
('Tài khoản'),
('Nhập hàng'),
('Giảm giá'),
('Điểm tích lũy'),
('Phân quyền');

INSERT INTO `roles` (`name`) VALUES
('employee'),
('manager'),
('customer'),
('admin'); 

INSERT INTO `products` (`name`, `category_id`, `image`, `gender`, `price`, `description`, `quantity`,`status`) VALUES
('Moriyama', 1, '../glasses/moriyama.webp', 1, 2980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ Nhật', 5,'active'),
('Graph Belle', 1, '../glasses/Graph Belle.webp', 0, 2580000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Đa giác', 5,'active'),
('AIR FIT', 1, '../glasses/AIR FIT.webp', 1, 2780000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Chữ Nhật', 5,'active'),
('OWNDAYS', 1, '../glasses/OWNDAYS.webp', 1, 1980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ Nhật',6, 'active'),
('AIR Ultem', 1, '../glasses/AIR Ultem.webp', 0, 2350000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông', 10,'active'),
('John Dillinger', 1, '../glasses/John Dillinger.webp', 1, 2700000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Tròn', 4,'active'),
('OWNDAYS SNAP', 1, '../glasses/OWNDAYS SNAP.webp', 0, 2780000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông', 5,'active'),
('SKY', 1, '../glasses/sky.webp', 0, 1980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Bầu dục',5, 'active'),
('Model', 1, '../glasses/Model.webp', 1, 2590000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Nhựa dẻo Thép không rỉ', 5,'active'),
('UFO', 1, '../glasses/UFO.webp', 1, 2600000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ nhật', 5,'active'),
('NICHE', 1, '../glasses/NICHE.webp', 0, 3500000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Nhựa trong', 5,'active'),
('White', 1, '../glasses/White.webp', 0, 1500000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Tròn', 5,'active'),
('Teen', 1, '../glasses/Teen.webp', 1, 1450000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Tròn', 5,'active'),
('lillybell', 1, '../glasses/lillybell.webp', 0, 2450000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ nhật', 5,'active'),
('lilly', 1, '../glasses/lilly.webp', 1, 1450000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Đa giác', 5,'active'),
('Sun', 1, '../glasses/Sun.webp', 0, 1980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Đa giác', 5,'active'),
('Monday', 1, '../glasses/Monday.webp', '0', 2980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Mắt mèo', 5,'active'),
('Cute', 1, '../glasses/Cute.webp', 0, 2980000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ nhật', 5,'active'),
('Junni', 1, '../glasses/Junni.webp', 1, 1880000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Vuông-Chữ nhật', 5,'active'),
('BlackPink', 1, '../glasses/BlackPink.webp', 0, 1780000, 'Sản phẩm được gia công bằng tay, nguyên liệu 100% bằng thép không gỉ, bền bỉ, Bầu dục',5,'active'),
('Chemi U2 ASP Photogray',2,'../TrongKinh/Chemi.jpg',1,660000,'Khi tiếp xúc với tia UV, tròng kính sẽ chuyển từ trong suốt sang màu tối',5,'active'),
('Chemi Perfect UV Crystal U6',2,'../TrongKinh/crytal.jpg',1,700000,'Ngăn ánh sáng xanh có hại, Phản quang, hạn chế chói',5,'active'),
('Essilor Crizal Rock',2,'../TrongKinh/Rock.jpg',1,1200000,'Lọc ánh sáng xanh, Siêu mỏng',5,'active'),
('Chemi Tint',2,'../TrongKinh/Tint.jpg',1,650000,'Siêu mỏng, Tròng kính mát',5,'active'),
('Essilor Transitions Classic',2,'../TrongKinh/classic.jpg',1,1780000,'trong suốt trong nhà và tự động đổi màu khi tiếp xúc với ánh nắng',5,'active'),
('Essilor Crizal Sapphire 360 UV',2,'../TrongKinh/sapphire.jpg',1,2550000,'giảm tối đa độ chói do ánh sáng gây ra từ mọi hướng',5,'active'),
('Chemi A-One Plus Rx',2,'../TrongKinh/RX.jpg',1,1800000,'Tầm nhìn rõ nét ở mọi khoảng cách, Thiết kế độc đáo và thoải mái',5,'active'),
('ZEISS Office Superb',2,'../TrongKinh/office.jpg',1,4590000,'Lọc ánh sáng xanh, Siêu mỏng, Tròng đặt đánh',5,'active'),
('PARFOIS',3,'../PhuKien/parfois.jpg',1,250000,'Body: 5% Rubber, 95% Iron',10,'active'),
('RAINBOW',3,'../PhuKien/rainbow.jpg',1,300000,'General: 20% Brass, 80% Thermoplastic Polyurethane',10,'active'),
('CASE002',3,'../PhuKien/002.webp',1,200000,'Sản phẩm được gia công và sản xuất taị Nhật Bản',5,'active'),
('CASE003',3,'../PhuKien/003.jpg',1,220000,'Sản phẩm được gia công và sản xuất taị Nhật Bản',5,'active'),
('CLOTH004',3,'../PhuKien/004.jpg',1,150000,'Sản phẩm được làm từ chất liệu Polyester',5,'active'),
('CLOTH005',3,'../PhuKien/005.jpg',1,150000,'Sản phẩm được làm từ chất liệu Polyester',5,'active'),
('Strawberry',3,'../PhuKien/dau.webp',1,330000,'Bộ sản phẩm vệ sinh kính chuyên dụng và tiện lợi',5,'active'),
('Duo Sac Hot Chocolate',3,'../PhuKien/nau.webp',1,250000,'Sản phẩm được gia công và sản xuất taị Nhật Bản',5,'active');


INSERT INTO `discounts` (`name`, `discount_percent`, `start_day`, `end_day`,`product_id`) VALUES
('Khai Xuân', 15, '2024-01-01', '2024-07-31',1),
('Chào Hè', 20, '2024-06-01', '2024-08-31',2),
('Sale to cuối năm ', 50, '2024-10-01', '2024-12-31',3),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',4),
('Chào Hè', 20, '2024-06-01', '2024-08-31',5),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',6),
('Chào Hè', 20, '2024-06-01', '2024-08-31',7),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',8),
('Chào Hè', 20, '2024-06-01', '2024-08-31',9),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',10),
('Chào Hè', 20, '2024-06-01', '2024-08-31',11),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',12),
('Chào Hè', 20, '2024-06-01', '2024-08-31',13),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',14),
('Chào Hè', 20, '2024-06-01', '2024-08-31',15),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',16),
('Chào Hè', 20, '2024-06-01', '2024-08-31',17),
('Khai Xuân', 15, '2024-01-01', '2024-07-31',18),
('Chào Hè', 20, '2024-06-01', '2024-08-31',19),
('Chào Hè', 20, '2024-06-01', '2024-08-31',20);

INSERT INTO `users` (`username`, `password`, `email`, `name`, `phone`, `gender`, `image`, `role_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
('Huy1234', 'Huy11111', 'Huy2003@gmail.com', 'Thiệu Huy', '1234567890', 1, null, 1, '123 Trần Hưng Đạo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:06'),
('Trieu222', 'Trieu2222', 'Trieu22@gmail.com', 'Ngọc Triều', '0987654321', 1, null, 2, '456 Đồng Khởi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:18'),
('TuanAnh333', 'TuanAnh3333', 'Tuananh33@gmail.com', 'Tuấn Anh', '0937971799', 1, null, 1, '51 Ngô Quyền', 'active', '2024-02-20 10:08:11', '2024-02-23 14:57:29'),
('Thang444', 'Thang4444', 'ThangVo44@email.com', 'Thắng', '9876543210', 1, null, 4, '246 Nguyễn Trãi', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:10'),
('Cuong555', 'Cuong5555', 'QuocCuong55@email.com', 'Quốc Cường', '096543219', 1, null, 3, '357 Hòa Hảo', 'active', '2024-02-20 10:08:11', '2024-02-23 14:59:18');

INSERT INTO `imports` (`user_id`, `import_date`, `total_price`) VALUES
(2, '2024-02-25', 14900000),
(2, '2024-02-25', 12900000),
(2, '2024-02-25', 13900000),
(2, '2024-02-25', 11880000),
(2, '2024-02-26', 23500000);


INSERT INTO `import_items` (`import_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 5, 1490000),
(2, 2, 5, 1290000),
(3, 3, 5, 1390000),
(4, 4, 6, 1188000),
(5, 5, 10, 23500000);


INSERT INTO `orders` (`user_id`, `order_date`, `total_price`,`points_earned`,`points_used`,`address`,`name_received`,`phone_received`,`status`) VALUES
(1, '2024-02-26 15:20:24', 1000000,10000,0,'TPHCM','Teo','0974254189','ordered'),
(2, '2024-02-26 16:24:37', 2000000,20000,0,'TPHCM','Teo','0974254189','ordered'),
(3, '2024-02-27 09:21:09', 3000000,30000,0,'TPHCM','Teo','0974254189','ordered'),
(4, '2024-02-27 11:34:16', 4000000,40000,0,'TPHCM','Teo','0974254189','ordered'),
(5, '2024-02-28 14:37:06', 5000000,50000,0,'TPHCM','Teo','0974254189','ordered');

INSERT INTO `order_items` (`order_id`, `product_id`, `discount_id`,`quantity`, `price`) VALUES
(1, 4, 1,1, 2580000),
(2, 4, 2,1, 1980000),
(3, 8, 3,1, 2590000),
(4, 9, 3,2, 7000000),
(5, 9, 2,3, 1450000);

INSERT INTO `payment_methods` (`method_name`) VALUES
('Tiền mặt'),
('Chuyển khoản');

INSERT INTO `payments` (`order_id`, `method_id`, `payment_date`, `total_price`) VALUES
(1, 1, '2024-02-26 15:21:31', 2580000),
(2, 1, '2024-02-26 16:25:31', 1980000),
(3, 2, '2024-02-27 09:21:31', 2590000),
(4, 2, '2024-02-27 11:35:31', 7000000),
(5, 1, '2024-02-28 14:37:31', 4350000);

INSERT INTO `points` (`user_id`, `points_earned`, `points_used`) VALUES
(1, 258, 0),
(2, 198, 0),
(3, 259, 0),
(4, 700, 0),
(5, 596, 0);

INSERT INTO `discount_items`(`product_id`,`discount_id`) VALUES
(1,1),
(4,3);

INSERT INTO `role_permission`(`role_id`,`permission_id`) VALUES
(4,1),
(4,2),
(4,3),
(4,4),
(4,5),
(4,6),
(4,7),
(4,8),
(2,4),
(2,8),
(3,3),
(3,5);
