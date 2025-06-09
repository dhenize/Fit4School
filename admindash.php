<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school"; 

$adminNameDisplay = 'Admin';
$totalOrders = 0;
$totalCustomers = 0;
$totalEarnings = 0;
$ongoingAppointments = 0;
$doneAppointments = 0;
$missedAppointments = 0;
$currentQueueNo = 'N/A';
$currentQueueTime = 'N/A';
$currentQueueStudent = ['fname' => '', 'lname' => '', 'student_id' => '', 'crs_sec' => ''];
$recentTransactions = [];
$stockLevels = [];
$error = '';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    if (isset($_SESSION['admin_id'])) {
        $stmt = $pdo->prepare("SELECT email FROM admin WHERE admin_id = ?");
        $stmt->execute([$_SESSION['admin_id']]);
        $admin = $stmt->fetch();
        if ($admin) {
            $emailParts = explode('@', $admin['email']);
            $adminNameDisplay = htmlspecialchars(ucfirst($emailParts[0]));
        }
    }


    $stockItems = [
        'Polo (Boys)', 'Pants (Boys)', 'Blouse (Girls)',
        'Slacks (Girls)', 'PE (T-Shirt)', 'PE (Pants)' 
    ];

    $stmt = $pdo->prepare("SELECT item_name, SUM(quantity) as total_stock FROM inventory WHERE item_name IN (" . implode(',', array_fill(0, count($stockItems), '?')) . ") GROUP BY item_name");
    $stmt->execute($stockItems);
    $fetchedStocks = $stmt->fetchAll(PDO::FETCH_KEY_PAIR); 

    foreach ($stockItems as $item) {
        $stockLevels[$item] = $fetchedStocks[$item] ?? 0; 
    }

    $stmt = $pdo->query("SELECT SUM(quantity) FROM dump WHERE remarks = 'Done'");
    $totalOrders = $stmt->fetchColumn() ?? 0;

    $stmt = $pdo->query("SELECT COUNT(DISTINCT stud_id) FROM dump WHERE remarks = 'Done'");
    $totalCustomers = $stmt->fetchColumn() ?? 0;

    $startDate = date('Y-m-01');
    $endDate = date('Y-m-t');

    $stmt = $pdo->prepare("SELECT SUM(d.quantity * i.price) AS total_earning
                           FROM dump d
                           JOIN inventory i ON d.item_id = i.item_id
                           WHERE d.remarks = 'Done' AND d.date_of_app BETWEEN ? AND ?");
    $stmt->execute([$startDate, $endDate]);
    $totalEarnings = $stmt->fetchColumn() ?? 0;

    $stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE remarks = 'Ongoing'");
    $ongoingAppointments = $stmt->fetchColumn() ?? 0;

    $stmt = $pdo->query("SELECT COUNT(*) FROM dump WHERE remarks = 'Done'");
    $doneAppointments = $stmt->fetchColumn() ?? 0;

    $stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE remarks = 'Missed'");
    $missedAppointments = $stmt->fetchColumn() ?? 0;

    $today = date('Y-m-d');
    $stmt = $pdo->prepare("SELECT a.queue_no, a.time_of_app, s.fname, s.lname, s.crs_sec, s.student_id
                           FROM appointments a
                           JOIN student s ON a.student_id = s.student_id
                           WHERE a.remarks = 'Ongoing' AND a.date_of_app = ?
                           ORDER BY a.queue_no ASC
                           LIMIT 1");
    $stmt->execute([$today]);
    $nowServing = $stmt->fetch();

    if ($nowServing) {
        $currentQueueNo = htmlspecialchars($nowServing['queue_no']);
        $currentQueueTime = htmlspecialchars(date('h:i A', strtotime($nowServing['time_of_app'])));
        $currentQueueStudent['fname'] = htmlspecialchars($nowServing['fname']);
        $currentQueueStudent['lname'] = htmlspecialchars($nowServing['lname']);
        $currentQueueStudent['student_id'] = htmlspecialchars($nowServing['student_id']);
        $currentQueueStudent['crs_sec'] = htmlspecialchars($nowServing['crs_sec']);
    }

    $stmt = $pdo->query("SELECT
                            d.dump_id,
                            d.app_id,
                            d.date_of_app,
                            d.time_of_app,
                            s.fname,
                            s.lname,
                            s.student_id,
                            s.crs_sec,
                            GROUP_CONCAT(CONCAT(i.item_name, ' (', i.size, ') x', d.quantity, ' @₱', FORMAT(i.price, 2)) SEPARATOR '<br>') AS items_details,
                            SUM(i.price * d.quantity) AS transaction_total
                        FROM
                            dump d
                        JOIN
                            student s ON d.stud_id = s.student_id
                        JOIN
                            inventory i ON d.item_id = i.item_id
                        WHERE
                            d.remarks = 'Done'
                        GROUP BY
                            d.app_id, d.dump_id, d.date_of_app, d.time_of_app, s.fname, s.lname, s.student_id, s.crs_sec
                        ORDER BY
                            d.date_created DESC
                        LIMIT 5");
    $recentTransactions = $stmt->fetchAll();

    foreach ($recentTransactions as &$transaction) {
        $appId = $transaction['app_id'];
        $queueStmt = $pdo->prepare("SELECT queue_no FROM appointments WHERE app_id = ?");
        $queueStmt->execute([$appId]);
        $queueData = $queueStmt->fetchColumn();
        $transaction['queue_no'] = $queueData ?: 'N/A';
    }
    unset($transaction); 

} catch (PDOException $e) {
    $error = "Database connection or query failed: " . $e->getMessage();
    error_log("ADMINDASH_DB_EXCEPTION: " . $error); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            overflow-x: hidden;
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
            position: relative; /* Changed from absolute to relative for normal flow */
            color: #EEF0E5;
            background-color: #ffffff;
            border: 1px solid #16423C;
            border-radius: 15px;
            width: 370px;
            height: auto; /* Changed to auto for dynamic content */
            margin-left: auto; /* Align right within flex container */
            margin-top: 0;
            padding: 15px; /* Added padding for content */
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .order, .info, h5, h6, a {
            color: #16423C;
        }

        .order h5 {
            font-size: 20px;
            font-weight: bold;
            padding-left: 0; /* Adjusted for padding */
            padding-bottom: 10px;
        }

        .order h6 {
            font-size: 15px;
            font-weight: bold;
            padding-left: 0; /* Adjusted for padding */
        }

        .order i {
            position: relative; /* Changed to relative */
            font-size: 15px;
            font-weight: bold;
            font-style: normal;
            float: right; /* Use float for inline alignment */
            margin-left: 10px; /* Space between text and price */
        }

        .info {
            margin-left: 0; /* Adjusted for new layout */
            padding-left: 25px; /* Keep indentation for info */
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
        /* Flexbox for receipt content */
        .receipt-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            gap: 15px;
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
      <h2>Welcome <?php echo $adminNameDisplay; ?>!</h2>
    </div>

    <div class="stock">
      <h3>STOCKS LEFT PER UNIFORM</h3>
    </div>
    <div class="stock-info">
      <ul>
        <li>
          <span>POLO (Boys)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['Polo (Boys)'] ?? 0); ?></span>
        </li>
        <li>
          <span>PANTS (Boys)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['Pants (Boys)'] ?? 0); ?></span>
        </li>
        <li>
          <span>BLOUSE (Girls)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['Blouse (Girls)'] ?? 0); ?></span>
        </li>
        <li>
          <span>PANTS (Girls)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['Slacks (Girls)'] ?? 0); ?></span>
        </li>
        <li>
          <span>PE (T-Shirt)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['PE (T-Shirt)'] ?? 0); ?></span>
        </li>
        <li>
          <span>PE (Pants)</span>
          <br>
          <span class="stock-number"><?php echo htmlspecialchars($stockLevels['PE (Pants)'] ?? 0); ?></span>
        </li>
      </ul>
    </div>
