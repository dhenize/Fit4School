<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit4school";

$response = ['success' => false, 'message' => 'An unknown error occurred.', 'sizes' => []];

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $itemName = $_GET['item_name'] ?? null;
    $gender = $_GET['gender'] ?? null;

    if (empty($itemName) || empty($gender)) {
        $response['message'] = 'Missing item name or gender parameters.';
        echo json_encode($response);
        exit();
    }

    $stmt = $pdo->prepare("SELECT size, stock_quantity FROM uniform_items WHERE item_name = ? AND gender = ?");
    $stmt->execute([$itemName, $gender]);
    $sizesData = $stmt->fetchAll();

    $response['success'] = true;
    $response['message'] = 'Item sizes fetched successfully.';
    $response['sizes'] = $sizesData;

} catch (PDOException $e) {

    $response['message'] = 'Database error: ' . $e->getMessage();
    error_log("get_item_sizes.php PDOException: " . $e->getMessage());
} catch (Exception $e) {

    $response['message'] = 'Server error: ' . $e->getMessage();
    error_log("get_item_sizes.php Exception: " . $e->getMessage());
}
echo json_encode($response);

exit();
?>