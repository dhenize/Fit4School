<!DOCTYPE html>
<html lang = "en">
    <head>
    <title>Transaction History</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="TranHis_Stud.css">
    </head>

    <body>
        <div class = " row">
            <div class = "col-lg-2">
                <div class = "Logo">
                    <img src = "Logo_Light.png" width="64px" height="64px">
                    <span class = "Logo_txt">Fit4School</span>
                </div>
                <div class = "sm-cont">
                <div>
                        <button class = "SD_btn" onclick="location.href='DASHBOARDStud.php'"><img src = "dashboard (5).png" class = "sd_icon" style = "padding-right: 10px;">Student Dashboard</button>
                    </div>
                    <div>
                        <button class = "VS_btn" onclick="location.href='VIEW_SIZE_Stud.php'"><img src = "ruler (1).png" class = "vs_icon" style = "padding-right: 8px;">View Sizes</button>
                    </div>
                    <div>
                        <button class = "App_btn" onclick="location.href='APPOINTMENT_Stud.php'"><img src = "appointment (1).png" class = "app_icon" style = "padding-right: 10px;">Appointment</button>
                    </div>
                    <div>
                    <button class = "TH_btn" onclick="location.href='HISTORY_Stud.php'"><img src = "clock.png" class = "th_icon" style = "padding-right: 10px;">Transaction History</button>
                    </div>
                </div>

                <div class = "lm-cont">
                    <div>
                        <a href="Help-Std.php" style=" text-decoration: none; ">Help</a>
                    </div>
                    <div>
                        <a href="contact us.php" style=" text-decoration: none;">Contact Us</a>
                    </div>
                    <div>
                        <a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" font-size: 30px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="logoutModalLabel">Confirmation</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal"> <a href="#" style=" color: #16423C;">NO</a></button>
                    <button type="button" class="btn" style="background-color: #6A9C89; color: #FFFFFF; border-radius: 20px; width: 80px; font-weight: bold;"><a href="fit4login.php" >YES</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE CONTAINER -->
            <div class="container-fluid col-lg-10" style="max-height: 100vh; padding: 20px;">
                <!-- Upper Menu -->
                <div class="upm-cont">
                    <div class="wc">
                        <h2 style="color: #16423C; font-weight: bold; font-family: Candara;">Transaction History</h2>
                    </div>
                <div class="dp">
                    <span class="usern" style="color: #16423C; font-weight: bold; font-family: Candara;">Dhenize</span>
                    <img src="user.png" height="40px" width="40px" alt="User Profile">
        
        <!-- Popup Content student information-->
                    <div class="popup-content">
                    <span class="close-btn">&times;</span>
                    <div class="popup-left">
                        <div class="profile-circle"></div>
                    </div>
                    <div class="popup-right">
                        <br>
                    <div>
                        <span style=" color: #16423C; font-weight: bold; font-family: Candara;" >Student ID:</span> 
                        <input type="text" value="202412345" readonly style=" width: 250px; color: #757575; height: 30px;">
                    </div>
                    <br>
                    <br>
                    <span style=" color: #16423C; font-weight: bold;">Full Name:</span>
                    <div>
                        
                        <input type="text" value="Dhenize, First Name M.I." readonly style=" width: 389px; color: #757575; height: 30px; font-size: 15px;">
                    </div>
                    <br>
                    <span style=" color: #16423C; font-weight: bold;">Birthdate:</span>
                    <div>
                        <input type="text" value="January 1, 2000" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                    </div>
                    <br>
                    <span style=" color: #16423C; font-weight: bold;" >Course - Section:</span>
                    <div>
                        <input type="text" value="BSIT - 3D" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                    </div>
                    <br>
                    <span style=" color: #16423C; font-weight: bold;">Email:</span>
                    <div>
                        <input type="text" value="dhenize.first@cvsu.edu.ph" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;"> 
                    </div>
                    <br>
                    <span style=" color: #16423C; font-weight: bold;">Contact Number:</span>
                    <div>
                        <input type="text" value="09991234567" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                    </div>
                    </div>
                </div>
                </div>
               </div>
<br>
               <div class="search-bar" style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
    <!-- Search Bar Wrapper -->
    <div style="position: relative; width: 30%; margin-left: 16px;">
        <input type="text" id="searchInput" placeholder="Search..." 
               style="border-radius: 20px; padding: 10px 15px; width: 100%; border: 1px solid #16423C;">
        <!-- Search Icon Button -->
        <button style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); 
                       border: none; color: white; border-radius: 50%; 
                       padding: 6px 8px; cursor: pointer;">
            🔍
        </button>
    </div>

    <!-- Status Filter Dropdown -->
    <select id="statusFilter" style="border-radius: 20px; padding: 10px 15px; margin-right: 16px;">
        <option value="all"></option>
        <option value="done">Done</option>
        <option value="missed">Missed</option>
        <option value="pending">Pending</option>
    </select>
</div>


<br>

               <div class="col-sm-8" style="width: 100%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th style="border: 1px solid #16423C;">Order ID</th>
                                    <th style="border: 1px solid #16423C;">Items</th>
                                    <th style="border: 1px solid #16423C;">Quantity</th>
                                    <th style="border: 1px solid #16423C;">Date of Appointment</th>
                                    <th style="border: 1px solid #16423C;">Time of Appointment</th>
                                    <th style="border: 1px solid #16423C;">Total</th>
                                    <th style="border: 1px solid #16423C;">Tikect</th>
                                    <th style="border: 1px solid #16423C;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center; height: 400px;">
                                <tr><td style="border: 1px solid #16423C;">108</td><td style="border: 1px solid #16423C;">POLO (Boys)</td><td style="border: 1px solid #16423C;">1</td><td style="border: 1px solid #16423C;">10/04/2024</td><td style="border: 1px solid #16423C;">8:00 AM</td><td style="border: 1px solid #16423C;">250.00</td><td style="border: 1px solid #16423C;">ticket_1.pdf</td><td style="border: 1px solid #16423C;">Done</td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                <tr><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td><td style="border: 1px solid #16423C;"></td></tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
           </div>
        

        </div> <!-- END OF WHOLE-->
        <script>
        // Close button functionality
        const closeBtn = document.querySelector('.close-btn');
        const popupContent = document.querySelector('.popup-content');

        closeBtn.addEventListener('click', () => {
            popupContent.style.display = 'none';
        });

        // Show the popup on hover
        const dpContainer = document.querySelector('.dp');
        dpContainer.addEventListener('mouseover', () => {
            popupContent.style.display = 'block';
        });
    </script>

    </body>
</html>