/*

-- Creating the users table

CREATE TABLE users (
    ID INT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255)
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

SELECT * FROM users;