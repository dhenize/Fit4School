<?php
session_start();

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
        $submitted_password = $_POST["password"];

        error_log("Attempting login for email: " . $email . " with password: " . $submitted_password);

        $admin_sql = "SELECT email, password FROM admin WHERE email = ? AND password = ?";
        $admin_stmt = $conn->prepare($admin_sql);
        $admin_stmt->bind_param("ss", $email, $submitted_password);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        error_log("Admin query rows: " . $admin_result->num_rows);

        if ($admin_result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = 'admin';
            error_log("Admin login successful for: " . $email);
            header("Location: admindash.php");
            exit();
        }
        $admin_stmt->close();

        error_log("Admin login failed, attempting student login for: " . $email);

        if (!isset($_SESSION['loggedin'])) {
            $student_sql = "SELECT email, password FROM student WHERE email = ? AND password = ?";
            $student_stmt = $conn->prepare($student_sql);
            $student_stmt->bind_param("ss", $email, $submitted_password);
            $student_stmt->execute();
            $student_result = $student_stmt->get_result();

            error_log("Student query rows: " . $student_result->num_rows);

            if ($student_result->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_role'] = 'student';
                error_log("Student login successful for: " . $email);
                header("Location: DASHBOARDStud.php");
                exit();
            } else {
                error_log("Student login failed for: " . $email . ". Incorrect password or user not found.");
                echo "<script>alert('Incorrect password or user not found. Please try again.'); window.location.href='fit4login.php';</script>";
            }
            $student_stmt->close();
        }


    } else {
        error_log("Login attempt with missing username or password.");
        echo "<script>alert('Please enter both username and password.'); window.location.href='fit4login.php';</script>";
    }
}

$conn->close();
?>