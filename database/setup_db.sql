CREATE DATABASE IF NOT EXISTS sheights CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE USER IF NOT EXISTS 'shop'@'localhost' IDENTIFIED BY 'shop_dev_pw';

GRANT SELECT, INSERT, UPDATE, DELETE ON sheights.* TO 'shop'@'localhost';
