<!DOCTYPE html>
<html lang = "en">
    <head>
    <title>Appointment</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="#">

<style>
    
body {
    background-color: #16423C;
    margin: 0%;
    overflow: hidden;
}

.row {
    display: flex;
    flex-direction: row;
}




/*LEFT SIDE*/
.col-lg-2 {
    display: flex;
    flex-direction: column;
}

.Logo {
    display: flex;
    align-items: center;
    margin: 20px;
    margin-bottom: 30%;
}

.Logo_txt {
    font-weight: bold;
    color: #E9EFEC;
    font-size: 20px;
}

.sm-cont > div {
    margin-left: 5%;
}

.sm-cont > div > button {
    margin-bottom: 2%;
}

.App_btn {
    color: white;
    font-weight: bold;
    background-color: #143833;
    border: none;
    padding: 10%;
    border-radius: 5%;
}


.SD_btn, .VS_btn, .App_btn, .TH_btn {
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 5px;
    color: white;
    font-weight: bold;
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 100%;
    text-align: left;
    font-size: 14px;
}

.SD_btn, .VS_btn, .TH_btn {
    background-color: #16423C;
    color: #6A9C89;
    font-weight: bold;
    border: none;
    padding: 10%;
    border-radius: 5%;
}

.SD_btn:hover {
    color: white;
    background-color: #143833;
} 
.SD_btn:hover > .sd_icon{
    content: url('dashboard (4).png');
}

.VS_btn:hover {
    color: white;
    background-color: #143833;
}
.VS_btn:hover > .vs_icon{
    content: url('ruler.png');
}

.TH_btn:hover {
    color: white;
    background-color: #143833;
}
.TH_btn:hover > .th_icon{
    content: url('clock.png');
}


.lm-cont {
    margin-top: 30%;
    font-weight: bold;
}

.lm-cont > div {
    margin-bottom: 15%;
    margin-top: 15%;
    margin-left: 15%;
}

a {
    color: white;
    background-color: transparent;
    text-decoration: none;
}

a:hover {
    color: #6A9C89;
    background-color: transparent;
    text-decoration: none;
}

a:active {
    color: #C4DAD2;
    background-color: transparent;
    text-decoration: none;
}

h5 {
    color: #16423C;
    font-family: Candara;
    font-size: 22px;
    font-weight: bold;
}

.modal-content {
    background: #fff;
    border-radius: 15px;
    border: 1px solid #16423C;
    padding: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: none;
    transform: translateY(95%);
}

.modal-header {
    border-bottom: none;
}

.modal-footer {
    border-top: none;
}

.modal-body {
    color: #757575;
    font-size: 14px;
}

.btn {
   background-color: #E5E5E5; 
   color: #16423C; 
   border-radius: 20px; 
   width: 80px;
   font-weight: bold;
   font-family: Candara;
}





.scroll-container {
  max-height: 100vh;
  padding: 20px;
  overflow-y: auto;
}

.scroll-container::-webkit-scrollbar {
  width: 8px;
}

.scroll-container::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
  
}

.scroll-container::-webkit-scrollbar-thumb {
  background: #16423C;
  border-radius: 10px;
}

.scroll-container::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.col-lg-10 {
    background-color: #E9EFEC;
    margin: 2%;
    border-radius: 20px;
    padding-bottom: 3%;
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 10px;
}

.upm-cont {
    display: flex;
    flex-direction: nowrap;
    justify-content: space-between;
}

.upm-cont > .dp {
    padding: 15px;
}

.dp {
    position: relative; 
    display: inline-block;
}


/* Popup Content */
.popup-content {
    display: none; /* Initially hidden */
    position: absolute;
    top: 50px;
    right: -10px;
    width: 490px;
    background-color: #E9EFEC;
    border: 25px solid #6A9C89;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    overflow: hidden;
}

.popup-content h3 {
    font-family: Candara, sans-serif;
    color: #16423C;
    font-size: 20px;
    text-align: left;
    margin-bottom: 20px;
}


.popup-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('bg_login.jpg') center/cover no-repeat;
    opacity: 0.2; /* Transparent effect */
    z-index: -1;
}


