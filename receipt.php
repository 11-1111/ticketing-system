<?php
require('fpdf/fpdf.php');

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//if(isset($_POST['submit'])&& isset($_POST['customer_route'])){
    //$customer_id = $_POST['customer_id'];
    $booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : '';
    $route_id = isset($_POST['route_id']) ? $_POST['route_id'] : '';
$bus_no = isset($_POST['bus_no']) ? $_POST['bus_no'] : '';
$route_dep_date = isset($_POST['route_dep_date']) ? $_POST['route_dep_date'] : '';
$route_dep_time = isset($_POST['route_dep_time']) ? $_POST['route_dep_time'] : '';

$route_cities = isset($_POST['route_cities']) ? $_POST['route_cities'] : '';
$booking_created = isset($_POST['booking_created']) ? $_POST['booking_created'] : '';
// Assuming $route_cities contains the data fetched from the database, such as "A,B"
$route_cities_with_to = str_replace(',', ' TO ', $route_cities);

// Output the modified data with arrows
//echo $route_cities_with_arrow;

$route_seat_number = isset($_POST['route_seat_number']) ? $_POST['route_seat_number'] : '';

$route_step_cost = isset($_POST['route_step_cost']) ? $_POST['route_step_cost'] : '';
$cid = isset($_POST['cid']) ? $_POST['cid'] : '';
$cname = isset($_POST['cname']) ? $_POST['cname'] : '';
$cphone = isset($_POST['cphone']) ? $_POST['cphone'] : '';
$cmail = isset($_POST['cmail']) ? $_POST['cmail'] : '';

