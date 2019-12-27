<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

$phone = $_GET['hphone'];

$sql = "SELECT * FROM customers WHERE phone='".$phone."'";
//echo $sql;

$result = ($conn->query($sql));

$row = $result->fetch_assoc();

$arr = array('fname' => $row['fname'], 'mname' => $row['mname'], 'lname' => $row['lname'], 'address' => $row['address'], 'city' => $row['city'], 'state' => $row['state'], 'pincode' => $row['pincode'], 'country' => $row['country'], 'email' => $row['email'], 'DOB' => $row['DOB']);

echo json_encode($arr);

?>