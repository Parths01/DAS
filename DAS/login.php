<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-container {
            width: 300px;
            padding: 20px;
            border-radius: 10px;    
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 10);
        }
        h2 {
            color: whitesmoke;
            text-align: center;
        }
        input, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 10px;
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
        <a href="login.php" class="active">Login</a>
        <a href="register.php">Register</a>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="patient">Patient</option>
            </select>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND role = ?");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: home.php");
        exit();
    } else {
        echo "";
    }

    $stmt->close();
    $conn->close();
}
?>