//$route_id = isset($_POST['route_id']) ? $_POST['route_id'] : '';
//$bus_no = isset($_POST['bus_no']) ? $_POST['bus_no'] : '';








    



            // Your existing code to generate the PDF goes here
        $pdf = new FPDF('P','mm','A4');

        $pdf->AddPage();
        
        //set font to arial, bold, 14pt
        $pdf->SetFont('Arial','B',14);

        //$pdf->Cell(40,5,$invoice['booking_id'],0,0);
        //$pdf->Cell(40,5,$invoice2['bus_no'],0,0);
        $pdf->SetFillColor(59, 59, 59);
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), 40, "F");
        $pdf->SetFillColor(244, 244, 244);
        $pdf->Rect(0, 40, $pdf->GetPageWidth(), 11, "F");
        $pdf->SetFont('Helvetica', '', 17);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Text(25, 15, "Bus Ticket");
        $pdf->SetFontSize(19);
        $pdf->Text(25, 27, "GARICHAPCHAP");
        
        // Add website, email, and contact information
        $pdf->SetTextColor(244, 244, 244);
        $pdf->SetFontSize(11);
        $pdf->SetXY(97, 11);
        $pdf->Cell(35, 6, "garichapchap.travels.co.ke", 0, 2, "R");
        $pdf->Cell(35, 6, "gar105@gmail.com", 0, 2, "R");
        $pdf->Cell(35, 6, "Tel: 0718796757", 0, 2, "R");
        $pdf->SetXY(160, 11);
        $pdf->Cell(35, 6, "Ronald Ngara", 0, 2, "R");
        $pdf->Cell(35, 6, "9360-0100", 0, 2, "R");
        $pdf->Cell(35, 6, "Nairobi-kenya", 0, 2, "R");
        
        // Add Account No and Invoice Date
        $pdf->SetXY(114, 43.2);
        $pdf->SetFillColor(59, 59, 59);
        $pdf->SetTextColor(158, 158, 158);
        $pdf->SetFontSize(9);
        $pdf->SetX($pdf->GetX() - 15);
        $pdf->Cell(21, 5, "PNR", 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Rect($pdf->GetX() -9, 43, 25, 5, "F"); // Adjust width to 25
$pdf->SetFontSize(11);
$pdf->SetX($pdf->GetX() - 8);
$pdf->Cell(25, 5, $booking_id, 0, 0, "L"); // Adjust width to 25
        $pdf->SetX($pdf->GetX() + 4);
        $pdf->SetTextColor(158, 158, 158);
        $pdf->SetFontSize(9);
        $pdf->Cell(21, 5, "Date", 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Rect($pdf->GetX() - 9, 43, 45, 5, "F");
        $pdf->SetFontSize(11);
        $pdf->SetX($pdf->GetX() - 8);
        $pdf->Cell(50, 5, "$booking_created", 0, 0, "L");
        $pdf->SetXY(25, 55);
$pdf->SetFont("Helvetica", "", 13);
$pdf->SetTextColor(84, 84, 84);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "Booking Details", 0, 2, "L");
$pdf->SetLineWidth(0.5);
$pdf->Line(25, $pdf->GetY() + 1, $pdf->GetPageWidth() - 25, $pdf->GetY() + 1);
$pdf->SetXY(25, 65);
$pdf->SetFont("Helvetica", "B", 9);
$pdf->SetTextColor(84, 84, 84);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(75, 5, "Travel Details", 0, 2, "L");
$pdf->SetFont("Helvetica", "", 9);
$pdf->MultiCell(75, 5, "Route ID : $route_id\nRoute[FROM>TO] :  $route_cities_with_to\nBus No :  $bus_no\nSeat-Number : $route_seat_number", 0, "L", false);
//$pdf->Cell(0, 10, 'Route ID: ' . $route_id, 0, 1);
//$pdf->Cell(0, 10, 'Route: ' . $route_cities, 0, 1);
//$pdf->Cell(0, 10, 'Bus No: ' . $bus_no, 0, 1);
//$pdf->Cell(0, 10, 'Route ID: ' . $route_seat_number, 0, 1);
$pdf->SetXY($pdf->GetPageWidth() - 100, 65);
$pdf->SetFont("Helvetica", "B", 9);
$pdf->Cell(75, 5, "Passenger Details", 0, 2, "L");
$pdf->SetFont("Helvetica", "", 9);
$pdf->MultiCell(37.5, 5, "Passenger_name:\nContacts:\nPassenger_email:\nTravel Date:\nTime:\n", 0, "L", false);
$pdf->SetXY($pdf->GetPageWidth() - 62.5, 70);
$pdf->MultiCell(37.5, 5, "$cname\n$cphone\n$cmail\n$route_dep_date\n$route_dep_time\n", 0, "R", false);
$pdf->Ln(5);
$pdf->SetX(25);
$pdf->SetFont("Helvetica", "B", 9);
//$pdf->Cell(75, 5, "To", 0, 2, "L");
//$pdf->SetFont("Helvetica", "", 9);
//$pdf->MultiCell(75, 5, "Account <email@email.com>\nCustomer Addr\nCity State, Zip", 0, "L", false);
//$pdf->Ln(5);
$pdf->SetX(25);
$pdf->SetFont("Helvetica", "", 13);
$pdf->SetTextColor(84, 84, 84);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "Charge Details", 0, 2, "L");
$pdf->Line(25, $pdf->GetY() + 1, $pdf->GetPageWidth() - 25, $pdf->GetY() + 1);
$pdf->Ln(5);
$pdf->SetX(25);
$pdf->SetFont("Helvetica", "", 9);
$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "Amount : ", 0, 0, "L");
$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "Ksh.$route_step_cost", 0, 2, "R");
//$pdf->SetX(25);
//$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "Billing year-to-date balance", 0, 0, "L");
//$pdf->Cell((($pdf->GetPageWidth() - 50) / 2), 5, "$75.97", 0, 2, "R");
$pdf->Ln(4);
$pdf->Line(25, $pdf->GetY() + 1, $pdf->GetPageWidth() - 25, $pdf->GetY() + 1);

$pdf->Output();
        
        
        $pdf->Output();
       
   ?>