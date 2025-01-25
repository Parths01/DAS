/*-- Creating the users table
CREATE TABLE users (
    ID INT PRIMARY KEY,
    Name VARCHAR(255),
    Username VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    Role VARCHAR(50)
);

INSERT INTO users (ID, Name, Username, Password, Role) VALUES
(1, 'Parth', 'parth123', 'password1', 'admin'),
(2, 'Palak', 'palak123', 'password2', 'admin'),
(3, 'Swapnaj', 'swapnaj123', 'password3', 'patient'),
(4, 'Nikhil', 'nikhil123', 'password4', 'Doctor'),
(5, 'John Doe', 'john123', 'password5', 'Patient'),
(6, 'Khushi', 'Khushi123', 'password6', 'Doctor');



CREATE TABLE Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    p_name VARCHAR(50) NOT NULL,
    p_contact VARCHAR(15) NOT NULL,
    p_email VARCHAR(50) NOT NULL,
    p_blood_group VARCHAR(5) NOT NULL,
    p_cause VARCHAR(50) NOT NULL,
    p_address VARCHAR(100) NOT NULL,
    p_dob DATE NOT NULL,
    p_gender VARCHAR(10) NOT NULL,
    p_emergency_contact VARCHAR(15) NOT NULL,
    p_insurance VARCHAR(3) NOT NULL,
    p_insurance_provider VARCHAR(50),
    p_medical_history TEXT,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE Doctors (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    d_name VARCHAR(50) NOT NULL,
    d_contact VARCHAR(15) NOT NULL,
    d_specialization VARCHAR(50) NOT NULL,
    d_experience VARCHAR(50) NOT NULL,
    d_photo VARCHAR(255) NOT NULL
);



INSERT INTO Doctors (id, d_name, d_contact, d_specialization, d_experience, d_photo) VALUES
(1, 'Dr. Nikhil', '1234567890', 'Cardiologist', '5 years', './images/Nikhil.jpg'),
(2, 'Dr. Khushi', '1234567890', 'Physiotherapy', '3 years', './images/Khushi.jpg'),
(3, 'Dr. Swapnaj', '1234567890', 'Orthopedic', '7 years', './images/Swapnaj.jpg'),
(4, 'Dr. Parth', '1234567890', 'Neurologist', '4 years', './images/Palak.jpg'),
(5, 'Dr. Palak', '1234567890', 'Gynecologist', '6 years', './images/Parth.jpg');

*/

SELECT * FROM doctors;