</div>


<div class="bodyinfo">
    <div class="datetime">
        Today is <span id="currentDate"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="currentTime"></span>
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
    <h4>Confirmed Transaction Today <?php echo date('h:i A'); ?></h4>
    <p>You have confirmed a complete Transaction!</p>
    <p><strong>Order ID:</strong> AB174</p>
    <p>Surname, First Name M.I.</p>
    <p>BSIT 3D</p>

    <hr>

    <h4>Added New User Yesterday <?php echo date('h:i A', strtotime('-1 day')); ?></h4>
    <p>You have added a new user!</p>
    <p><strong>Name:</strong> Jane Doe</p>
    <p><strong>Role:</strong> Administrator</p>
  </div>
</div>
    </div>
</div>

<div class="statsinfo">
    <div class="cardinfo">
        <div class="ordtext" style="font-size: 24px; font-weight: 500;">Orders</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;"><?php echo number_format($totalOrders); ?></div>
        <div class="soldtext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">items sold</div>
    </div>

    <div class="cardinfo">
        <div class="custext" style="font-size: 24px; font-weight: 500;">Customers</div>
        <div class="num" style="font-size: 45px; font-weight: 500; margin-top: -5px;"><?php echo number_format($totalCustomers); ?></div>
        <div class="visittext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">visited store</div>
    </div>

    <div class="cardinfo">
        <div class="earntext" style="font-size: 24px; font-weight: 500;">Earnings</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;">PHP <?php echo number_format($totalEarnings, 0); ?></div>
        <div class="datetext"  style="font-size: 15px; font-weight: 400; margin-top: -15px;">From <?php echo date('F j', strtotime($startDate)); ?> to <?php echo date('j', strtotime($endDate)); ?></div>
    </div>
