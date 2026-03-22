CREATE DATABASE IF NOT EXISTS morphdigi;
USE morphdigi;


CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currency_code VARCHAR(10) NOT NULL,
    transaction_date DATE NOT NULL
);

