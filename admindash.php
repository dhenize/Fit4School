<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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



        .bodyinfo {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 10px;
            margin-right: 15px;
            margin-left: 15px;
        }

        .datetime {
            color: #EEF0E5;
            font-size: 19px;
        }

        .picdate-act {
            display: flex; 
            gap: 12px; 
            align-items: center;
        }

        .daterange {
            display: flex; 
            align-items: center; 
            gap: 1px;
        }


.activityinfo {
      position: relative;
      display: inline-block;
    }

    /* Popup container */
    .popup {
      display: none;
      position: absolute;
      top: 100px;
      right: 0;
      background-color: #16423C;
      width: 310px;
      max-height: 300px;
      overflow-y: auto;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      border-radius: 17px;
      padding: 19px;
      z-index: 1000;
      padding-right: 15px;
    }

    .popup h4 {
      margin-top: 0;
      color: white;
      font-size: 16px;
    }

    .popup p {
      margin: 6px 0;
      font-size: 14px;
      color: white;
    }

    .popup hr {
      border: 0;
      height: 1px;
      background-color: #ccc;
      margin: 12px 0;
    }

    
    .activityinfo button {
      background-color: #2e5d49;
      color: white;
      border: none;
      padding: 9px 12px;
      border-radius: 6px;
      cursor: pointer;
    }


.popup::-webkit-scrollbar {
  width: 9px;
  background-color: white;
  border-radius: 17px;
  margin-right: -5px;

}

