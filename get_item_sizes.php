<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_fit4school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

$itemName = $_GET['item_name'] ?? '';

if (empty($itemName)) {
    echo json_encode(['success' => false, 'message' => 'Item name is required.']);
    exit();
}

$stmt = $conn->prepare("SELECT size, quantity FROM inventory WHERE item_name = ? ORDER BY FIELD(size, 'XS', 'S', 'M', 'L', 'XL', 'XXL')");
$stmt->bind_param("s", $itemName);
$stmt->execute();
$result = $stmt->get_result();

$sizes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sizes[] = $row;
    }
    echo json_encode(['success' => true, 'sizes' => $sizes]);
} else {
    echo json_encode(['success' => false, 'message' => 'No sizes found for this item.']);
}

$stmt->close();
$conn->close();
?>