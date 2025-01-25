<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            width: 90%;
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            color: white;
        }
        h2 {
            color: white;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        label {
            font-size: 1.2rem;
            color: white;
        }
        input, select {
            width: calc(100% - 22px);
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #333;
            border-radius: 5px;
        }
        button {
            width: 60%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background-color: #333;
            color: #fff;
            display: block;
            margin: 0 auto;
            cursor: pointer;
        }
        button:hover {
            background-color: whitesmoke;
            color: #000;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="About.php">About Us</a>
    <a href="Doctors.php">Doctors/Specializations</a>
    <a href="Appointment.php">Book Appointment</a>
    <a href="Contact.php">Contact Us</a>
    <a href="Login.php">Login/Sign Up</a>
</div>

<form action="Doctors.php" method="post" enctype="multipart/form-data">
    <h2>Doctor Registration Form</h2>
    <table>
        <tr>
            <td><label for="d_name">Name:</label></td>
            <td><input type="text" id="d_name" name="d_name" required></td>
        </tr>
        <tr>
            <td><label for="d_contact">Contact:</label></td>
            <td><input type="text" id="d_contact" name="d_contact" required></td>
        </tr>
        <tr>
            <td><label for="d_specialization">Specialization:</label></td>
            <td><input type="text" id="d_specialization" name="d_specialization" required></td>
        </tr>
        <tr>
            <td><label for="d_experience">Experience:</label></td>
            <td><input type="text" id="d_experience" name="d_experience" required></td>
        </tr>
        <tr>
            <td><label for="d_photo">Photo:</label></td>
            <td><input type="file" id="d_photo" name="d_photo" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
               <button type="submit">Register</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profilePhoto'])) {
    // Include database connection
    include 'db_connect.php';

    // Get form inputs
    $name = $_POST['d_name'];
    $contact = $_POST['d_contact'];
    $specialization = $_POST['d_specialization'];
    $experience = $_POST['d_experience'];
    $photo = $_FILES['d_photo']['name'];
    $target_dir = "./Uploads/";
    $target_file = $target_dir . basename($photo);

    // Check if uploads directory is writable
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // File upload
    if (!move_uploaded_file($_FILES['d_photo']['tmp_name'], $target_file)) {
        die("File upload error: " . $_FILES['d_photo']['error']);
    }

    // Prepare SQL query
    $sql = "INSERT INTO Doctors (name, contact, specialization, experience, photo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssss", $name, $contact, $specialization, $experience, $target_file);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New doctor registered successfully.";
    } else {
        die("Execution failed: " . $stmt->error);
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
