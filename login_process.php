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

        $admin_sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
        $admin_stmt = $conn->prepare($admin_sql);
        $admin_stmt->bind_param("ss", $email, $password);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        if ($admin_result->num_rows > 0) {
            header("Location: admindash.php");
            exit();
        } else {
            $sql = "SELECT * FROM student WHERE student_id = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $student_id, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("Location: DASHBOARDStud.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password or student not found.'); window.location.href='fit4login.php';</script>";
            }
            $stmt->close();
        }
        $admin_stmt->close();
    }
}

$conn->close();
?>