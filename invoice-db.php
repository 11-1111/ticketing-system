<?php
require('fpdf/fpdf.php');

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//if(isset($_POST['submit'])&& isset($_POST['customer_route'])){

if( isset($_POST['customer_route'])){
    // print_r($customer_route);
    $customer_route=strval($_POST['customer_route']);
    // print_r($customer_route);

    $query = mysqli_query($con,"SELECT * FROM `bookings` WHERE customer_route='$customer_route'");

    $query2 = mysqli_query($con, "SELECT * 
                               FROM bookings
                               INNER JOIN routes ON bookings.route_id = routes.route_id
                               WHERE bookings.customer_route = '$customer_route'");






     /*$query2= mysqli_query($con,"SELECT * 
     FROM bookings
     INNER JOIN routes ON bookings.route_id = routes.route_id" WHERE bookings.id=$customer_route" ); */              
                        
 
 $invoice=mysqli_fetch_array($query); 
 $invoice2=mysqli_fetch_array($query2); 


$query_1 = ("SELECT * FROM `bookings` WHERE customer_route='$customer_route'");

$query_2 =("SELECT * 
            FROM bookings
            INNER JOIN routes ON bookings.route_id = routes.route_id
            WHERE bookings.customer_route = '$customer_route'"
        );




$invoice_results=mysqli_query($con, $query_1); 
$invoice2_results=mysqli_query($con, $query_2); 
 


//$query = mysqli_query($con, "SELECT * 
                       //FROM bookings,routes
                       //       WHERE bookings.route_id = routes.route_id",$selected_option
                              //AND bookings.customer_route = $selected_option
                              //AND customer_route='".$_GET['customer_route']."'");
                              
                            


/*$query=mysqli_query($con,"select * from bookings

inner join routes using(route_id);
where
customer_route = '".$_GET['customer_route']."'");*/

//$invoice=mysqli_fetch_array($query); 
if ($query && $query2) {
   // $invoice = mysqli_fetch_array($query);

    if (!$query && $query2) {
        //echo "No data found for the specified customer route.";
        echo "Error executing query: " . mysqli_error($con);
    } else {
        if (mysqli_num_rows($query) == 0) {
           // echo "Error executing query: " . mysqli_error($con);
            
            echo "No query rows from database selected.";
        } else {
           // $invoice = mysqli_fetch_array($query);
            // Your existing code to generate the PDF goes here
            // Your existing code to generate the PDF goes here
       

            // Create new PDF instance
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

            // Set font to Arial, bold, 14pt
            $pdf->SetFont('Arial', 'B', 14);

            $pdf->SetFont("Helvetica", "", 13);

            
            $pdf->SetXY(10, 55);
            $pdf->SetFont("Helvetica", "B", 9);
            $pdf->SetTextColor(84, 84, 84);
            $pdf->SetFillColor(255, 255, 255);

            // Header
            $pdf->SetFont('Arial', 'B', 13,);
            $pdf->Cell(40, 10, 'Booking ID', 1, 0, 'C');
            $pdf->Cell(35, 10, 'Bus Number', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Booked Amount', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Departure Date', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Departure Time', 1, 1, 'C'); // Move to the next line

            // Set font to Arial, regular, 12pt
            $pdf->SetFont('Arial', '', 12);

            // Data rows
           // Data rows
            while(($row = mysqli_fetch_array($invoice2_results)) && ($row2 = mysqli_fetch_array($invoice_results))) {
                $pdf->Cell(40, 10, $row2['booking_id'], 1, 0, 'C');
                $pdf->Cell(35, 10, $row['bus_no'], 1, 0, 'C');
                $pdf->Cell(40, 10, $row2['booked_amount'], 1, 0, 'C');
                $pdf->Cell(40, 10, $row['route_dep_date'], 1, 0, 'C');
                $pdf->Cell(40, 10, $row['route_dep_time'], 1, 1, 'C'); // Move to the next line
            }



            // Output PDF
            $pdf->Output();
        }
    }
}
}
   ?>