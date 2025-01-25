<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Card</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 20px;
        }
        .doctor-card {
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.5s;
            filter: popup(10);
        }
        .doctor-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
        .doctor-card h2 {
            margin: 10px 0;
        }
        .doctor-card p {
            margin: 5px 0;
        }
        .doctor-card:hover {
            background-color:white;
            color:black;
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

    <?php
    include 'db_connect.php'; // Include database connection

    // Fetch all doctor records
    $query = "SELECT * FROM Doctors";
    $result = mysqli_query($conn, $query);

    // Check if any rows exist in the table
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container">';
        while ($doctor = mysqli_fetch_assoc($result)) {
            // Use the correct column names as per the table definition
            $photo = !empty($doctor['d_photo']) ? $doctor['d_photo'] : 'default.png'; // Fallback image
            $name = !empty($doctor['d_name']) ? $doctor['d_name'] : 'Unknown Doctor'; // Fallback name
            $specialization = !empty($doctor['d_specialization']) ? $doctor['d_specialization'] : 'General';
            $experience = !empty($doctor['d_experience']) ? $doctor['d_experience'] : 'Not Specified';
            $contact = !empty($doctor['d_contact']) ? $doctor['d_contact'] : 'No Contact Info';

            // Display the doctor's details
            echo '<div class="doctor-card">';
            echo '<img src="' . htmlspecialchars($photo) . '" alt="Doctor Image">';
            echo '<h2>' . htmlspecialchars($name) . '</h2>';
            echo '<p>Specialization: ' . htmlspecialchars($specialization) . '</p>';
            echo '<p>Experience: ' . htmlspecialchars($experience) . '</p>';
            echo '<p>Contact: ' . htmlspecialchars($contact) . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No doctors found.</p>'; // Message if no records exist
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</body>
</html>
