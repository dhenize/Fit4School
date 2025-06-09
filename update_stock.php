<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

$itemName = $_POST['item_name'] ?? '';
$price = $_POST['price'] ?? '';
$sizesJson = $_POST['sizes'] ?? '{}';
$sizes = json_decode($sizesJson, true);

if (empty($itemName) || !is_numeric($price)) {
    echo json_encode(['success' => false, 'message' => 'Missing required item details (name, price).']);
    exit();
}

$target_dir = "images/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

if (isset($_FILES['item_image_edit']) && $_FILES['item_image_edit']['error'] == UPLOAD_ERR_OK) {
    $originalFileName = basename($_FILES["item_image_edit"]["name"]);
    $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    $safeItemName = strtolower(str_replace([' ', '(', ')', '-'], ['_', '', '', '_'], $itemName));
    $newFileName = $safeItemName . '.' . $imageFileType;
    $target_file = $target_dir . $newFileName;

    $check = getimagesize($_FILES["item_image_edit"]["tmp_name"]);
    if ($check !== false) {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo json_encode(['success' => false, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed for image upload.']);
            exit();
        }
        if (move_uploaded_file($_FILES["item_image_edit"]["tmp_name"], $target_file)) {
        } else {
            echo json_encode(['success' => false, 'message' => 'Sorry, there was an error uploading the new image.']);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Uploaded file is not an image.']);
        exit();
    }
}

$conn->begin_transaction();
try {
    $update_price_stmt = $conn->prepare("UPDATE inventory SET price = ? WHERE item_name = ?");
    $update_price_stmt->bind_param("ds", $price, $itemName);
    $update_price_stmt->execute();
    $update_price_stmt->close();

    foreach ($sizes as $size => $quantity) {
        $quantity = (int)$quantity;
        if ($quantity < 0) $quantity = 0;

        $check_stmt = $conn->prepare("SELECT item_id FROM inventory WHERE item_name = ? AND size = ?");
        $check_stmt->bind_param("ss", $itemName, $size);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $update_stmt = $conn->prepare("UPDATE inventory SET quantity = ? WHERE item_name = ? AND size = ?");
            $update_stmt->bind_param("iss", $quantity, $itemName, $size);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            $insert_stmt = $conn->prepare("INSERT INTO inventory (item_name, size, price, quantity) VALUES (?, ?, ?, ?)");
            $insert_stmt->bind_param("ssdi", $itemName, $size, $price, $quantity);
            $insert_stmt->execute();
            $insert_stmt->close();
        }
        $check_stmt->close();
    }

    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Stock updated successfully!']);
} catch (Exception $e) {
    $conn->rollback();
    error_log("Update Stock Error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Failed to update stock: ' . $e->getMessage()]);
}

$conn->close();
?>