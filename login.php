<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            .login-container {
                width: 95%;
                height: 70vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                color: white;
                backdrop-filter: blur(10px);
                border-radius: 10px;    
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            }
            .login {
                width: 300px;
                padding: 20px;
                border-radius: 5px;
                    
            }
            .login h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            .login input[type="text"], .login input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            button {
                width: 50%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #333;
                color: #f9f9f9;
                cursor: pointer;
            }
            button:hover {
                background-color: white;
                color: #333;
            }
            .space{
                width: 100px;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .register {
                width: 300px;
                padding: 20px;
                border-radius: 5px;
            }
            .register h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            .register input[type="text"], .register input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="login.php" class="active">Login/Sign-up</a>
        </div>
        <div class="login-container">
            <div class="login">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td><label for="loginEmail">Email :</label></td>
                            <td><input type="text" id="loginEmail" name="loginEmail" placeholder="Email id" required></td>
                        </tr>
                        <tr>
                            <td><label for="loginPassword">Password:</label></td>
                            <td><input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button type="submit">Login</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="space">
                <h2>OR</h2>
            </div>
            <div class="register">
                <h2>Register</h2>
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td><label for="registerName">Name :</label></td>
                            <td><input type="text" id="registerName" name="registerName" placeholder="Name" required></td>
                        </tr>
                        <tr>
                            <td><label for="registerEmail">Email :</label></td>
                            <td><input type="text" id="registerEmail" name="registerEmail" placeholder="Email" required></td>
                        </tr>
                        <tr>
                            <td><label for="registerPassword">Password:</label></td>
                            <td><input type="password" id="registerPassword" name="registerPassword" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button type="submit">Register</button></td>
                        </tr>
                    </table>
                </form>
            </div>            
        </div>
    </body>
    </html>
    <?php
    include 'db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            // Validate login
            $query = "SELECT * FROM users WHERE Email = ? AND Password = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Login successful!'); window.location.href='home.php';</script>";
            } else {
                echo "Invalid email or password.";
            }
        } elseif (isset($_POST['registerName']) && isset($_POST['registerEmail']) && isset($_POST['registerPassword'])) {
            $name = $_POST['registerName'];
            $email = $_POST['registerEmail'];
            $password = $_POST['registerPassword'];

            // Register user
            $query = "INSERT INTO users (Name, Email, Password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $name, $email, $password);

            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
?>