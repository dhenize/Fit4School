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

$data = json_decode(file_get_contents('php://input'), true);
$selectedItemNames = $data['item_names'] ?? [];

if (empty($selectedItemNames)) {
    echo json_encode(['success' => false, 'message' => 'No items selected for deletion.']);
    exit();
}

$conn->begin_transaction();
try {
    foreach ($selectedItemNames as $itemName) {
        if (empty($itemName)) {
            throw new Exception("Invalid item name provided for deletion.");
        }

        $stmt = $conn->prepare("DELETE FROM inventory WHERE item_name = ?");
        $stmt->bind_param("s", $itemName);
        $stmt->execute();
        $stmt->close();
    }

    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Selected item(s) deleted successfully!']);
} catch (Exception $e) {
    $conn->rollback();
    error_log("Delete Item Error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Failed to delete item(s): ' . $e->getMessage()]);
}

$conn->close();
?>