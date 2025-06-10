<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_fit4school";

$pdo = null;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// --- DEBUGGING: Check Session Status ---
error_log("Session loggedin: " . (isset($_SESSION['loggedin']) ? 'true' : 'false'));
error_log("Session user_role: " . ($_SESSION['user_role'] ?? 'not set'));
error_log("Session user_email: " . ($_SESSION['user_email'] ?? 'not set'));


// Ensure the user is logged in and has a student ID in the session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'student' || !isset($_SESSION['user_email'])) {
    header("Location: fit4login.php");
    exit();
}

// Fetch student ID from the database using the email stored in the session
$current_student_id = null;
try {
    $stmt_get_id = $pdo->prepare("SELECT student_id FROM student WHERE email = :email");
    $stmt_get_id->execute([':email' => $_SESSION['user_email']]);
    $student_id_row = $stmt_get_id->fetch(PDO::FETCH_ASSOC);
    if ($student_id_row) {
        $current_student_id = $student_id_row['student_id'];
        $_SESSION['stud_id'] = $current_student_id; // Set for consistency
    } else {
        error_log("Student email '{$_SESSION['user_email']}' from session not found in database.");
        header("Location: logout.php");
        exit();
    }
} catch (PDOException $e) {
    error_log("Error fetching student ID from email: " . $e->getMessage());
    header("Location: logout.php");
    exit();
}

// --- DEBUGGING: Verify current_student_id ---
error_log("Current student ID: " . $current_student_id);


$search_query = '';
$status_filter = 'all';

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search_query = $_GET['search'];
}
if (isset($_GET['status']) && $_GET['status'] !== 'all') {
    $status_filter = $_GET['status'];
}

// --- DEBUGGING: Check Filters ---
error_log("Search Query: " . $search_query);
error_log("Status Filter: " . $status_filter);


// --- UPDATED SQL QUERY TO USE 'dump' TABLE AND 'inventory' ---
// Also, join with 'appointments' to get 'ticket_file' if it exists there
$sql = "SELECT
            d.dump_id AS OrderID,
            i.item_name AS ItemName,
            d.quantity AS Quantity,
            DATE_FORMAT(d.date_of_app, '%m/%d/%Y') AS DateOfAppointment,
            TIME_FORMAT(d.time_of_app, '%h:%i %p') AS TimeOfAppointment,
            (d.quantity * inv.price) AS Total,
            d.remarks AS Remarks,
            COALESCE(a.ticket_file, '') AS TicketPath -- Get ticket_file from appointments if available
        FROM
            dump d
        JOIN
            inventory inv ON d.item_id = inv.item_id
        LEFT JOIN -- Use LEFT JOIN to get ticket even if no appointment record is found for some reason
            appointments a ON d.app_id = a.app_id
        WHERE
            d.stud_id = :stud_id";

$params = [':stud_id' => $current_student_id];

// Add search conditions
if ($search_query) {
    $sql .= " AND (
                  d.dump_id LIKE :search_query OR
                  i.item_name LIKE :search_query OR
                  d.remarks LIKE :search_query OR
                  DATE_FORMAT(d.date_of_app, '%m/%d/%Y') LIKE :search_query OR
                  TIME_FORMAT(d.time_of_app, '%h:%i %p') LIKE :search_query
                )";
    $params[':search_query'] = '%' . $search_query . '%';
}

// Add status filter conditions
if ($status_filter !== 'all') {
    $sql .= " AND d.remarks = :remarks_filter";
    $params[':remarks_filter'] = $status_filter;
}

$sql .= " ORDER BY d.date_of_app DESC, d.time_of_app DESC";

$history_items = [];
try {
    $stmt = $pdo->prepare($sql);

    // --- DEBUGGING: Log the SQL query and parameters before execution ---
    $debug_sql = $sql;
    foreach ($params as $key => $value) {
        $debug_sql = str_replace($key, "'" . $value . "'", $debug_sql); // Simple replacement for logging
    }
    error_log("Executing SQL: " . $debug_sql);
    error_log("Parameters: " . json_encode($params));


    $stmt->execute($params);
    $history_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // --- DEBUGGING: Log the number of results ---
    error_log("Number of history items found: " . count($history_items));
    // var_dump($history_items); // Uncomment this for direct browser output of the array

} catch (PDOException $e) {
    error_log("Error fetching history: " . $e->getMessage());
    $history_error = "Could not load transaction history.";
}

