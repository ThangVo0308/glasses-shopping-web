-- Active: 1700452364000@@127.0.0.1@3306@clothingstore

DROP DATABASE IF EXISTS glassesshopping;

SET GLOBAL max_allowed_packet = 16777216;

CREATE DATABASE
    glassesshopping CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE glassesshopping;

CREATE TABLE
    `users` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50) NOT NULL,
        `password` VARCHAR(100) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `name` VARCHAR(50) NOT NULL,
        `phone` VARCHAR(10) NOT NULL,
        `gender` INT,
        `image` VARCHAR(255) NOT NULL,
        `role_id` INT,
        `address` VARCHAR(100) NOT NULL,
        `status` ENUM ('active', 'inactive') NOT NULL DEFAULT "active",
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `roles` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` ENUM ('admin', 'manager', 'employee','customer') NOT NULL DEFAULT "employee",
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `points` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `user_id` INT,
        `transaction_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `points_earned` INT NOT NULL DEFAULT 0,
        `points_used` INT NOT NULL DEFAULT 0,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `orders` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `user_id` INT,
        `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `total_price` DOUBLE NOT NULL,
        `points_earned` int,
        `points_used` int,
        `address` varchar(100),
        `name_received` varchar(100),
        `phone_received` varchar(100),
        `status` enum ('pending', 'confirm', 'ordered') not null default "pending",
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `order_items` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `order_id` INT,
        `product_id` INT,
        `discount_id` int,
        `quantity` INT,
        `price` DOUBLE NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `payment_methods` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `method_name` VARCHAR(50),
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `payments` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `order_id` INT,
        `method_id` INT,
        `payment_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `total_price` DOUBLE NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `products` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        `category_id` INT NOT NULL,
        `image` LONGTEXT NOT NULL,
        `gender` INT NOT NULL,
        `price` DOUBLE NOT NULL,
        `description` VARCHAR(100) NOT NULL,
        `quantity` int not null,
        `status` enum('active','soldout','banned') not null default "active",
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `imports` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `user_id` INT NOT NULL,
        `import_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `total_price` DOUBLE,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `import_items` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `import_id` INT,
        `product_id` INT,
        `quantity` INT,
        `price` DOUBLE NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `categories` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50),
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `discounts` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        `discount_percent` INT,
        `start_day` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `end_day` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `product_id` integer,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `discount_items` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `product_id` INT NOT NULL,
        `discount_id` INT NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `permission` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` INT NOT NULL,
        PRIMARY KEY (`id`)
    );
    
CREATE TABLE
    `role_permission` (
        `role_id` INT NOT NULL,
        `permission_id` INT NOT NULL
    );
    
ALTER TABLE `role_permission`
ADD
    FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
    
ALTER TABLE `role_permission`
ADD
    FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);

ALTER TABLE `users`
ADD
    FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

ALTER TABLE `points`
ADD
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `orders`
ADD
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `order_items`
ADD
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `payments`
ADD
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `payments`
ADD
    FOREIGN KEY (`method_id`) REFERENCES `payment_methods` (`id`);

ALTER TABLE `order_items`
ADD
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
    
ALTER TABLE `order_items`
ADD
    FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`);

ALTER TABLE `import_items`
ADD
    FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`);

ALTER TABLE `import_items`
ADD
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `discounts`
ADD
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `products`
ADD
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `imports`
ADD
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);