<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

$phone = $_GET['hphone'];

$sql = "SELECT phone, fname, lname FROM customers WHERE phone LIKE '".$phone."%'";
//echo $sql;

$result = ($conn->query($sql));

if($result-> num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<option value='".$row['phone']."'>".$row['fname']." ".$row['lname']."<a></option>";
    }
}
?>