// Fetch student details for the profile popup
$student_info = [];
try {
    // Correct column names based on your 'student' table: fname, lname, bdate, crs_sec, contact_no
    // Note: Assuming 'mname' is a column for middle name in your student table for FullName concatenation.
    $stmt_student = $pdo->prepare("SELECT student_id AS stud_id, CONCAT(lname, ', ', fname, ' ', SUBSTRING(mname, 1, 1), '.') AS FullName, bdate AS birthdate, crs_sec AS CourseSection, email, contact_no AS contact_num FROM student WHERE student_id = :stud_id");
    $stmt_student->execute([':stud_id' => $current_student_id]);
    $student_info = $stmt_student->fetch(PDO::FETCH_ASSOC);
    if ($student_info) {
        $student_info['BirthdateFormatted'] = date('F j, Y', strtotime($student_info['birthdate']));
    }
} catch (PDOException $e) {
    error_log("Error fetching student info: " . $e->getMessage());
    $student_info_error = "Could not load student information.";
}

// Close the PDO connection
$pdo = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction History</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="TranHis_Stud.css">
</head>

<body>
    <div class="row">
        <div class="col-lg-2">
            <div class="Logo">
                <img src="Logo_Light.png" width="64px" height="64px">
                <span class="Logo_txt">Fit4School</span>
            </div>
            <div class="sm-cont">
                <div>
                    <button class="SD_btn" onclick="location.href='DASHBOARDStud.php'"><img src="dashboard (5).png" class="sd_icon" style="padding-right: 10px;">Student Dashboard</button>
                </div>
                <div>
                    <button class="VS_btn" onclick="location.href='VIEW_SIZE_Stud.php'"><img src="ruler (1).png" class="vs_icon" style="padding-right: 8px;">View Sizes</button>
                </div>
                <div>
                    <button class="App_btn" onclick="location.href='APPOINTMENT_Stud.php'"><img src="appointment (1).png" class="app_icon" style="padding-right: 10px;">Appointment</button>
                </div>
                <div>
                    <button class="TH_btn" onclick="location.href='HISTORY_Stud.php'"><img src="clock.png" class="th_icon" style="padding-right: 10px;">Transaction History</button>
                </div>
            </div>

            <div class="lm-cont">
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
                        <button type="button" class="btn" style="background-color: #6A9C89; color: #FFFFFF; border-radius: 20px; width: 80px; font-weight: bold;"><a href="logout.php">YES</a></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid col-lg-10" style="max-height: 100vh; padding: 20px;">
            <div class="upm-cont">
                <div class="wc">
                    <h2 style="color: #16423C; font-weight: bold; font-family: Candara;">Transaction History</h2>
                </div>
                <div class="dp">
                    <span class="usern" style="color: #16423C; font-weight: bold; font-family: Candara;">
                        <?php echo htmlspecialchars($student_info['FullName'] ?? 'Student'); ?>
                    </span>
                    <img src="user.png" height="40px" width="40px" alt="User Profile">

                    <div class="popup-content">
                        <span class="close-btn">&times;</span>
                        <div class="popup-left">
                            <div class="profile-circle"></div>
                        </div>
                        <div class="popup-right">
                            <br>
                            <div>
                                <span style=" color: #16423C; font-weight: bold; font-family: Candara;">Student ID:</span>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['stud_id'] ?? ''); ?>" readonly style=" width: 250px; color: #757575; height: 30px;">
                            </div>
                            <br>
                            <br>
                            <span style=" color: #16423C; font-weight: bold;">Full Name:</span>
                            <div>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['FullName'] ?? ''); ?>" readonly style=" width: 389px; color: #757575; height: 30px; font-size: 15px;">
                            </div>
                            <br>
                            <span style=" color: #16423C; font-weight: bold;">Birthdate:</span>
                            <div>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['BirthdateFormatted'] ?? ''); ?>" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                            </div>
                            <br>
                            <span style=" color: #16423C; font-weight: bold;">Course - Section:</span>
                            <div>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['CourseSection'] ?? ''); ?>" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                            </div>
                            <br>
                            <span style=" color: #16423C; font-weight: bold;">Email:</span>
                            <div>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['email'] ?? ''); ?>" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                            </div>
                            <br>
                            <span style=" color: #16423C; font-weight: bold;">Contact Number:</span>
                            <div>
                                <input type="text" value="<?php echo htmlspecialchars($student_info['contact_num'] ?? ''); ?>" readonly style=" width: 385px; color: #757575; height: 30px; font-size: 15px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="search-bar" style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                <div style="position: relative; width: 30%; margin-left: 16px;">
                    <input type="text" id="searchInput" placeholder="Search..."
                               value="<?php echo htmlspecialchars($search_query); ?>"
                               style="border-radius: 20px; padding: 10px 15px; width: 100%; border: 1px solid #16423C;">
                    <button id="searchButton" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);
                                 border: none; color: white; border-radius: 50%;
                                 padding: 6px 8px; cursor: pointer;">
                        🔍
                    </button>
                </div>

                <select id="statusFilter" style="border-radius: 20px; padding: 10px 15px; margin-right: 16px;">
                    <option value="all" <?php echo ($status_filter === 'all') ? 'selected' : ''; ?>>All</option>
                    <option value="Done" <?php echo ($status_filter === 'Done') ? 'selected' : ''; ?>>Done</option>
                    <option value="Missed" <?php echo ($status_filter === 'Missed') ? 'selected' : ''; ?>>Missed</option>
                    <option value="Ongoing" <?php echo ($status_filter === 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                </select>
            </div>

            <br>

            <div class="col-sm-8" style="width: 100%;">
                <table class="table table-bordered">
                    <thead style="background-color: #6A9C89; color: white; text-align: center;">
                        <tr>
                            <th style="border: 1px solid #16423C;">Order ID</th>
                            <th style="border: 1px solid #16423C;">Items</th>
                            <th style="border: 1px solid #16423C;">Quantity</th>
                            <th style="border: 1px solid #16423C;">Date of Appointment</th>
                            <th style="border: 1px solid #16423C;">Time of Appointment</th>
                            <th style="border: 1px solid #16423C;">Total</th>
                            <th style="border: 1px solid #16423C;">Ticket</th>
                            <th style="border: 1px solid #16423C;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody style="color: #16423C; text-align: center;">
                        <?php if (empty($history_items)): ?>
                            <tr>
                                <td colspan="8">No transaction history found for this student.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($history_items as $item): ?>
                                <tr>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['OrderID']); ?></td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['ItemName']); ?></td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['Quantity']); ?></td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['DateOfAppointment']); ?></td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['TimeOfAppointment']); ?></td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars(number_format($item['Total'], 2)); ?></td>
                                    <td style="border: 1px solid #16423C;">
                                        <?php if (!empty($item['TicketPath'])): ?>
                                            <a href="<?php echo htmlspecialchars($item['TicketPath']); ?>" target="_blank">View Ticket</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td style="border: 1px solid #16423C;"><?php echo htmlspecialchars($item['Remarks']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Close button functionality for profile popup
        const closeBtn = document.querySelector('.close-btn');
        const popupContent = document.querySelector('.popup-content');

        closeBtn.addEventListener('click', () => {
            popupContent.style.display = 'none';
        });

        // Show the popup on hover for profile
        const dpContainer = document.querySelector('.dp');
        dpContainer.addEventListener('mouseover', () => {
            popupContent.style.display = 'block';
        });

        // Hide the popup when mouse leaves the profile area
        dpContainer.addEventListener('mouseleave', () => {
            popupContent.style.display = 'none';
        });

        // JavaScript for Search and Filter
        function applyFilters() {
            const searchInput = document.getElementById('searchInput').value;
            const statusFilter = document.getElementById('statusFilter').value;

            // Construct the URL with current filters
            let url = 'HISTORY_Stud.php?';
            if (searchInput) {
                url += `search=${encodeURIComponent(searchInput)}&`;
            }
            if (statusFilter && statusFilter !== 'all') {
                url += `status=${encodeURIComponent(statusFilter)}&`;
            }
            // Remove trailing '&' if any
            window.location.href = url.slice(0, -1);
        }

        // Apply filters when the search button is clicked
        document.getElementById('searchButton').addEventListener('click', applyFilters);

        // Apply filters when the status filter changes
        document.getElementById('statusFilter').addEventListener('change', applyFilters);

        // Allow pressing Enter in the search input to trigger search
        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                applyFilters();
            }
        });
    </script>
</body>
</html>