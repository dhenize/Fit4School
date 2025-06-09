<!DOCTYPE html>
<html lang = "en">
    <head>
    <title>DASHBOARD_Stud</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="DASH_Stud.css">
    </head>

    <body>
        <div class = "container-fluid row">
            <div class = "col-lg-2">
                <div class = "Logo">
                    <img src = "Logo_Light.png" width="64px" height="64px">
                    <span class = "Logo_txt">Fit4School</span>
                </div>
                <div class = "sm-cont">
                    <div>
                        <button class = "SD_btn" onclick="location.href='DASHBOARDStud.php'"><img src = "dashboard (4).png" class = "sd_icon" style = "padding-right: 10px;">Student Dashboard</button>
                    </div>
                    <div>
                        <button class = "VS_btn" onclick="location.href='VIEW_SIZE_Stud.php'"><img src = "ruler (1).png" class = "vs_icon" style = "padding-right: 10px;">View Sizes</button>
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
            <div class = "col-lg-10">
                <!-- Upper Menu -->
                <div class="upm-cont">
                    <div class="wc">
                        <h2 style="color: #16423C; font-weight: bold; font-family: Candara; margin-left: 5px;">Welcome!</h2>
                    </div>
                <div class="dp">
                    <span class="usern" style="color: #16423C; font-weight: bold; font-family: Candara;">Dhenize</span>
                    <img src="user.png" height="40px" width="40px" alt="User Profile">
        
        <!-- Popup Content -->
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


                <div class="view-container"> 

                <!-- SLIDESHOW -->
                <div class = "featured">
                    <div class = "Slides">
                        <img src="Welcome to Fit4School.png">
                    </div>
                    <div class = "Slides">
                        <img src="carosel1.png">
                    </div>
                    <div class = "Slides">
                        <img src="carosel2.png">
                    </div>

                    <div class = "Slides">
                        <img src="carosel3.png">
                    </div>

                    <div class = "Slides">
                        <img src="carosel4.png">
                    </div>

                    <div class = "Slides">
                        <img src="carosel5.png">
                    </div>

                    <div class = "Slides">
                        <img src="carosel6.png">
                    </div>

                    <!--<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>-->

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>


                <div class = "lbox-cont">
                    <div>
                        <div class = "prev_log">
                            <p style=" margin-top: 9px; font-size: 19px;">Last Login: January 6, 2024 6:30:20 PM</p>
                        </div>

                        <div class = "notice"> 
                            <span style=" font-size: 20px; font-weight: bold; color: #16423C;"><img src = "warning.png" height = "11%" width = "11%" style=" margin-right: 10px;">NOTICE</span>
                            <br>
                            <br>
                            <p style=" font-size: 17px;">Upcoming Appointment on <span style = "color: #1A636A">June 20, 2024 08:00 AM</span></p>
                            
                        </div>
                    </div>


                    <div>

                        <div class = "calendar_cont">
                            <div id="calendar" class="calendar">
                                <div class="calendar-header">
                                    <button id="prev-month" class="btn btn-primary" style = "background-color: #6A9C89; border: none;">&lt;</button>
                                    <div id="month-year"></div>
                                    <button id="next-month" class="btn btn-primary" style = "background-color: #6A9C89; border: none;">&gt;</button>
                                </div>

                                <div class="calendar-body">
                                    <div class="calendar-weekdays">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="calendar-dates"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                
                

            </div> <!-- END OF RIGHT SECTION-->
        </div> <!-- END OF WHOLE-->
    </div>
    </div>



        <script>
            //FOR CAROUSEL
            let slideIndex = 0;
            showSlides();

            function showSlides() {
            let i;
            let slides = document.getElementsByClassName("Slides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 4000); // Change image every 2 seconds
            }

            

            //CALENDAR
            document.addEventListener('DOMContentLoaded', function() {
            const calendar = document.querySelector('#calendar');
            const monthYear = calendar.querySelector('#month-year');
            const dates = calendar.querySelector('.calendar-dates');
            const prevMonthButton = calendar.querySelector('#prev-month');
            const nextMonthButton = calendar.querySelector('#next-month');

            let currentDate = new Date();

            function renderCalendar(date) {
                dates.innerHTML = '';
                monthYear.textContent = date.toLocaleDateString('en-us', { month: 'long', year: 'numeric' });

                const firstDayOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
                const lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);

                const daysInMonth = lastDayOfMonth.getDate();
                const startingDay = firstDayOfMonth.getDay();
                
                // Fill in the days
                for (let i = 0; i < startingDay; i++) {
                    const emptyCell = document.createElement('div');
                    emptyCell.classList.add('empty');
                    dates.appendChild(emptyCell);
                }

                for (let i = 1; i <= daysInMonth; i++) {
                    const dayCell = document.createElement('div');
                    dayCell.textContent = i;
                    dayCell.addEventListener('click', () => {
                        alert(`You clicked on ${i}`);
                    });
                    if (
                        i === new Date().getDate() &&
                        date.getMonth() === new Date().getMonth() &&
                        date.getFullYear() === new Date().getFullYear()
                    ) {
                        dayCell.classList.add('current');
                    }
                    dates.appendChild(dayCell);
                }
            }

            function changeMonth(offset) {
                currentDate.setMonth(currentDate.getMonth() + offset);
                renderCalendar(currentDate);
            }

            prevMonthButton.addEventListener('click', () => changeMonth(-1));
            nextMonthButton.addEventListener('click', () => changeMonth(1));

            renderCalendar(currentDate);
            });

        </script>

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