<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <style>
        .verify-container {
            background: url(bgg1.jfif);
            height: 100vh;
            background-size: cover;
            margin: 0;
        }

        .logo {
            width: 110px;
            height: 110px;
        }

        .verify-box {
            background: #fff;
            padding: 30px;
            box-shadow: 3px 14px 18px #16423C; 
            border-radius: 15px;
            border: 1px solid #16423C;
        }

        h1 {
            font-size: 1.5em;
            margin-top: 0px;
            color: #16423C;
            font-weight: bold;
            font-family: Righteous;
        }

        h4 {
            font-size: 28px;
            font-weight: bold;
            color: #16423C;
            margin-top: 5px;
            margin-bottom: 10px;
            font-family: Roboto;
        }

        .form-control {
            height: 45px;
            color: #757575;
        }

        .btn-secondary {
            background-color: #e9efec;
            border-color: #e9efec;
            color: #6A9C89;
            border-radius: 18px;
            font-size: 16px;
            font-weight: bold;
            font-family: Candara;
        }

        .btn-secondary:hover {
            background-color: #e9efec;
            color: #6A9C89;
            border-color: #e9efec;
        }

        .btn-success {
            background-color: #6A9C89;
            border-color: #6A9C89;
            border-radius: 18px;
            font-size: 16px;
            font-weight: bold;
            font-family: Candara;
        }

        .btn-success:hover {
            background-color: #6A9C89;
            border-color: #6A9C89;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin-right: 10px;
            border: 1px solid #6A9C89;
            border-radius: 10px;
        }
    </style>

        
    <!-- EMAIL OTP FUNCTION -->
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $smtpHost = 'smtp-relay.brevo.com';
    $smtpUsername = '8f3d7e001@smtp-brevo.com';
    $smtpPassword = 'dMzx0wLJCEBWv68O';
    $smtpPort = 587;
    $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $fromEmail = 'fit4school.official@gmail.com';
    $fromName = 'Fit4School';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fit4school";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    function generateOTP($length = 4): string {
        $characters = '0123456789';
        $otp = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[random_int(0, $max)];
        }
        return $otp;
    }

    function sendOTPByEmail(string $email, string $otp, string $smtpHost, string $smtpUsername, string $smtpPassword, int $smtpPort, string $smtpSecure, string $fromEmail, string $fromName): bool {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = $smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUsername;
            $mail->Password   = $smtpPassword;
            $mail->SMTPSecure = $smtpSecure;
            $mail->Port       = $smtpPort;

            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'This is test otp';
            $mail->Body    = '<p>Your OTP is: <strong>' . $otp . '</strong></p><p>Please use this OTP to reset your password. This OTP will expire shortly.</p>';
            $mail->AltBody = 'Your OTP is: ' . $otp . '. Please use this OTP to reset your password. This OTP will expire shortly.';

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Email sending failed. Error: {$mail->ErrorInfo}");
            return false;
        }
    }

    function storeOTPInDatabase(PDO $pdo, string $email, string $otp, int $expirySeconds = 900): bool {
        $expiryTime = date('Y-m-d H:i:s', time() + $expirySeconds);
        $stmt = $pdo->prepare("INSERT INTO pass_reset (email, otp, expiry_time) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE otp = VALUES(otp), expiry_time = VALUES(expiry_time)");
        return $stmt->execute([$email, $otp, $expiryTime]);
    }

    function verifyOTPFromDatabase(PDO $pdo, string $email, string $otp): ?array {
        $stmt = $pdo->prepare("SELECT * FROM password_reset_tokens WHERE email = ? AND otp = ? AND expiry_time > NOW()");
        $stmt->execute([$email, $otp]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    function deleteOTPFromDatabase(PDO $pdo, string $email): bool {
        $stmt = $pdo->prepare("DELETE FROM password_reset_tokens WHERE email = ?");
        return $stmt->execute([$email]);
    }

    $error = '';

    if (isset($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $pdo->prepare("SELECT email FROM student WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $otp = generateOTP();
                if (storeOTPInDatabase($pdo, $email, $otp)) {
                    if (sendOTPByEmail($email, $otp, $smtpHost, $smtpUsername, $smtpPassword, $smtpPort, $smtpSecure, $fromEmail, $fromName)) {
                        session_start();
                        $_SESSION['reset_email'] = $email;
                        header("Location: fit4veryfication2.php");
                        exit();
                    } else {
                        $error = "Error sending OTP email. Please try again.";
                    }
                } else {
                    $error = "Error storing OTP in the database. Please try again.";
                }
            } else {
                $error = "Email address not found.";
            }
        } else {
            $error = "Invalid email format.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
        session_start();
        $email = $_SESSION['reset_email'] ?? null;
        $otp = filter_var($_POST['otp'], FILTER_SANITIZE_STRING);
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!$email) {
            $error = "Error: Email session expired. Please restart the password reset process.";
        } else {
            $storedOTPData = verifyOTPFromDatabase($pdo, $email, $otp);

            if ($storedOTPData) {
                if ($newPassword === $confirmPassword) {
                    if (strlen($newPassword) >= 8) {
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
                        if ($stmt->execute([$hashedPassword, $email])) {
                            deleteOTPFromDatabase($pdo, $email);
                            header("Location: fit4login.php?reset=success");
                            exit();
                        } else {
                            $error = "Error updating password. Please try again.";
                        }
                    } else {
                        $error = "Error: New password must be at least 8 characters long.";
                    }
                } else {
                    $error = "Error: New passwords do not match.";
                }
            } else {
                $error = "Error: Invalid or expired OTP.";
            }
        }
    }
    ?>


</head>
<body>
    <div class="container-fluid verify-container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <img src="logo.png" alt="Fit4School Logo" class="logo">
                    <h1 class="mt-2">Fit4School</h1>
                </div>

                <div class="card p-4 shadow verify-box">
                    <h4 class="text-center mb-3">VERIFY YOUR ACCOUNT</h4>
                    <form action="fit4veryfication1.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter your Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Here..." required>
                        </div>
                        <?php if ($error): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                        <?php endif; ?>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="fit4login.php" class="btn btn-secondary"> CANCEL </a>
                            <button type="submit" class="btn btn-success"> CONFIRM </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send OTP Modal
    <div class="modal fade" id="sendOtpModal" tabindex="-1" aria-labelledby="sendOtpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" transform: translateY(96%);">
                <div class="modal-header" style=" border: none;">
                    <h5 class="modal-title" id="sendOtpModalLabel" style=" color: #16423C; font-size: 25px;">Send OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style=" border-top: white; color: #757575;">
                    Are you sure you want to send an OTP to your registered number?
                </div>
                <div class="modal-footer" style=" border: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifyOtpModal" data-bs-dismiss="modal">YES</button>
                </div>
            </div>
        </div>
    </div> 

    
    <div class="modal fade" id="verifyOtpModal" tabindex="-1" aria-labelledby="verifyOtpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" transform: translateY(85%); border-radius: 20px;">
                <div class="modal-header" style=" border: none;">
                    <h5 class="modal-title" id="verifyOtpModalLabel" style=" color: #16423C; font-size: 25px;">Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style=" color: #757575;">Enter OTP code sent to your email. You have 5 minutes.</p>
                    <div class="d-flex justify-content-center">
                    
                    <input type="text" id="otpInput" maxlength="4" class="form-control text-center" required style="width: 100px; color: #757575;">

                    </div>
                </div>
                <div class="modal-footer" style=" border: none;">
                    <button type="button" class="btn btn-success" onclick="verifyOTP()">Continue</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Verify OTP Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
