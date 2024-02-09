CREATE DATABASE IF NOT EXISTS mydatabase;
USE mydatabase;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    phone VARCHAR(15),
    password VARCHAR(255),
    role INT DEFAULT 1
);


CREATE TABLE Establishments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_of_Establishment VARCHAR(255) NOT NULL
);


CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_of_class VARCHAR(255) NOT NULL
);

