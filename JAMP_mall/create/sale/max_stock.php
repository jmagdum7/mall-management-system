<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mall');

$sql="SELECT store_id FROM employee_details WHERE id='".$_SESSION['eid']."';";

$result = mysqli_query($conn, $sql);

$store = mysqli_fetch_row($result);

//echo $store[0]; 

$sql="SELECT id FROM products WHERE name='".$_GET['prdt']."';";

$result = mysqli_query($conn, $sql);

$pid = mysqli_fetch_row($result);

$sql="SELECT stock FROM all_products WHERE product_id='".$pid[0]."' AND store_id='".$store[0]."';";

$result = mysqli_query($conn, $sql);

$stock = mysqli_fetch_row($result);

echo $stock[0];
?>