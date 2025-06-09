<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <!--Icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="css-contact.css" />
    <link rel="icon" href="Logo_Light.png" type="image/x-icon" />
</head>
<body>

<?php
use PHPMailer\PHPMailer\PHPMailer;
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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$student_id = 202210602;
$sql = "SELECT fname, lname, email FROM student WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$fname = $lname = $email = "";
if ($row = $result->fetch_assoc()) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
}

$success = false;
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = "$fname $lname";
    $studentEmail = $email;
    $message = trim($_POST["message"] ?? "");

    if (empty($message)) {
        $errorMessage = "Please enter a message.";
    } else {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUsername;
            $mail->Password   = $smtpPassword;
            $mail->SMTPSecure = $smtpSecure;
            $mail->Port       = $smtpPort;

            // Recipients
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress('fit4school.official@gmail.com', 'Fit4School Official');

            // Reply-to set to student's email so you can reply directly
            $mail->addReplyTo($studentEmail, $fullName);

            // Content
            $mail->isHTML(false);
            $mail->Subject = "Message from $fullName (Fit4School)";
            $body = "You've received a new message from a student:\n\n";
            $body .= "Name: $fullName\n";
            $body .= "Email: $studentEmail\n\n";
            $body .= "Message:\n$message";
            $mail->Body = $body;

            $mail->send();
            $success = true;
        } catch (Exception $e) {
            $errorMessage = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
?>

<div class="card">

    <!-- FAQ Section -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <div style="display: inline-flex; align-items: center;">
                <img src="Logo_Light.png" alt="Logo" style="width: 80px; height: 80px; margin-right: 5px;" />
                <span style="font-size: 20px; color: #16423C;">Fit4School</span>
            </div>

            <div class="logo1"></div>
            <div class="nav">
                <a href="DASHBOARDStud.php">Dashboard</a>
                <a href="Help-Std.php">Help</a>
                <a href="contact us.php">Contact Us</a>
                <a href="fit4login.php">Logout</a>
            </div>
        </div>

        <!-- Page Title Section -->
        <div class="page-title">
            <h1 class="text-center">Contact Us</h1>
        </div>

        <div class="contact-page">
            <div class="contact-card">
                <div class="location">
                    <h2><i class="bi bi-geo-alt-fill"></i> Location</h2>
                    <br />
                    <p>Room 001, First Floor Old Building,</p>
                    <p>Cavite Civic Center, Palico IV, Imus City, Cavite 4103</p>
                </div>

                <!-- Call Us Section -->
                <div class="call-us">
                    <h2><i class="bi bi-telephone-fill"></i> Call Us</h2>
                    <br />
                    <p><strong>Landline:</strong> (046) 123-4567 (Globe)<br />
                        <strong>Mobile:</strong> 0951-123-4567 (Smart)</p>
                </div>

                <!-- Email Address Section -->
                <div class="email-address">
                    <h2><i class="bi bi-envelope-fill"></i> Email Address</h2>
                    <br />
                    <p><a href="mailto:schoolnameuniform@fit4school">schoolnameuniform@fit4school</a></p>
                </div>

                <!-- Business Hours Section -->
                <div class="business-hours">
                    <h2><i class="bi bi-clock-fill"></i> Business Hours</h2>
                    <br />
                    <p>Monday - Thursday<br />
                        8:00 AM - 5:00 PM</p>
                </div>
            </div>

            <div class="contact-form">
                <form action="" method="POST">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars("$fname $lname"); ?>" readonly />

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly />

                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Write your message here..." rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>

                    <button type="submit">Submit</button>
                </form>

                <?php if ($success): ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            showModal();
                        });
                    </script>
                <?php endif; ?>

                <?php if ($errorMessage): ?>
                    <p style="color:red; margin-top:10px;"><?php echo htmlspecialchars($errorMessage); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- The Modal -->
        <div id="popupModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Success!</h2>
                <br />
                <p><strong>Thank you for your feedback!</strong></p>
                <p>We’ll ensure to improve our system to fulfill your needs.</p>
            </div>
        </div>

    </div>

    <br /><br /><br /><br />
</div>

<script>
    // Function to show the modal
    function showModal() {
        document.getElementById("popupModal").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("popupModal").style.display = "none";
    }
</script>

</body>
</html>
