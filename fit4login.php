<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit4School Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <style>
        body {
            background: url(bgg1.jfif);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            flex-direction: column;
            background-size: cover;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 85px;
        }
        .logo-container h1 {
            font-size: 1.5em;
            margin-top: 0px;
            color: #16423C;
            font-weight: bold;
            font-family: Righteous;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 3px 14px 18px #16423C;
            width: 100%;
            height: 480px;
            max-width: 400px;
            border-radius: 15px;
            border: 1px solid #16423C;
        }
        .login-container h2 {
            font-size: 32px;
            font-weight: bold;
            color: #16423C;
            font-family: Roboto;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .form-control {
            height: 45px;
            color: #757575;
        }
        .btn-primary {
            background-color: #6A9C89;
            border-color: #6A9C89;
            border-radius: 20px;
            font-size: 18px;
            font-family: Candara;
            font-weight: bold;   
        }
        .btn-primary:hover {
            background-color: #6A9C89;
            border-color: #6A9C89;
        }
        .btn-secondary {
            background-color: #e9efec;
            border-color: #e9efec;
            color: #6A9C89;
            border-radius: 20px;
            font-size: 18px;
            font-family: Candara;
            font-weight: bold;  
        }
        .btn-secondary:hover {
            background-color: #e9efec;
            color: #6A9C89;
            border-color: #e9efec;
        }
        .form-label{
            font-weight: bold;
            font-family: Candara;
        }
    </style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_fit4school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $email = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM student WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row["password"])) {
                $admin_sql = "SELECT * FROM admin WHERE email = ?";
                $admin_stmt = $conn->prepare($admin_sql);
                $admin_stmt->bind_param("s", $email);
                $admin_stmt->execute();
                $admin_result = $admin_stmt->get_result();

                if ($admin_result->num_rows > 0) {
                    header("Location: admindash.php");
                    exit();
                } else {
                    header("Location: DASHBOARDStud.php");
                    exit();
                }


            } else {
                echo "<script>alert('Incorrect password.'); window.location.href='your_login_page.html';</script>";
            }
        } else {
            echo "<script>alert('User not found.'); window.location.href='your_login_page.html';</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>
</head>

<body>
    <div class="logo-container">
        <img src="logo.png" alt="Fit4School Logo">
        <h1>Fit4School</h1>
    </div>

    <div class="login-container">
        <form id="loginForm" method="post" action="login_process.php">
            <h2 class="mb-4 text-center">LOG IN</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Student ID</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Here..." required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Here..." required>
                <input type = "checkbox" class = "show-pass" onclick="passFunction()"> Show Password
                <div id="passwordError" class="error"></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-75 mx-auto d-block mb-3">LOG IN</button>
            <a href="fit4veryfication1.php" class="btn btn-secondary w-75 mx-auto d-block">FORGOT PASSWORD?</a>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const passwordError = document.getElementById('passwordError');
            const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*\d{2}).{8,}$/;

            if (!passwordRegex.test(password)) {
                passwordError.textContent = "Password must have 1 capital letter, 1 special character, 2 numbers, and at least 8 characters.";
                event.preventDefault();
            } else {
                passwordError.textContent = "";
            }
        });


        //FOR SHOW PASSWORD =====
        function passFunction(){
            var a = document.getElementById("password");
            if (a.type === "password"){
                a.type = "text";
            }
            else{
                a.type = "password";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
