<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image/x-icon">
    <style>
        body{
            background-color: #6A9C89;
            margin: 0%;  
            height: auto;
            width: auto;
        }
        body::-webkit-scrollbar {
           width: 9px;
        }

        body::-webkit-scrollbar-thumb {
           background: #16423C;
           border-radius: 4px;
        }

        .header {
            background-color: #16423C;
            padding: 4px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            padding-left: 2%;
            width: 100px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 20px;
            font-weight: bold;
            color: #EEF0E5;
        }

        .links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-left: auto;
        }

        .links a {
            margin-right: 50px;
            color: #EEF0E5;
            text-decoration: none;
            font-weight: bold;
        }

        .dropdown {
            position: relative;
            display: flex;
        }

        .dropbtn {
            background-color: #16423C;
            color: #EEF0E5;
            font-weight: bold;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 20px;
        }

        .dropdown-content {
           display: none;
           position: absolute;
           background-color: #C4DAD2;
           min-width: 10px;
           font-size: 16px;
           box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
           z-index: 1;

        }

        .dropdown-content a {
           color: #16423C;
           padding: 10px 12px;
           text-decoration: none;
           display: block;
           margin: auto;
           font-size: 16px;
           border-bottom: 1px solid #ffffff;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #0e2b28;
        }

        .welcome {
            margin-top: -15px;
        }

        .welcome h2 {
            font-size: 38px;
            font-weight: bold;
            padding-bottom: 3%;
            color: #EEF0E5;
            text-align: center;
        }

        .stock {
            margin-top: -18px;
        }

        .stock h3 {
            font-size: 22px;
            color: #EEF0E5;
            text-align: center;
        }

        .stock-info {
            background-color: #EEF0E5;
            border-radius: 16px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            width: 85%;
            margin: auto;
        }

        .stock-info ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .stock-info li {
            text-align: center;
            flex: 1;
            margin-bottom: 1px;
            color: #16423C;
            font-size: 18px;
            font-weight: bold;
        }


        .stock-info ul li {
            border-right: 2px solid #16423C;
            text-align: center;
            padding: 5px 0;
            height: 77px;
        }
    
        .stock-info ul li:last-child {
            border-right: none;
        }

        .stock-info .stock-number {
            font-weight: bold;
            font-size: 37px;
            color: #16423C;
        }




        /*CALENDAR*/
        .calendar_cont {
           background-color: #16423C;
           width: 350px;
           border-radius: 30px;
           height: auto;
           box-shadow: 0px 4px 4px 0px #888888;
           margin-left: 3%;
        }

        .calendar {
           width: 100%;
           max-width: 600px;
           background-color: #16423C;
           border-radius: 20px;
           margin-top: -10px;
        }

        .calendar-header {
           display: flex;
           justify-content: space-between;
           align-items: center;
           padding: 10px;
           background-color: #16423C;
           color: white;
           border-radius: 20px 20px 0 0;
           font-weight: bolder;
        }

        .calendar-body {
           padding: 10px;
        }

        .calendar-weekdays {
           display: flex;
           justify-content: space-between;
        }

        .calendar-weekdays div {
           width: 14.28%;
           text-align: center;
           padding: 10px 0;
           background-color: #16423C;
           border: 1px solid #16423C;
           font-weight: bolder;
           color: white;
        }

        .calendar-dates {
           display: flex;
           flex-wrap: wrap;
        }

        .calendar-dates div {
           width: 14.28%;
           text-align: center;
           padding: 10px 0;
           border: 1px solid #16423C;
           font-weight: bolder;
           color: white;
        }

        .calendar-dates div.empty {
           background-color: #16423C;
        }

        .calendar-dates div.current {
           background-color: #C4DAD2;
           color: #16423C;
           font-weight: bolder;
           border-radius: 100px;
        }

        .calendar-dates div:hover {
           background-color: #C4DAD2;
           cursor: pointer;
           border-radius: 100px;
           color: #16423C;
        }

        .status {
           position: absolute;
           background-color: #EEF0E5;
           border-radius: 17px;    
           box-shadow: 0px 4px 4px 0px #888888;
           color: #16423C;
           width: 350px;
           height: 180px;
           margin-top: 13px;
           margin-left: -0px;  
           padding-top: 1%;
        }

        .status h3 {
           border-radius: 15px;
           background-color: #C4DAD2;
           font-size: 22px;
           font-weight: bold;
           width: 290px;
           height: 35px;
           text-align: center;
           margin: auto;
           margin-bottom: 20px;
        }

        .status-item {
           display: flex;
           justify-content: space-evenly;
           align-items: center;
           margin-bottom: 5px;

        }

        .count {
           border-radius: 20px;
           background-color: #16423C;
           font-size: 18px;
           font-weight: bold;
           color: #EEF0E5;
           width: 70px;
           height: 29px;
           display: flex;
           justify-content: center;
           align-items: center;
        }

        .label {
           font-size: 20px;
           font-weight: bold;
           color: #16423C;
           margin-left: -40px;
        }

        .transaction {
           position: absolute;
           background-color: #EEF0E5;
           border-radius: 20px;    
           box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
           color: #ffffff;
           width: 909px;
           height: 590px;
           margin-left: 390px;
           margin-top: -395px;
           overflow-y: scroll;
        }

        .transaction::-webkit-scrollbar {
           width: 8px;
        }

        .transaction::-webkit-scrollbar-thumb {
           background: #16423C;
           border-radius: 4px;
        }

        .transaction h2 {
           top: 0;
           position: sticky;
           font-size: 25px;
           color: #16423C;
           font-weight: bold;
           text-align: center;
           margin-top: 10px;
        }

        .receipt1 {
           position: absolute;
           color: #EEF0E5;
           background-color: #C4DAD2;
           border: 3px solid #16423C;
           border-radius: 15px;
           box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
           width: 710px; 
           height: 300px; 
           margin-left: 90px;
        }
    
        .receipt1 span{
           display: flex;
           border-radius: 5px;
           background-color: #16423C;
           font-size: 27px;
           font-weight: bold;
           margin: 15px;
           padding-left: 15px;
           align-items: center;
        }

        .receipt2 {
           position: absolute;
           color: #EEF0E5;
           background-color: #C4DAD2;
           border: 3px solid #16423C;
           border-radius: 15px;
           box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
           width: 710px; 
           height: 300px; 
           margin-left: 90px;
           margin-top: 320px;
           top: 50px;
        }

        .receipt2 span{
           display: flex;
           border-radius: 5px;
           background-color: #16423C;
           font-size: 27px;
           font-weight: bold;
           margin: 15px;
           padding-left: 15px;
           align-items: center;
        }

        .cancel a {
           margin-left: 380px;
        }

        .check a {
           margin-left: 15px;
        }

        .order {
           position: absolute;
           color: #EEF0E5;
           background-color: #ffffff;
           border: 1px solid #16423C;
           border-radius: 15px;
           width: 370px;
           height: 190px;
           margin-left: 300px; 
        }

        .order, .info, h5, h6, a {
           color: #16423C; 
        }

        .order h5 {
            font-size: 20px;
            font-weight: bold;
            padding-left: 15px;
            padding-bottom: 10px;
        }

        .order h6 {
            font-size: 15px;
            font-weight: bold;
            padding-left: 15px;
        }

        .order i {
            position: absolute;
            font-size: 15px;
            font-weight: bold;
            font-style: normal;
            padding-left: 180px;
        }

        .order a {
            font-size: 15px;
            font-weight: lighter;
        }

        .info {
            margin-left: 25px; 
        }

        .info h5 {
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 5px;
        }

        .info h6 {
            font-size: 15px;
            font-weight: bold;
        } 

        .info a {
            font-size: 15px;
            font-weight: lighter;
        }
    </style>
