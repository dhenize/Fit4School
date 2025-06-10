<?php
ob_start();
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_fit4school');

function connect() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        die("Failed to connect: " . mysqli_connect_error());
    }
    return $connect;
}

$con = connect();

require_once('tcpdf-main/tcpdf.php');
require_once('tcpdf-main/tcpdf_barcodes_2d.php');

// Get appointment ID from query string
$app_id = isset($_GET['app_id']) ? intval($_GET['app_id']) : 0;
if (!$app_id) {
    die("Appointment ID is required.");
}

// Get appointment + student info
$sql = "
    SELECT a.*, s.fname, s.lname
    FROM appointments a
    JOIN student s ON a.student_id = s.student_id
    WHERE a.app_id = $app_id
";

$result = mysqli_query($con, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Appointment not found.");
}

$appointment = mysqli_fetch_assoc($result);

// Get appointment items
$sql_items = "
    SELECT i.item_name, i.size, i.price, ai.quantity
    FROM appointment_items ai
    JOIN inventory i ON ai.item_id = i.item_id
    WHERE ai.app_id = $app_id
";

$result_items = mysqli_query($con, $sql_items);
if (!$result_items || mysqli_num_rows($result_items) == 0) {
    die("No items found for this appointment.");
}

$items = [];
$total = 0;
while ($row = mysqli_fetch_assoc($result_items)) {
    $row['subtotal'] = $row['price'] * $row['quantity'];
    $total += $row['subtotal'];
    $items[] = $row;
}

// === Generate PDF ===
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();

// Header
$pdf->SetFont('Helvetica', 'B', 30);
$pdf->SetFillColor(1, 59, 35);

$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 20, 'Fit4School', 0, 1, 'C', 1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

// Student Info
$pdf->setDrawColor(1, 59, 35);
$pdf->Ln(6);

$pdf->SetFont('Helvetica', 'B', 13);
$pdf->Cell(35, 8, 'NAME:', 0);
$pdf->SetFont('Helvetica', '', 13);
$pdf->Cell(10, 8, $appointment['fname'] . $appointment['lname'], 0, 1);

$pdf->SetFont('Helvetica', 'B', 13);
$pdf->Cell(35, 8, 'STUDENT ID:', 0);
$pdf->SetFont('Helvetica', '', 13);
$pdf->Cell(10, 8, $appointment['student_id'], 0, 1);

$pdf->Line(10, $pdf->GetY() + 5, 200, $pdf->GetY() + 5);
$pdf->Ln(10);


// Appointment Details
$pdf->SetFont('Helvetica', 'B', 24);
$pdf->SetTextColor(1, 59, 35);
$pdf->Cell(95, 10, 'QUEUE NUMBER', 0, 0, 'L');
$pdf->Cell(85, 10, 'QR CODE', 0, 1, 'R');

$pdf->SetTextColor(0,0,0);


$y = $pdf->GetY();
$pdf->SetFont('Helvetica', 'B', 100);
$pdf->SetXY(25, $y);
$pdf->Cell(90, 40, $appointment['queue_no'], 0, 0, 'L');

$style = ['border' => 0, 'padding' => 0, 'fgcolor' => [0,0,0], 'bgcolor' => false];
$pdf->SetXY(150, $y);

//QR CODE
$qrCodeText = !empty($appointment['qr_code'])
    ? $appointment['qr_code']
    : 'FIT4SCHOOL-APPID-' . str_pad($appointment['app_id'], 4, '0', STR_PAD_LEFT);

// Save to DB only if not already saved
if (empty($appointment['qr_code'])) {
    $escapedQR = mysqli_real_escape_string($con, $qrCodeText);
    $updateQR = "
        UPDATE appointments 
        SET qr_code = '$escapedQR'
        WHERE app_id = {$appointment['app_id']}
    ";
    mysqli_query($con, $updateQR);
}

$pdf->write2DBarcode($qrCodeText, 'QRCODE,H', 148, $y, 43, 43, $style, 'N');



//Appointment ID
$pdf->SetFont('Helvetica', 'B', size: 13);
$pdf->Cell(60, 8, 'APPOINTMENT ID:', 0);
$pdf->SetFont('Helvetica', '', size: 13);
$pdf->Cell(10, 8, $appointment['app_id'], 0, 1, 'L');

// Date/Time
$pdf->SetFont('Helvetica', 'B', size: 13);
$pdf->Cell(60, 8, 'DATE OF APPOINTMENT:', 0);
$pdf->SetFont('Helvetica', '', size: 13);
$pdf->Cell(10, 8, date('M d, Y', strtotime($appointment['date_of_app'])), 0, 1);

$pdf->SetFont('Helvetica', 'B', size: 13);
$pdf->Cell(60, 8, 'TIME OF APPOINTMENT:', 0);
$pdf->SetFont('Helvetica', '', size: 13);
$pdf->Cell(10, 8, date('h:i A', strtotime($appointment['time_of_app'])), 0, 1);

$pdf->Line(10, $pdf->GetY() + 5, 200, $pdf->GetY() + 5);
$pdf->Ln(12);

$pdf->setDrawColor(0,0,0);


// Table Headers
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->SetFillColor(1, 59, 35);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(60, 8, 'ITEM', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'SIZE', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'QUANTITY', 1, 0, 'C', 1);
$pdf->Cell(35, 8, 'PRIZE', 1, 0, 'C', 1);
$pdf->Cell(35, 8, 'SUBTOTAL', 1, 1, 'C', 1);

$pdf->SetTextColor(0, 0, 0);

// Table Rows
$pdf->SetFont('Helvetica', '', 12);
foreach ($items as $item) {
    $pdf->Cell(60, 8, $item['item_name'], 1, 0, 'C');
    $pdf->Cell(30, 8, $item['size'], 1, 0, 'C');
    $pdf->Cell(30, 8, $item['quantity'], 1, 0, 'C');
    $pdf->Cell(35, 8, 'Php ' . number_format($item['price'], 2), 1, 0, 'C');
    $pdf->Cell(35, 8, 'Php ' . number_format($item['subtotal'], 2), 1, 1, 'C');
}

// Total
$pdf->Ln(8);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->Cell(155, 8, 'TOTAL PAYMENT:', 0, 0, 'R');
$pdf->Cell(30, 8, 'Php ' . number_format($total, 2), 0, 1, 'R');

// Output PDF
//$pdf->Output('ticket.pdf', 'I');

$ticketDir = 'tickets/';
$ticketFileName = 'appointment_slip_' . $appointment['app_id'] . '.pdf';
$ticketPath = $ticketDir . $ticketFileName;

$pdf->Output($ticketPath, 'F'); // Save to server



?>