.popup-left {
    width: 35%;
    float: left;
    text-align: center;
}

.popup-left .profile-circle {
     width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #A1D3CA;
    background-image: url('user.png');
    background-size: cover;
    background-position: center;
    border: 2px solid #16423C;
    margin-bottom: 10px;
}

.popup-info {
    float: left;
    width: 60%;
    margin-left: 5%;
    font-family: Arial, sans-serif;
}

.popup-info div {
    margin-bottom: 15px;
}

.popup-info div span {
    font-weight: bold;
    color: #16423C;
}


.popup-content .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    color: #16423C;
    cursor: pointer;
    font-weight: bold;
}


.popup-content:after {
    content: "";
    display: table;
    clear: both;
}


.dp:hover .popup-content {
    display: block;
}








/* Flex container for all content */
.main-container {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  align-items: flex-start;
  gap: 20px;
  padding: 20px;
  
}

/* Left and right panels */
.left-panel, .right-panel {
  flex: 1 1 48%;
  display: flex;
  flex-direction: column;
  gap: 20px;
}




/* Common box style */
.box {
  background-color: white;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

/* Product grid */
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  gap: 15px;
  flex-wrap: wrap;
  justify-content: center;

}

/* Product card */
.product-card {
  background-color: #f8f8f8;
  border-radius: 8px;
  padding: 10px;
  text-align: center;
  flex: 0 0 300px;
}

.card {
  background: #C4DAD2;
  border-radius: 15px;
  padding: 10px;
  text-align: center;
}

.card img {
  width: 100%;
  max-width: 300px;
  height: auto;
  border-radius: 10px;
  margin-bottom: 15px;
}

.card-buttons {
  display: flex;
  justify-content: space-between;
  padding: 0 10px;
}


.card-buttons .btn {
  border-radius: 20px;
  width: 48%;
}


.appointment-box {
  width: 100%;
  max-width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #f9f9f9;
}

