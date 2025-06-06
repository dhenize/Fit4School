<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school";

$archivedAppointments = [];
$error = '';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    function getArchivedAppointments(PDO $pdo, ?string $remarkFilter = null): array {
        $sql = "SELECT Archive_ID, order_id, student_id, Queue_Number, items, quantity, date_of_appointment, time_of_appointment, total, ticket, remark, admin_id, archived_at FROM archive";
        $params = [];

        $allowedRemarks = ['Missed', 'Done'];
        if ($remarkFilter && in_array($remarkFilter, $allowedRemarks)) {
            $sql .= " WHERE remark = ?";
            $params[] = $remarkFilter;
        }

        $sql .= " ORDER BY date_of_appointment DESC, time_of_appointment DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $remarkFilter = $_GET['remark'] ?? null;
    $archivedAppointments = getArchivedAppointments($pdo, $remarkFilter);

} catch (PDOException $e) {
    $error = "Database connection or query failed: " . $e->getMessage();
    error_log("ARCHIVE_PAGE_EXCEPTION: " . $error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="#"> <link rel="icon" href="Logo.png" type="image/x-icon">

    <style>
        body{
            background-color: #6A9C89;
            margin: 0%;
            height: auto;
            width: auto;
            overflow-x: hidden;
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

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #ffffff;
            color: #000000;
            font-weight: bold;
            top: 0;
            z-index: 1;
        }
        .table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .filter-select {
            background-color: #EEF0E5;
            border-radius: 40px;
            color: #0e2b28;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 35px;
        }

        .remark-done {
            color: green;
            font-weight: bold;
        }
        .remark-missed {
            color: red;
            font-weight: bold;
        }
        .remark-ongoing {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>

<body>

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
            <button style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);
                                 border: none; color: #16423C; background-color: transparent; border-radius: 50%;
                                 padding: 6px 8px; cursor: pointer;">
                🔍
            </button>
        </div>

        <div class="filter-dropdown-container">
            <form action="archive.php" method="GET" style="display:inline;">
                <select name="remark" id="remarkFilter" class="filter-select" onchange="this.form.submit()">
                    <option value="">All Archived</option>
                    <option value="Missed" <?php echo ($remarkFilter == 'Missed') ? 'selected' : ''; ?>>Missed</option>
                    <option value="Done" <?php echo ($remarkFilter == 'Done') ? 'selected' : ''; ?>>Done</option>
                </select>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="orderlist">
                <?php if ($error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php elseif (empty($archivedAppointments)): ?>
                    <p class="text-center">No archived appointments found.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Archive ID</th>
                                <th>Order ID</th>
                                <th>Student ID</th>
                                <th>Queue Number</th>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>Date of Appointment</th>
                                <th>Time of Appointment</th>
                                <th>Total</th>
                                <th>Ticket</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($archivedAppointments as $appointment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appointment['Archive_ID']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['order_id']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['student_id']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['Queue_Number']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['items']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['quantity']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['date_of_appointment']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['time_of_appointment']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['total']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['ticket'] ?? 'N/A'); ?></td>
                                    <td class="<?php echo ($appointment['remark'] == 'Done') ? 'remark-done' : (($appointment['remark'] == 'Missed') ? 'remark-missed' : ''); ?>">
                                        <?php echo htmlspecialchars(ucfirst($appointment['remark'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