</div>

<div class="statsapp-statsque">

    <div class="status">
    <h3>Appointment Status</h3>
        <div class="status-item">
            <span class="count"><?php echo htmlspecialchars($ongoingAppointments); ?></span>
            <span class="label">Ongoing</span>
        </div>

        <div class="status-item">
            <span class="count" style="margin-left: -9px;"><?php echo htmlspecialchars($missedAppointments); ?></span>
            <span class="label">Missed</span>
        </div>
        
                <div class="status-item">
            <span class="count" style="margin-left: -15px;"><?php echo htmlspecialchars($doneAppointments); ?></span>
            <span class="label">Done</span>
        </div>
    </div>


    <div class="queueinfo">
        <div class="servtext" style="font-size: 24px; font-weight: 500;">Now Serving</div>
        <div style="font-size: 45px; font-weight: 500; margin-top: -5px;">Queue No.<?php echo htmlspecialchars($currentQueueNo); ?></div>
        <div class="timetext"  style="font-size: 25px; font-weight: 500; margin-top: -1px;"><?php echo htmlspecialchars($currentQueueTime); ?></div>


        <button class="btn call" style="background: #16423C; color: #EEF0E5;">Call</button>
        <button class="btn paid" style="background: #389907; color: #EEF0E5;">Paid</button>
        <button class="btn next" style="background: #b20606; color: #EEF0E5;">Next</button>
    </div>
</div>


