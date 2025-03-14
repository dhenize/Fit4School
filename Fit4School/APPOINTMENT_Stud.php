<!DOCTYPE html>
<html lang = "en">
    <head>
    <title>Appointment</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="APP_stud.css">
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
                        <button class = "App_btn" onclick="location.href='APPOINTMENT_Stud.php'"><img src = "appointment.png" class = "app_icon" style = "padding-right: 10px;">Appointment</button>
                    </div>
                    <div>
                        <button class = "TH_btn" onclick="location.href='HISTORY_Stud.php'"><img src = "clock (1).png" class = "th_icon" style = "padding-right: 10px;">Transaction History</button>
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
                        <h2 style="color: #16423C; font-weight: bold; font-family: Candara;">Appointment</h2>
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
        <div>
        <div class="container">
        <br>
        <br>
        <div class="form-group">
            <label for="student-id">Student ID</label>
            <input type="text" id="student-id" class="form-control" placeholder="202412345" required>
        </div>
        <div class="form-group">
            <label for="course-section">Course - Section</label>
            <input type="text" id="course-section" class="form-control" placeholder="BSIT - 3D" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <select id="time" class="form-control">
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <!-- Trigger for Confirmation Modal -->
            <button type="button" data-toggle="modal" data-target="#confirmationModal">Confirm</button>
        </div>
    </div>

    <div class="orders-container">
        <div>
            <div class="orders-header">List of Orders</div>
            <div class="order-list">
    <br>
    <div class="order-item" style="margin: 0 auto;">
        <div style=" margin-left: 16px;">
            <input type="checkbox" style=" justify-content: space-between; font-size: 20px;"> <span style=" font-size: 15px; font-weight: bold;">POLO (Boys)</span>
            <div style=" margin-top: 5px; margin-left: 20px; font-size: 11px;">
                <div>Size: M</div>
                <div>Qty: 4</div>
                <div>₱250.00</div>
            </div>
        </div>
        <div>
            <button class="btn btn-danger btn-sm remove-btn" style=" border: none; background-color: white; color: #16423C; font-size: 18px; padding-left: 50px; font-weight: bold;">X</button>
        </div>
    </div>
    <br>
    <div class="order-item" style="margin: 0 auto;">
        <div style=" margin-left: 16px;">
            <input type="checkbox" style=" justify-content: space-between; font-size: 20px;"> <span style=" font-size: 15px; font-weight: bold;">PANTS (Boys)</span>
            <div style=" margin-top: 5px; margin-left: 20px; font-size: 11px;">
                <div>Size: M</div>
                <div>Qty: 2</div>
                <div>₱300.00</div>
            </div>
        </div>
        <div>
            <button class="btn btn-danger btn-sm remove-btn" style=" border: none; background-color: white; color: #16423C; font-size: 18px; padding-left: 50px; font-weight: bold;">X</button>
        </div>
    </div>
    <br>
    <div class="order-item" style="margin: 0 auto;">
        <div style=" margin-left: 16px;">
            <input type="checkbox" style=" justify-content: space-between; font-size: 20px;"> <span style=" font-size: 15px; font-weight: bold;">PE (T-Shirt)</span>
            <div style=" margin-top: 5px; margin-left: 20px; font-size: 11px;">
                <div>Size: L</div>
                <div>Qty: 1</div>
                <div>₱390.00</div>
            </div>
        </div>
        <div>
            <button class="btn btn-danger btn-sm remove-btn" style=" border: none; background-color: white; color: #16423C; font-size: 18px; padding-left: 50px; font-weight: bold;">X</button>
        </div>
    </div>
    <br>
</div>
<div class="order-details">
    <div>
        <h5>Order Details</h5>
    </div>
    <div class="order-detail-row">
        <div>Order ID:</div>
        <div>175</div>
    </div>
    <div class="order-detail-row">
        <div>No. of Items:</div>
        <div>1</div>
    </div>
    <div class="order-detail-row">
        <div>Total:</div>
        <div>₱390.00</div>
    </div>
</div>

</div>


    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style=" font-size: 19px;">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p style=" font-size: 17px; color: #16423C;">Are you sure you want to proceed?</p>
                    <p>Make sure your details are correct.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                    <!-- Trigger for Ticket Generator Modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ticketModal" data-dismiss="modal" style="background-color: #6A9C89; color: #FFFFFF; border-radius: 20px; width: 80px; font-weight: bold;">YES</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticket Generator Modal -->
    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" style=" transform: translateY(-65%);  margin-left: 350px;">
            <div class="modal-content" style=" width: 120%; background-color: #e9efec;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style=" margin-left: 225px; font-weight: bold; font-size: 20px;">TICKET GENERATED!</h4>
                </div>
                <div class="modal-body">
                    <div class="ticket-content" style=" margin-top: -30px;">
                        <p style=" color: #16423C;">Kindly download this ticket and present it to the stocks office during pick-up.</p>
                        <img src="ticket.jpg" alt="Ticket" style="  margin-top: 1px;">
                        <button class="download-btn"><a href="APPOINTMENT_Stud.php" style=" color: #FFFFFF;">DOWNLOAD</a></button>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>