</head>
<body style=" overflow-y: scroll;">
<div class="header">
    <div class="logo">
      <img src="Logo_Light.png" alt="Fit4School Logo">
      <h1>Fit4School</h1>

      <div class="links">
        <div class="dropdown">
          <a class="dropbtn">Dashboard 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
          </a>
          <div class="dropdown-content">
            <a href="admindash.php">Dashboard</a>
            <a href="appointments.php">Appointments</a>
            <a href="stock.php">Stocks</a>
            <a href="archive.php">Archive</a>
          </div>
        </div>
            <a href="adminhelp.php">Help</a>
            <a href="fit4login.php">Logout</a>
        </div>      
    </div>

    <div class="welcome">
      <h2>Welcome Admin!</h2>
    </div>

    <div class="stock">
      <h3>STOCKS LEFT PER UNIFORM</h3>
    </div>
    <div class="stock-info">
      <ul>
        <li>
          <span>POLO (Boys)</span>
          <br>
          <span class="stock-number">390</span>
        </li>
        <li>
          <span>PANTS (Boys)</span>
          <br>
          <span class="stock-number">400</span>
        </li>
        <li>
          <span>BLOUSE (Girls)</span>
          <br>
          <span class="stock-number">200</span>
        </li>
        <li>
          <span>PANTS (Girls)</span>
          <br>
          <span class="stock-number">250</span>
        </li>
        <li>
          <span>PE (T-Shirt)</span>
          <br>
          <span class="stock-number">300</span>
        </li>
        <li>
          <span>PE (Pants)</span>
          <br>
          <span class="stock-number">450</span>
        </li>
      </ul>
    </div>
