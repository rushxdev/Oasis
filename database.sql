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
CREATE TABLE booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    registered_number INT,
    username VARCHAR(255),
    speciality VARCHAR(255),
    doctor_name VARCHAR(255),
    age INT,
    patient_name VARCHAR(255),
    status1 VARCHAR(255),
    gender VARCHAR(255),
    medical_documents VARCHAR(255),
    medical_history TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT booking_fk_1 FOREIGN KEY (registered_number) REFERENCES users(registered_number)
);
CREATE TABLE refund (
    refund_id INT AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(255),
    reference_no INT,
    payment varchar(255),
    bankAccount_no VARCHAR(255),
    bank_name VARCHAR(255),
    bank_branch VARCHAR(255),
    bankAccount_name VARCHAR(255),
    refund_marks VARCHAR(255)
);
CREATE TABLE appointment (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(255),
    age INT,
    email VARCHAR(255),
    doctor_name VARCHAR(255),
    specialization VARCHAR(255),
    date DATE,
    time TIME,
    registered_number INT,
    CONSTRAINT appointment_fk_1 FOREIGN KEY (registered_number) REFERENCES users(registered_number)
);
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    phone VARCHAR(20),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    registered_number int,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    message TEXT,
    reply TEXT DEFAULT "No Reply",
    CONSTRAINT questions_fk_1 FOREIGN KEY (registered_number) REFERENCES users(registered_number)
);

CREATE TABLE admins (
    admin_id int auto_increment primary key,
    admin_name varchar(100) not null,
    username varchar(100) not null,
    password varchar(100) not null 
);

insert into admins (admin_name, username, password) VALUES ('admin', 'admin', '123');

CREATE TABLE branches (
    branch_id INT AUTO_INCREMENT PRIMARY KEY,
    branch_name VARCHAR(255) NOT NULL,
    district VARCHAR(255) NOT NULL,
    mobile VARCHAR(20),
    location_link VARCHAR(255)
);
