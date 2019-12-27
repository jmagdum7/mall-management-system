
<?php      
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$emp_id = $_GET['id'];

$sql = 'UPDATE employee_details SET status="Inactive" WHERE id="'.$emp_id.'";' ;

$result = (mysqli_query($conn,$sql)) ;

$sql = 'SELECT title FROM employee_details WHERE id="'.$emp_id.'";';
$title = mysqli_fetch_array(mysqli_query($conn,$sql))['title'];
if($title=="Store Manager")
{
    mysqli_query($conn,"UPDATE `stores` SET `manager_id` = NULL WHERE `stores`.`manager_id` = '".$emp_id."';");
    mysqli_query($conn,"DELETE FROM `login_details` WHERE `login_details`.`employee_id` = '".$emp_id."';");
}
echo "Data deleted successfully\n";
?>