</div>
<br>

<div>
    <!-- Calendar -->
    <div class="calendar_cont">
        <div id="calendar" class="calendar">
            <div class="calendar-header">
                <button id="prev-month" class="btn btn-primary" style="background-color: #16423C; border: none;">&lt;</button>
                <div id="month-year"></div>
                <button id="next-month" class="btn btn-primary" style="background-color: #16423C; border: none;">&gt;</button>
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
        <!-- Appointment Status -->
        <div class="status">
            <h3>Appointment Status</h3>
            <div class="status-item">
                <span class="count" style="margin-left: -15px;">30</span>
                <span class="label">Done</span>
            </div>
            <div class="status-item">
                <span class="count">20</span>
                <span class="label">Ongoing</span>
            </div>
            <div class="status-item">
                <span class="count" style="margin-left: -9px;">15</span>
                <span class="label">Missed</span>
            </div>
        </div>

        <!--Transaction-->
        <div class="transaction">
       <div>  
      <h2>CONFIRM TRANSACTION</h2>
      </div>
      <div class="transaction1">
      <!--1st-->
      <div class="receipt1">
        <span>
          Order ID: AB174
          <div class="cancel">
            <a href="#">
              <svg width="20" height="25" fill="red">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.646-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
              </svg>
            </a>
          </div>
          <div class="check">
            <a href="#">
              <svg width="20" height="25" fill="green">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
            </a>
          </div>
        </span>
      
        <div class="order">
          <h5>Orders</h5>
          <h6>PE(T-Shirt) <i>₱390.OO</i></h6>
          <h6>Size: <a>L</a></h6>
          <h6>Quantity: <a>1</a></h6>
          <br>
          <h6>Total: <i>₱390.OO</i></h6>
        </div>
      
        <div class="info">
          <h5>Queue No. 24</h5>
          <h6>Surname, First Name M.I</h6>
          <h6>202412345</h6>
          <h6>BSIT - 3D</h6>
          <br>
          <h6>Date: <a>October 7, 2024</a></h6>
          <h6>Time: <a>10:00 AM</a></h6>
        </div>
      </div>
      <!--2nd-->
      <div class="receipt2"> 
        <span>
          Order ID: CD938
          <div class="cancel">
            <a href="#">
              <svg width="20" height="25" fill="red">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.646-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
              </svg>
            </a>
          </div>
          <div class="check">
            <a href="#">
              <svg width="20" height="25" fill="green">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
            </a>
          </div>
        </span>
      
        <div class="order">
          <h5>Orders</h5>
          <h6>POLO (Boys) <i>₱250.00</i></h6>
          <h6>Size: <a>M</a></h6>
          <h6>Quantity: <a>4</a></h6>
          <br>
          <h6>Total: <i>₱1000.00</i></h6>
        </div>
      
        <div class="info">
          <h5>Queue No. 45</h5>
          <h6>Surname, First Name M.I</h6>
          <h6>202212345</h6>
          <h6>BSIT - 3D</h6>
          <br>
          <h6>Date: <a>November 4, 2024</a></h6>
          <h6>Time: <a>10:00 AM</a></h6>
        </div>
      </div>

    </div>
</div>

    </div>
 
</div>



<script>
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

    
</body>
</html>