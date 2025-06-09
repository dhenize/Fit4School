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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stock.css"> <link rel="icon" href="Logo.png" type="image/x-icon">
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
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Here...">
            </div>

            <div class="buttons">
                <button id="openPopup" class="btn-add">ADD</button>

                <div id="additems" class="popup1">
                    <h2>Add Items</h2>
                    <span class="close1">×</span>
                    <form id="addItemForm">
                        <div class="image-container">
                            <div class="image-input"><img id="addImagePreview" src="#" alt="Image Preview" style="display:none; max-width: 100px; max-height: 100px;"></div>
                            <label for="imageUpload">Add Image</label>
                            <input type="file" id="imageUpload" name="item_image" accept="image/*">
                        </div>

                        <div class="form-row1">
                            <label for="itemName">ITEM NAME</label>
                            <input type="text" id="itemName" name="item_name" placeholder="Enter Here..." required>
                        </div>
                        <div class="form-row2">
                            <label for="price">PRICE</label>
                            <input type="number" id="price" name="price" step="0.01" placeholder="Enter Here..." required>
                        </div>

                        <div class="form-container">
                            <h4>QUANTITY BY SIZES</h4>
                            <div class="size-row">
                                <label for="sizeXS">Extra Small (XS)</label>
                                <input type="number" id="sizeXS" name="quantity_XS" min="0" value="0" data-size="XS">
                            </div>
                            <div class="size-row">
                                <label for="sizeS">Small (S)</label>
                                <input type="number" id="sizeS" name="quantity_S" min="0" value="0" data-size="S">
                            </div>
                            <div class="size-row">
                                <label for="sizeM">Medium (M)</label>
                                <input type="number" id="sizeM" name="quantity_M" min="0" value="0" data-size="M">
                            </div>
                            <div class="size-row">
                                <label for="sizeL">Large (L)</label>
                                <input type="number" id="sizeL" name="quantity_L" min="0" value="0" data-size="L">
                            </div>
                            <div class="size-row">
                                <label for="sizeXL">Extra Large (XL)</label>
                                <input type="number" id="sizeXL" name="quantity_XL" min="0" value="0" data-size="XL">
                            </div>
                            <div class="size-row">
                                <label for="sizeXXL">Extra x2 Large (XXL)</label>
                                <input type="number" id="sizeXXL" name="quantity_XXL" min="0" value="0" data-size="XXL">
                            </div>
                            <div class="button-container">
                                <button type="submit" class="save-btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <button id="deletePopup" class="btn-delete">DELETE</button>

                <div id="deletebtn" class="popup3">
                    <h2>Warning</h2>
                    <span class="close3">×</span>
                    <form id="deleteItemForm">
                        <p>Do you want to delete the selected items?</p>
                        <div class="button-container">
                            <button type="button" class="no-btn">NO</button>
                            <button type="submit" class="yes-btn">YES</button>
                        </div>
                    </form>
                </div>

            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="stocks">
                        <table id="stockTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllItems"></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT item_id, item_name, price, SUM(quantity) AS total_stock
                                        FROM inventory
                                        GROUP BY item_name, price
                                        ORDER BY item_name";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $full_item_name = htmlspecialchars($row["item_name"]);

                                        $imageFileName = strtolower(str_replace([' ', '(', ')', '-'], ['_', '', '', '_'], $row['item_name']));
                                        $imagePath = 'images/' . $imageFileName . '.png';

                                        if (!file_exists($imagePath) || !is_file($imagePath)) {
                                            $imagePath = 'images/default_uniform.jpg';
                                        }

                                        echo "<tr>";
                                        echo "<td><input type='checkbox' class='item-checkbox' name='selected_items[]' data-item-name='" . htmlspecialchars($row['item_name']) . "'></td>";
                                        echo "<td class='image-cell'><img src='" . $imagePath . "' alt='" . $full_item_name . "'></td>";
                                        echo "<td>" . $full_item_name . "</td>";
                                        echo "<td>" . htmlspecialchars($row["total_stock"]) . "</td>";
                                        echo "<td>₱" . number_format($row["price"], 2) . "</td>";
                                        echo "<td class='action-cell'><button class='bx bx-edit' data-item-name='" . htmlspecialchars($row['item_name']) . "' data-price='" . htmlspecialchars($row['price']) . "'></button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' style='text-align: center; padding: 20px;'>No uniform items found in the database.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="edititems" class="popup2">
                <h2>Edit Items</h2>
                <span class="close2">×</span>
                <form id="editItemForm">
                    <div class="image-container">
                        <div class="image-input"><img id="editImagePreview" src="#" alt="Item Image Preview" style="display:none; max-width: 100px; max-height: 100px;"></div>
                        <label for="editImageUpload">Change Image</label>
                        <input type="file" id="editImageUpload" name="item_image_edit" accept="image/*">
                    </div>

                    <div class="form-row1">
                        <label for="editItemName">ITEM NAME</label>
                        <input type="text" id="editItemName" name="edit_item_name" placeholder="Enter Here..." readonly>
                    </div>
                    <div class="form-row2">
                        <label for="editPrice">PRICE</label>
                        <input type="number" id="editPrice" name="edit_price" step="0.01" placeholder="Enter Here...">
                    </div>

                    <div class="form-container" id="editSizesContainer">
                        <h4>QUANTITY BY SIZES</h4>
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
                            <button type="submit" class="save-edit-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                const openAddItems = document.getElementById('openPopup');
                const addItemsPopup = document.getElementById('additems');
                const closeBtn1 = document.querySelector('.close1');

                openAddItems.addEventListener('click', () => {
                    addItemsPopup.style.display = 'block';
                    document.getElementById('addItemForm').reset();
                    document.getElementById('addImagePreview').style.display = 'none';
                    document.getElementById('addImagePreview').src = '';
                });
                if (closeBtn1) {
                    closeBtn1.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }

                document.getElementById('imageUpload').addEventListener('change', function(event) {
                    const [file] = event.target.files;
                    if (file) {
                        const preview = document.getElementById('addImagePreview');
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    }
                });

                document.getElementById('addItemForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData();
                    const sizes = {};
                    document.querySelectorAll('#additems input[data-size]').forEach(input => {
                        sizes[input.dataset.size] = parseInt(input.value) || 0;
                    });
                    formData.append('sizes', JSON.stringify(sizes));

                    formData.append('item_name', document.getElementById('itemName').value);
                    formData.append('price', document.getElementById('price').value);

                    const imageFile = document.getElementById('imageUpload').files[0];
                    if (imageFile) {
                        formData.append('item_image', imageFile);
                    }

                    $.ajax({
                        url: 'add_item.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                addItemsPopup.style.display = 'none';
                                location.reload();
                            } else {
                                alert('Error adding item: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error, xhr.responseText);
                            alert("An error occurred while adding the item. Check console for details.");
                        }
                    });
                });

                const openEditButtons = document.querySelectorAll('.bx-edit');
                const editItemsPopup = document.getElementById('edititems');
                const closeBtn2 = document.querySelector('.close2');

                openEditButtons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        editItemsPopup.style.display = 'block';
                        document.getElementById('deletebtn').style.display = 'none';
                        document.getElementById('additems').style.display = 'none';

                        const itemName = event.target.dataset.itemName;
                        const price = event.target.dataset.price;

                        document.getElementById('editItemName').value = itemName;
                        document.getElementById('editPrice').value = price;

                        document.getElementById('editImagePreview').style.display = 'none';
                        document.getElementById('editImagePreview').src = '';

                        let currentImagePath = 'images/' + itemName.toLowerCase().replace(/[\s\(\)-]/g, '_') + '.jpg';

                        document.getElementById('editImagePreview').src = currentImagePath;
                        document.getElementById('editImagePreview').onerror = function() {
                            this.src = 'images/default_uniform.jpg';
                        };
                        document.getElementById('editImagePreview').style.display = 'block';


                        $.ajax({
                            url: 'get_item_sizes.php',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                item_name: itemName
                            },
                            success: function(response) {
                                if (response.success) {
                                    document.querySelectorAll('#editSizesContainer input[data-size]').forEach(input => {
                                        input.value = 0;
                                    });

                                    response.sizes.forEach(sizeData => {
                                        const inputElement = document.querySelector(`#editSizesContainer input[data-size="${sizeData.size}"]`);
                                        if (inputElement) {
                                            inputElement.value = sizeData.quantity;
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
                if (closeBtn2) {
                    closeBtn2.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }

                document.getElementById('editImageUpload').addEventListener('change', function(event) {
                    const [file] = event.target.files;
                    if (file) {
                        const preview = document.getElementById('editImagePreview');
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    }
                });

                document.getElementById('editItemForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const itemName = document.getElementById('editItemName').value;
                    const price = parseFloat(document.getElementById('editPrice').value);

                    const sizes = {};
                    document.querySelectorAll('#editSizesContainer input[data-size]').forEach(input => {
                        sizes[input.dataset.size] = parseInt(input.value) || 0;
                    });

                    if (!itemName || isNaN(price)) {
                        alert("Validation Error: Item name and price are required.");
                        return;
                    }

                    const formData = new FormData();
                    formData.append('item_name', itemName);
                    formData.append('price', price);
                    formData.append('sizes', JSON.stringify(sizes));

                    const imageFile = document.getElementById('editImageUpload').files[0];
                    if (imageFile) {
                        formData.append('item_image_edit', imageFile);
                    }

                    $.ajax({
                        url: 'update_stock.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
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

                const openDeletePopup = document.getElementById('deletePopup');
                const deletePopup = document.getElementById('deletebtn');
                const closeBtn3 = document.querySelector('.close3');
                const noBtnDelete = document.querySelector('#deletebtn .no-btn');
                const yesBtnDelete = document.querySelector('#deletebtn .yes-btn');


                openDeletePopup.addEventListener('click', () => {
                    const checkedItems = document.querySelectorAll('.item-checkbox:checked');
                    if (checkedItems.length === 0) {
                        alert("Please select at least one item to delete.");
                        return;
                    }
                    deletePopup.style.display = 'block';
                    addItemsPopup.style.display = 'none';
                    editItemsPopup.style.display = 'none';
                });
                if (closeBtn3) {
                    closeBtn3.addEventListener('click', function() { this.parentElement.style.display = 'none'; });
                }
                if (noBtnDelete) {
                    noBtnDelete.addEventListener('click', function() { deletePopup.style.display = 'none'; });
                }

                document.getElementById('deleteItemForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    const selectedItems = [];
                    document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                        selectedItems.push(checkbox.dataset.itemName);
                    });

                    if (selectedItems.length === 0) {
                        alert("No items selected for deletion.");
                        return;
                    }

                    $.ajax({
                        url: 'delete_items.php',
                        type: 'POST',
                        contentType: 'application/json',
                        dataType: 'json',
                        data: JSON.stringify({ item_names: selectedItems }),
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                deletePopup.style.display = 'none';
                                location.reload();
                            } else {
                                alert('Error deleting items: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error, xhr.responseText);
                            alert("An error occurred during deletion. Check console for details.");
                        }
                    });
                });

                document.getElementById('selectAllItems').addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('.item-checkbox');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                });

                function searchTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("stockTable");
                    tr = table.getElementsByTagName("tr");

                    for (i = 1; i < tr.length; i++) {
                        tr[i].style.display = "none";
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            }
                        }
                    }
                }
            </script>
        </body>
        </html>