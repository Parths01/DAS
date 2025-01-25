<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="style.css">
    <style>
         form {
            width: 90%;
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
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
        input[type="submit"] {
            
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
        }
        button {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
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
    <div class="container">
        <h2>Book an Appointment</h2>
        <form action="Appointment.php" method="post">
            <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="date">Date:</label></td>
                <td><input type="date" id="date" name="date" required></td>
            </tr>
            <tr>
                <td><label for="time">Time:</label></td>
                <td><input type="time" id="time" name="time" required></td>
            </tr>
            <tr>
                <td><label for="message">Message:</label></td>
                <td><textarea id="message" name="message" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit">Submit</button></td>
            </tr>
            </table>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        $message = htmlspecialchars($_POST['message']);

        // Here you can add code to save the appointment details to a database or send an email

        echo "<div class='container'><h3>Appointment Details</h3>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Date: $date</p>";
        echo "<p>Time: $time</p>";
        echo "<p>Message: $message</p></div>";
    }
    ?>
</body>
</html>