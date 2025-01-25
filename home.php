<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hero {
            width: 100%;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: whitesmoke;
            font-size: 4rem;
        }
        p {
            color: whitesmoke;
            font-size: 1.2rem;
        }
        .btn {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            margin: 10px;
            text-decoration: none;
            transition: 0.3s;
            backdrop-filter: blur(200px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 10);
        }
        .btn:hover {
            background-color: white;
            color: black;
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
<div class="hero">
    <div class="hero-content">
        <h1>Welcome to Our Healthcare Service</h1>
        <p>Your health is our priority. Find the best doctors and book appointments easily.</p>
        <br>
        <div class="cta-buttons">
            <a href="Doctors.php" class="btn">Find Your Doctor</a>
            <a href="Appointment.php" class="btn">Book Appointment Now</a>
        </div>
    </div>
</div>
</body>
</html>