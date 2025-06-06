<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " Please check your database credentials in stock.php.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stock.css">
    <link rel="icon" href="Logo.png" type="image/x-icon">
</head>

<body style="overflow: hidden;">
    <header>
        <div class="logo">
            <img src="Logo_Light.png" alt="Fit4School Logo">
            <h1>Fit4School</h1>
            <div class="links">
                <div class="dropdown">
                    <a class="dropbtn">Stocks
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
            <h2>Manage Stocks</h2>
        </div>

        <div class="search-container">
            <div class="search-bar">
                <input type="text" placeholder="Search Here...">
            </div>

            <div class="buttons">
                <button id="openPopup" class="btn-add">ADD</button>

                <div id="additems" class="popup1">
                    <h2>Add Items</h2>
                    <span class="close1">×</span>

                    <div class="image-container">
                        <div class="image-input"></div>
                        <label for="imageUpload">Add Image</label>
                        <input type="file" id="imageUpload" accept="image/*">
                    </div>

                    <div class="form-row1">
                        <span for="itemName">ITEM NAME</span>
                        <input type="text" id="itemName" placeholder="Enter Here...">
                    </div>
                    <div class="form-row2">
                        <span for="price">PRICE</span>
                        <input type="text" id="price" placeholder="Enter Here...">
                    </div>

                    <div class="form-container">
                        <h4>SIZES</h4>
                        <div class="size-row">
                            <label for="sizeXS">Extra Small (XS)</label>
                            <input type="number" id="sizeXS" min="0" value="1">
                        </div>
                        <div class="size-row">
                            <label for="sizeS">Small (S)</label>
                            <input type="number" id="sizeS" min="0" value="1">
                        </div>
                        <div class="size-row">
                            <label for="sizeM">Medium (M)</label>
                            <input type="number" id="sizeM" min="0" value="1">
                        </div>
                        <div class="size-row">
                            <label for="sizeL">Large (L)</label>
                            <input type="number" id="sizeL" min="0" value="1">
                        </div>
                        <div class="size-row">
                            <label for="sizeXL">Extra Large (XL)</label>
                            <input type="number" id="sizeXL" min="0" value="1">
                        </div>
                        <div class="size-row">
                            <label for="sizeXXL">Extra x2 Large (XXL)</label>
                            <input type="number" id="sizeXXL" min="0" value="1">
                        </div>
                        <div class="button-container">
                            <button class="edit-btn">Edit</button>
                            <button class="save-btn">Save</button>
                        </div>
                    </div>
                </div>

                <button id="deletePopup" class="btn-delete">DELETE</button>

                <div id="deletebtn" class="popup3">
                    <h2>Warning</h2>
                    <span class="close3">×</span>

                    <p>Do you want to delete this items?</p>
                    <div class="button-container">
                        <button class="no-btn">NO</button>
                        <button class="yes-btn">YES</button>
                    </div>
                </div>

            </div>
        </header>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="stocks">
                        <table>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $sql = "SELECT item_id, item_name, gender, price, SUM(stock_quantity) AS total_stock
                                    FROM uniform_items
                                    GROUP BY item_name, gender, price
                                    ORDER BY item_name, gender";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $full_item_name = htmlspecialchars($row["item_name"]) . ' (' . htmlspecialchars($row["gender"]) . ')';
                                    $imagePath = 'images/' . strtolower(str_replace([' ', '(', ')', '-'], ['_', '', '', '_'], $row['item_name']));
                                    if ($row['gender'] == 'Boys') {
                                           $imagePath .= '_boys.jpg';
                                    } elseif ($row['gender'] == 'Girls') {
                                           $imagePath .= '_girls.jpg';
                                    } else {
                                           $imagePath .= '.jpg';
                                    }

                                    if (!file_exists($imagePath) || !is_file($imagePath)) {
                                        $imagePath = 'images/default_uniform.jpg';
                                    }

                                    echo "<tr>";
                                    echo "<td><input type='checkbox' name='selected_items[]' value='" . htmlspecialchars($row['item_id']) . "'></td>";
                                    echo "<td class='image-cell'><img src='" . $imagePath . "' alt='" . $full_item_name . "'></td>";
                                    echo "<td>" . $full_item_name . "</td>";
                                    echo "<td>" . htmlspecialchars($row["total_stock"]) . "</td>";
                                    echo "<td>₱" . number_format($row["price"], 2) . "</td>";
                                    echo "<td class='action-cell'><button class='bx bx-edit' data-item-id='" . htmlspecialchars($row['item_id']) . "' data-item-name='" . htmlspecialchars($row['item_name']) . "' data-gender='" . htmlspecialchars($row['gender']) . "' data-price='" . htmlspecialchars($row['price']) . "'></button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' style='text-align: center; padding: 20px;'>No uniform items found in the database.</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div id="edititems" class="popup2">
                <h2>Edit Items</h2>
                <span class="close2">×</span>

                <div class="image-container">
                    <div class="image-input"><img src="#" alt="Item Image Preview"></div>
                    <label for="editImageUpload">Change Image</label>
                    <input type="file" id="editImageUpload" accept="image/*">
                </div>

                <div class="form-row1">
                    <span for="editItemName">ITEM NAME</span>
                    <input type="text" id="editItemName" placeholder="Enter Here...">
                </div>
                <div class="form-row2">
                    <span for="editPrice">PRICE</span>
                    <input type="text" id="editPrice" placeholder="Enter Here...">
                </div>

                <div class="form-container" id="editSizesContainer">
                    <h4>SIZES</h4>
                    <div class="size-row">
                        <label for="editSizeXS">Extra Small (XS)</label>
                        <input type="number" id="editSizeXS" min="0" value="0" data-size="XS">
                    </div>
                    <div class="size-row">
                        <label for="editSizeS">Small (S)</label>
                        <input type="number" id="editSizeS" min="0" value="0" data-size="S">
                    </div>
                    <div class="size-row">
                        <label for="editSizeM">Medium (M)</label>
                        <input type="number" id="editSizeM" min="0" value="0" data-size="M">
                    </div>
                    <div class="size-row">
                        <label for="editSizeL">Large (L)</label>
                        <input type="number" id="editSizeL" min="0" value="0" data-size="L">
                    </div>
                    <div class="size-row">
                        <label for="editSizeXL">Extra Large (XL)</label>
                        <input type="number" id="editSizeXL" min="0" value="0" data-size="XL">
                    </div>
                    <div class="size-row">
                        <label for="editSizeXXL">Extra x2 Large (XXL)</label>
                        <input type="number" id="editSizeXXL" min="0" value="0" data-size="XXL">
                    </div>
                    <div class="button-container">
                        <button class="save-edit-btn">Save Changes</button>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                const openAddItems = document.getElementById('openPopup');
                const openEditButtons = document.querySelectorAll('.bx-edit');
                const addItemsPopup = document.getElementById('additems');
                const editItemsPopup = document.getElementById('edititems');
                const deletePopup = document.getElementById('deletebtn');

                const closeBtn1 = document.querySelector('.close1');
                const closeBtn2 = document.querySelector('.close2');
                const closeBtn3 = document.querySelector('.close3');

                const openDeletePopup = document.getElementById('deletePopup');

                openAddItems.addEventListener('click', () => {
                    addItemsPopup.style.display = 'block';
                    deletePopup.style.display = 'none';
                    editItemsPopup.style.display = 'none';
                });

                openDeletePopup.addEventListener('click', () => {
                    deletePopup.style.display = 'block';
                    addItemsPopup.style.display = 'none';
                    editItemsPopup.style.display = 'none';
                });

                openEditButtons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        editItemsPopup.style.display = 'block';
                        addItemsPopup.style.display = 'none';
                        deletePopup.style.display = 'none';

                        const row = event.target.closest('tr');
                        const itemId = event.target.dataset.itemId;
                        const itemName = event.target.dataset.itemName;
                        const gender = event.target.dataset.gender;
                        const price = event.target.dataset.price;

                        document.getElementById('editItemName').value = itemName;
                        document.getElementById('editPrice').value = price;

                        editItemsPopup.dataset.currentGender = gender;

                        $.ajax({
                            url: 'get_item_sizes.php',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                item_name: itemName,
                                gender: gender
                            },
                            success: function(response) {
                                if (response.success) {
                                    document.querySelectorAll('#editSizesContainer input[data-size]').forEach(input => {
                                        input.value = 0;
                                    });

                                    response.sizes.forEach(sizeData => {
                                        const inputElement = document.querySelector(`#editSizesContainer input[data-size="${sizeData.size}"]`);
                                        if (inputElement) {
                                            inputElement.value = sizeData.stock_quantity;
                                        }
                                    });
                                } else {
                                    alert('Error fetching item sizes: ' + response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", status, error, xhr.responseText);
                                alert("Could not load item sizes for editing. Check console for details.");
                            }
                        });
                    });
                });

                if (closeBtn1) {
                    closeBtn1.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }
                if (closeBtn2) {
                    closeBtn2.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }
                if (closeBtn3) {
                    closeBtn3.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }

                document.querySelector('.save-edit-btn').addEventListener('click', function() {
                    const itemName = document.getElementById('editItemName').value;
                    const price = document.getElementById('editPrice').value;

                    const currentGender = editItemsPopup.dataset.currentGender;

                    const sizes = {};
                    document.querySelectorAll('#editSizesContainer input[data-size]').forEach(input => {
                        sizes[input.dataset.size] = parseInt(input.value);
                    });

                    if (!itemName || !price || !currentGender) {
                        alert("Validation Error: Missing item name, price, or gender for saving.");
                        return;
                    }

                    $.ajax({
                        url: 'update_stock.php',
                        type: 'POST',
                        contentType: 'application/json',
                        dataType: 'json',
                        data: JSON.stringify({
                            item_name: itemName,
                            gender: currentGender,
                            price: price,
                            sizes: sizes
                        }),
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                editItemsPopup.style.display = 'none';
                                location.reload();
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error, xhr.responseText);
                            alert("An error occurred while saving changes. Check console for details.");
                        }
                    });
                });

                document.querySelector('#additems .save-btn').addEventListener('click', function() {
                    alert('Save Add button clicked! (Functionality for adding new items not yet implemented)');
                });
            </script>
</body>
</html>