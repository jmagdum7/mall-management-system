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

$sql='SELECT id FROM stores WHERE name="'.$_POST['store'].'";';

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$storeid=$row['id'];

$sql="SELECT id FROM (SELECT id,CONCAT(fname,' ', mname, ' ', lname) AS name FROM employee_details)et WHERE name='".$_POST['supervisor']."';";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$supid=$row['id'];

$sql = "INSERT INTO employee_details( fname, mname, lname, address, city, state, pincode, country, phone, email, birth_date, title, store_id, supervisor, id, start_date, salary, ecd_fname, ecd_mname, ecd_lname, ecd_address, ecd_city, ecd_state, ecd_pincode, ecd_country, ecd_phone, ecd_relationship) VALUES ('".$_POST['firstname']."', '" .$_POST['middlename']."', '" .$_POST['lastname']."', '" .$_POST['address']."', '" .$_POST['city']."', '" .$_POST['state']."', '" .$_POST['pincode']."', '" .$_POST['country']."', '" .$_POST['phone']."', '" .$_POST['email']."', '" .$_POST['DOB']."', '" .$_POST['title']."','".$storeid."','".$supid."','" .$_POST['employee_id']."', '" .$_POST['start_date']."', '" .$_POST['salary']."', '" .$_POST['ecdfirstname']."', '" .$_POST['ecdmiddlename']."', '" .$_POST['ecdlastname']."', '" .$_POST['ecdaddress']."', '" .$_POST['ecdcity']."', '" .$_POST['ecdstate']."', '" .$_POST['ecdpincode']."', '" .$_POST['ecdcountry']."', '" .$_POST['ecdphone']."', '" .$_POST['relationship']."');";

if ($conn->query($sql) === TRUE) {
    echo "New record stored successfully";
} else {
    echo "Error: " . $conn->error;
}
if($_POST['title']=='Store Manager')
{
    $sql="UPDATE stores SET manager_id='".$_POST['employee_id']."' WHERE name='".$_POST['store']."';";
    $result=mysqli_query($conn,$sql);
    
    $sql="INSERT INTO login_details VALUES('".$_POST['employee_id']."','".$_POST['password']."');";
    $result=mysqli_query($conn,$sql);
    
}

$conn->close();

?>