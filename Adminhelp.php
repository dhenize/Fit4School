<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Help Page</title>
    <link rel="stylesheet" href="adminhelp.css">
    <link rel="icon" href="Logo.png" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <div class="header">
    <div style="display: inline-flex; align-items: center;">
      <img src="Logo_Light.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 5px;">
      <span style="font-size: 20px; color: white;">Fit4School</span>
    </div>

        <div class="logo1"></div>
        <div class="nav">
            <a href="admindash.php">Dashboard</a>
            <a href="adminhelp.php">Help</a>
            <a href="logout.php" class="nav-link">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
            </a>
        </div>
    </div>

    <!-- Page Title Section -->
    <div class="page-title">
        <h1>Admin Help Page</h1>
    </div>

    <!-- FAQ Section -->
    <div class="content">
        <div class="faq-container">
            <details class="faq-item">
                <summary class="faq-header">INTRODUCTION</summary>
                <div class="faq-content">
                    Welcome to Fit4School Admin Help Page! This guide will help you navigate and utilize the main functionalities to manage our uniform management system efficiently.
                </div>
            </details>
            <details class="faq-item">
                <summary class="faq-header">LOG IN</summary>
                <div class="faq-content">
                    1. To log in, open your browser and go to Fit4School.com.<br>
                    2. Enter your admin username and password.<br>
                    3. Click the login button to access the admin dashboard.
                </div>
            </details>
            <details class="faq-item">
                <summary class="faq-header">DASHBOARD</summary>
                <div class="faq-content">
                    The dashboard provides a summary of key metrics and quick access to various sections of the system:<br>
                    1. Recent Orders - View all recent transactions.<br>
                    2. Inventory Status - Check the current stock levels.<br>
                    3. Confirm Transactions - Check all finished transactions.<br>
                    4. Appointment Status - Statistics of all appointments.<br>
                    5. Calendar - Displays the current day and month.
                </div>
            </details>
            <details class="faq-item">
                <summary class="faq-header">APPOINTMENT</summary>
                <div class="faq-content">
                    This is where you view all the contents of Appointment Table. The table includes the following information: <br>
                     1. Student ID - All the 9-digit ID code of each student.<br>
                     2. Order ID- All unique codes combine with number and letters for each transaction.<br>
                     3. Item, Size, and Quantity - Displays all items, the sizes of each item, and the quantity.<br>
                     4. Date of Appointment and Time of Appointment.<br>
                     5. Total - Total amount of all items ordered. <br>
                     6. Ticket - It contains the ticket in PDF form. <br>
                     7. Remarks - Shows if the transaction is done, ongoing or missed.
                    <br>
                    <br>
                     Seacrh bar - If you want to search for an specific item, use the search bar.
                    <br>
                    <br>
                     Note: Click the archive button to archive an appointment and click the save button if you update the remarks of an appointment. To update remarks, click the drop down button of each remarks.
                </div>
            </details>
            <details class="faq-item">
                <summary class="faq-header">STOCKS</summary>
                <div class="faq-content">
                    This is where the admin manages all the stock of uniforms <br>
                     1. Search bar - If you want to search for a specific items, use search bar.<br>
                     2. Image- The image of the item.<br>
                     3. Name - Name of an item.<br>
                     4. Quantity - Total stocks of an item.<br>
                     5. Price - The exact amount of an item. <br>
                     6. Action - This is where you can modify the details of an item. You can also check the stocks based on the size of the item, simply click the action button if you would like to edit the information of an item. <br>
                     7. Remarks - Shows if the transaction is done, ongoing or missed.
                    <br>
                    <br>
                     This includes the following (Details you can edit).
                     Image of an item
                     Name of an item
                     Price 
                     Stocks per size (xs, s, m, L, xl, xxl)
                    <br>
                    <br>
                     Note: Click the edit button once you cliked the action button (when a window shows up after the action has been done.) this will allow you to modify the information of the desired item. After updating the details, click the save button to update the information.
                     <br>
                     <br>
                     7. Checkbox, Add and Delete Button - If you want to delete an item, click the checkbox and then click the delete button. If you want to add more items, click the add button.
                </div>
            </details>
            <details class="faq-item">
                <summary class="faq-header">ARCHIVE</summary>
                <div class="faq-content">
                    This is where you can view all the cotents of Archive Table. The table includes the following information <br>
                     1. Search bar - If you want to search for a specific items, use search bar.<br>
                     2. Image- The image of the item.<br>
                     3. Name - Name of an item.<br>
                     4. Quantity - Total stocks of an item.<br>
                     5. Price - The exact amount of an item. <br>
                     6. Action - This is where you can modify the details of an item. You can also check the stocks based on the size of the item, simply click the action button if you would like to edit the information of an item. <br>
                     7. Remarks - Shows if the transaction is done, ongoing or missed. <br>
                     <br>
                     <br>
                     Note: If you wnat to search for a specefic item, use the search bar.

                </div>
            </details>
        </div>
    </div>
</body>
</html>