<div class="note-trans">

  <div class="notes">
    <h3>NOTES</h3>
    <p style="color: #EEF0E5; font-size: 14px;">No new notes. Add important reminders here.</p>
  </div>


  <div class="transaction">
    <div><h2>RECENT PAYMENT TRANSACTIONS</h2></div>

    <?php if ($error): ?>
        <p style="color: red; text-align: center; font-weight: bold;"><?php echo $error; ?></p>
    <?php elseif (empty($recentTransactions)): ?>
        <p style="text-align: center;">No recent transactions found.</p>
    <?php else: ?>
        <?php foreach ($recentTransactions as $transaction): ?>
            <div class="receipt">
                <div class="header">
                    <span>Order ID: <?php echo htmlspecialchars($transaction['dump_id']); ?></span>
                    <div class="actions">
                        <a href="#" class="check" title="View Details">
                            <svg width="20" height="25" fill="green" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="receipt-content">
                    <div class="info">
                        <h5>Queue No. <?php echo htmlspecialchars($transaction['queue_no']); ?></h5>
                        <h6><?php echo htmlspecialchars($transaction['fname'] . ' ' . $transaction['lname']); ?></h6>
                        <h6><?php echo htmlspecialchars($transaction['student_id']); ?></h6>
                        <h6><?php echo htmlspecialchars($transaction['crs_sec']); ?></h6>
                        <h6>Date: <?php echo htmlspecialchars(date('F j, Y', strtotime($transaction['date_of_app']))); ?></h6>
                        <h6>Time: <?php echo htmlspecialchars(date('h:i A', strtotime($transaction['time_of_app']))); ?></h6>
                    </div>
                    <div class="order">
                        <h5>Orders</h5>
                        <?php echo $transaction['items_details']; ?>
                        <h6 style="margin-top: 10px;">Total: <i>₱<?php echo htmlspecialchars(number_format($transaction['transaction_total'], 2)); ?></i></h6>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    function updateClock() {
        const now = new Date();
        const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', optionsDate);

        const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
        document.getElementById('currentTime').textContent = now.toLocaleTimeString('en-US', optionsTime);
    }
    updateClock(); 
    setInterval(updateClock, 1000); 

 
    const picker = flatpickr("#dateRange", {
        mode: "range",
        dateFormat: "F j, Y",
        defaultDate: ["<?php echo date('Y-m-d', strtotime($startDate)); ?>", "<?php echo date('Y-m-d', strtotime($endDate)); ?>"],
        defaultDate: ["<?php echo date('Y-m-01'); ?>", "<?php echo date('Y-m-t'); ?>"],
        onChange: function(selectedDates, dateStr, instance) {
            console.log("Selected range:", dateStr);
        }
    });

    function togglePopup() {
        const popup = document.getElementById("activityPopup");
        popup.style.display = popup.style.display === "block" ? "none" : "block";
    }

    window.onclick = function(event) {
        const popup = document.getElementById("activityPopup");
        const activityButton = document.querySelector('.activityinfo button');
        if (popup.style.display === "block" && !activityButton.contains(event.target) && !popup.contains(event.target)) {
            popup.style.display = "none";
        }
    };


    document.querySelector('.btn.call').addEventListener('click', function() {
        alert('Calling Queue No. <?php echo htmlspecialchars($currentQueueNo); ?>. Student: <?php echo htmlspecialchars($currentQueueStudent['fname'] . ' ' . $currentQueueStudent['lname']); ?> (<?php echo htmlspecialchars($currentQueueStudent['crs_sec']); ?>)');
        fetch('update_queue.php?action=call&queue_no=<?php echo htmlspecialchars($currentQueueNo); ?>')
        .then(response => response.json())
         .then(data => { if(data.success) { /* update UI */ } });
    });


    document.querySelector('.btn.paid').addEventListener('click', function() {
        const confirmPaid = confirm('Confirm Queue No. <?php echo htmlspecialchars($currentQueueNo); ?> as Paid and Done? This will archive the appointment.');
        if (confirmPaid) {
            alert('Marking Queue No. <?php echo htmlspecialchars($currentQueueNo); ?> as Paid.');
        }
    });

    document.querySelector('.btn.next').addEventListener('click', function() {
        const confirmNext = confirm('Move to the next Queue Number? This will mark current as Missed if not Paid.');
        if (confirmNext) {
            alert('Moving to the next queue number.');
        }
    });

    document.querySelectorAll('.receipt .check').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const orderId = this.closest('.receipt').querySelector('.header span').textContent.replace('Order ID: ', '');
            alert('Viewing details for Order ID: ' + orderId);

        });
    });

</script>


</body>
</html>