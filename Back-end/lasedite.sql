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

-- كود SQL لإنشاء جدول establishments
CREATE TABLE establishments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_of_establishments VARCHAR(255) NOT NULL
);

-- كود SQL لإنشاء جدول classes
CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_of_class VARCHAR(255) NOT NULL,
    establishment_id INT,
    FOREIGN KEY (establishment_id) REFERENCES establishments(id)
);

-- إنشاء جدول items إذا لم يكن موجودًا بالفعل
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    device_name VARCHAR(255) NOT NULL,
    class_id INT,
    quantity INT,
    problem VARCHAR(255),
    problem_description TEXT,
    solution TEXT,
    device_location VARCHAR(255),
    device_reference VARCHAR(255),
    etablishment VARCHAR(255),
    storage VARCHAR(255),
    FOREIGN KEY (class_id) REFERENCES classes(id)
);