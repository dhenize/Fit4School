<!DOCTYPE html>
<html lang = "en">
    <head>
    <title>View Sizes</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="View_Stud.css">
    </head>

    <body style=" overflow: hidden;">
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
                        <button class = "VS_btn" onclick="location.href='VIEW_SIZE_Stud.php'"><img src = "ruler.png" class = "vs_icon" style = "padding-right: 10px;">View Sizes</button>
                    </div>
                    <div>
                        <button class = "App_btn" onclick="location.href='APPOINTMENT_Stud.php'"><img src = "appointment (1).png" class = "app_icon" style = "padding-right: 10px;">Appointment</button>
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
            <div class="container-fluid col-lg-10" style="max-height: 95vh; overflow: hidden; padding: 20px;">
                <!-- Upper Menu -->
                <div class="upm-cont">
                    <div class="wc">
                        <h2 style="color: #16423C; font-weight: bold; font-family: Candara;">View Sizes</h2>
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


               <!-- View Sizes Section -->
<div class="view-container">
    <div style="text-align: center;">
        <h4 style="font-size: 30px;">School Uniforms</h4>
    </div>
    <br>

    <!-- Uniform Cards of View Sizes Section-->
    <div class="col-md-4" style="margin: 10px auto;">
        <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
            <h5 class="card-title" style="text-align: center; font-size: 18px;">POLO (Boys)</h5>
            <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
                <img src="polo.png" class="card-img-top" alt="POLO (Boys)" 
                     style="width: 300px; height: 320px; border-radius: 10px;">
            </div>
            <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
                <button class="btn btn-green" data-toggle="modal" data-target="#sizeModal" 
                        data-name="POLO (Boys)" 
                        data-price="250" 
                        data-image="images/polo.png"
                        style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                    View Sizes
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-4" style="margin: 10px auto;">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">PANTS (Boys)</h5>
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
            <img src="pantsboy.png" class="card-img-top" alt="PANTS (Boys)" 
                 style="width: 300px; height: 320px; border-radius: 10px;">
        </div>
        <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
            <button class="btn btn-green" data-toggle="modal" data-target="#pantsboyModal" 
                    data-name="PANTS (Boys)" 
                    data-price="250" 
                    data-image="images/pantsboy.png"
                    style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                View Sizes
            </button>
        </div>
    </div>
</div>

<div class="col-md-4" style="margin: 10px auto;">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">BLOUSE (Girls)</h5>
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
            <img src="blouse.png" class="card-img-top" alt="BLOUSE (Girls)" 
                 style="width: 300px; height: 320px; border-radius: 10px;">
        </div>
        <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
            <button class="btn btn-green" data-toggle="modal" data-target="#blouseSizeModal" 
                    data-name="BLOUSE (Girls)" 
                    data-price="250" 
                    data-image="images/blouse.png"
                    style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                View Sizes
            </button>
        </div>
    </div>
</div>

<div class="col-md-4" style="margin: 10px auto;">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">PANTS (Girls)</h5>
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
            <img src="pantsgirl.png" class="card-img-top" alt="PANTS (Girls)" 
                 style="width: 300px; height: 320px; border-radius: 10px;">
        </div>
        <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
            <button class="btn btn-green" data-toggle="modal" data-target="#pantsSizeModal" 
                    data-name="PANTS (Girls)" 
                    data-price="250" 
                    data-image="images/pantsgirl.png"
                    style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                View Sizes
            </button>
        </div>
    </div>
</div>

<div class="col-md-4" style="margin: 10px auto;">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">PET SHIRT (Pets)</h5>
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
            <img src="petshirt.png" class="card-img-top" alt="PET SHIRT (Pets)" 
                 style="width: 300px; height: 320px; border-radius: 10px;">
        </div>
        <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
            <button class="btn btn-green" data-toggle="modal" data-target="#petShirtSizeModal" 
                    data-name="PET SHIRT (Pets)" 
                    data-price="250" 
                    data-image="images/petshirt.png"
                    style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                View Sizes
            </button>
        </div>
    </div>
