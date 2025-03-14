<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Archive</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
  <link rel="stylesheet" href="#">
  <link rel="icon" href="Logo.png" type="image/x-icon">


  <style>
    body{
      background-color: #6A9C89;
      margin: 0%;  
      height: auto;
      width: auto;
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

    .archive {
      margin-top: -15px;
    }

    .archive h2 {
      font-size: 38px;
      font-weight: bold;
      padding-bottom: 3%;
      color: #EEF0E5;
      text-align: center;
    }

    .search-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: -18px;
      margin-left: 35px;
    }

    .search-bar input[type="text"] {
      border: none;
      background-color: transparent;
      margin-left: 5px;
      flex-grow: 1; 
    }

    .option {
      position: relative;
      display: flex;
    }

    .optionbtn {
      background-color: #EEF0E5;
      border-radius: 40px;
      color: #0e2b28;
      border: none;
      cursor: pointer;
      padding: 10px 15px;
      text-decoration: none;
      margin-right: 70px;
    }

    .option-content {
      display: none;
      position: absolute;
      background-color: #C4DAD2;
      border-radius: 20px;
      min-width: 100px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .option-content a {
      color: #16423C;
      padding: 10px 12px;
      text-decoration: none;
      display: block;
      margin: auto;
      border-bottom: 1px solid #ffffff;
    }

    .option-content a:hover {
      border-radius: 20px;
      background-color: #ddd;
    }

    .option:hover .option-content {
      display: block;
    }

    .option:hover .optionbtn {
      background-color: #0e2b28;
    }

    .orderlist {
      background-color: #EEF0E5;
      border-radius: 5px;    
      box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.2);
      color: #16423C;
      width: 95%;
      max-height: 430px;
      margin: 15px auto;
      overflow-y: scroll;
    }

    .orderlist::-webkit-scrollbar {
      width: 8px;
    }

    .orderlist::-webkit-scrollbar-thumb {
      background: #16423C;
      border-radius: 4px;
    }

  </style>
</head>

<body style=" overflow: hidden;">

<div class="header">
  <div class="logo">
    <img src="Logo_Light.png" alt="Fit4School Logo">
    <h1>Fit4School</h1>
    <div class="links">
      <div class="dropdown">
        <a class="dropbtn">Archive
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

  <div class="archive">
    <h2>Archive</h2>
  </div>

  <div class="search-container">
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

    <div class="option">
      <a class="optionbtn">Missed
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
          <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg>
      </a>
      <div class="option-content">
        <a href="#">Missed</a>
        <a href="#">Ongoing</a>
        <a href="#">Done</a>
      </div>
    </div>
  </div>
</div>


  <div class="container-fluid"> 
    <div class="row">
      <div class="col-md-12">  
        <div class="orderlist">
          <table class="table">
            <thead >
              <tr>
                <th>Student ID</th>
                <th>Order ID</th>
                <th>Items</th>
                <th>Quantity</th>
                <th data-type="date" data-format="MM/DD/YYYY">Date of Appointment</th>
                <th>Time of Appointment</th>
                <th>Total</th>
                <th>Ticket</th>
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>202112345</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_1.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202234567</td>
                <td>AE234</td>
                <td>PANTS(Girls)</td>
                <td>2</td>
                <td>11/06/2024</td>
                <td>9:00 AM</td>
                <td>750.OO</td>
                <td><a href="#">ticket_2.pdf</a></td>
                <td style="color: rgb(223, 223, 0);">Ongoing</td>
              </tr>
              <tr>
                <td>202256789</td>
                <td>AD824</td>
                <td>NSTP(T-Shirt)</td>
                <td>1</td>
                <td>11/09/2024</td>
                <td>9:00 AM</td>
                <td>350.OO</td>
                <td><a href="#">ticket_3.pdf</a></td>
                <td style="color: red;">Missed</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_4.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_5.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_6.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_7.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_8.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_9.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
              <tr>
                <td>202112346</td>
                <td>AB108</td>
                <td>POLO(BOYS)</td>
                <td>1</td>
                <td>10/04/2024</td>
                <td>8:00 AM</td>
                <td>250.OO</td>
                <td><a href="#">ticket_10.pdf</a></td>
                <td style="color: green;">Done</td>
              </tr>
            </tbody>
          </table>
        </div> </div> </div> </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>