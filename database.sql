CREATE TABLE users (
    registered_number INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username varchar(100) NOT NULL UNIQUE,
    nic VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(200) NOT NULL,
    contact VARCHAR(10) NOT NULL,
    password VARCHAR(100)
);

CREATE TABLE prescription (
    prescription_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    registered_number INT NOT NULL,
    speciality VARCHAR(50) NOT NULL,
    doctor VARCHAR(100) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    need_before date,
    CONSTRAINT prescription_fk_1 FOREIGN KEY (registered_number) REFERENCES users(registered_number)
);

CREATE TABLE doctors (
    doctor_id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    doctor_name varchar(100) NOT NULL,
    doctor_specialty varchar(100)
);

CREATE TABLE payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50),
    salutation VARCHAR(20),
    reference_no VARCHAR(100),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    contact_no VARCHAR(20),
    email VARCHAR(100),
    amount VARCHAR(100),
    amount_method VARCHAR(20)
);

CREATE TABLE payment_history (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50),
    salutation VARCHAR(20),
    reference_no VARCHAR(100),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    contact_no VARCHAR(20),
    email VARCHAR(100),
    amount VARCHAR(100),
    amount_method VARCHAR(20),
    refunded VARCHAR(50)
);
