<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Your Account</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="images/Logo_Light.png" type="image/x-icon">

        
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
        $dbname = "db_fit4school";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        function generateOTP($length = 4): string
        {
            $characters = '0123456789';
            $otp = '';
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $otp .= $characters[random_int(0, $max)];
            }
            return $otp;
        }

        function sendOTPByEmail(string $email, string $otp, string $smtpHost, string $smtpUsername, string $smtpPassword, int $smtpPort, string $smtpSecure, string $fromEmail, string $fromName): bool
        {
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

        function storeOTPInDatabase(PDO $pdo, string $email, string $otp, int $expirySeconds = 900): bool
        {
            $expiryTime = date('Y-m-d H:i:s', time() + $expirySeconds);
            $stmt = $pdo->prepare("INSERT INTO pass_reset (email, otp, expiry_time) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE otp = VALUES(otp), expiry_time = VALUES(expiry_time)");
            return $stmt->execute([$email, $otp, $expiryTime]);
        }

        function verifyOTPFromDatabase(PDO $pdo, string $email, string $otp): ?array
        {
            $stmt = $pdo->prepare("SELECT * FROM password_reset_tokens WHERE email = ? AND otp = ? AND expiry_time > NOW()");
            $stmt->execute([$email, $otp]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : null;
        }

        function deleteOTPFromDatabase(PDO $pdo, string $email): bool
        {
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


        <style>
            .verify-container {
                background: url(Images/bgg1.jfif);
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
            
            .error {
                color: red;
                font-size: 0.9em;
                margin-top: 5px;
            }
            
            .is-invalid {
                border-color: #dc3545 !important;
            }
            
            .is-valid {
                border-color: #28a745 !important;
            }

            /* Mobile Small - 320px */
            @media (max-width: 320px) {
                .verify-box {
                    padding: 20px;
                }
                
                h4 {
                    font-size: 22px;
                }
                
                .logo {
                    width: 80px;
                    height: 80px;
                }
                
                .btn-secondary, .btn-success {
                    font-size: 14px;
                    padding: 8px 12px;
                }
                
                .form-control {
                    height: 40px;
                    font-size: 14px;
                }
            }

            /* Mobile Medium - 375px */
            @media (min-width: 321px) and (max-width: 375px) {
                .verify-box {
                    padding: 25px;
                }
                
                h4 {
                    font-size: 24px;
                }
                
                .logo {
                    width: 90px;
                    height: 90px;
                }
            }

            /* Mobile Large - 425px */
            @media (min-width: 376px) and (max-width: 425px) {
                .verify-box {
                    padding: 25px;
                }
                
                h4 {
                    font-size: 26px;
                }
            }

            /* Tablet - 768px */
            @media (min-width: 426px) and (max-width: 768px) {
                .verify-box {
                    padding: 35px;
                }
                
                .logo {
                    width: 120px;
                    height: 120px;
                }
                
                h1 {
                    font-size: 1.8em;
                }
                
                h4 {
                    font-size: 30px;
                }
            }

            /* Laptop - 1024px */
            @media (min-width: 769px) and (max-width: 1024px) {
                .verify-box {
                    max-width: 500px;
                    margin: 0 auto;
                }
                
                .logo {
                    width: 130px;
                    height: 130px;
                }
                
                h1 {
                    font-size: 2em;
                }
            }

            /* Laptop Large - 1440px */
            @media (min-width: 1025px) and (max-width: 1440px) {
                .verify-box {
                    max-width: 450px;
                }
            }

            /* 4K - 2560px */
            @media (min-width: 2560px) {
                .verify-container {
                    background-size: 100% 100%;
                }
                
                .verify-box {
                    max-width: 600px;
                    padding: 50px;
                }
                
                .logo {
                    width: 160px;
                    height: 160px;
                }
                
                h1 {
                    font-size: 2.5em;
                }
                
                h4 {
                    font-size: 36px;
                }
                
                .form-control {
                    height: 60px;
                    font-size: 20px;
                }
                
                .btn-secondary, .btn-success {
                    font-size: 20px;
                    padding: 12px 24px;
                    border-radius: 25px;
                }
                
                .error {
                    font-size: 1.1em;
                }
            }
        </style>


    </head>

    <body>
        <div class="container-fluid verify-container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <img src="images/logo.png" alt="Fit4School Logo" class="logo">
                        <h1 class="mt-2">Fit4School</h1>
                    </div>

                    <div class="card p-4 shadow verify-box">
                        <h4 class="text-center mb-3">VERIFY YOUR ACCOUNT</h4>
                        <form id="verifyForm" action="fit4veryfication1.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter your Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Here...">
                                <div id="emailError" class="error"></div>
                            </div>
                            <?php if ($error): ?>
                                <div class="error mb-3"><?php echo $error; ?></div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const emailInput = document.getElementById('email');
                const emailError = document.getElementById('emailError');
                const verifyForm = document.getElementById('verifyForm');
                
                // Email validation regex
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                // Real-time validation for email
                emailInput.addEventListener('input', function() {
                    validateEmail();
                });
                
                function validateEmail() {
                    const email = emailInput.value.trim();
                    
                    if (email === '') {
                        emailInput.classList.remove('is-valid');
                        emailInput.classList.remove('is-invalid');
                        emailError.textContent = '';
                    } else if (!emailRegex.test(email)) {
                        emailInput.classList.add('is-invalid');
                        emailInput.classList.remove('is-valid');
                        emailError.textContent = 'Please enter a valid email address';
                    } else {
                        emailInput.classList.add('is-valid');
                        emailInput.classList.remove('is-invalid');
                        emailError.textContent = '';
                    }
                }
                
                // Form submission validation
                verifyForm.addEventListener('submit', function(event) {
                    const email = emailInput.value.trim();
                    let isValid = true;
                    
                    // Reset previous error states
                    emailInput.classList.remove('is-invalid');
                    emailError.textContent = '';
                    
                    // Validate email
                    if (email === '') {
                        emailInput.classList.add('is-invalid');
                        emailError.textContent = 'Email is required';
                        isValid = false;
                    } else if (!emailRegex.test(email)) {
                        emailInput.classList.add('is-invalid');
                        emailError.textContent = 'Please enter a valid email address';
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    </body>
</html>