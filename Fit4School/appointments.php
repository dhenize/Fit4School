<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school";

$appointments = [];
$error = '';
$success_message = '';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    function getAppointments(PDO $pdo): array {
        $stmt = $pdo->prepare("SELECT order_id, student_id, Queue_Number, items, size, quantity, date_of_appointment, time_of_appointment, total, Ticket, remark, admin_id, created_at FROM appointments ORDER BY date_of_appointment DESC, time_of_appointment DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function archiveAppointment(PDO $pdo, int $orderId): bool {
        $pdo->beginTransaction();
        try {
            $stmt_select = $pdo->prepare("SELECT order_id, student_id, Queue_Number, items, size, quantity, date_of_appointment, time_of_appointment, total, Ticket, remark, admin_id FROM appointments WHERE order_id = ?");
            $stmt_select->execute([$orderId]);
            $appointment_to_archive = $stmt_select->fetch(PDO::FETCH_ASSOC);

            if (!$appointment_to_archive) {
                $pdo->rollBack();
                error_log("ARCHIVE_ERROR: Attempted to archive non-existent appointment with order_id: " . $orderId);
                return false;
            }
            $stmt_insert = $pdo->prepare(
                "INSERT INTO archive (order_id, student_id, Queue_Number, items, quantity, date_of_appointment, time_of_appointment, total, ticket, remark, admin_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $inserted = $stmt_insert->execute([
                $appointment_to_archive['order_id'],
                $appointment_to_archive['student_id'],
                $appointment_to_archive['Queue_Number'],
                $appointment_to_archive['items'],
                $appointment_to_archive['quantity'],
                $appointment_to_archive['date_of_appointment'],
                $appointment_to_archive['time_of_appointment'],
                $appointment_to_archive['total'],
                $appointment_to_archive['remark']
            ]);

            if (!$inserted) {
                $pdo->rollBack();
                error_log("ARCHIVE_ERROR: Failed to insert into archive for order_id: " . $orderId);
                return false;
            }

            $stmt_delete = $pdo->prepare("DELETE FROM appointments WHERE order_id = ?");
            $deleted = $stmt_delete->execute([$orderId]);

            if (!$deleted) {
                $pdo->rollBack();
                error_log("ARCHIVE_ERROR: Failed to delete from appointments for order_id: " . $orderId);
                return false;
            }

            $pdo->commit();
            return true;

        } catch (PDOException $e) {
            $pdo->rollBack();
            $errorMessage = "ARCHIVE_EXCEPTION: Transaction failed during archiving (Order ID: " . $orderId . "): " . $e->getMessage();
            error_log($errorMessage);
            return false;
        }
    }

    function updateAppointmentRemark(PDO $pdo, int $orderId, string $newRemark): bool {
        $stmt = $pdo->prepare("UPDATE appointments SET remark = ? WHERE order_id = ?");
        $updated = $stmt->execute([$newRemark, $orderId]);

        if ($updated && $newRemark === 'Done') {
            if (archiveAppointment($pdo, $orderId)) {
                return true;
            } else {
                error_log("REMARK_UPDATE_ERROR: Archiving failed for order_id: " . $orderId . " after remark updated to " . $newRemark);
                return false;
            }
        }
        return $updated;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_remark') {
        ob_clean();
        header('Content-Type: application/json');

        $orderId = filter_var($_POST['order_id'], FILTER_VALIDATE_INT);
        $newRemark = filter_var($_POST['remark'], FILTER_SANITIZE_STRING);

        if ($orderId === false || $orderId <= 0 || !in_array($newRemark, ['Ongoing', 'Missed', 'Done'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid input for remark update.']);
            exit();
        }

        if (updateAppointmentRemark($pdo, $orderId, $newRemark)) {
            echo json_encode(['success' => true, 'message' => 'Remark updated and ' . ($newRemark === 'Done' ? 'archived successfully.' : 'kept in current appointments.')]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update remark or archive. Check server logs.']);
        }
        exit();
    }

    $appointments = getAppointments($pdo);

} catch (PDOException $e) {
    $error = "Database connection or query failed: " . $e->getMessage();
    error_log("MAIN_EXCEPTION: " . $error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Appointments - Fit4School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .appointments {
            margin-top: -15px;
        }

        .appointments h2 {
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

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }

        .success-message {
            color: green;
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
    </style>
</head>

<body style="overflow-x: hidden;">

<div class="header">
    <div class="logo">
        <img src="Logo_Light.png" alt="Fit4School Logo">
        <h1>Fit4School</h1>
        <div class="links">
            <div class="dropdown">
                <a class="dropbtn">Appointments
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

    <div class="appointments">
        <h2>Appointments</h2>
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

        <div class="option">
            <a class="optionbtn">Missed
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </a>
            <div class="option-content">
                <a href="#">Ongoing</a>
                <a href="#">Missed</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="orderlist">
                <?php if ($error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php elseif ($success_message): ?>
                    <p class="success-message"><?php echo $success_message; ?></p>
                <?php elseif (empty($appointments)): ?>
                    <p class="text-center">No appointments found.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Student ID</th>
                                <th>Queue Number</th>
                                <th>Items</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Date of Appointment</th>
                                <th>Time of Appointment</th>
                                <th>Total</th>
                                <th>Ticket</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appointment['order_id']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['student_id']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['Queue_Number']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['items']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['size']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['quantity']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['date_of_appointment']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['time_of_appointment']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['total']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['Ticket'] ?? 'N/A'); ?></td>
                                    <td>
                                        <select class="form-select status-dropdown"
                                                data-order-id="<?php echo $appointment['order_id']; ?>"
                                                onchange="updateAppointmentRemark(this)">
                                            <option value="Ongoing" <?php echo ($appointment['remark'] == 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                                            <option value="Missed" <?php echo ($appointment['remark'] == 'Missed') ? 'selected' : ''; ?>>Missed</option>
                                            <option value="Done" <?php echo ($appointment['remark'] == 'Done') ? 'selected' : ''; ?>>Done</option>
                                        </select>
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

<script>
    function updateAppointmentRemark(selectElement) {
        const orderId = selectElement.dataset.orderId;
        const newRemark = selectElement.value;

        const messageContainer = document.querySelector('.orderlist');
        const tempMessage = document.createElement('p');
        tempMessage.className = 'info-message text-center';
        tempMessage.style.color = 'blue';
        tempMessage.textContent = 'Updating remark...';
        messageContainer.prepend(tempMessage);

        fetch('appointments.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=update_remark&order_id=${orderId}&remark=${newRemark}`
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text); });
            }
            return response.json();
        })
        .then(data => {
            tempMessage.remove();

            const statusMessage = document.createElement('p');
            statusMessage.className = data.success ? 'success-message' : 'error-message';
            statusMessage.textContent = data.message;
            messageContainer.prepend(statusMessage);

            setTimeout(() => {
                statusMessage.remove();
            }, 3000);

            if (!data.success) {
                console.error('Remark update failed:', data.message);
            } else {
                if (newRemark === 'Done') {
                    const row = selectElement.closest('tr');
                    if (row) {
                        row.remove();
                        const tbody = row.closest('tbody');
                        if (tbody && tbody.children.length === 0) {
                            const table = tbody.closest('table');
                            if (table) table.remove();
                            const noAppointmentsMessage = document.createElement('p');
                            noAppointmentsMessage.className = 'text-center';
                            noAppointmentsMessage.textContent = 'No appointments found.';
                            messageContainer.appendChild(noAppointmentsMessage);
                        }
                    }
                }
            }
        })
        .catch(error => {
            tempMessage.remove();
            const errorMessage = document.createElement('p');
            errorMessage.className = 'error-message';
            errorMessage.textContent = 'An error occurred during remark update: ' + error.message;
            messageContainer.prepend(errorMessage);

            setTimeout(() => {
                errorMessage.remove();
            }, 5000);
            console.error('Fetch error:', error);
        });
    }
</script>
</body>
</html>