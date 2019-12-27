<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$oid = mysqli_fetch_array(mysqli_query($conn,'select id from orders order by id desc limit 1'))[0];

$sql = "select * from orders where id=".$oid."";
$result = mysqli_query($conn, $sql);

while($data=mysqli_fetch_array($result)) {
    $pdf->Cell(0,10,'JAMP Mall',0,1,"C");

    $pdf->Ln();
    $pdf->Cell(100,10,'RETAIL INVOICE',0,0);
    $pdf->Cell(50,10,'INVOICE DETAILS',0,1);
//    $pdf->Cell(25,10,$oid,0,1);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(25,10,'      Date : ',0,0) ;
    $pdf->Cell(85,10,$data['date'],0,0) ;
    $pdf->Cell(40,10,' Invoice Number :',0,0) ;
    $pdf->Cell(30,10,$oid,0,1);
}

$sql1 = "SELECT stores.Department , stores.name ,  stores.floor , stores.block from stores,orders WHERE stores.id=orders.store_id && orders.id=".$oid;
$result1 = mysqli_query($conn, $sql1);

while($data1=mysqli_fetch_array($result1)) {
    $pdf->SetFont('Arial','B',16);
    $pdf->Ln();
    $pdf->Cell(50,10,'STORE DETAILS',0,1,"C");

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,10,'      Store Name : ',0,0) ;
    $pdf->Cell(40,10,$data1['name'],0,1) ;

    $pdf->Cell(50,10,'      Store Department : ',0,0) ;
    $pdf->Cell(40,10,$data1['Department'],0,1) ;

    $pdf->Cell(40,10,'      Store Floor : ',0,0) ;
    $pdf->Cell(40,10,$data1['floor'],0,1) ;

    $pdf->Cell(40,10,'      Store Block : ',0,0) ;
    $pdf->Cell(40,10,$data1['block'],0,1) ;
}

$sql2 = "SELECT employee_details.fname , employee_details.lname FROM employee_details,orders WHERE employee_details.id=orders.employee_id and orders.id = ".$oid ;
$result2 = mysqli_query($conn, $sql2);

while($data2=mysqli_fetch_array($result2)) {
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(30,10,'      Billed By : ',0,0) ;
    $pdf->Cell(15,10,$data2['fname'],0,0) ;
    $pdf->Cell(15,10,$data2['lname'],0,1) ;
}

$sql3 = "SELECT customers.fname, customers.phone, customers.lname FROM customers,orders WHERE customers.id=orders.customer_id and orders.id = ".$oid ;
$result3 = mysqli_query($conn, $sql3);

while($data3=mysqli_fetch_array($result3)) {
    $pdf->SetFont('Arial','B',16);
    $pdf->Ln();
    $pdf->Cell(50,10,'  CUSTOMER DETAILS',0,1,"C");

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(30,10,'      Billed To : ',0,0) ;
    $pdf->Cell(15,10,$data3['fname'],0,0) ;
    $pdf->Cell(15,10,$data3['lname'],0,1) ;

    $pdf->Cell(35,10,'      Contact No : ',0,0) ;
    $pdf->Cell(15,10,$data3['phone'],0,1) ;
}

$sql4 = "SELECT products.name , products.id, order_details.quantity, order_details.total_price,order_details.discount, order_details.final_price FROM products,order_details,orders WHERE order_details.product_id=products.id AND order_details.order_id=orders.id and orders.id = ".$oid ;
$result4 = mysqli_query($conn, $sql4);

$pdf->SetFont('Arial','B',16);
$pdf->Ln();
$pdf->Cell(50,10,'PRODUCT DETAILS',0,1,"C");
$pdf->SetFont('Arial','',12);
//        $pdf->Cell(30,10,'Product ID',0,0,"C");
$pdf->Cell(60,10,'Product Name',1,0,"C");
$pdf->Cell(30,10,'Quantity',1,0,"C");
$pdf->Cell(30,10,'Total Price',1,0,"C");
$pdf->Cell(30,10,'Discount',1,0,"C");
$pdf->Cell(30,10,'Final Price',1,1,"C");

while($data4=mysqli_fetch_array($result4)) {
    $pdf->SetFont('Arial','',12);
    //        $pdf->Cell(30,10,$data4['id'],0,0,"C");
    $pdf->Cell(60,10,$data4['name'],1,0,"C");
    $pdf->Cell(30,10,$data4['quantity'],1,0,"C");
    $pdf->Cell(30,10,$data4['total_price'],1,0,"C");
    $pdf->Cell(30,10,$data4['discount'],1,0,"C");
    $pdf->Cell(30,10,$data4['final_price'],1,1,"C");
}

$pdf->Output();
?>
