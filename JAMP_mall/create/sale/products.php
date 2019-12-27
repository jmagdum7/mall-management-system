<?php
session_start();
//echo "<option>chal raha hai".$_SESSION['eid']."</option>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$all_products = mysqli_query($conn,"select product_id from all_products where store_id=(select store_id from employee_details where id='".$_SESSION['eid']."');");

echo "<option value='--'>--</option>";
while($alprod=mysqli_fetch_array($all_products))
{
    echo"<br>";
    $prod_name=mysqli_query($conn,"select name from products where id = '$alprod[0]'");
    $name=mysqli_fetch_row($prod_name);
    echo "<option value='$name[0]'>".$name[0]."</option>";
}
?>