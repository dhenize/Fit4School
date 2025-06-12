<?php
    ob_start();
    session_start();

    // Database connection
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'db_fit4school');

    function connect()
    {
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
            die("Failed to connect: " . mysqli_connect_error());
        }
        return $connect;
    }

    $con = connect();

    require_once('tcpdf-main/tcpdf.php');
    require_once('tcpdf-main/tcpdf_barcodes_2d.php');

    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';


    $appointment = [
        'app_id' => rand(1000, 9999),
        'student_id' => '202412345',
        'fname' => 'Dhenize',
        'lname' => 'Sample',
        'date_of_app' => $date,
        'time_of_app' => $time,
        'queue_no' => rand(1, 100),
        'qr_code' => ''
    ];

    $items = [
        [
            'item_name' => 'POLO (Boys)',
            'size' => 'M',
            'price' => 700,
            'quantity' => 1,
            'subtotal' => 700
        ],
        [
            'item_name' => 'PANTS (Girls)',
            'size' => 'S',
            'price' => 950,
            'quantity' => 1,
            'subtotal' => 950
        ]
    ];

    $total = array_sum(array_column($items, 'subtotal'));

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
    $pdf->Cell(10, 8, $appointment['fname'] . ' ' . $appointment['lname'], 0, 1);

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

    $pdf->SetTextColor(0, 0, 0);

    $y = $pdf->GetY();
    $pdf->SetFont('Helvetica', 'B', 100);
    $pdf->SetXY(25, $y);
    $pdf->Cell(90, 40, $appointment['queue_no'], 0, 0, 'L');

    $style = ['border' => 0, 'padding' => 0, 'fgcolor' => [0, 0, 0], 'bgcolor' => false];
    $pdf->SetXY(150, $y);

    // QR CODE
    $qrCodeText = 'FIT4SCHOOL-APPID-' . str_pad($appointment['app_id'], 4, '0', STR_PAD_LEFT);
    $pdf->write2DBarcode($qrCodeText, 'QRCODE,H', 148, $y, 43, 43, $style, 'N');

    // Appointment ID
    $pdf->SetFont('Helvetica', 'B', 13);
    $pdf->Cell(60, 8, 'APPOINTMENT ID:', 0);
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Cell(10, 8, $appointment['app_id'], 0, 1, 'L');

    // Date/Time
    $pdf->SetFont('Helvetica', 'B', 13);
    $pdf->Cell(60, 8, 'DATE OF APPOINTMENT:', 0);
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Cell(10, 8, date('M d, Y', strtotime($appointment['date_of_app'])), 0, 1);

    $pdf->SetFont('Helvetica', 'B', 13);
    $pdf->Cell(60, 8, 'TIME OF APPOINTMENT:', 0);
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Cell(10, 8, date('h:i A', strtotime($appointment['time_of_app'])), 0, 1);

    $pdf->Line(10, $pdf->GetY() + 5, 200, $pdf->GetY() + 5);
    $pdf->Ln(12);

    $pdf->setDrawColor(0, 0, 0);

    // Table Headers
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->SetFillColor(1, 59, 35);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(60, 8, 'ITEM', 1, 0, 'C', 1);
    $pdf->Cell(30, 8, 'SIZE', 1, 0, 'C', 1);
    $pdf->Cell(30, 8, 'QUANTITY', 1, 0, 'C', 1);
    $pdf->Cell(35, 8, 'PRICE', 1, 0, 'C', 1);
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
    $pdf->Output('ticket.pdf', 'I');


?>