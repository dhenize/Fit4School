<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stocks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="stock.css">
  <link rel="icon" href="Logo.png" type="image/x-icon">
</head>

<body style=" overflow: hidden;">
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


    <div class="container-fluid"> <div class="row">
    <div class="col-md-12"> <div class="stocks"> 
            <table>
            <tr>
                <th><input type="checkbox"></th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="polo.png" alt="Polo (Boys)"></td>
                <td>POLO (Boys)</td>
                <td>390</td>
                <td>250.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="pantsboy.png" alt="Pants (Boys)"></td>
                <td>PANTS (Boys)</td>
                <td>400</td>
                <td>300.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="blouse.png" alt="Blouse (Girls)"></td>
                <td>BLOUSE (Girls)</td>
                <td>200</td>
                <td>275.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="pantsgirl.png" alt="Pants (Girls)"></td>
                <td>PANTS (Girls)</td>
                <td>250</td>
                <td>375.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="pepants.png" alt="Pants (Girls)"></td>
                <td>PANTS (Girls)</td>
                <td>250</td>
                <td>375.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td class="image-cell"><img src="petshirt.png" alt="Pants (Girls)"></td>
                <td>PANTS (Girls)</td>
                <td>250</td>
                <td>375.00</td>
                <td class="action-cell"><button class='bx bx-edit'></button></td>
            </tr>
            </table>
                </div>
            </div>
        </div>
    </div>

    <div id="edititems" class="popup2">
      <h2>Edit Items</h2>
      <span class="close2">×</span>
  
      <div class="image-container">
          <div class="image-input"><img src="#" alt="Pants (Girls)"></div>
        <label for="imageUpload">Change Image</label>
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


    <script>
    const openAddItems = document.getElementById('openPopup');
    const openEditItems = document.querySelectorAll('.bx-edit');
    const addItemsPopup = document.getElementById('additems');
    const editItemsPopup = document.getElementById('edititems');
    const closeBtn1 = document.querySelector('.close1');
    const closeBtn2 = document.querySelector('.close2');
    const closeBtn3 = document.querySelector('.close3');

    const openDeletePopup = document.getElementById('deletePopup');
    const deletePopup = document.getElementById('deletebtn');

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

    openEditItems.forEach(button => {
      button.addEventListener('click', () => {
        editItemsPopup.style.display = 'block';
        addItemsPopup.style.display = 'none';
        deletePopup.style.display = 'none';
      });
    });

    closeBtn1.addEventListener('click', function() {
      this.parentElement.style.display = 'none';
    });
    closeBtn2.addEventListener('click', function() {
      this.parentElement.style.display = 'none';
    });
    closeBtn3.addEventListener('click', function() {
      this.parentElement.style.display = 'none';
    });
    </script>
</body>
</html>