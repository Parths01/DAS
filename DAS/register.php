<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
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
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

    <form action="register.php" method="post">
    
    <h2>Patient Registration</h2>

    <table>
        <tr>
            <td><label for="p_name">Name:</label></td>
            <td><input type="text" id="p_name" name="p_name" required></td>
            <td><label for="p_contact">Contact No:</label></td>
            <td><input type="text" id="p_contact" name="p_contact" required></td>
        </tr>
        <tr>
            <td><label for="p_email">Email ID:</label></td>
            <td><input type="email" id="p_email" name="p_email" required></td>
            <td><label for="p_blood_group">Blood Group:</label></td>
            <td><input type="text" id="p_blood_group" name="p_blood_group" required></td>
        </tr>
        <tr>
            <td><label for="p_cause">Cause:</label></td>
            <td>
                <select id="p_cause" name="p_cause" required>
                    <option value="Fever">Fever</option>
                    <option value="Cold">Cold</option>
                    <option value="Headache">Headache</option>
                    <option value="Injury">Injury</option>
                    <option value="Other">Other</option>
                </select>
            </td>
            <td><label for="p_address">Address:</label></td>
            <td><input type="text" id="p_address" name="p_address" required></td>
        </tr>
        <tr>
            <td><label for="p_dob">Date of Birth:</label></td>
            <td><input type="date" id="p_dob" name="p_dob" required></td>
            <td><label for="p_gender">Gender:</label></td>
            <td>
                <select id="p_gender" name="p_gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="p_emergency_contact">Emergency Contact:</label></td>
            <td><input type="text" id="p_emergency_contact" name="p_emergency_contact" required></td>
            <td><label for="p_insurance">Insurance Provider:</label></td>
            <td>
                <select id="p_insurance" name="p_insurance" onchange="toggleInsuranceInput()" required>
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                </select>
            </td>
            <td id="insurance_input" style="display: none;">
                <input type="text" id="p_insurance_provider" name="p_insurance_provider" placeholder="Enter Insurance Provider">
            </td>
        </tr>
        <tr>
            <td><label for="p_medical_history">Medical History:</label></td>
            <td colspan="3"><textarea id="p_medical_history" name="p_medical_history" rows="4" style="width: 100%;"></textarea></td>
        </tr>
        <tr>
            <td><label for="username">Username:</label></td>
            <td><input type="text" id="username" name="username" required></td>
            <td><label for="password">Password:</label></td>
            <td><input type="password" id="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;">
                <button type="submit">Register</button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';

    $p_name = $_POST['p_name'];
    $p_contact = $_POST['p_contact'];
    $p_email = $_POST['p_email'];
    $p_blood_group = $_POST['p_blood_group'];
    $p_cause = $_POST['p_cause'];
    $p_address = $_POST['p_address'];
    $p_dob = $_POST['p_dob'];
    $p_gender = $_POST['p_gender'];
    $p_emergency_contact = $_POST['p_emergency_contact'];
    $p_insurance = $_POST['p_insurance'];
    $p_insurance_provider = $_POST['p_insurance_provider'] ?? '';
    $p_medical_history = $_POST['p_medical_history'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the username already exists
    $check_sql = "SELECT * FROM Patients WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Error: Username already taken. Please choose a different username.";
    } else {
        // Proceed with the insertion
        $sql = "INSERT INTO Patients (p_name, p_contact, p_email, p_blood_group, p_cause, p_address, p_dob, p_gender, p_emergency_contact, p_insurance, p_insurance_provider, p_medical_history, username, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $p_name, $p_contact, $p_email, $p_blood_group, $p_cause, $p_address, $p_dob, $p_gender, $p_emergency_contact, $p_insurance, $p_insurance_provider, $p_medical_history, $username, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: {$stmt->error}";
        }

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
<script>
    function toggleInsuranceInput() {
        const insuranceSelect = document.getElementById('p_insurance');
        const insuranceInput = document.getElementById('insurance_input');

        if (insuranceSelect.value === 'Yes') {
            insuranceInput.style.display = 'block';
        } else {
            insuranceInput.style.display = 'none';
        }
    }
</script>