.form-group {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.form-group label {
  width: 80px; /* adjust as needed */
  margin-right: 10px;
  font-weight: bold;
}

.form-group .form-control {
  flex: 1;
  padding: 5px 10px;
}

.button-container {
  display: flex;
  justify-content: flex-end;
}

.add-btn {
  padding: 8px 16px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 1px;
  cursor: pointer;
}






/* Order item */
.order-item {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.order-item img {
  width: 50px;
  height: 50px;
  border-radius: 5px;
}

/* Summary buttons */
.summary button,
.cart-box button,
.add-btn {
  margin-top: 10px;
  padding: 8px 16px;
  background-color: #2d6653;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Responsive for small screens */
@media screen and (max-width: 768px) {
  .main-container {
    flex-direction: column;
  }

  .left-panel, .right-panel {
    flex: 1 1 100%;
  }
}



.appointment-box {
  width: 100%;
  max-width: 450px;
  padding: 20px;
  border: 1px solid #16423C;
  border-radius: 10px;
  background-color: #f9f9f9;
}

.form-group {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.form-group label {
  width: 80px; /* adjust as needed */
  margin-right: 10px;
  font-weight: bold;
}

.form-group .form-control {
  flex: 1;
  padding: 5px 10px;
}

.button-container {
  display: flex;
  justify-content: flex-end;
}

.add-btn {
  padding: 8px 16px;
  background-color: #16423C;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.add-btn:hover {
  background-color: #16423C;
}


#orderModal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 9999;
    }

     #orderModalContent {
      background: white;
      width: 400px;
      max-width: 90%;
      margin: 100px auto;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }

    .download-btn a {
      background-color: #6A9C89;
      color: #FFFFFF;
      padding: 10px 25px;
      border-radius: 20px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      margin-top: 15px;
    }

</style>


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
                        <button class = "SD_btn"><img src = "dashboard (4).png" class = "sd_icon" style = "padding-right: 10px;"><a href="DASHBOARDStud.php" style=" color: white; text-decoration: none;">Student Dashboard</a></button>
                    </div>
    
                    <div>
                        <button class = "App_btn"><img src = "appointment (1).png" class = "app_icon" style = "padding-right: 10px;"><a href="APPOINTMENT_Stud.php" style=" color: white; text-decoration: none;">Appointment</a></button>
                    </div>
                    <div>
                        <button class = "TH_btn"><img src = "clock (1).png" class = "th_icon" style = "padding-right: 10px;"><a href="HISTORY_Stud.php" style=" color: white; text-decoration: none;">Transaction History</a></button>
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
            <div class="container-fluid col-lg-10 scroll-container" style="max-height: 100vh; padding: 20px; max-width: 100%;">
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

        
<!-- FLEX CONTAINER -->
<div class="main-container">

  <!-- LEFT SIDE -->
  <div class="left-panel" style="width: 1000px; max-width: 100%;">

    <div class="appointment-box box" >
       <div style="color: #16423C; font-weight: bold;"><h3>Add new appointment</h3></div>

    <div class="form-group" style=" color: #16423C;">
    <label for="date">Date</label>
    <input type="date" id="date" name="date" class="form-control" required style="height: 45px; ">
  </div>

  <div class="form-group" style="color: #16423C;">
    <label for="time">Time</label>
    <input type="time" id="time" name="time" class="form-control" required style="height: 45px; color: #16423C;">
  </div>

  <div class="button-container">
  <button class="add-btn" 
          style="background-color: white; color: #16423C; border: 2px solid #16423C; width: 90px; border-radius: 20px;"
          data-toggle="modal" 
          data-target="#confirmationModal">
    Add
  </button>
</div>

<!-- CONFIRMATION MODAL -->
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
        <!-- YES button triggers ticket modal using JavaScript -->
        <button type="button" class="btn btn-success" 
                style="background-color: #6A9C89; color: #FFFFFF; border-radius: 20px; width: 80px; font-weight: bold;" 
                onclick="confirmAndOpenTicket()">
          YES
        </button>
      </div>
    </div>
  </div>
</div>

<!-- TICKET MODAL -->
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" style=" transform: translateY(-65%); margin-left: 350px;">
    <div class="modal-content" style="width: 120%; background-color: #e9efec;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-left: 225px; font-weight: bold; font-size: 20px;">TICKET GENERATED!</h4>
      </div>
      <div class="modal-body">
        <div class="ticket-content" style="margin-top: -30px;">
          <p style="color: #16423C;">Kindly download this ticket and present it to the stocks office during pick-up.</p>
          <img src="ticket.jpg" alt="Ticket" style="margin-top: 1px; max-width: 100%;">
          <br><br>
          <!-- Styled link button -->
          <a href="APPOINTMENT_Stud.php" class="download-btn" 
             style="display: inline-block; padding: 10px 20px; background-color: #16423C; color: white; border-radius: 20px; text-decoration: none; font-weight: bold;">
            DOWNLOAD
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

     <div style="color: #16423C;"><h3>Place an order</h3></div>

      <div class="product-grid">
  
   <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">POLO (Boys)</h5>
      
      <img src="polo.png" alt="POLO (Boys)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">

  <!-- Add to Cart Button -->
  
    <button class="btn"
            style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
            data-toggle="modal"
            data-target="#sizeModal">
      <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i>
    </button>
  
  <!-- Modal -->
  <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
      <div class="modal-content" style="transform: translateY(5%);">
        <div class="modal-header" style="color: #16423C; padding-left: 200px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">POLO (Boys)</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Left Side -->
            <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
              <h4 style="color: #fff; font-size: 25px;">₱250.00</h4>
              <img src="polo.png" alt="POLO" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
              <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                  <option selected disabled>Choose your size...</option>
                  <option>XS</option>
                  <option>S</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                  <option>XXL</option>
                </select>
                <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
              </div>
              <div style="margin-top: 10px; text-align: center;">
                <button class="btn btn-green" id="addItemButton" style="width: 150px; border-radius: 20px;">Add Item</button>
              </div>
            </div>

            <!-- Right Side -->
            <div class="col-sm-8" style="width: 75%;">
              <table class="table table-bordered">
                <thead style="background-color: #6A9C89; color: white; text-align: center;">
                  <tr>
                    <th>Sizes</th>
                    <th>Chest</th>
                    <th>Length</th>
                    <th>Shoulder</th>
                    <th>Sleeve</th>
                    <th>Stocks Left</th>
                  </tr>
                </thead>
                <tbody style="color: #16423C; text-align: center;">
                  <tr><td>XS</td><td>44 cm</td><td>58 cm</td><td>40 cm</td><td>15 cm</td><td>60</td></tr>
                  <tr><td>S</td><td>45 cm</td><td>61 cm</td><td>42 cm</td><td>16 cm</td><td>80</td></tr>
                  <tr><td>M</td><td>46 cm</td><td>64 cm</td><td>44 cm</td><td>18 cm</td><td>35</td></tr>
                  <tr><td>L</td><td>48 cm</td><td>67 cm</td><td>46 cm</td><td>20 cm</td><td>50</td></tr>
                  <tr><td>XL</td><td>50 cm</td><td>69 cm</td><td>48 cm</td><td>22 cm</td><td>75</td></tr>
                  <tr><td>XXL</td><td>53 cm</td><td>71 cm</td><td>50 cm</td><td>24 cm</td><td>90</td></tr>
                </tbody>
              </table>
              <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border: none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Buy Button -->
  <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#sizeModal">
    Buy
</button>

</div>

    </div>
  </div>


 
  <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">PANTS (Boys)</h5>
      
      <img src="pantsboy.png" alt="PANTS (Boys)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">
  <!-- Add to Cart Button -->
 
  <button class="btn"
          style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
          data-toggle="modal"
          data-target="#pantsboyModal">
    <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i>
  </button>

  <!-- Size Modal for PANTS (Boys) -->
<div class="modal fade" id="pantsboyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
        <div class="modal-content" style="transform: translateY(5%);">
            <div class="modal-header" style="color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">PANTS (Boys)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="pantsboy.png" alt="PANTS" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
                        <br>                    
                        <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                                <option selected disabled>Choose your size...</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
                        </div>
                        <div style="margin-top: 10px; text-align: center;">
                            <button class="btn btn-green" id="addItemButton" data-toggle="modal" data-target="#confirmationModal" style="width: 150px; border-radius: 20px;">Add Item</button>
                        </div>
                    </div>
                    <div class="col-sm-8" style="width: 75%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th>Sizes</th>
                                    <th>Waist</th>
                                    <th>Length</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>60 cm</td><td>80 cm</td><td>50</td></tr>
                                <tr><td>S</td><td>64 cm</td><td>85 cm</td><td>40</td></tr>
                                <tr><td>M</td><td>68 cm</td><td>90 cm</td><td>30</td></tr>
                                <tr><td>L</td><td>72 cm</td><td>95 cm</td><td>20</td></tr>
                                <tr><td>XL</td><td>76 cm</td><td>100 cm</td><td>15</td></tr>
                                <tr><td>XXL</td><td>80 cm</td><td>105 cm</td><td>10</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border:none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





  <!-- Buy Button -->
  <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#pantsboyModal">
    Buy
</button>

</div>

    </div>
  </div>
</div>


<div class="product-grid">
  
   <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">BLOUSE (GIRLS)</h5>
      
      <img src="blouse.png" alt="BLOUSE (Girls)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">
  <!-- Add to Cart Button -->
  <button class="btn"
        style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
        data-toggle="modal"
        data-target="#blouseSizeModal">
    <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i> 
</button>


<!-- Size Modal BLOUSE -->
<div class="modal fade" id="blouseSizeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
        <div class="modal-content" style="transform: translateY(5%);">
            <div class="modal-header" style="color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">BLOUSE (Girls)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="blouse.png" alt="BLOUSE" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
                        <br>                    
                        <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                                <option selected disabled>Choose your size...</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
                        </div>
                        <div style="margin-top: 10px; text-align: center;">
                            <button class="btn btn-green" id="addItemButton" data-toggle="modal" data-target="#confirmationModal" style="width: 150px; border-radius: 20px;">Add Item</button>
                        </div>
                    </div>
                    <div class="col-sm-8" style="width: 75%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th>Sizes</th>
                                    <th>Chest</th>
                                    <th>Length</th>
                                    <th>Shoulder</th>
                                    <th>Sleeve</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>42 cm</td><td>55 cm</td><td>38 cm</td><td>14 cm</td><td>70</td></tr>
                                <tr><td>S</td><td>43 cm</td><td>57 cm</td><td>40 cm</td><td>15 cm</td><td>85</td></tr>
                                <tr><td>M</td><td>45 cm</td><td>60 cm</td><td>42 cm</td><td>17 cm</td><td>50</td></tr>
                                <tr><td>L</td><td>47 cm</td><td>63 cm</td><td>44 cm</td><td>19 cm</td><td>60</td></tr>
                                <tr><td>XL</td><td>49 cm</td><td>66 cm</td><td>46 cm</td><td>21 cm</td><td>80</td></tr>
                                <tr><td>XXL</td><td>52 cm</td><td>69 cm</td><td>48 cm</td><td>23 cm</td><td>100</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border:none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  <!-- Buy Button -->
 <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#blouseSizeModal">
    Buy
</button>
</div>

    </div>
  </div>

 
  <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">PANTS (Girls)</h5>
      
      <img src="pantsgirl.png" alt="PANTS (Girls)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">
  <!-- Add to Cart Button -->
  <button class="btn"
        style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
        data-toggle="modal"
        data-target="#pantsSizeModal">
    <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i>
</button>

<!-- Size Modal PANTS Girls-->
<div class="modal fade" id="pantsSizeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
        <div class="modal-content" style="transform: translateY(5%);">
            <div class="modal-header" style="color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">PANTS (Girls)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="pantsgirl.png" alt="PANTS" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
                        <br>                    
                        <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                                <option selected disabled>Choose your size...</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
                        </div>
                        <div style="margin-top: 10px; text-align: center;">
                            <button class="btn btn-green" id="addItemButton" data-toggle="modal" data-target="#confirmationModal" style="width: 150px; border-radius: 20px;">Add Item</button>
                        </div>
                    </div>
                    <div class="col-sm-8" style="width: 75%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th>Sizes</th>
                                    <th>Waist</th>
                                    <th>Length</th>
                                    <th>Hip</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>60 cm</td><td>85 cm</td><td>80 cm</td><td>70</td></tr>
                                <tr><td>S</td><td>62 cm</td><td>87 cm</td><td>82 cm</td><td>85</td></tr>
                                <tr><td>M</td><td>65 cm</td><td>90 cm</td><td>85 cm</td><td>50</td></tr>
                                <tr><td>L</td><td>68 cm</td><td>93 cm</td><td>88 cm</td><td>60</td></tr>
                                <tr><td>XL</td><td>72 cm</td><td>96 cm</td><td>92 cm</td><td>80</td></tr>
                                <tr><td>XXL</td><td>76 cm</td><td>100 cm</td><td>96 cm</td><td>100</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border:none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





  <!-- Buy Button -->
 <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#pantsSizeModal">
    Buy
</button>
</div>

    </div>
  </div>
</div>




<div class="product-grid">
  
   <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">PE (Tshirt)</h5>
      
      <img src="petshirt.png" alt="peshirt (unisex)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">
  <!-- Add to Cart Button -->
  <button class="btn"
        style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
        data-toggle="modal"
        data-target="#petShirtSizeModal">
    <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i> 
</button>


<!-- Size Modal PET SHIRT -->
<div class="modal fade" id="petShirtSizeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
        <div class="modal-content" style="transform: translateY(5%);">
            <div class="modal-header" style="color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">PET SHIRT (Pets)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="petshirt.png" alt="PET SHIRT" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
                        <br>                    
                        <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                                <option selected disabled>Choose your size...</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
                        </div>
                        <div style="margin-top: 10px; text-align: center;">
                            <button class="btn btn-green" id="addItemButton" data-toggle="modal" data-target="#confirmationModal" style="width: 150px; border-radius: 20px;">Add Item</button>
                        </div>
                    </div>
                    <div class="col-sm-8" style="width: 75%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th>Sizes</th>
                                    <th>Chest</th>
                                    <th>Length</th>
                                    <th>Shoulder</th>
                                    <th>Sleeve</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>42 cm</td><td>55 cm</td><td>38 cm</td><td>14 cm</td><td>70</td></tr>
                                <tr><td>S</td><td>43 cm</td><td>57 cm</td><td>40 cm</td><td>15 cm</td><td>85</td></tr>
                                <tr><td>M</td><td>45 cm</td><td>60 cm</td><td>42 cm</td><td>17 cm</td><td>50</td></tr>
                                <tr><td>L</td><td>47 cm</td><td>63 cm</td><td>44 cm</td><td>19 cm</td><td>60</td></tr>
                                <tr><td>XL</td><td>49 cm</td><td>66 cm</td><td>46 cm</td><td>21 cm</td><td>80</td></tr>
                                <tr><td>XXL</td><td>52 cm</td><td>69 cm</td><td>48 cm</td><td>23 cm</td><td>100</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border:none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





  <!-- Buy Button -->
  <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#petShirtSizeModal">
    Buy
</button>
</div>

    </div>
  </div>

 
  <div class="product-card">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding: 10px; text-align: center;">
      <h5 style="font-size: 18px; margin-bottom: 10px;">PE (Pants)</h5>
      
      <img src="pepants.png" alt="pepants (Unisex)"
           style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; margin-bottom: 15px;">
      
      <div style="display: flex; justify-content: space-between; padding: 0 10px;">
  <!-- Add to Cart Button -->
  <button class="btn"
        style="background-color: #6A9C89; border-radius: 20px; width: 48%; color: white;"
        data-toggle="modal"
        data-target="#pepantsSizeModal">
    <i class="bi bi-cart-check" style="font-size: 1.5rem;"></i>
</button>


<!-- Size Modal PEPANTS -->
<div class="modal fade" id="pepantsSizeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="padding-left: 100px;">
        <div class="modal-content" style="transform: translateY(5%);">
            <div class="modal-header" style="color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">PEPANTS (Girls)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px;">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="pepants.png" alt="PEPANTS" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
                        <br>                    
                        <div style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <select class="form-control" id="sizeSelect" style="width: 78%; border-radius: 15px; color: #757575;">
                                <option selected disabled>Choose your size...</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            <input type="number" id="itemQuantity" class="form-control" min="1" value="1" style="width: 25%;">
                        </div>
                        <div style="margin-top: 10px; text-align: center;">
                            <button class="btn btn-green" id="addItemButton" data-toggle="modal" data-target="#confirmationModal" style="width: 150px; border-radius: 20px;">Add Item</button>
                        </div>
                    </div>
                    <div class="col-sm-8" style="width: 75%;">
                        <table class="table table-bordered">
                            <thead style="background-color: #6A9C89; color: white; text-align: center;">
                                <tr>
                                    <th>Sizes</th>
                                    <th>Waist</th>
                                    <th>Length</th>
                                    <th>Hip</th>
                                    <th>Inseam</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody style="color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>60 cm</td><td>95 cm</td><td>85 cm</td><td>70 cm</td><td>70</td></tr>
                                <tr><td>S</td><td>63 cm</td><td>97 cm</td><td>88 cm</td><td>72 cm</td><td>85</td></tr>
                                <tr><td>M</td><td>66 cm</td><td>100 cm</td><td>90 cm</td><td>75 cm</td><td>50</td></tr>
                                <tr><td>L</td><td>69 cm</td><td>102 cm</td><td>92 cm</td><td>78 cm</td><td>60</td></tr>
                                <tr><td>XL</td><td>72 cm</td><td>105 cm</td><td>95 cm</td><td>80 cm</td><td>80</td></tr>
                                <tr><td>XXL</td><td>75 cm</td><td>108 cm</td><td>98 cm</td><td>82 cm</td><td>100</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C; padding-top: 29px; border:none; border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





  <!-- Buy Button -->
  <button class="btn" 
        style="background-color: #16423C; border-radius: 20px; width: 48%; color: white;" 
        data-toggle="modal" 
        data-target="#pepantsSizeModal">
    Buy
</button>
</div>

    </div>
  </div>
</div>


    </div> 
  </div>




  <!-- RIGHT SIDE -->
  <div class="right-panel">

    <div class="to-pay-box box" style="color: #16423C; background: #C4DAD2; border: 1px solid #16423C;">
  <div style="color: #16423C;"><h3>To Pay</h3></div>

  <div class="order-list" style="display: flex; flex-direction: column; gap: 15px; margin-top: 15px; background: #C4DAD2;">

  <div class="order-item" style="display: flex; align-items: center; background: #f9f9f9; padding: 10px; border-radius: 8px; background: #C4DAD2;">
    <img src="polo.png" style="border: 2px solid #16423C; width: 60px; height: auto; border-radius: 8px;" />
    <div style="flex: 1; margin-left: 15px;">
      <p style="margin: 0; font-weight: bold; color: #16423C;">POLO (Boys)</p>
      <small style="color: #16423C;">Size: M | Qty: 1<br>₱700.00</small>
    </div>
    <button class="remove-btn" style="background: none; border: none; font-size: 24px; color: #16423C; cursor: pointer;">×</button>
  </div>

  <div class="order-item" style="display: flex; align-items: center; background: #f9f9f9; padding: 10px; border-radius: 8px; background: #C4DAD2;">
    <img src="polo.png" style="border: 2px solid #16423C; width: 60px; height: auto; border-radius: 8px;" />
    <div style="flex: 1; margin-left: 15px;">
      <p style="margin: 0; font-weight: bold; color: #16423C;">POLO (Boys)</p>
      <small style="color: #16423C;">Size: M | Qty: 1<br>₱700.00</small>
    </div>
    <button class="remove-btn" style="background: none; border: none; font-size: 24px; color: #16423C; cursor: pointer;">×</button>
  </div>

  <div class="order-item" style="display: flex; align-items: center; background: #f9f9f9; padding: 10px; border-radius: 8px; background: #C4DAD2;">
    <img src="polo.png" style="border: 2px solid #16423C; width: 60px; height: auto; border-radius: 8px;" />
    <div style="flex: 1; margin-left: 15px;">
      <p style="margin: 0; font-weight: bold; color: #16423C;">POLO (Boys)</p>
      <small style="color: #16423C;">Size: M | Qty: 1<br>₱700.00</small>
    </div>
    <button class="remove-btn" style="background: none; border: none; font-size: 24px; color: #16423C; cursor: pointer;">×</button>
  </div>

</div>


  <div class="order-summary" style="margin-top: 20px; padding: 15px; background-color: #f4f4f4; border-radius: 10px; color: #16423C; background: #C4DAD2;">
  <p style="margin-bottom: 10px; font-weight: bold; font-size: 18px;">Order Summary</p>
  <p style="margin: 6px 0;">Appointment Date & Time: <strong>10/07/24 (10:00 AM)</strong></p>
  <p style="margin: 6px 0;">Order #: <strong>#8747</strong></p>
  <p style="margin: 10px 0 0;"><strong>TOTAL: ₱1,690.00</strong></p>
    <div style="text-align: right;">
      <button class="cancel-btn" style="margin-right: 10px; background: #C4DAD2; border: 1px solid #16423C; color: #16423C; padding: 6px 12px; border-radius: 19px;">Cancel</button>
      <button class="edit-btn" style="background-color: #16423C; border: none; color: #ffffff; padding: 6px 12px; border-radius: 19px;">Edit Time</button>
    </div>
  </div>
</div>



<div class="cart-box box" style="background-color: #C4DAD2; border: 1px solid #16423C; border-radius: 10px; padding: 15px; color: white; height: 569px; overflow-y: auto; display: flex; flex-direction: column; justify-content: space-between; overflow-y: auto;">
  <div>
    <h3 style="margin-bottom: 15px;">Add to cart</h3>

    <!-- Order Item -->
    <div class="order-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <!-- Image -->
      <img src="pantsgirl.png" alt="PANTS (GIRL)" style="width: 60px; height: auto; border-radius: 6px; border: 1px solid white; margin-right: 12px;">
      
      <!-- Details -->
      <div style="flex: 1;">
        <p style="margin: 0;">PANTS (GIRL)</p>
        <small style="color: white;">Qty: 2 | <br>₱950.00</small>
      </div>

      
      <button class="remove-btn" style="background: none; border: none; color: white; font-size: 20px;">×</button>
    </div>

    
  </div>

  <!-- Confirm Button -->
  <div style="text-align: right; margin-top: 10px; ">

<button 
  onclick="openModal()" 
  class="btn btn-primary" 
  style="
    background-color: #C4DAD2;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 19px;
    min-width: 180px;
    white-space: nowrap;
    font-weight: bold;
    font-size: 15px;
  "

  Confirmation Order
</button>
<!--  SET APPOINTMENT (Custom Modal) -->
  <div id="orderModal">
    <div id="orderModalContent">
      <h3 style="color: #16423C; font-weight: bold;">Set Appointment</h3>

      <div class="form-group" style="color: #16423C; text-align: left;">
        <label for="date">Date</label>
        <input type="date" id="date" class="form-control" required style="height: 45px;">
      </div>

      <div class="form-group mt-3" style="color: #16423C; text-align: left;">
        <label for="time">Time</label>
        <input type="time" id="time" class="form-control" required style="height: 45px;">
      </div>

      <div class="mt-4 d-flex justify-content-between" style="margin-top: 20px;">
        <button onclick="closeModal()" style="background-color: #6A9C89; color: white; border: 1px solid #C4DAD2; padding: 8px 16px; border-radius: 15px;">Cancel</button>

        <button onclick="proceedToConfirmation()" style="background-color: white; color: #6A9C89; border: 1px solid #6A9C89; padding: 8px 16px; border-radius: 15px;">Confirm</button>
      </div>
    </div>
  </div>

  <!--  CONFIRMATION MODAL -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style=" font-size: 19px;">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p style=" font-size: 17px; color: #16423C;">Are you sure you want to proceed?</p>
          <p>Make sure your details are correct.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="noBtn">NO</button>
          <button type="button" class="btn btn-success" id="yesBtn" style="background-color: #6A9C89; color: #FFFFFF; border-radius: 20px; width: 80px; font-weight: bold;">YES</button>
        </div>
      </div>
    </div>
  </div>

  <!--  TICKET MODAL -->
  <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="transform: translateY(-65%); margin-left: 350px;">
      <div class="modal-content" style="width: 120%; background-color: #e9efec;">
        <div class="modal-header">
          <h4 class="modal-title text-center" style="font-weight: bold; font-size: 20px;">TICKET GENERATED!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <p style="color: #16423C;">Kindly download this ticket and present it to the stocks office during pick-up.</p>
          <img src="ticket.jpg" alt="Ticket" style="max-width: 100%; height: auto;">
          <div class="download-btn">
            <a href="APPOINTMENT_Stud.php" download>DOWNLOAD</a>
          </div>
        </div>
      </div>
    </div>
  </div>




    </div>
    
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

        function confirmAndOpenTicket() {
    $('#confirmationModal').modal('hide'); // Close the confirmation modal
    setTimeout(function() {
      $('#ticketModal').modal('show');     // Open the ticket modal after delay
    }, 300); // delay in milliseconds
  }

function openModal() {
    document.getElementById('orderModal').style.display = 'block';
  }

  function closeModal() {
    document.getElementById('orderModal').style.display = 'none';
  }

 
 function openModal() {
      document.getElementById("orderModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("orderModal").style.display = "none";
    }

    function proceedToConfirmation() {
      // hide the custom modal and show the Bootstrap one
      closeModal();
      $('#confirmationModal').modal('show');
    }

    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("noBtn").addEventListener("click", function () {
        // When NO is clicked, bring back the set appointment modal
        document.getElementById("orderModal").style.display = "block";
      });

      document.getElementById("yesBtn").addEventListener("click", function () {
        // Close confirmation and show ticket modal
        $('#confirmationModal').modal('hide');
        setTimeout(function () {
          $('#ticketModal').modal('show');
        }, 400);
      });
    });


    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
    </body>
</html>