.popup::-webkit-scrollbar-thumb {
  background: #16423C;
  border-radius: 4px;
}




        .statsinfo {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .cardinfo {
            background-color: #EEF0E5;
            box-shadow: 0px 5px 5px 0px #878484;
            padding: 20px;
            border-radius: 19px;
            text-align: center;
            width: 415px;
            color: #16423C;
            margin-bottom: -10px;
        }


        .statsapp-statsque {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            margin-bottom: -10px;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center; 
            padding: 10px;
        }

        .status {
           background-color: #EEF0E5;
           border-radius: 17px;
           box-shadow: 0px 5px 5px 0px #878484;
           color: #16423C;
           width: 30%;
           height: 219px;
           padding-top: 1.5%;
           flex-shrink: 0;
           margin-left: 15px;
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
           margin-bottom: 11px;

        }

        .count {
           border-radius: 20px;
           background-color: #16423C;
           font-size: 20px;
           font-weight: bold;
           color: #EEF0E5;
           width: 75px;
           height: 31px;
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

        .queueinfo {
            background-color: #EEF0E5;
            padding: 15px;
            width: 65%;
            min-width: 300px;
            border-radius: 20px;
            margin-right: 10px;
            text-align: center;
            box-shadow: 0px 5px 5px 0px #878484;
        }

        .btn {
            background: #16423C;
            color: #EEF0E5;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 19px;
            font-weight: bold;
            border: none;
            width: 200px;
        }



        .note-trans {
            display: flex;
            flex-wrap: nowrap; 
            gap: 30px;
            padding: 20px;

        }

        .notes {
            flex: 1 1 30%;
            background: #16423C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 5px 0px #878484;
            color: #16423C;
            margin-left: 10px;
            border-radius: 20px;
            align-items: center;
        }

        .notes h3 {
            margin-bottom: 15px;
            text-align: center;
            color: white;
        }


        .transaction {
            flex: 2 1 65%;
            background-color: #EEF0E5;
            border-radius: 20px;
            box-shadow: 0px 5px 5px 0px #878484;
            color: #16423C;
            max-height: 535px;
            overflow-y: auto;
            padding: 20px;
            position: relative;
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

        .receipt {
            background-color: #C4DAD2;
            border: 3px solid #16423C;
            border-radius: 15px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 810px;
            margin: 0 auto 30px auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            color: #16423C;
        }

        .receipt .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #16423C;
            border-radius: 5px;
            font-size: 27px;
            font-weight: bold;
            padding: 10px 15px;
            color: #EEF0E5;
        }

        .actions a {
            margin-left: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .order {
           position: absolute;
           color: #EEF0E5;
           background-color: #ffffff;
           border: 1px solid #16423C;
           border-radius: 15px;
           width: 370px;
           height: 190px;
           margin-left: 400px; 
           margin-top: 66px;
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


<div class="bodyinfo"> 
    <div class="datetime">
        Today is Sunday, June 8, 2025&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00:00:00 AM/PM
    </div>

    <div class="picdate-act">
        <div class="daterange">
            <input id="dateRange" type="text" placeholder="Select Date" style="padding: 8px 10px; width: 350px; border: 1px solid #ccc; border-right: none; border-top-left-radius: 5px; border-bottom-left-radius: 5px; outline: none; color: #2e5d49; height: 42px;" readonly>

            <button type="button" title="Open Date Picker" style="background-color: #2e5d49; color: white; border: 1px solid #2e5d49; border-left: none; padding: 8px 12px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; cursor: pointer;">
                <i class="bi bi-calendar4-week"></i>
            </button>
        </div>

        
        <div class="activityinfo">
  <button onclick="togglePopup()" title="Activity or Control">
    <i class="bi bi-activity"></i>
  </button>

  <div class="popup" id="activityPopup">
    <h4>Confirmed Transaction Today 00:00 am/pm</h4>
    <p>You have confirmed a complete Transaction!</p>
    <p><strong>Order ID:</strong> AB174</p>
    <p>Surname, First Name M.I.</p>
    <p>BSIT 3D</p>

    <hr>

    <h4>Added New User Yesterday 00:00 am/pm</h4>
    <p>You have added a new user!</p>
    <p><strong>Name:</strong> </p>
    <p><strong>Role:</strong> </p>
  </div>
</div>
    </div>
</div>

<div class="statsinfo">
    <div class="cardinfo">
        <div class="ordtext" style="font-size: 24px; font-weight: 500;">Orders</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;">2,150</div>
        <div class="soldtext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">items sold</div>
    </div>

    <div class="cardinfo">
        <div class="custext" style="font-size: 24px; font-weight: 500;">Customers</div>
        <div class="num" style="font-size: 45px; font-weight: 500; margin-top: -5px;">450</div>
        <div class="visittext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">visited store</div>
    </div>

    <div class="cardinfo">
        <div class="earntext" style="font-size: 24px; font-weight: 500;">Earnings</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;">PHP 300 K</div>
        <div class="datetext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">From June 8 to 31</div>
    </div>       
</div>

<div class="statsapp-statsque">

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

    

    <div class="queueinfo">
        <div class="servtext" style="font-size: 24px; font-weight: 500;">Now Serving</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;">Queue No.24</div>
        <div class="timetext"  style="font-size: 25px; font-weight: 500; margin-top: -1px;">00:00:00</div>
        

        <button class="btn call" style="background: #16423C; color: #EEF0E5;">Call</button>
        <button class="btn paid" style="background: #389907; color: #EEF0E5;">Paid</button>
        <button class="btn next" style="background: #b20606; color: #EEF0E5;">Next</button>   
    </div>   
</div>



    
<div class="note-trans">
  
  <div class="notes">
    <h3>NOTES</h3>
  </div>

  
  <div class="transaction">
    <div><h2>PAYMENT TRANSACTION</h2></div>

    <!-- 1st Receipt -->
    <div class="receipt">
      <div class="header">
        <span>Order ID: AB174</span>
        <div class="actions">
          <a href="#" class="check" title="Confirm">
            <svg width="20" height="25" fill="green" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="order">
        <h5>Orders</h5>
        <h6>PE(T-Shirt) <i>₱390.00</i></h6>
        <h6>Size: L</h6>
        <h6>Quantity: 1</h6>
        <h6>Total: <i>₱390.00</i></h6>
      </div>

      <div class="info">
        <h5>Queue No. 24</h5>
        <h6>Surname, First Name M.I</h6>
        <h6>202412345</h6>
        <h6>BSIT - 3D</h6>
        <h6>Date: October 7, 2024</h6>
        <h6>Time: 10:00 AM</h6>
      </div>
    </div>

    <!-- 2nd Receipt -->
    <div class="receipt">
      <div class="header">
        <span>Order ID: CD938</span>
      </div>

      <div class="order">
        <h5>Orders</h5>
        <h6>POLO (Boys) <i>₱250.00</i></h6>
        <h6>Size: M</h6>
        <h6>Quantity: 4</h6>
        <h6>Total: <i>₱1000.00</i></h6>
      </div>

      <div class="info">
        <h5>Queue No. 45</h5>
        <h6>Surname, First Name M.I</h6>
        <h6>202212345</h6>
        <h6>BSIT - 3D</h6>
        <h6>Date: November 4, 2024</h6>
        <h6>Time: 10:00 AM</h6>
      </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  const picker = flatpickr("#dateRange", {
  mode: "range",
  dateFormat: "F j, Y",
  defaultDate: ["2024-06-18", "2024-06-30"],
  onChange: function(selectedDates, dateStr, instance) {
    console.log("Selected range:", dateStr);
  }
});

  function togglePopup() {
    const popup = document.getElementById("activityPopup");
    popup.style.display = popup.style.display === "block" ? "none" : "block";
  }

  // Optional: Close popup if clicked outside
  window.onclick = function(event) {
    const popup = document.getElementById("activityPopup");
    if (!event.target.closest('.activityinfo')) {
      popup.style.display = "none";
    }
  };

</script>



    
</body>
</html>