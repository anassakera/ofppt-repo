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