<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully<br>";

$sql='SELECT id FROM stores WHERE name="'.$_POST['store'].'";';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$storeid=$row['id'];
//echo $storeid;
//echo "<br>";

$sql="SELECT id FROM (SELECT id,CONCAT(fname, ' ', mname, ' ',lname) as fullname FROM employee_details)newt WHERE newt.fullname='".$_POST['supervisor']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$sup=$row['id'];
//echo $sup;
//echo "<br>";

//echo $_POST['firstname'];

$sql = "UPDATE employee_details SET id = '".$_POST['employee_id']."', fname = '".$_POST['firstname']."', mname = '".$_POST['middlename']."', lname = '".$_POST['lastname']."', address = '".$_POST['address']."', city = '".$_POST['city']."', state = '".$_POST['state']."', pincode = '".$_POST['pincode']."', country = '".$_POST['country']."', phone = '".$_POST['phone']."', email = '".$_POST['email']."', birth_date = '".$_POST['DOB']."', title = '".$_POST['title']."', store_id = '".$storeid."', supervisor = '".$sup."', start_date = '".$_POST['start_date']."', salary = '".$_POST['salary']."', ecd_fname = '".$_POST['ecdfirstname']."', ecd_mname = '".$_POST['ecdmiddlename']."', ecd_lname = '".$_POST['ecdlastname']."', ecd_address = '".$_POST['ecdaddress']."', ecd_city = '".$_POST['ecdcity']."', ecd_state = '".$_POST['ecdstate']."', ecd_pincode = '".$_POST['ecdpincode']."', ecd_country = '".$_POST['ecdcountry']."', ecd_phone = '".$_POST['ecdphone']."', ecd_relationship = '".$_POST['relationship']."' WHERE employee_details.id = '".$_POST['oldid']."';";

//echo $sql;
//echo "<br>";
//echo "<br>";
if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully<br>***Do not refresh as you are being redirected to a different page***";
    echo "Record updated successfully";
} else {
    echo "Error: " . $conn->error;
    
}
$conn->close();

//header("refresh: 2; URL=view_for_update.php");
//exit;

?>