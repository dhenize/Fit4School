<?php
session_start();

$host = "localhost";
$dbname = "db_fit4school";
$username = "root";
$db_password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['status_message'] = 'Database connection failed. Please try again later.';
    $_SESSION['status_type'] = 'danger';
    header("Location: fit4veryfication2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $email = $_SESSION['reset_email'] ?? '';

    $passwordRegex = "/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*\d{2}).{8,}$/";

    if (empty($email)) {
        $_SESSION['status_message'] = 'Password reset process expired or invalid. Please request a new reset link.';
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4login.php");
        exit();
    }

    try {
        $stmt = $conn->prepare("SELECT otp, expiry_time FROM pass_reset WHERE email = ?");
        $stmt->execute([$email]);
        $reset_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$reset_data || empty($reset_data['otp']) || empty($reset_data['expiry_time'])) {
            $_SESSION['status_message'] = 'OTP not found or reset process not initiated for this email.';
            $_SESSION['status_type'] = 'danger';
            header("Location: fit4veryfication2.php");
            exit();
        }

        $storedOtp = $reset_data['otp'];
        $expiryTime = new DateTime($reset_data['expiry_time']);
        $currentTime = new DateTime();

        if ($currentTime > $expiryTime) {
            $_SESSION['status_message'] = 'OTP has expired. Please request a new one.';
            $_SESSION['status_type'] = 'danger';
            header("Location: fit4veryfication2.php");
            exit();
        } elseif ($otp != $storedOtp) {
            $_SESSION['status_message'] = 'Invalid OTP. Please try again.';
            $_SESSION['status_type'] = 'danger';
            header("Location: fit4veryfication2.php");
            exit();
        } else {
        }

    } catch(PDOException $e) {
        $_SESSION['status_message'] = 'Error fetching OTP: ' . $e->getMessage();
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4veryfication2.php");
        exit();
    }

    if (empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['status_message'] = 'New password and confirm password are required.';
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4veryfication2.php");
        exit();
    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['status_message'] = 'New passwords do not match.';
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4veryfication2.php");
        exit();
    } elseif (!preg_match($passwordRegex, $newPassword)) {
        $_SESSION['status_message'] = 'Password must have: 1 capital letter, 1 special character, 2 numbers, and at least 8 characters.';
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4veryfication2.php");
        exit();
    }

    $plainTextPassword = $newPassword;

    try {
        $conn->beginTransaction();

        $stmt = $conn->prepare("UPDATE student SET password = ? WHERE email = ?");
        $stmt->execute([$plainTextPassword, $email]);

        $stmt_clear_otp = $conn->prepare("UPDATE pass_reset SET otp = NULL, expiry_time = NULL WHERE email = ?");
        $stmt_clear_otp->execute([$email]);

        $conn->commit();

        unset($_SESSION['otp']);
        unset($_SESSION['reset_email']);

        $_SESSION['status_message'] = 'Your password has been successfully reset. You can now log in with your new password.';
        $_SESSION['status_type'] = 'success';
        header("Location: fit4login.php?reset=success");
        exit();

    } catch(PDOException $e) {
        $conn->rollBack();
        $_SESSION['status_message'] = 'Error updating password: ' . $e->getMessage();
        $_SESSION['status_type'] = 'danger';
        header("Location: fit4veryfication2.php");
        exit();
    }
} else {
    header("Location: fit4veryfication2.php");
    exit();
}
?>