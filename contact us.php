<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--Icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css-contact.css">
    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
</head>
<body>
    

    <div class="card">

    <!-- FAQ Section -->
    <div class="content">
        <!-- Header -->
    <div class="header">
        <div style="display: inline-flex; align-items: center;">
          <img src="Logo_Light.png" alt="Logo" style="width: 80px; height: 80px; margin-right: 5px;">
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
            <h1 class= text-center> Contact Us</h1>
        </div>

        <div class="contact-page">
            <div class="contact-card">
                <div class="location">
                    <h2><i class="bi bi-geo-alt-fill"></i>   Location</h2>
                    <br>
                    <p>Room 001, First Floor Old Building,  </p>
                    <p>Cavite Civic Center,Palico IV, Imus City, Cavite 4103</p>
                </div>
    
                <!-- Call Us Section -->
                <div class="call-us">
                    <h2><i class="bi bi-telephone-fill"></i>   Call Us</h2>
                    <br>
                    <p><strong>Landline:</strong> (046) 123-4567 (Globe)<br>
                    <strong>Mobile:</strong> 0951-123-4567 (Smart)</p>
                 </div>
    
                <!-- Email Address Section -->
                <div class="email-address">
                    <h2><i class="bi bi-envelope-fill"></i></i>   Email Address</h2>
                    <br>
                    <p><a href="mailto:schoolnameuniform@fit4school">schoolnameuniform@fit4school</a></p>
                </div>
    
                <!-- Business Hours Section -->
                <div class="business-hours">
                    <h2><i class="bi bi-clock-fill"></i>   Business Hours</h2>
                    <br>
                    <p>Monday - Thursday<br>
                        8:00 AM - 5:00 PM</p>
                </div>
    
        </div>
    
        <div class="contact-form">
            <form action="#" method="POST" onsubmit="showModal(); return false;">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="Juan Dela Cruz" readonly />
    
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="juan.delacruz@example.com" readonly />
    
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message here..." rows="5"required></textarea>
    
                <button type="submit">Submit</button>
            </form>
        </div>
        </div>

        <!-- The Modal -->
        <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Success!</h2>
            <br>
            <p><strong>Thank you for your feedback!</strong></p>
            <p>We’ll ensure to improve our system to fulfill your needs.</p>
        </div>
</div>

</div>

        <br><br><br><br>
    </div>

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