</div>


<div class="col-md-4" style="margin: 10px auto;">
    <div class="card" style="background: #C4DAD2; border-radius: 15px; padding-top: 2px;">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">PEPANTS (Girls)</h5>
        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: -10px;">
            <img src="pepants.png" class="card-img-top" alt="PEPANTS (Girls)" 
                 style="width: 300px; height: 320px; border-radius: 10px;">
        </div>
        <div class="card-body text-center" style="text-align: center; margin-top: 10px;">
            <button class="btn btn-green" data-toggle="modal" data-target="#pepantsSizeModal" 
                    data-name="PEPANTS (Girls)" 
                    data-price="250" 
                    data-image="images/pepants.png"
                    style="width: 190px; height: 40px; margin-top: -90px; border-radius: 20px; font-size: 16px;">
                View Sizes
            </button>
        </div>
    </div>
</div>

</div>




<!-- Size Modal POLO -->
<div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" style=" padding-left: 100px;">
        <div class="modal-content" style=" transform: translateY(5%);">
            <div class="modal-header" style=" color: #16423C; padding-left: 200px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-right" style="text-align: center; font-size: 27px;">POLO (Boys)</h4>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-sm-4 text-center" style="background-color: #16423C; border-radius: 15px; padding: 10px; width: 32%; height: 450px; margin-top: -50px; ">
                        <h4 class="modal-title" style="color: #fff; font-size: 25px;">₱250.00</h4>
                        <img src="polo.png" alt="POLO" style="width: 100%; height: 300px; border: 1px solid #C4DAD2; border-radius: 15px;">
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
                            <button class="btn btn-green" id="addItemButton" style="width: 150px; border-radius: 20px;">Add Item</button>
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
                            <tbody style=" color: #16423C; text-align: center;">
                                <tr><td>XS</td><td>44 cm</td><td>58 cm</td><td>40 cm</td><td>15 cm</td><td>60</td></tr>
                                <tr><td>S</td><td>45 cm</td><td>61 cm</td><td>42 cm</td><td>16 cm</td><td>80</td></tr>
                                <tr><td>M</td><td>46 cm</td><td>64 cm</td><td>44 cm</td><td>18 cm</td><td>35</td></tr>
                                <tr><td>L</td><td>48 cm</td><td>67 cm</td><td>46 cm</td><td>20 cm</td><td>50</td></tr>
                                <tr><td>XL</td><td>50 cm</td><td>69 cm</td><td>48 cm</td><td>22 cm</td><td>75</td></tr>
                                <tr><td>XXL</td><td>53 cm</td><td>71 cm</td><td>50 cm</td><td>24 cm</td><td>90</td></tr>
                            </tbody>
                        </table>
                        <div class="note" style="width: 100%; height: 27%; font-size: 16px; color: #16423C;  padding-top: 29px; border:none;  border-radius: 20px; background-color: #FFFFFF; box-shadow: 0px 4px 4px 0px #888888;">
                            <strong>Note:</strong><br> Please proceed to the appointment menu for scheduling of pick-up.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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



<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #16423C; font-size: 20px;">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Item is added to your list of orders.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-green" data-dismiss="modal" onclick="window.location.href='APPOINTMENT_Stud.php'">OK</button>
            </div>
        </div>
    </div>
</div>




            </div> <!-- END OF RIGHT SECTION-->
        </div> <!-- END OF WHOLE-->
    </div>



        
            

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
    <script>
        // Handle Add Item Button Click
        document.getElementById('addItemButton').addEventListener('click', function() {
            const size = document.getElementById('sizeSelect').value;
            const quantity = document.getElementById('itemQuantity').value;

            if (!size) {
                alert('Please select a size.');
                return;
            }
            if (quantity < 1) {
                alert('Quantity must be at least 1.');
                return;
            }
            // Show confirmation modal
            $('#confirmationModal').modal('show');
        });
    </script>



    </body>
</html>